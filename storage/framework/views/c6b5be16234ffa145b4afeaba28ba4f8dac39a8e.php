<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.orders'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('admin/assets/libs/gridjs/gridjs.min.css')); ?>">
    <link href="<?php echo e(URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('admin.components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Ecommerce
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Orders
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Order History</h5>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                                    data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create
                                Order
                            </button>
                            <button type="button" class="btn btn-info"><i
                                        class="ri-file-download-line align-bottom me-1"></i> Import
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                           placeholder="Search for order ID, customer, order status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-6">
                                <div>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                           data-date-format="d M, Y" data-range-date="true"
                                           id="demo-datepicker" placeholder="Select date">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idStatus">
                                        <option value="">Status</option>
                                        <option value="" selected>All</option>
                                        <?php $__currentLoopData = $delivery_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idPayment">
                                        <option value="">Payment Method</option>
                                        <?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($method); ?>"><?php echo e($method); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-1 col-sm-4">
                                <div>
                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();"><i
                                                class="ri-equalizer-fill me-1 align-bottom"></i>
                                        Filters
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" href="ordernav-all" data-bs-toggle="tab"
                                       role="tab">
                                        <?php echo app('translator')->get('admin.all'); ?> <span
                                                class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" href="ordernav-draft" data-bs-toggle="tab"
                                       role="tab">
                                        <?php echo app('translator')->get('admin.draft'); ?> <span
                                                class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <div id="selection-element">
                                <div class="my-n1 d-flex align-items-center text-muted">
                                    <?php echo app('translator')->get('admin.select'); ?>
                                    <div id="select-content"
                                         class="text-body fw-semibold px-1"></div> <?php echo app('translator')->get('admin.result'); ?>
                                    <button type="button" class="btn btn-link link-danger p-0 ms-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#removeItemModal"><?php echo app('translator')->get('admin.remove'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active ordernav-all ordernav-verified ordernav-draft" id="ordernav-all"
                             role="tabpanel">
                            <div id="table-order-list-all" class="table-card gridjs-border-none"></div>
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end card body -->
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                </div>
                <form action="#" id="form-modal">
                    <div class="modal-body">
                        <input type="hidden" id="id-field"/>

                        <div class="mb-3" id="modal-id">
                            <label for="orderId" class="form-label">ID</label>
                            <input type="text" id="orderId" class="form-control" placeholder="ID"
                                   readonly/>
                        </div>

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Customer
                                Name</label>
                            <select class="form-control" data-trigger name="customername-field" id="customername-field">
                                <option value="">Select user</option>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="">empty</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="productname-field" class="form-label">Product</label>
                            <select class="form-control" name="productname-field" id="productname-field" multiple>
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="">empty</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        
                        
                        
                        
                        
                        
                        

                        <div class="row gy-4 mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="amount-field" class="form-label">Amount</label>
                                    <input type="text" id="amount-field" class="form-control"
                                           placeholder="Total amount" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="payment-field" class="form-label">Payment
                                        Method</label>
                                    <select class="form-control" data-trigger name="payment-method"
                                            id="payment-field" required>
                                        <option value="">Payment Method</option>
                                        <?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($method); ?>"><?php echo e($method); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="delivered-status" class="form-label">Delivery
                                Status</label>
                            <select class="form-control" data-trigger name="delivered-status"
                                    id="delivered-status">
                                <option value="">Delivery Status</option>
                                <?php $__currentLoopData = $delivery_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                   colors="primary:#f7b84b,secondary:#f06548"
                                   style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4><?php echo app('translator')->get('admin.are-sure'); ?></h4>
                            <p class="text-muted mx-4 mb-0"><?php echo app('translator')->get('admin.are-sure2'); ?></p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light"
                                data-bs-dismiss="modal"><?php echo app('translator')->get('admin.close'); ?></button>
                        <button type="button" class="btn w-sm btn-danger "
                                id="delete-record"><?php echo app('translator')->get('admin.yes-delete'); ?></button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div>
    </div>
    <!--end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var imgURL = '<?php echo e(Storage::disk('image')->url('')); ?>';
        var routes = {
            order: {
                
                view: '<?php echo e(route('admin.order.view')); ?>',
            },
            apiOrders: '<?php echo e(route('admin.api.orders')); ?>',
            apiOrder: {
                edit: '<?php echo e(route('admin.api.order.edit')); ?>',
                delete: '<?php echo e(route('admin.api.order.delete')); ?>',
                update: '<?php echo e(route('admin.api.order.update')); ?>',
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--ecommerce-order init js -->
    <script src="<?php echo e(URL::asset('admin/assets/libs/gridjs/gridjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/js/pages/order.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/admin/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/admin/orders.blade.php ENDPATH**/ ?>