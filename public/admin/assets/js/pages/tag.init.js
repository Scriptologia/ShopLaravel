var filter = '';
var search = '';
var sort = '';
var draftRemove = '';
var colName = null;
var response = [];
var inputVal = '';
var timerId = false;
//Table
var tagListAll = new gridjs.Grid({
    columns: [
        {
            name: '# id',
            width: '40px'
        }, {
            name: 'name',
            width: '200px'
        }, {
            name: 'slug',
            width: '150px'
        },{
            name: 'created',
            width: '100px'
        },{
            name: 'deleted',
            width: '100px'
        }, {
            name: "Action",
            width: '80px',
            sort: {
                enabled: false
            },
            formatter: function formatter(cell, row) {
                var x = new DOMParser().parseFromString(row._cells[0].data.props.content, "text/html").body.querySelector(".checkbox-tag-list .form-check-input").value;
                return gridjs.html('<div class="dropdown">' + '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' + '<i class="ri-more-fill"></i>' + '</button>' + '<ul class="dropdown-menu dropdown-menu-end">' + '<li><a class="dropdown-item show-list" data-show-id="' + x + '" href="#"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>' + '<li><a href="#showModal" data-bs-toggle="modal" class="dropdown-item edit-list" data-edit-id="' + x + '" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>' + '<li class="dropdown-divider"></li>' + '<li><a class="dropdown-item remove-list" href="#" data-id="' + x + '" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>' + '</ul>' + '</div>');
            }
        }
    ],
    className: {
        th: 'text-muted',
    },
    server: {
        url: routes.apiTags,
        total: data => data.meta.total,
        then: data => { refreshTable(); response = data.data; setTimeout(() => {timerId = true}, 300);
            return data.data.map(item => [
                gridjs.html('<div class="form-check checkbox-tag-list">\
                    <input class="form-check-input" type="checkbox" value="' +item.id + '" id="checkbox-' + item.id + '">\
                    <label class="form-check-label" for="checkbox-' + item.id + '">' + item.id + '</label>\
                  </div>'),
                gridjs.html('<div class=""><h5 class="fs-14 mb-1"><a href="' +  '/' + item.id + '" class="text-dark">'+ item.name+'</a></h5></div>'),
                item.slug,
                gridjs.html(str_dt(item.created_at)),
                gridjs.html(str_dt(item.deleted_at)),
            ]);
        }
    },
    sort: {
        multiColumn: false,
        server: {
            url: (prev, columns) => {
                if (!columns.length) return prev;
                const col = columns[0];
                const dir = col.direction === 1 ? 'asc' : 'desc';
                let colName = ['id', 'name', 'slug', 'created_at', 'deleted_at'][col.index];
                colName = colName;
                return `${prev}?order=${colName}&dir=${dir}`;
            }
        }
    },
    pagination: {
        enabled: true,
        limit: 10,
        server: {
            url: (prev, page, limit) => {return prev.indexOf("?") != -1? `${prev}&${filter}${search}page=${page + 1}` : `${prev}?${filter}${search}page=${page + 1}`;}
        }
    }
}).render(document.getElementById("table-tag-list-all")); // table-tag-list-verified

$('a[href="tagnav-all"]').on('click', function () {
    draftRemove = ''; filter = '';updateList();
})
$('a[href="tagnav-draft"]').on('click', function () {
    draftRemove = 'draft'; filter = 'filter=deleted_at&' ; updateList();
})

var searchField = $("input.search");
searchField.on("keyup", function () {
    if(!timerId) $(this).val( inputVal);
    inputVal = $(this).val().toLowerCase();
    search = 'search='+inputVal+'&';
    updateList();
}); // search

var idField = $("#tagId"),
    addBtn = $("#add-btn"),
    editBtn = $("#edit-btn"),
    removeBtns = $(".remove-item-btn")
    editBtns = $(".edit-дшые");
    form = $('#form-modal');
    editBtn = $("#edit-btn"),

document.getElementById("showModal").addEventListener("show.bs.modal", function(e) {
    if (e.relatedTarget.classList.contains("edit-list")) {
        document.getElementById("exampleModalLabel").innerHTML = "Edit Tag";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").style.display = "none";
        document.getElementById("edit-btn").style.display = "block";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("modal-id").style.display = "none";
        document.getElementById("exampleModalLabel").innerHTML = "Add Tag";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("edit-btn").style.display = "none";
        document.getElementById("add-btn").style.display = "block";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Tag";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
    }
});

document.getElementById("showModal").addEventListener("hidden.bs.modal", function() {
    clearFields();
});

function SearchData() {
    var pickerVal = document.getElementById("demo-datepicker").value;
    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];
    filter = ''
    if(pickerVal) filter += 'created_at='+ JSON.stringify([new Date(date1), new Date(date2)]) + '&';
    updateList();
}

form.on("submit", function(e) {e.preventDefault();});
addBtn.on("click", function(e) {
     let data = { id: idField.val() };
    langs.forEach(function(it) {
        data[it] = {}
        let name = $(`#${it} .name-field`).val() != "" ? $(`#${it} .name-field`).val() : $(`#en .name-field`).val()
       data[it].name = name
    })
    updateItemFromServer(data);
});
editBtn.on("click", function(e) {
        let data = { id: idField.val() };
        langs.forEach(function(it) {
            data[it] = {}
        let name = $(`#${it} .name-field`).val() != "" ? $(`#${it} .name-field`).val() : $(`#en .name-field`).val()
        data[it].name = name
    })
    updateItemFromServer(data);
});

