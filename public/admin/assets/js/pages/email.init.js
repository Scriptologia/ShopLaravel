/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};

    var filter = '';
    var search = '';
    var sort = '';
    var draftRemove = '';
    var colName = null;
    var formImport = $('#importEmails');
    let formData = new FormData();
    $('#importModal').on('hidden.bs.modal', function (e) {
        formData.delete('file')
        formImport.find('.text-danger').remove()
        $('#importEmails input[name="file"]').val('')
    })
    formImport.on('submit', function(e) {e.preventDefault(); })
    $('#importButton').on('click', function (e) {
        let file = $('#importEmails input[name="file"]')[0].files[0];
        formData.append('file', file)
        axios.post(routes.apiImport, formData)
            .then((resp) => {
                updateList()
                $('#importModal').modal('hide')
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Emails inserted successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
            } )
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
                    formImport.find('.text-danger').remove()
                    var errors = error.response.data.errors;
                    for (var i in errors) {
                        let span = document.createElement('span');
                        span.className = "text-danger";
                        span.innerHTML = errors[i][0]
                        if (i == "file") formImport.append(span);
                    }
                }
            })
    })

    var emailListAll = new gridjs.Grid({
        columns: [
            {
                name: '# id',
                width: '50px'
            }, {
                name: 'Email',
                width: '200px'
            }, {
                name: 'User',
                width: '150px',
                sort: {
                    enabled: false
                }
            }, {
                name: 'Verified',
                width: '101px'
            }, {
                name: 'Subscribed',
                width: '101px'
            }, {
                name: 'Created',
                width: '105px'
            }, {
                name: 'Removed',
                width: '100px'
            }, {
                name: "Action",
                width: '80px',
                sort: {
                    enabled: false
                },
                formatter: function formatter(cell, row) {
                    var x = new DOMParser().parseFromString(row._cells[0].data.props.content, "text/html").body.querySelector(".checkbox-email-list .form-check-input").value;
                    return gridjs.html('<a class="dropdown-item remove-list" href="#" data-id="' + x + '" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a>');
                    // return gridjs.html('<div class="dropdown">' + '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' + '<i class="ri-more-fill"></i>' + '</button>' + '<ul class="dropdown-menu dropdown-menu-end">' + '<li><a class="dropdown-item show-list" data-show-id="' + x + '" href="#"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>' + '<li><a class="dropdown-item edit-list" data-edit-id="' + x + '" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>' + '<li class="dropdown-divider"></li>' + '<li><a class="dropdown-item remove-list" href="#" data-id="' + x + '" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>' + '</ul>' + '</div>');
                }
            }
            ],
        className: {
            th: 'text-muted',
        },
        server: {
              url: routes.apiEmails,
              total: data => data.meta.total,
              then: data => data.data.map(item => [
                  gridjs.html('<div class="form-check checkbox-email-list">\
                    <input class="form-check-input" type="checkbox" value="' +item.id + '" id="checkbox-' + item.id + '">\
                    <label class="form-check-label" for="checkbox-' + item.id + '">' + item.id +'</label>\
                  </div>'),
                  item.email,
                  gridjs.html(getUser(item.user)),
                  item.email_verified_at, item.subscribed, item.created_at, item.deleted_at])
          },
        sort: {
            multiColumn: false,
            server: {
                url: (prev, columns) => {
                    if (!columns.length) return prev;
                    const col = columns[0];
                    const dir = col.direction === 1 ? 'asc' : 'desc';
                    let colName = ['id', 'email', 'user', 'verified', 'subscribed', 'created_at', 'deleted_at'][col.index];
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
    }).render(document.getElementById("table-email-list-all")); // table-email-list-verified

    $('a[href="emailnav-all"]').on('click', function () {
        filter = '';updateList();
    })
    $('a[href="emailnav-subscribed"]').on('click', function () {
        filter = 'filter=subscribed&'; updateList();
    })
    $('a[href="emailnav-verified"]').on('click', function () {
        filter = 'filter=email_verified_at&'; updateList();
    })
    $('a[href="emailnav-draft"]').on('click', function () {
        filter = 'filter=deleted_at&' ; updateList();
    })

    var searchEmailList = document.getElementById("searchEmailList");
    searchEmailList.addEventListener("keyup", function () {
        var inputVal = searchEmailList.value.toLowerCase();
        search = 'search='+inputVal+'&'; updateList();
    }); // mail list click event

    function getUser(user){
        if(user) {return '<div class=""><h5 class="fs-14 mb-1"><a href="' +  '/' + user.id + '" class="text-dark">'+ user.name+'</a></h5></div>';}
        else {return '<div class=""><h5 class="fs-14 mb-1 text-danger">Not registered</h5></div>';}
    }

    var isSelected = 0;

    function checkRemoveItem() {
        var tabEl = $('a[data-bs-toggle="tab"]');
        tabEl.each(function (el) {
            $(this).off('show.bs.tab');
            $(this).on('show.bs.tab', function (event) {
                draftRemove =null;
                if($(this).attr('href') === "emailnav-draft") draftRemove = "draft";
                    isSelected = 0;
                $("#selection-element").css('display', 'none');
            });
        });
        setTimeout(function () {
            $(".checkbox-email-list input").each(function (item) {
                $(this).on('click', function (event) {
                    if (event.target.checked == true) {
                        event.target.closest('tr').classList.add("gridjs-tr-selected");
                    } else {
                        event.target.closest('tr').classList.remove("gridjs-tr-selected");
                    }

                    var checkboxes = $('.checkbox-email-list input:checked');
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

    var checkboxes = document.querySelectorAll('.checkbox-wrapper-mail input');

    function removeItems() {
        var removeItem = $('#removeItemModal');
        removeItem.off();
        removeItem.on('show.bs.modal', function (event) {
            isSelected = 0;
            $("#delete-email").off();
            $("#delete-email").on("click", function () {
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
            checkboxes.checked = false;
            });
        });
    }

    function removeSingleItem() {
        $('.remove-list').on('click', function() {
            let id = $(this).attr('data-id');console.log(id)
            $('#delete-email').off('click');
                $('#delete-email').on('click', function () {
                    if (id) deleteItemsFromServer([id * 1], draftRemove);
                    $("#btn-close").click();
                });
        })

        // $('.edit-list').on('click', function(event) {
        //     event.preventDefault();
        //     let id = $(this).attr('data-edit-id');
        //     window.location.href = routes.email.edit;
        //     });

        // $('.show-list').on('click', function(event) {
        //     event.preventDefault();
        //     let id = $(this).attr('data-show-id');
        //     window.location.href = routes.email.view+'/'+id;
        //     });

    }

    // function filterByAllFields() {
    //     filterDataAll = emailListAllData.filter(function (email) {
    //         if (filters.hasOwnProperty('discount') && filters.discount == 0 && email.discount >= 1000) {
    //             return false;
    //         }
    //         else if (filters.hasOwnProperty('discount') && filters.discount > 0 && email.discount < filters.discount) {
    //             return false;
    //         }
    //         if (filters.price && (parseFloat(email.price) < filters.price.min || parseFloat(email.price) > filters.price.max)) return false;
    //         if (filters.category && email.category.name !== filters.category) return false;
    //
    //         return email;
    //     });
    //     renderAllTable(filterDataAll)
    // }

    function deleteItemsFromServer (ids, draftRemove = null) {
        axios.post(routes.apiEmail.delete, {ids: ids, draftRemove: draftRemove})
            .then(resp => {
                axios.get(routes.apiEmails).then(function(resp) {
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

        $('.gridjs-pages').on('click', () => {refreshTable()});
        $('.gridjs-th-sort').on('click', () => {refreshTable()});

    function updateList() {
        emailListAll.forceRender();
        refreshTable()
    }
    function refreshTable() {
        $("#select-content").html(0); $("#selection-element").css('display', 'none')
        setTimeout(()=> {
            removeSingleItem();
            checkRemoveItem();
            removeItems();
        }, 1000)
    }

/******/ })()
;