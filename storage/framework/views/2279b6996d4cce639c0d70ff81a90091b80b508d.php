<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('admin/assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="http://shoplaravel/admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('admin.components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Ecommerce
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Create Product
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Product Title</label>
                                    <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                                    <input type="text" class="form-control d-none" id="product-id-input">
                                    <input type="text" class="form-control" id="product-title-input" value="" placeholder="Enter product title" required>
                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                </div>
                            </div>
                            <div>
                                <label>Product Description</label>

                                <div id="ckeditor-classic">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Product Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Product Image</h5>
                                <p class="text-muted">Add Product main Image.</p>
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0"  data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <input class="form-control d-none" value="" id="product-image-input" type="file"
                                                accept="image/png, image/gif, image/jpeg">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="" id="product-img" class="avatar-md h-auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="fs-14 mb-1">Product Gallery</h5>
                                <p class="text-muted">Add Product Gallery Images.</p>

                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                        role="tab">
                                        General Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata"
                                        role="tab">
                                        Meta Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    <div class="mb-3">
                                            <label class="form-label" for="plant-type-input">Plant Type</label>
                                            <input type="text" class="form-control" id="plant-type-input" value="" placeholder="Enter plant type" required>
                                            <div class="invalid-feedback">Please Enter a plant type.</div>
                                        </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-9 col-sm-6">
                                            <label class="form-label" for="product-effects-input">Effects</label>
                                            
                                            
                                            <input class="form-control" placeholder="Enter Effects" type="text" value="" id="product-effects-input"/>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-3 col-lg-3 col-sm-6 form-check form-switch form-switch-lg" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="discount-enable" checked="">
                                            <label class="form-check-label" for="discount-enable">Discount Enable</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="sku-input">Sku</label>
                                                <input type="text" class="form-control" id="sku-input" placeholder="sku" required>
                                                <div class="invalid-feedback">Please Enter a product sku.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-price-input">Price</label>
                                                <div class="input-group has-validation mb-3">
                                                    <span class="input-group-text" id="product-price-addon">$</span>
                                                    <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                    <div class="invalid-feedback">Please Enter a product price.</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-discount-input">Discount</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="product-discount-addon">%</span>
                                                    <input type="text" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="orders-input">Orders</label>
                                                <input type="text" class="form-control" id="orders-input" placeholder="Orders" required>
                                                <div class="invalid-feedback">Please Enter a product orders.</div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab-pane -->

                                <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-title-input"><?php echo app('translator')->get('admin.product.product-seo-title'); ?></label>
                                                <input type="text" class="form-control" id="product-title-seo" value="" placeholder="<?php echo app('translator')->get('admin.product.add-product-seo-title'); ?>" required="">
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-keywords-input"><?php echo app('translator')->get('admin.meta-keywords'); ?></label>
                                                <input class="form-control" placeholder="Enter meta keywords" type="text" value="" id="meta-keywords-input"/>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div>
                                        <label class="form-label" for="meta-description-input"><?php echo app('translator')->get('admin.product.product-seo-description'); ?></label>
                                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3" id="product-description-seo"></textarea>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                    </div>
            </div>
            <!-- end col -->
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?php echo app('translator')->get('admin.publish'); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label"><?php echo app('translator')->get('admin.status'); ?></label>

                            <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="0" selected><?php echo app('translator')->get('admin.published'); ?></option>
                                <option value="1"><?php echo app('translator')->get('admin.draft'); ?></option>
                            </select>
                        </div>

                        <div>
                            <label for="choices-publish-visibility-input" class="form-label"><?php echo app('translator')->get('admin.visibility'); ?></label>
                            <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="1" selected><?php echo app('translator')->get('admin.public'); ?></option>
                                <option value="0"><?php echo app('translator')->get('admin.hidden'); ?></option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                
                    
                        
                    
                    
                    
                        
                            
                            
                                
                                
                        
                    
                
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?php echo app('translator')->get('admin.category.product-categories'); ?></h5>
                    </div>
                    <div class="card-body">
                            <select class="form-select" id="choices-category-input" name="choices-category-input" data-choices data-choices-search-false>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?php echo app('translator')->get('admin.tags.product-tags'); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <select class="js-example-disabled-multi" name="states[]" multiple>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var imgURL = '<?php echo e(Storage::disk('image')->url('')); ?>';
        var routes = {
            product: {
                all :'<?php echo e(route('admin.products')); ?>',
                edit :'<?php echo e(route('admin.product.edit')); ?>',
                create :'<?php echo e(route('admin.product.create')); ?>',
                view :'<?php echo e(route('admin.product.view')); ?>',
            },
            apiProducts: '<?php echo e(route('admin.api.products')); ?>',
            apiProduct: {
                edit :'<?php echo e(route('admin.api.product.edit')); ?>',
                update :'<?php echo e(route('admin.api.product.update')); ?>',
                delete :'<?php echo e(route('admin.api.product.delete')); ?>',
                view :'<?php echo e(route('admin.api.product.view')); ?>',
            }
        };
    </script>
    <!--jquery cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

    <!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo e(URL::asset('admin/assets/libs/@ckeditor/@ckeditor.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('admin/assets/libs/dropzone/dropzone.min.js')); ?>"></script>
    <script src="http://shoplaravel/admin/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo e(URL::asset('admin/assets/js/pages/product-create.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/admin/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/admin/apps-ecommerce-add-product.blade.php ENDPATH**/ ?>