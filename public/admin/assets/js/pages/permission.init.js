var str_dt = function formatDate(date) {
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

var checkAll = document.getElementById("checkAll");
if (checkAll) {
    checkAll.onclick = function() {
        var checkboxes = document.querySelectorAll('.form-check-all input[type="checkbox"]');
        if (checkAll.checked == true) {
            Array.from(checkboxes).forEach(function(checkbox) {
                checkbox.checked = true;
                checkbox.closest("tr").classList.add("table-active");
            });
        } else {
            Array.from(checkboxes).forEach(function(checkbox) {
                checkbox.checked = false;
                checkbox.closest("tr").classList.remove("table-active");
            });
        }
    };
}

function uncheckInputsDelete() {
    var checkboxes = document.querySelectorAll('.form-check-all input[type="checkbox"]');
        Array.from(checkboxes).forEach(function(checkbox) {
            checkbox.checked = false;
            checkbox.closest("tr").classList.remove("table-active");
        });
}

var perPage = 10;
var idField = $("#permissionId"),
    permissionModelField = $("#model-field"),
    permissionSlugField = $("#slug-field"),
    permissionDescriptionField = $("#description-field"),
    addBtn = $("#add-btn"),
    editBtn = $("#edit-btn"),
    removeBtns = $(".remove-item-btn")
    editBtns = $(".edit-item-btn");
    form = $('#form-modal');
//Table
var options = {
    valueNames: [
        "id",
        "model",
        "slug",
        "date",
        "deleted"
    ],
    page: perPage,
    pagination: true,
    plugins: [
        ListPagination ({
        }),
    ],
    item: '<tr>\n' +
    '                                        <th scope="row">\n' +
    '                                            <div class="form-check">\n' +
    '                                                <input class="form-check-input" type="checkbox" name="checkAll"\n' +
    '                                                    value="option1">\n' +
    '                                            </div>\n' +
    '                                        </th>\n' +
    '                                        <td class="id"><a href=""\n' +
    '                                                class="fw-medium link-primary"></a></td>\n' +
    '                                        <td class="model"></td>\n' +
    '                                        <td class="slug"></td>\n' +
    '                                        <td class="date"></td>\n' +
    '                                        <td class="deleted"></td>\n' +
    '                                        <td>\n' +
    '                                                <li class="list-inline-item edit" data-bs-toggle="tooltip"\n' +
    '                                                    data-bs-trigger="hover" data-bs-placement="top" title="Edit">\n' +
    '                                                    <a href="#showModal" data-bs-toggle="modal"\n' +
    '                                                        class="text-primary d-inline-block edit-item-btn">\n' +
    '                                                        <i class="ri-pencil-fill fs-16"></i>\n' +
    '                                                    </a>\n' +
    '                                                </li>\n' +
    '                                                <li class="list-inline-item" data-bs-toggle="tooltip"\n' +
    '                                                    data-bs-trigger="hover" data-bs-placement="top" title="Remove">\n' +
    '                                                    <a class="text-danger d-inline-block remove-item-btn"\n' +
    '                                                        data-bs-toggle="modal" href="#deletePermission">\n' +
    '                                                        <i class="ri-delete-bin-5-fill fs-16"></i>\n' +
    '                                                    </a>\n' +
    '                                                </li>\n' +
    '                                            </ul>\n' +
    '                                        </td>\n' +
    '                                    </tr>'
};
// Init list
var permissionList = new List("permissionList", options).on("updated", function(list) {
    list.matchingItems.length == 0 ?
        (document.getElementsByClassName("noresult")[0].style.display = "block") :
        (document.getElementsByClassName("noresult")[0].style.display = "none");
    var isFirst = list.i == 1;
    var isLast = list.i > list.matchingItems.length - list.page;
    // make the Prev and Nex buttons disabled on first and last pages accordingly
    document.querySelector(".pagination-prev.disabled") ?
        document.querySelector(".pagination-prev.disabled").classList.remove("disabled") : "";
    document.querySelector(".pagination-next.disabled") ?
        document.querySelector(".pagination-next.disabled").classList.remove("disabled") : "";
    if (isFirst) {
        document.querySelector(".pagination-prev").classList.add("disabled");
    }
    if (isLast) {
        document.querySelector(".pagination-next").classList.add("disabled");
    }
    if (list.matchingItems.length <= perPage) {
        document.querySelector(".pagination-wrap").style.display = "none";
    } else {
        document.querySelector(".pagination-wrap").style.display = "flex";
    }

    if (list.matchingItems.length == perPage) {
        document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click()
    }

    if (list.matchingItems.length > 0) {
        document.getElementsByClassName("noresult")[0].style.display = "none";
    } else {
        document.getElementsByClassName("noresult")[0].style.display = "block";
    }
});

var records;
var draftRemove = 'Active';
initAxios();

var tabEl = document.querySelectorAll('a[data-bs-toggle="tab"]');
Array.from(tabEl).forEach(function(item) {
    item.addEventListener("shown.bs.tab", function(event) {
        filterPermission(event.target.id);
        if(event.target.id === "Deleted") {draftRemove = "Deleted";}
        else {draftRemove = "Active";}
    });
});
function filterPermission(isValue = 'Active') {
    var values_status = isValue;
    permissionList.filter(function(data) {
        var statusFilter = false;
        matchData = new DOMParser().parseFromString(
            data.values().deleted,
            "text/html"
        );
        var status = matchData.body.innerHTML;
        statusFilter = status == values_status;
        return statusFilter;
    });

    permissionList.update();
}

function updatePermission() {
    var values_status = document.querySelector("input[name=status]:checked").value;

    data = permissionList.filter(function(item) {
        var statusFilter = false;

        if (values_status == "Active") {
            statusFilter = true;
        } else {
            statusFilter = item.values().sts == values_status;
        }
        return statusFilter;
    });
    permissionList.update();
}

document.getElementById("showModal").addEventListener("show.bs.modal", function(e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {console.log('1')
        permissionModelField.prop('readonly', true);
        document.getElementById('modal-description').style.display = "block";
        document.getElementById('modal-slug').style.display = "block";
        document.getElementById("exampleModalLabel").innerHTML = "Edit Permission";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").style.display = "none";
        document.getElementById("edit-btn").style.display = "block";
    } else if (e.relatedTarget.classList.contains("add-btn")) {console.log('2')
        permissionModelField.prop('readonly', false);
        document.getElementById('modal-description').style.display = "block";
        document.getElementById('modal-slug').style.display = "block";
        document.getElementById("modal-id").style.display = "none";
        document.getElementById("exampleModalLabel").innerHTML = "Add Permission";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("edit-btn").style.display = "none";
        document.getElementById("add-btn").style.display = "block";
    } else {console.log('3')
        document.getElementById("exampleModalLabel").innerHTML = "List Permission";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
    }
});
ischeckboxcheck();

document.getElementById("showModal").addEventListener("hidden.bs.modal", function() {
    clearFields();
});

document.querySelector("#permissionList").addEventListener("click", function() {
    refreshCallbacks();
    ischeckboxcheck();
});

var table = document.getElementById("permissionTable");
// save all tr
var tr = table.getElementsByTagName("tr");
var trlist = table.querySelectorAll(".list tr");

function SearchData() {
    var pickerVal = document.getElementById("demo-datepicker").value;

    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];

    permissionList.filter(function(data) {
        var dateFilter = false;

        let newDate = new Date(data.values().date[0].slice(0, 11))
        if (
            newDate >= new Date(date1) &&
            newDate <= new Date(date2)
        ) {
            dateFilter = true;
        } else {
            dateFilter = false;
        }

        if (dateFilter) {
            return dateFilter;
        } else if (dateFilter && pickerVal == "") {
            return dateFilter;
        }
    });
    permissionList.update();
}

