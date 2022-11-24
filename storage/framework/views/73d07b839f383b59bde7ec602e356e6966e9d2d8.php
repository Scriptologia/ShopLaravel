<?php $__env->startSection('title', 'Shop | Herbalist'); ?>
<?php $__env->startSection('data-page', 'shop'); ?>
<?php $__env->startSection('content'); ?>
    <header class="page">
        <div class="page_main container-fluid">
            <div class="container">
                <h1 class="page_header">Shop</h1>
                <p class="page_text">Nibh tellus molestie nunc non blandit. Mi tempus imperdiet nulla malesuada pellentesque elit</p>
            </div>
        </div>
        <div class="container">
            <ul class="page_breadcrumbs d-flex flex-wrap">
                <li class="page_breadcrumbs-item">
                    <a class="link" href="<?php echo e(route('home')); ?>">Home</a>
                </li>

                <li class="page_breadcrumbs-item current">
                    <span>Shop</span>
                </li>
            </ul>
        </div>
    </header>
        <!-- Shop content start -->
    <main>
        <!-- Products section start -->
        <div class="shop-wrapper section">
            <div class="container d-flex d-lg-grid flex-column">
                <div class="promo_banner promo_banner--big">
                    <h3 class="promo_banner-header">Browse our selection of CBD-infused goods</h3>
                    <p class="promo_banner-text">
                        Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit scelerisque mauris
                        pellentesque
                    </p>
                    <a class="promo_banner-btn btn" href="#"><?php echo app('translator')->get('front.shop-now'); ?></a>
                </div>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filtered-products')->html();
} elseif ($_instance->childHasBeenRendered('EnJDBUt')) {
    $componentId = $_instance->getRenderedChildComponentId('EnJDBUt');
    $componentTag = $_instance->getRenderedChildComponentTagName('EnJDBUt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EnJDBUt');
} else {
    $response = \Livewire\Livewire::mount('filtered-products');
    $html = $response->html();
    $_instance->logRenderedChild('EnJDBUt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filter-aside')->html();
} elseif ($_instance->childHasBeenRendered('Unl4YkT')) {
    $componentId = $_instance->getRenderedChildComponentId('Unl4YkT');
    $componentTag = $_instance->getRenderedChildComponentTagName('Unl4YkT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Unl4YkT');
} else {
    $response = \Livewire\Livewire::mount('filter-aside');
    $html = $response->html();
    $_instance->logRenderedChild('Unl4YkT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
        <!-- Products section end -->
        <!-- Sale section start -->
        <section class="sale section">
                <span class="underlay">
                    <span class="underlay_circle underlay_circle--accent"></span>
                    <span class="underlay_circle underlay_circle--green"></span>
                </span>
            <div class="container">
                <h2 class="sale_header"><?php echo app('translator')->get('front.items-on-sale'); ?></h2>
                <div class="sale_swiper swiper">
                    <div class="swiper-wrapper">
                        <div class="sale_swiper-slide swiper-slide">
                            <div class="products_list-item_wrapper d-flex flex-column">
                                <div class="media">
                                    <picture>
                                        <source data-srcset="front/img/03.jpg" srcset="front/img/03.jpg" type="image/webp" />
                                        <img
                                                class="lazy preview"
                                                data-src="front/img/03.jpg"
                                                src="front/img/03.jpg"
                                                alt="High CBD 50 Oil"
                                        />
                                    </picture>
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
                                    <span class="label"><?php echo app('translator')->get('front.sale'); ?></span>
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
                                    <h4 class="main_title">High CBD 50 Oil</h4>
                                    <ul class="main_table d-flex flex-column align-items-center">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">117.00-23.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00%</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price price--old">$7.97</span>
                                        <span class="price price--new">$5.99</span>
                                    </div>
                                    <a class="btn btn--green" href="#"><?php echo app('translator')->get('front.add-to-cart'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="sale_swiper-slide swiper-slide">
                            <div class="products_list-item_wrapper d-flex flex-column">
                                <div class="media">
                                    <picture>
                                        <source data-srcset="front/img/03.jpg" srcset="front/img/03.jpg" type="image/webp" />
                                        <img
                                                class="lazy preview"
                                                data-src="front/img/03.jpg"
                                                src="front/img/03.jpg"
                                                alt="Tangerine Dream"
                                        />
                                    </picture>
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
                                                <i class="icon-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="main_title">Tangerine Dream</h4>
                                    <ul class="main_table d-flex flex-column align-items-center">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">117.00-23.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00%</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price">$7.97</span>
                                    </div>
                                    <a class="btn btn--green" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="sale_swiper-slide swiper-slide">
                            <div class="products_list-item_wrapper d-flex flex-column">
                                <div class="media">
                                    <picture>
                                        <source data-srcset="front/img/03.jpg" srcset="front/img/03.jpg" type="image/webp" />
                                        <img
                                                class="lazy preview"
                                                data-src="front/img/03.jpg"
                                                src="front/img/03.jpg"
                                                alt="Bruce Banner"
                                        />
                                    </picture>
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
                                    <span class="label"><?php echo app('translator')->get('front.sale'); ?></span>
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
                                    <h4 class="main_title">Bruce Banner</h4>
                                    <ul class="main_table d-flex flex-column align-items-center">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">117.00-23.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00%</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price price--old">$5.67</span>
                                        <span class="price price--new">$2.99</span>
                                    </div>
                                    <a class="btn btn--green" href="#"><?php echo app('translator')->get('front.add-to-cart'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="sale_swiper-slide swiper-slide">
                            <div class="products_list-item_wrapper d-flex flex-column">
                                <div class="media">
                                    <picture>
                                        <source data-srcset="front/img/03.jpg" srcset="front/img/03.jpg" type="image/webp" />
                                        <img
                                                class="lazy preview"
                                                data-src="front/img/03.jpg"
                                                src="front/img/03.jpg"
                                                alt="Tangerine Dream"
                                        />
                                    </picture>
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
                                                <i class="icon-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="main_title">Tangerine Dream</h4>
                                    <ul class="main_table d-flex flex-column align-items-center">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">117.00-23.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00%</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price">$5.88</span>
                                    </div>
                                    <a class="btn btn--green" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination--dots"></div>
                </div>
            </div>
        </section>
        <!-- Sale section end -->
        <!-- Newsletter section start -->
        <section class="newsletter section--nopb">
            <div class="container">
                <div class="wrapper">
                    <div class="newsletter_deco">
                        <div class="newsletter_deco-wrapper">
                            <picture>
                                <source
                                        data-srcset="front/img/03.jpg"
                                        srcset="front/img/03.jpg"
                                        type="image/webp"
                                />
                                <img
                                        class="lazy leaf leaf--left"
                                        data-src="front/img/03.jpg"
                                        src="front/img/03.jpg"
                                        alt="deco"
                                />
                            </picture>
                        </div>
                        <div class="newsletter_deco-wrapper">
                            <picture>
                                <source
                                        data-srcset="front/img/placeholder.jpg"
                                        srcset="front/img/placeholder.jpg"
                                        type="image/webp"
                                />
                                <img
                                        class="lazy leaf leaf--right"
                                        data-src="front/img/placeholder.jpg"
                                        src="front/img/placeholder.jpg"
                                        alt="deco"
                                />
                            </picture>
                        </div>
                    </div>
                    <div class="newsletter_highlight">
                            <span class="underlay underlay--left">
                                <span class="underlay_circle underlay_circle--accent"></span>
                            </span>
                        <span class="underlay underlay--right">
                                <span class="underlay_circle underlay_circle--small underlay_circle--green"></span>
                                <span class="underlay_circle underlay_circle--big underlay_circle--green"></span>
                            </span>
                    </div>
                    <div class="newsletter_content">
                        <div class="newsletter_header">
                            <h2 class="newsletter_header-title"><?php echo app('translator')->get('front.sign-up-for-our-newsletter'); ?></h2>
                            <p class="newsletter_header-text">
                                <?php echo app('translator')->get('front.sign-up-newsletter-after-text'); ?>
                            </p>
                        </div>
                        <form class="newsletter_form d-sm-flex" data-type="newsletter" action="#" method="post">
                            <input class="newsletter_form-field field required" type="text" data-type="email" placeholder="Email" />
                            <button class="newsletter_form-btn btn" type="submit"><?php echo app('translator')->get('front.send'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter section end -->
        <!-- SEO section start -->
        <section class="seo section">
            <div class="container">
                <h2 class="seo_header"><?php echo app('translator')->get('front.seo-text'); ?></h2>
                <div class="seo_content d-lg-flex justify-content-between">
                    <p class="seo_content-text">
                        Orci nulla pellentesque dignissim enim. Quis commodo odio aenean sed adipiscing diam. Quis auctor elit sed
                        vulputate. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque. Nunc faucibus a
                        pellentesque sit amet porttitor eget dolor morbi. Nunc sed augue lacus viverra. Tempus imperdiet nulla malesuada
                        pellentesque elit eget gravida. Neque sodales ut etiam sit amet. Nam at lectus urna duis convallis. Aenean sed
                        adipiscing diam donec. Mattis ullamcorper velit sed ullamcorper morbi. A diam sollicitudin tempor id eu nisl.
                    </p>
                    <p class="seo_content-text">
                        Arcu felis bibendum ut tristique et egestas. Id semper risus in hendrerit gravida rutrum. Eu mi bibendum neque
                        egestas congue. Risus nullam eget felis eget. Turpis massa tincidunt dui ut ornare lectus sit. Dictumst
                        vestibulum rhoncus est pellentesque elit. Sit amet nisl purus in mollis nunc. Aenean pharetra magna ac placerat.
                        In hendrerit gravida rutrum quisque non tellus orci ac. Condimentum mattis pellentesque id nibh tortor id
                        aliquet lectus proin. Arcu cursus vitae congue mauris rhoncus aenean vel. Sed id semper risus in hendrerit
                        gravida rutrum.
                    </p>
                </div>
            </div>
        </section>
        <!-- SEO section end -->
    </main>
        <!-- Shop content end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/shop2.min.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('front/js/shop.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/products.blade.php ENDPATH**/ ?>