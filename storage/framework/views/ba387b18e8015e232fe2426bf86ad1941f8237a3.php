<div class="" style="width:inherit;">
    <div wire:key="sort" class="shop_panel d-flex flex-wrap justify-content-between">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filter-for-products')->html();
} elseif ($_instance->childHasBeenRendered('l995554891-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l995554891-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l995554891-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l995554891-0');
} else {
    $response = \Livewire\Livewire::mount('filter-for-products');
    $html = $response->html();
    $_instance->logRenderedChild('l995554891-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <a
                class="filterTrigger d-inline-flex d-lg-none align-items-center justify-content-center"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#shopFilters"
        >
            <?php echo app('translator')->get('front.filter.filters'); ?>
            <i class="icon-caret_down icon"></i>
        </a>
        <span class="showing"><?php echo app('translator')->get('front.filter.filters'); ?> <?php echo e($products->links()->paginator->firstItem()); ?>

            <?php echo app('translator')->get('front.filter.showing'); ?> –<?php echo e($products->links()->paginator->lastItem()); ?> <?php echo app('translator')->get('front.filter.of'); ?> <?php echo e($products->links()->paginator->total()); ?> <?php echo app('translator')->get('front.filter.results'); ?></span>
        <ul class="chosen d-flex d-lg-none flex-wrap">
            <li class="chosen-item d-flex align-items-center">
                Oil
                <i class="icon-close icon"></i>
            </li>
            <li class="chosen-item d-flex align-items-center">
                Hybrid
                <i class="icon-close icon"></i>
            </li>
            <li class="chosen-item d-flex align-items-center">
                10g
                <i class="icon-close icon"></i>
            </li>
            <li class="chosen-item d-flex align-items-center">
                THC: 0% - 10%
                <i class="icon-close icon"></i>
            </li>
            <li class="chosen-item d-flex align-items-center">
                CBD: 10% - 20%
                <i class="icon-close icon"></i>
            </li>
        </ul>
        
    </div>
<div class="shop_products">
    <ul class="shop_products-list d-sm-flex flex-wrap">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('front.partials.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php echo e($products->links()); ?>

</div>
</div>
<?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/livewire/filtered-products.blade.php ENDPATH**/ ?>