function refreshCallbacks() {
    removeBtns = $(".remove-item-btn")
    editBtns = $(".edit-list");
    viewBtns = $(".view-tag-btn");
    editBtns.each(function(btn) {
        $(this).off("click");
        $(this).on('click', function(e) {
            let itemId = $(this).attr('data-edit-id')
            let item = response.find(it =>  it.id == itemId);
            idField.val(item.id);
            langs.forEach(function(it) {
                let trans = item.translations[it] ? item.translations[it] : item.translations.en;
                $(`#${it} .name-field`).val(trans.name);
            })
            form.find('.text-danger').each(function() { this.remove()})
        });
    });
    // viewBtns.each(function(btn) {
    //     $(this).off("click");
    //     $(this).on('click', function(e) {
    //         e.target.closest("tr").children[1].innerText;
    //         itemId = e.target.closest("tr").children[1].innerText;
    //         window.location.href = routes.tag.view+'/'+itemId;
    //     });
    // });
}

var isSelected = 0;

function checkRemoveItem() {
    var tabEl = $('a[data-bs-toggle="tab"]');
    tabEl.each(function (el) {
        $(this).off('show.bs.tab');
        $(this).on('show.bs.tab', function (event) {
            draftRemove =null;
            if($(this).attr('href') === "tagnav-draft") draftRemove = "draft";
            isSelected = 0;
            $("#selection-element").css('display', 'none');
        });
    });
    setTimeout(function () {
        $(".checkbox-tag-list input").each(function (item) {
            $(this).on('click', function (event) {
                if (event.target.checked == true) {
                    event.target.closest('tr').classList.add("gridjs-tr-selected");
                } else {
                    event.target.closest('tr').classList.remove("gridjs-tr-selected");
                }

                var checkboxes = $('.checkbox-tag-list input:checked');
                isSelected = checkboxes.length;
                if (event.target.closest('tr').classList.contains("gridjs-tr-selected")) {
                    $("#select-content").html(isSelected);
                    isSelected > 0 ? $("#selection-element").css('display', 'block') : $("#selection-element").css('display', 'none');
                } else {
                    $("#select-content").html(isSelected);
                    isSelected > 0 ? $("#selection-element").css('display', 'block') : $("#selection-element").css('display', 'none');
                }
            });
        });
    }, 100);
} // check to remove item

function removeItems() {
    var removeItem = $('#removeItemModal');
    removeItem.off();
    removeItem.on('show.bs.modal', function (event) {
        isSelected = 0;
        $("#delete-record").off();
        $("#delete-record").on("click", function () {
            var filtered = '';
            let selected = $(".gridjs-tr.gridjs-tr-selected");
            if(selected) {
                var values = [];
                selected.each(function () {
                    values.push($(this).find('input').val() * 1);
                });
                deleteItemsFromServer(values, draftRemove);
            }

            $("#btn-close").click();
            let elem = $("#selection-element");
            if (elem) elem.css('display', 'none');
        });
    });
}

function removeSingleItem() {
    $('.remove-list').on('click', function() {
        let id = $(this).attr('data-id');
        $('#delete-record').off('click');
        $('#delete-record').on('click', function () {
            if (id) deleteItemsFromServer([id * 1], draftRemove);
            $("#btn-close").click();
        });
    })
}

function clearFields() {
    form.find('.text-danger').each(function() { this.remove()})
    idField.val('');
    langs.forEach(function(it) {
        $(`#${it} .name-field`).val('');
    })
}

var str_dt = function formatDate(date) {
    if(!date) return '-';
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var d = new Date(date),
        time_s = (d.getHours() + ':' + d.getMinutes());
    var t = time_s.split(":");
    var hours = t[0];
    var minutes = t[1];
    var newformat = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    month = '' + monthNames[(d.getMonth())],
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    return [day + " " + month + "," + year + " <small class='text-muted'>" + hours + ':' + minutes + ' ' + newformat + "</small>"];
};

function deleteItemsFromServer (ids, draftRemove = null) {
    axios.post(routes.apiTag.delete, {ids: ids, draftRemove: draftRemove})
        .then(resp => {
            updateList()
        })
        .catch( err => {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: err.response.data.message,
                showConfirmButton: false,
                timer: false,
                showCloseButton: true
            });
        })
}

function updateItemFromServer(data) {
    axios.post(routes.apiTag.update, data)
        .then(resp => {
            clearFields();
            document.getElementById("close-modal").click();
            updateList();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Tag inserted successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        })
        .catch((error) => {
            if (error.response && error.response.status === 403) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: error.response.data.message,
                    showConfirmButton: false,
                    timer: false,
                    showCloseButton: true
                });
            }
            if (error.response && error.response.status === 422) {
                form.find('.text-danger').each(function() { this.remove()})
                var errors = error.response.data.errors;
                for (var i in errors) {
                    let span = document.createElement('span');
                    span.className = "text-danger";
                    span.innerHTML = errors[i][0]
                    langs.forEach(function(it) {
                        if (i == it+".name") $(`#${it} .name-field`).after(span);
                    })
                }
            }
        })
}

function updateList() {
    if(timerId) {
        tagListAll.forceRender();
        refreshTable(); timerId = false;
    }
}
function refreshTable() {
    $("#select-content").html(0); $("#selection-element").css('display', 'none')
    setTimeout(()=> {
        removeSingleItem();
        checkRemoveItem();
        refreshCallbacks()
        removeItems();
    }, 1000)
}
