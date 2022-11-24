/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
var filters = {};
sessionStorage.removeItem('editInputValue');

    var filter = '';
    var select = '';
    var search = '';
    var sort = '';
    var draftRemove = '';
    var colName = null;
    var response = [];
    var timerId = false;
    var inputVal = '';
    var isSelected = 0;
    document.getElementById("addproduct-btn").addEventListener("click", function () {
        sessionStorage.setItem('editInputValue', "");
    });

    var productList = new gridjs.Grid({
        columns: [
            {
                name: '# id',
                width: '80px'
            }, {
                name: 'Product',
                width: '360px'
            }, {
                name: 'SKU',
                width: '94px'
            }, {
                name: 'Price',
                width: '101px'
            }, {
                name: 'Rating',
                width: '105px'
            }, {
                name: 'Published',
                width: '100px'
            }, {
                name: 'Deleted',
                width: '100px'
            }, {
                name: "Action",
                width: '80px',
                sort: {
                    enabled: false
                },
                formatter: function formatter(cell, row) {
                    var x = new DOMParser().parseFromString(row._cells[0].data.props.content, "text/html").body.querySelector(".checkbox-product-list .form-check-input").value;
                    return gridjs.html('<div class="dropdown">' + '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' + '<i class="ri-more-fill"></i>' + '</button>' + '<ul class="dropdown-menu dropdown-menu-end">' + '<li><a class="dropdown-item show-list" data-show-id="' + x + '" href="#"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>' + '<li><a class="dropdown-item edit-list" data-edit-id="' + x + '" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>' + '<li class="dropdown-divider"></li>' + '<li><a class="dropdown-item remove-list" href="#" data-id="' + x + '" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>' + '</ul>' + '</div>');
                }
            }],
        className: {
            th: 'text-muted'
        },
        pagination: {
              enabled: true,
              limit: 10,
              server: {
                  url: (prev, page, limit) => {return prev.indexOf("?") != -1? `${prev}&${filter}${select}${search}page=${page + 1}` : `${prev}?${filter}${select}${search}page=${page + 1}`;}
              }
          },
        server: {
              url: routes.apiProducts,
              then: data => { response = data.data;refreshTable(); setTimeout(() => {timerId = true}, 300);
                  return data.data.map(item => [
                      gridjs.html('<div class="form-check checkbox-product-list">\
                    <input class="form-check-input" type="checkbox" value="' + item.id + '" id="checkbox-' + item.id + '">\
                    <label class="form-check-label" for="checkbox-' + item.id + '">' + item.id + '</label>\
                     </div>'),
                      gridjs.html('<div class="d-flex align-items-center"><div class="flex-shrink-0 me-3"><div class="avatar-sm bg-light rounded p-1"><img src="' + imgURL + item.img_main + '" alt="" class="img-fluid d-block"></div></div><div class="flex-grow-1"><h5 class="fs-14 mb-1"><a href="' + routes.product.view + '/' + item.id + '" class="text-dark">' + item.name + '</a></h5><p class="text-muted mb-0">Category : <span class="fw-medium">' + item.category.name + '</span></p></div></div>'),
                      item.sku,
                      "$ " + (item.price / 100).toFixed(2),
                      item.rating,
                      gridjs.html(item.is_published ? 'yes' : 'no'),
                      gridjs.html(str_dt(item.deleted_at)),
                  ]);
              },
              total: data => data.meta.total
          },
        sort: {
            multiColumn: false,
            server: {
                url: (prev, columns) => {
                    if (!columns.length) return prev;
                    const col = columns[0];
                    const dir = col.direction === 1 ? 'asc' : 'desc';
                    let colName = ['id', 'name', 'sku', 'price',  'rating', 'created_at', 'deleted_at'][col.index];
                    colName = colName;
                    return `${prev}?order=${colName}&dir=${dir}`;
                }
            }
        }
    }).render(document.getElementById("table-product-list-all")); // table-product-list-published

    $('a[href="productnav-all"]').on('click', function () {
        draftRemove = ''; filter = '';updateList();
    })
    $('a[href="productnav-published"]').on('click', function () {
        draftRemove = ''; filter = 'filter=is_published&';updateList();
    })
    $('a[href="productnav-draft"]').on('click', function () {
        draftRemove = 'draft'; filter = 'filter=deleted_at&' ; updateList();
    })

   var draftRemove = null;

    var searchProductList = document.getElementById("searchProductList");
    searchProductList.addEventListener("keyup", function (e) {
        if(!timerId) searchProductList.value = inputVal;
        inputVal = searchProductList.value.toLowerCase();
        search = 'search='+inputVal+'&';
       updateList();
    }); // mail list click event

    Array.from(document.querySelectorAll('.filter-list a')).forEach(function (filteritem) {
        filteritem.addEventListener("click", function () {
            var filterListItem = document.querySelector(".filter-list a.active");
            if (filterListItem) filterListItem.classList.remove("active");
            filteritem.classList.add('active');
            filters.category_id = filteritem.querySelector(".listname").dataset.categoryId *1;

            filterByAllFields();
            // checkRemoveItem();
        });
    });//filter categories

