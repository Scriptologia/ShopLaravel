<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.products'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('admin/assets/libs/nouislider/nouislider.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('admin/assets/libs/gridjs/gridjs.min.css')); ?>">
    <link href="http://shoplaravel/admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('admin.components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('admin.ecommerce'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('admin.product.products'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16"><?php echo app('translator')->get('admin.filters'); ?></h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="text-decoration-underline" id="clearall"><?php echo app('translator')->get('admin.clear-all'); ?></a>
                        </div>
                    </div>

                    <div class="filter-choices-input" style="display:none;">
                        <input class="form-control" data-choices data-choices-removeItem type="text" id="filter-choices-input" value="" type="hidden" />
                        <input class="form-control" data-choices data-choices-removeItem type="text" id="discount" value="" type="hidden" />
                        <input class="form-control" data-choices data-choices-removeItem type="text" id="rating" value="" type="hidden" />
                    </div>
                </div>

                <div class="accordion accordion-flush filter-accordion">

                    <div class="card-body border-bottom">
                        <div>
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2"><?php echo app('translator')->get('admin.product.products'); ?></p>
                            <ul class="list-unstyled mb-0 filter-list">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname" data-category-id="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></h5>
                                        </div>
                                    </a>
                                </li>
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                        
                                    
                                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body border-bottom">
                        <p class="text-muted text-uppercase fs-12 fw-medium mb-4"><?php echo app('translator')->get('admin.price'); ?></p>

                        <div id="product-price-range"></div>
                        <div class="formCost d-flex gap-2 align-items-center mt-3">
                            <input class="form-control form-control-sm" type="text" id="minCost" value="0" /> <span class="fw-semibold text-muted"><?php echo app('translator')->get('admin.to'); ?></span>
                            <input class="form-control form-control-sm" type="text" id="maxCost" value="1000" />
                        </div>
                    </div>

                    
                        
                            
                                
                                
                                
                                    
                            
                        

                        
                            
                            
                                
                                    
                                    
                                
                                
                                    
                                        
                                            
                                        
                                            
                                    
                                    
                                        
                                            
                                        
                                            
                                    
                                    
                                        
                                            
                                        
                                            
                                    
                                    
                                        
                                            
                                        
                                            
                                    
                                    
                                        
                                            
                                        
                                    

                                    
                                        
                                            
                                            
                                    
                                
                            
                        
                    
                    <!-- end accordion-item -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingDiscount">
                            <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount"
                                aria-expanded="true" aria-controls="flush-collapseDiscount">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>
                        <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingDiscount">
                            <div class="accordion-body text-body pt-1">
                                <div class="d-flex flex-column gap-2 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="50" name="discount"
                                            id="productdiscountRadio6">
                                        <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="40" name="discount"
                                            id="productdiscountRadio5">
                                        <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="30" name="discount"
                                            id="productdiscountRadio4">
                                        <label class="form-check-label" for="productdiscountRadio4">
                                            30% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="20" name="discount"
                                            id="productdiscountRadio3">
                                        <label class="form-check-label" for="productdiscountRadio3">
                                            20% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="10" name="discount"
                                            id="productdiscountRadio2">
                                        <label class="form-check-label" for="productdiscountRadio2">
                                            10% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="0" name="discount"
                                            id="productdiscountRadio1">
                                        <label class="form-check-label" for="productdiscountRadio1">
                                            Less than 10%
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingRating">
                            <button class="accordion-button bg-transparent shadow-none collapsed"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseRating" aria-expanded="false"
                                aria-controls="flush-collapseRating">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>

                        <div id="flush-collapseRating" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingRating">
                            <div class="accordion-body text-body">
                                <div class="d-flex flex-column gap-2 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4 & Above Star"
                                            id="productratingRadio4" >
                                        <label class="form-check-label" for="productratingRadio4">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 4 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3 & Above Star"
                                            id="productratingRadio3">
                                        <label class="form-check-label" for="productratingRadio3">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 3 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2 & Above Star"
                                            id="productratingRadio2">
                                        <label class="form-check-label" for="productratingRadio2">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 2 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1 Star"
                                            id="productratingRadio1">
                                        <label class="form-check-label" for="productratingRadio1">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 1
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="<?php echo e(route('admin.products')); ?>" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> <?php echo app('translator')->get('admin.product.add-product'); ?></a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all"
                                            role="tab">
                                            <?php echo app('translator')->get('admin.all'); ?> <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published"
                                            role="tab">
                                            <?php echo app('translator')->get('admin.published'); ?>  <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft"
                                            role="tab">
                                            <?php echo app('translator')->get('admin.draft'); ?> <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        <?php echo app('translator')->get('admin.select'); ?> <div id="select-content" class="text-body fw-semibold px-1"></div> <?php echo app('translator')->get('admin.result'); ?> <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal"><?php echo app('translator')->get('admin.remove'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none"></div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-published" role="tabpanel">
                                <div id="table-product-list-published" class="table-card gridjs-border-none"></div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                <div id="table-product-list-draft" class="table-card gridjs-border-none"></div>
                                
                                    
                                        
                                        
                                    
                                    
                                
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


    <!-- removeItemModal -->
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
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4><?php echo app('translator')->get('admin.are-sure'); ?></h4>
                            <p class="text-muted mx-4 mb-0"><?php echo app('translator')->get('admin.are-sure2'); ?></p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal"><?php echo app('translator')->get('admin.close'); ?></button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-product"><?php echo app('translator')->get('admin.yes-delete'); ?></button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var imgURL = '<?php echo e(Storage::disk('image')->url('')); ?>';
        var routes = {
            product: {
                edit :'<?php echo e(route('admin.product.edit')); ?>',

                view :'<?php echo e(route('admin.product.view')); ?>',
            },
            apiProducts: '<?php echo e(route('admin.api.products')); ?>',
            apiProduct: {
                edit :'<?php echo e(route('admin.api.product.edit')); ?>',
                delete :'<?php echo e(route('admin.api.product.delete')); ?>',
                view :'<?php echo e(route('admin.api.product.view')); ?>',
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="<?php echo e(URL::asset('admin/assets/libs/nouislider/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/wnumb/wnumb.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/gridjs/gridjs.min.js')); ?>"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="http://shoplaravel/admin/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo e(URL::asset('admin/assets/js/pages/ecommerce-product-list.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('admin/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/admin/apps-ecommerce-products.blade.php ENDPATH**/ ?>