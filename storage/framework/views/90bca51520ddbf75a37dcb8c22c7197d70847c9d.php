<li class="shop_products-list_item col-sm-6 col-xl-4" data-order="<?php echo e($product->sku); ?>">
    <div class="products_list-item_wrapper d-flex flex-column">
        <div class="media">
            <a href="<?php echo e(route('product', $product)); ?>" target="_blank" rel="noopener norefferer">
                <picture>
                    <source data-srcset="<?php echo e(asset('/front/img/'.$product->img_main)); ?>" srcset="<?php echo e(asset('/front/img/'.$product->img_main)); ?>" type="image/webp" />
                    <img
                            class="lazy preview"
                            data-src="<?php echo e(asset('/front/img/'.$product->img_main)); ?>"
                            src="<?php echo e(asset('/front/img/'.$product->img_main)); ?>"
                            alt="<?php echo e($product->name); ?>"
                    />
                </picture>
            </a>
            <div class="overlay d-flex justify-content-between align-items-start">
                <div class="action d-flex flex-column">
                    <a
                            class="action_link d-flex align-items-center justify-content-center"
                            href="#"
                            data-trigger="compare"
                    >
                        <i class="icon-compare"></i>
                    </a>
                    <a
                            class="action_link d-flex align-items-center justify-content-center"
                            href="#"
                            data-role="wishlist"
                    >
                        <i class="icon-heart"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main d-flex flex-column align-items-center justify-content-between">
            <div class="main_rating">
                <ul class="main_rating-stars d-flex align-items-center justify-content-center accent">
                    <li class="main_rating-stars_star">
                        <i class="icon-star_fill"></i>
                    </li>
                    <li class="main_rating-stars_star">
                        <i class="icon-star_fill"></i>
                    </li>
                    <li class="main_rating-stars_star">
                        <i class="icon-star_fill"></i>
                    </li>
                    <li class="main_rating-stars_star">
                        <i class="icon-star_fill"></i>
                    </li>
                    <li class="main_rating-stars_star">
                        <i class="icon-star_fill"></i>
                    </li>
                </ul>
            </div>
            <a class="main_title" href="<?php echo e(route('product',$product)); ?>" target="_blank" rel="noopener norefferer">
                <?php echo e($product->name); ?>

            </a>
            <ul class="main_table d-flex flex-column align-items-center">
                <li class="list-item">
                    <span class="property">THC</span>
                    <span class="value"><?php echo e(number_format($product->thc/100,2 , '.', ',')); ?>%</span>
                </li>
                <li class="list-item">
                    <span class="property">CBD</span>
                    <span class="value"><?php echo e(number_format($product->cbd/100,2 , '.', ',')); ?>%</span>
                </li>
            </ul>
            <div class="main_price">
                <?php if($product->discount_enable): ?>
                <span class="price price--old">$<?php echo e(number_format($product->price/100,2 , '.', ',')); ?></span>
                <?php endif; ?>
                <?php
                $discount = 1 - ($product->discount * $product->discount_enable / 10000);
                $price  = $product->price * $discount;
                ?>
                <span class="price">$<?php echo e(number_format($price/100,2 , '.', ',')); ?></span>
            </div>
            <a class="btn btn--green" href="#"><?php echo app('translator')->get('front.buttons.to-cart'); ?></a>
        </div>
    </div>
</li><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/partials/product-item.blade.php ENDPATH**/ ?>