// price range slider
    var slider = document.getElementById('product-price-range');
    noUiSlider.create(slider, {
        start: [0, maxPrice],
        // Handle start position
        step: 1,
        // Slider moves in increments of '10'
        margin: 1,
        // Handles must be more than '20' apart
        connect: true,
        // Display a colored bar between the handles
        behaviour: 'tap-drag',
        // Move handle on tap, bar is draggable
        range: {
            // Slider can select '0' to '100'
            'min': 0,
            'max': maxPrice * 1
        },
        format: wNumb({
            decimals: 0,
            prefix: '$ ',
        })
    });
    var minCostInput = document.getElementById('minCost'),
        maxCostInput = document.getElementById('maxCost');

    slider.noUiSlider.on('end', function (values, handle) {
        if (handle) {
            maxCostInput.value = values[handle];
        } else {
            minCostInput.value = values[handle];
        }

        var maxvalue = maxCostInput.value.substr(2) * 100;
        var minvalue = minCostInput.value.substr(2) * 100;
        filters.price = [minvalue,  maxvalue];
        filterByAllFields()
    });
    minCostInput.addEventListener('change', function () {
        slider.noUiSlider.set([null, this.value]);
    });
    maxCostInput.addEventListener('change', function () {
        slider.noUiSlider.set([null, this.value]);
    }); // text inputs example

    document.querySelectorAll(".filter-accordion .accordion-item .form-check-input").forEach( function (item) {
    item.addEventListener("click", function (event) {
        filters.discount = null
        filters.rating = null
        document.querySelectorAll(".filter-accordion .accordion-item .form-check-input:checked").forEach(function (it){
                if (it.name === 'discount') filters.discount = it.value * 1;
                if (it.name === 'rating') filters.rating = it.value * 1;
        })
        filterByAllFields();
    })
})

    Array.from(document.querySelectorAll(".filter-accordion .accordion-item")).forEach(function (item) {
        Array.from(item.querySelectorAll(".form-check .form-check-input")).forEach(function (subitem) {
            subitem.addEventListener("click", function (event) {
                var isFilterSelected = item.querySelectorAll(".form-check-input:checked").length;
                if (isFilterSelected) item.querySelector(".filter-badge").innerHTML = isFilterSelected;
                if (subitem.checked) {
                    isFilterSelected > 0 ? item.querySelector(".filter-badge").style.display = 'block' : item.querySelector(".filter-badge").style.display = 'none';
                } else {
                    subitem.checked = false;
                    isFilterSelected > 0 ? item.querySelector(".filter-badge").style.display = 'block' : item.querySelector(".filter-badge").style.display = 'none';
                }
            });
        });
    }); // Search Brands Options

    document.getElementById("clearall").addEventListener("click", function () {
        var isSelected = 0;
        Array.from(document.querySelectorAll(".filter-accordion .accordion-item")).forEach(function (item) {
            item.querySelector(".filter-badge").innerHTML = 0;
            item.querySelector(".filter-badge").style.display = 'none';
            item.querySelectorAll(".form-check-input:checked").forEach(function (subitem) {
                subitem.checked = false;
            })
        })
        if (document.querySelectorAll('.filter-list a.active')[0]) document.querySelectorAll('.filter-list a.active')[0].classList.remove('active');
        slider.noUiSlider.reset()
        filters = [];
        filterByAllFields()
    });

    var checkboxes = document.querySelectorAll('.checkbox-wrapper-mail input');

    // function checkRemoveItem() {
    //     var tabEl = $('a[data-bs-toggle="tab"]');
    //     tabEl.each(function (el) {
    //         $(this).off('show.bs.tab');
    //         $(this).on('show.bs.tab', function (event) {
    //             draftRemove =null;
    //             if($(this).attr('href') === "productnav-draft") draftRemove = "draft";
    //             isSelected = 0;
    //             $("#selection-element").css('display', 'none');
    //         });
    //     });
    //     setTimeout(function () {
    //         $(".checkbox-product-list input").each(function (item) {
    //             $(this).on('click', function (event) {
    //                 if (event.target.checked == true) {
    //                     event.target.closest('tr').classList.add("gridjs-tr-selected");
    //                 } else {
    //                     event.target.closest('tr').classList.remove("gridjs-tr-selected");
    //                 }
    //
    //                 var checkboxes = $('.checkbox-product-list input:checked');
    //                 isSelected = checkboxes.length;
    //                 if (event.target.closest('tr').classList.contains("gridjs-tr-selected")) {
    //                     $("#select-content").html(isSelected);
    //                     isSelected > 0 ? $("#selection-element").css('display', 'block') : $("#selection-element").css('display', 'none');
    //                 } else {
    //                     $("#select-content").html(isSelected);
    //                     isSelected > 0 ? $("#selection-element").css('display', 'block') : $("#selection-element").css('display', 'none');
    //                 }
    //             });
    //         });
    //     }, 100);
    // } // check to remove item

    function removeItems() {
        var removeItem = $('#removeItemModal');
        removeItem.off();
        removeItem.on('show.bs.modal', function (event) {
            isSelected = 0;
            $("#delete-product").off();
            $("#delete-product").on("click", function () {
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
            let id = $(this).attr('data-id');
            $('#delete-product').off('click');
                $('#delete-product').on('click', function () {
                    function arrayRemove(arr, value) {
                        return arr.filter(function (ele) {
                            return ele.id != value;
                        });
                    }
                    if (id) deleteItemsFromServer([id * 1], draftRemove);
                    $("#btn-close").click();
                });
        })

        $('.edit-list').on('click', function(event) {
            event.preventDefault();
            let id = $(this).attr('data-edit-id');
            let item = response.find(it => it.id == id)
            sessionStorage.setItem('editInputValue', JSON.stringify(item));
            window.location.href = routes.product.edit;
            });

        $('.show-list').on('click', function(event) {
            event.preventDefault();
            let id = $(this).attr('data-show-id');
            // productListAllData = productListAllData.map(function (item) {
            //     if (item.id == id) {
            //         sessionStorage.setItem('editInputValue', JSON.stringify(item));
            //     }
            //     return item;
            // });
            window.location.href = routes.product.view+'/'+id;
            });

    }

    function filterByAllFields() {
       select = ''
        if(filters.category_id) select += 'category_id='+filters.category_id+'&';
        if(filters.price && filters.price.length) select += 'price='+JSON.stringify(filters.price)+'&';
        if(filters.rating != null) select += 'rating='+filters.rating+'&';
        if(filters.discount != null) select += 'discount='+filters.discount+'&';
        $('a[href="productnav-all"]')[0].click();
        updateList()
    }

    function deleteItemsFromServer (ids, draftRemove = null) {
        axios.post(routes.apiProduct.delete, {ids: ids, draftRemove: draftRemove})
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

    var str_dt = function formatDate(date) {
        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        if(!date) return '-';
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

    function updateList() {
        if(timerId) {
            productList.forceRender();
            refreshTable();
            timerId = false;
        }
    }
    function refreshTable() {
        $("#select-content").html(0); $("#selection-element").css('display', 'none')
        setTimeout(()=> {
            removeSingleItem();
            // checkRemoveItem();
            removeItems();
        }, 1000)
    }
/******/ })()
;