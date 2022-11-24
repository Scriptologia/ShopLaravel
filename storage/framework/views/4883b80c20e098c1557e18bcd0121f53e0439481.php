<li class="categories_list-item col-6 col-md-4 col-xl-2" data-order="<?php echo e($category->id); ?>">
    <a class="categories_list-item_wrapper" href="#">
        <div class="media">
                                    <span class="overlay d-flex flex-column justify-content-end">
                                        <span class="overlay_content"><?php echo e($category->products_count); ?> Items</span>
                                    </span>
            <picture>
                <source
                        data-srcset="<?php echo e(Storage::disk('image')->url($category->img)); ?>"
                        srcset="<?php echo e(Storage::disk('image')->url($category->img)); ?>"
                        type="image/webp"
                />
                <img
                        class="lazy"
                        data-src="<?php echo e(Storage::disk('image')->url($category->img)); ?>"
                        src="<?php echo e(Storage::disk('image')->url($category->img)); ?>"
                        alt="media"
                />
            </picture>
        </div>
        <h4 class="title"><?php echo e($category->name); ?></h4>
    </a>
</li><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/partials/category-item.blade.php ENDPATH**/ ?>