form.on("submit", function(e) {e.preventDefault();});
addBtn.on("click", function(e) {
    if (
        permissionModelField.val()
    ) {
        let data = {
            model: permissionModelField.val()
        };
        axios.post(routes.apiPermission.create, data)
            .then(resp => {
                let permissions = resp.data.data;
                permissions = permissions.filter(it => !records.find(item => it.slug === item.slug)  )
                records.concat(permissions)
                for(let i = 0; i < permissions.length ; i++) {
                    permissionList.add({
                        id: '<a href="'+routes.apiPermission.view+'" class="fw-medium link-primary">' + permissions[i].id + "</a>",
                        model: permissions[i].model,
                        slug: permissions[i].slug,
                        date: str_dt(permissions[i].created_at),
                        deleted: permissions[i].deleted_at ? 'Deleted' : 'Active'
                    });
                }
                permissionList.sort('id', { order: "desc" });
                document.getElementById("close-modal").click();
                clearFields();
                permissionList.update()
                filterPermission('Active')
                refreshCallbacks();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Order inserted successfully!',
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
                if (error.response && error.response.status === 422) {console.log(form.find('.text-danger'))
                    form.find('.text-danger').each(function() { this.remove()})
                    var errors = error.response.data.errors;
                    for (var i in errors) {
                        let span = document.createElement('span');
                        span.className = "text-danger";
                        span.innerHTML = errors[i][0]
                        if (i == "model") permissionModelField.after(span);
                    }
                }
            })
    }
});

