var filter = '';
var search = '';
var sort = '';
var draftRemove = '';
var colName = null;
var response = [];
var inputVal = '';
var timerId = false;
//Table
var orderListAll = new gridjs.Grid({
    columns: [
        {
            name: '# id',
            width: '40px'
        }, {
            name: 'user name',
            width: '200px',
            sort: {
                enabled: false
            }
        }, {
            name: 'product',
            width: '150px',
            sort: {
                enabled: false
            }
        },{
            name: 'created',
            width: '100px'
        },  {
            name: 'amount',
            width: '100px'
        },  {
            name: 'payment method',
            width: '100px'
        }, {
            name: 'payment status',
            width: '100px'
        }, {
            name: 'delivery status',
            width: '80px'
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
                var x = new DOMParser().parseFromString(row._cells[0].data.props.content, "text/html").body.querySelector(".checkbox-order-list .form-check-input").value;
                return gridjs.html('<div class="dropdown">' + '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' + '<i class="ri-more-fill"></i>' + '</button>' + '<ul class="dropdown-menu dropdown-menu-end">' + '<li><a class="dropdown-item show-list" data-show-id="' + x + '" href="#"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>' + '<li><a href="#showModal" data-bs-toggle="modal" class="dropdown-item edit-list" data-edit-id="' + x + '" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>' + '<li class="dropdown-divider"></li>' + '<li><a class="dropdown-item remove-list" href="#" data-id="' + x + '" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>' + '</ul>' + '</div>');
            }
        }
    ],
    className: {
        th: 'text-muted',
    },
    server: {
        url: routes.apiOrders,
        total: data => data.meta.total,
        then: data => { refreshTable(); response = data.data; setTimeout(() => {timerId = true}, 300);
        return data.data.map(item => [
            gridjs.html('<div class="form-check checkbox-order-list">\
                    <input class="form-check-input" type="checkbox" value="' +item.id + '" id="checkbox-' + item.id + '">\
                    <label class="form-check-label" for="checkbox-' + item.id + '">' + item.id + '</label>\
                  </div>'),
            gridjs.html('<div class=""><h5 class="fs-14 mb-1"><a href="' +  '/' + item.user.id + '" class="text-dark">'+ item.user.name+'</a></h5></div>'),
            item.products[0].name,
            gridjs.html(str_dt(item.created_at)),
            "$ " + (item.amount / 100).toFixed(2),
            item.payment_method,
            item.payment_status,
            gridjs.html( isStatus(item.delivery_status)),
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
                let colName = ['id', 'user_name', 'product_name', 'created_at', 'amount', 'payment_method', 'payment_status', 'delivery_status', 'deleted_at'][col.index];
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
}).render(document.getElementById("table-order-list-all")); // table-order-list-verified

$('a[href="ordernav-all"]').on('click', function () {
    draftRemove = ''; filter = '';updateList();
})
$('a[href="ordernav-draft"]').on('click', function () {
    draftRemove = 'draft'; filter = 'filter=deleted_at&' ; updateList();
})

var searchField = $("input.search");
searchField.on("keyup", function () {
    if(!timerId) $(this).val( inputVal);
    inputVal = $(this).val().toLowerCase();
    search = 'search='+inputVal+'&';
    updateList();
}); // search

var productnameVal = new Choices('#productname-field', { searchEnabled: false });
var customernameVal = new Choices('#customername-field', { searchEnabled: false });

var isChoiceEl = document.getElementById("idStatus");
var choices = new Choices(isChoiceEl, {
    searchEnabled: false,
});

var isPaymentEl = document.getElementById("idPayment");
var choices = new Choices(isPaymentEl, {
    searchEnabled: false,
});

var idField = document.getElementById("orderId"),
    customerNameField = document.getElementById("customername-field"),
    productNameField = document.getElementById("productname-field"),
    // dateField = document.getElementById("date-field"),
    amountField = $("#amount-field").mask("999999.99"),
    paymentField = document.getElementById("payment-field"),
    statusField = document.getElementById("delivered-status"),
    addBtn = $("#add-btn"),
    editBtn = $("#edit-btn"),
    removeBtns = $(".remove-item-btn")
    editBtns = $(".edit-item-btn");
    viewBtns = $(".view-order-btn");
    form = $('#form-modal');

var example = new Choices(paymentField);
var statusVal = new Choices(statusField);

document.getElementById("showModal").addEventListener("show.bs.modal", function(e) {
    if (e.relatedTarget.classList.contains("edit-list")) {
        document.getElementById("exampleModalLabel").innerHTML = "Edit Order";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").style.display = "none";
        document.getElementById("edit-btn").style.display = "block";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("modal-id").style.display = "none";
        document.getElementById("exampleModalLabel").innerHTML = "Add Order";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("edit-btn").style.display = "none";
        document.getElementById("add-btn").style.display = "block";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Order";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
    }
});

document.getElementById("showModal").addEventListener("hidden.bs.modal", function() {
    clearFields();
});

var table = document.getElementById("orderTable");

function SearchData() {
    var isstatus = document.getElementById("idStatus").value;
    var payment = document.getElementById("idPayment").value;
    var pickerVal = document.getElementById("demo-datepicker").value;

    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];
    filter = ''
    if(pickerVal) filter += 'created_at='+ JSON.stringify([new Date(date1), new Date(date2)]) + '&';
    if(isstatus) filter +='delivery_status=' + isstatus + '&';
    if(payment) filter +='payment_method=' + payment + '&';
    updateList();
}

form.on("submit", function(e) {e.preventDefault();});
addBtn.on("click", function(e) {
    let userId = customernameVal.getValue(true)
    if (
        userId !== "" &&
        productnameVal.getValue(true) &&
        customernameVal.getValue(true) &&
        // dateField.value !== "" &&
        amountField.val() !== "" &&
        paymentField.value !== "" &&
        statusField.value !== ""
    ) {
        let data = {
            user_id: customernameVal.getValue(true),
            product_ids: productnameVal.getValue(true),
            // date: dateField.value,
            amount: amountField.val() * 100,
            payment_method: paymentField.value,
            delivery_status: statusField.value,
        };
        axios.post(routes.apiOrder.update, data)
            .then(resp => {
                clearFields();
                document.getElementById("close-modal").click();
                updateList();
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
                if (error.response && error.response.status === 422) {
                    form.find('.text-danger').each(e => e.remove())
                    var errors = error.response.data.errors;
                    for (var i in errors) {
                        let span = document.createElement('span');
                        span.className = "text-danger";
                        span.innerHTML = errors[i][0]
                        if (i == "delivery_status") statusField.after(span);
                        if (i == "payment_method") paymentField.after(span);
                        if (i == "user_id") customerNameField.after(span);
                        if (i == "product_ids") productNameField.after(span);
                        if (i == "amount") amountField.after(span);
                    }
                }
            })
    }
});
editBtn.on("click", function(e) {
    if (
        productnameVal.getValue(true) &&
        productnameVal.getValue(true) &&
        amountField.val() !== "" &&
        paymentField.value !== "" &&
        statusField.value !== ""
    ) {
        let data = {
            id: idField.value,
            user_id: customerNameField.value,
            product_ids: productnameVal.getValue(true),
            // dateField = document.getElementById("date-field"),
            amount: amountField.val() * 100,
            payment_method: paymentField.value,
            delivery_status: statusField.value,
        };
        axios.post(routes.apiOrder.update, data)
            .then(resp => {
                clearFields();
                document.getElementById("close-modal").click();
                updateList();
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
                    form.find('.text-danger').each(e => e.remove())
                    var errors = error.response.data.errors;
                    for (var i in errors) {
                        let span = document.createElement('span');
                        span.className = "text-danger";
                        span.innerHTML = errors[i][0]
                        if (i == "delivery_status") statusField.after(span);
                        if (i == "payment_method") paymentField.after(span);
                        if (i == "user_id") customerNameField.after(span);
                        if (i == "product_ids") productNameField.after(span);
                        if (i == "amount") amountField.after(span);
                    }
                }
            })
    }
});

function refreshCallbacks() {
    removeBtns = $(".remove-item-btn")
    editBtns = $(".edit-list");
    viewBtns = $(".view-order-btn");
    editBtns.each(function(btn) {
        $(this).off("click");
        $(this).on('click', function(e) {
            let itemId = $(this).attr('data-edit-id')
            let item = response.find(it =>  it.id == itemId);
            idField.value = item.id;
            productnameVal.setChoiceByValue(item.products.map(it => it.id + ''));
            customerNameField.value = item.user.id;
            customernameVal.setChoiceByValue(item.user.id + '');
            amountField.val(( item.amount / 100).toFixed(2));
            paymentField.value = item.payment_method;
            example.setChoiceByValue(item.payment_method);
            statusField.value = item.delivery_status;
            statusVal.setChoiceByValue(item.delivery_status);
        });
    });
    // viewBtns.each(function(btn) {
    //     $(this).off("click");
    //     $(this).on('click', function(e) {
    //         e.target.closest("tr").children[1].innerText;
    //         itemId = e.target.closest("tr").children[1].innerText;
    //         window.location.href = routes.order.view+'/'+itemId;
    //     });
    // });
}

function isStatus(val) {
    switch (val) {
        case "Delivered":
            return (
                '<span class="badge badge-soft-success text-uppercase">' +
                val +
                "</span>"
            );
        case "Cancelled":
            return (
                '<span class="badge badge-soft-danger text-uppercase">' +
                val +
                "</span>"
            );
        case "Inprogress":
            return (
                '<span class="badge badge-soft-secondary text-uppercase">' +
                val +
                "</span>"
            );
        case "Pickups":
            return (
                '<span class="badge badge-soft-info text-uppercase">' + val + "</span>"
            );
        case "Returns":
            return (
                '<span class="badge badge-soft-primary text-uppercase">' +
                val +
                "</span>"
            );
        case "Pending":
            return (
                '<span class="badge badge-soft-warning text-uppercase">' +
                val +
                "</span>"
            );
    }
}

var isSelected = 0;

function checkRemoveItem() {
    var tabEl = $('a[data-bs-toggle="tab"]');
    tabEl.each(function (el) {
        $(this).off('show.bs.tab');
        $(this).on('show.bs.tab', function (event) {
            draftRemove =null;
            if($(this).attr('href') === "ordernav-draft") draftRemove = "draft";
            isSelected = 0;
            $("#selection-element").css('display', 'none');
        });
    });
    setTimeout(function () {
        $(".checkbox-order-list input").each(function (item) {
            $(this).on('click', function (event) {
                if (event.target.checked == true) {
                    event.target.closest('tr').classList.add("gridjs-tr-selected");
                } else {
                    event.target.closest('tr').classList.remove("gridjs-tr-selected");
                }

                var checkboxes = $('.checkbox-order-list input:checked');
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
    customerNameField.value = "";
    productNameField.value = "";
    // dateField.value = "";
    amountField.val(0);
    paymentField.value = "";
    if (example) example.destroy();
    example = new Choices(paymentField);
    if (productnameVal) {productnameVal.destroy();}
    productnameVal = new Choices(productNameField);
    if (customernameVal) customernameVal.destroy();
    customernameVal = new Choices(customerNameField);
    if (statusVal) statusVal.destroy();
    statusVal = new Choices(statusField);
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
    axios.post(routes.apiOrder.delete, {ids: ids, draftRemove: draftRemove})
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

function updateList() {
    if(timerId) {
        orderListAll.forceRender();
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