editBtn.on("click", function(e) {
    var permissionIds = $(".permissions-field:checkbox:checked").map(function(){
        return $(this).val() * 1;
    }).get();
    if (
        permissionModelField.val() !== ""
    ) {
        let data = {
            id: idField.val(),
            description: permissionDescriptionField.val()
        };
        axios.post(routes.apiPermission.update, data)
            .then(resp => {
                let item = resp.data.data;
                records = records.map(it =>  it.id === item.id? item: it)
                var editValues = permissionList.get({
                    id: idField.val(),
                });
                Array.from(editValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    if (selectedid == item.id) {
                        x.values({
                            id: '<a href="' + routes.apiPermission.view + '" class="fw-medium link-primary">' + item.id + '</a>',
                            model: item.model,
                            slug: item.slug,
                            date: str_dt(item.created_at),
                            deleted: item.deleted_at ? 'Deleted' : 'Active'
                        });
                    }
                })
                document.getElementById("close-modal").click();
                clearFields();
                refreshCallbacks();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Order updated Successfully!',
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
                    form.querySelectorAll('.text-danger').forEach(e => e.remove())
                    var errors = error.response.data.errors;
                    for (var i in errors) {
                        let span = document.createElement('span');
                        span.className = "text-danger";
                        span.innerHTML = errors[i][0]
                        if (i == "model") permissionModelField.after(span);
                        if (i == "slug") permisionSlugField.after(span)
                    }
                }
            })
    }
});

function ischeckboxcheck() {
    Array.from(document.getElementsByName("checkAll")).forEach(function(x) {
        x.addEventListener("click", function(e) {
            if (e.target.checked) {
                e.target.closest("tr").classList.add("table-active");
            } else {
                e.target.closest("tr").classList.remove("table-active");
            }
        });
    });
}

function refreshCallbacks() {
    removeBtns = $(".remove-item-btn");
    editBtns = $(".edit-item-btn");
    removeBtns.each(function(btn) {
        $(this).off("click");
        $(this).on('click', function(e) {
            e.target.closest("tr").children[1].innerText;
            itemId = e.target.closest("tr").children[1].innerText;
            var itemValues = permissionList.get({
                id: itemId,
            });

            Array.from(itemValues).forEach(function(x) {
                deleteid = new DOMParser().parseFromString(x._values.id, "text/html");

                var isElem = deleteid.body.firstElementChild;
                var isdeleteid = deleteid.body.firstElementChild.innerHTML;

                if (isdeleteid == itemId) {
                    $("#delete-record").off();
                    $("#delete-record").on("click", function() {
                        axios.post(routes.apiPermission.delete, {ids: [itemId], draftRemove: draftRemove})
                            .then( resp => {
                                // roleList.remove("id", isElem.outerHTML);
                                var editValues = permissionList.get({
                                    id: idField.val(),
                                });
                                Array.from(editValues).forEach(function (x) {
                                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                                    var selectedid = isid.body.firstElementChild.innerHTML;
                                    if (selectedid == itemId) {
                                        x.values({deleted: x.values().deleted === 'Deleted' ? 'Active': 'Deleted'})
                                    }
                                });
                                permissionList.update();
                                filterPermission(draftRemove);
                                $("#deleteRecord-close").click();
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
                                        if (i == "name") permissionModelField.after(span);
                                    }
                                }
                            })
                    });
                }
            });
        });
    });
    editBtns.each(function(btn) {
        $(this).off("click");
        $(this).on('click', function(e) {
            e.target.closest("tr").children[1].innerText;
            itemId = e.target.closest("tr").children[1].innerText;
            let item = records.find(it =>  it.id == itemId);
            idField.val(itemId);
            permissionModelField.val(item.model);
            permissionSlugField.val(item.slug);
            permissionDescriptionField.val(item.description);
        });
    });
}
function clearFields() {
    permissionModelField.val("");
    permissionSlugField.val("");
    permissionDescriptionField.val("");
}

document.querySelector(".pagination-next").addEventListener("click", function() {
    document.querySelector(".pagination.listjs-pagination") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() : "" : "";
});
document.querySelector(".pagination-prev").addEventListener("click", function() {
    document.querySelector(".pagination.listjs-pagination") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() : "" : "";
});

// Delete Multiple Records
function deleteMultiple() {
    ids_array = [];
    var items = document.querySelectorAll('.form-check [value=option1]');
    Array.from(items).forEach(function(ele) {
        if (ele.checked == true) {
            var id_value = ele.parentNode.parentNode.parentNode;
            var id_get = id_value.querySelector("td a").innerHTML;
            ids_array.push(id_get);
        }
    });
    if (typeof ids_array !== 'undefined' && ids_array.length > 0) {
        if (confirm('Are you sure you want to delete this?')) {
            axios.post(routes.apiPermission.delete, {ids:ids_array, draftRemove: draftRemove})
                .then( resp => {
                    var editValues = permissionList.get({
                        id: idField.val(),
                    });
                    Array.from(editValues).forEach(function (x) {
                        isid = new DOMParser().parseFromString(x._values.id, "text/html");
                        var selectedid = isid.body.firstElementChild.innerHTML;
                        if (ids_array.indexOf(selectedid) != -1) {
                            x.values({deleted: x.values().deleted === 'Deleted' ? 'Active': 'Deleted'})
                        }
                    });
                    document.getElementById("checkAll").checked = false;
                    uncheckInputsDelete()
                    permissionList.update()
                    filterPermission(draftRemove)
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
                            if (i == "name") roleNameField.after(span);
                        }
                    }
                })
        } else {
            return false;
        }
    } else {
        Swal.fire({
            title: 'Please select at least one checkbox',
            confirmButtonClass: 'btn btn-info',
            buttonsStyling: false,
            showCloseButton: true
        });
    }
}

function initAxios(draftRemoved = null) {
    // roleList.clear();
    axios.get(routes.apiPermissions)
        .then( resp => {
            records = resp.data.data
            Array.from(records).forEach(function(element) {
                permissionList.add({
                    id: '<a href="'+routes.apiPermission.view+'" class="fw-medium link-primary">' + element.id + '</a>',
                    model: element.model,
                    slug: element.slug,
                    date: str_dt(element.created_at),
                    deleted: element.deleted_at ? 'Deleted' : 'Active'
                });
            });
            permissionList.sort('id', { order: "desc" });
            if(draftRemoved){ filterRole("Deleted");}
            else { filterPermission("Active");}
            refreshCallbacks();
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
                    if (i == "name") roleNameField.after(span);
                }
            }
        })
}
