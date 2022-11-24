@extends('front.layouts.app')
@section('title', 'Single Product | Herbalist')
@section('data-page', 'product')
@section('content')
<!-- Homepage content start -->
        <header class="page">
            <div class="page_main container-fluid">
                <div class="container">
                    <h1 class="page_header">Single Product</h1>
                    <p class="page_text">Nibh tellus molestie nunc non blandit. Mi tempus imperdiet nulla malesuada pellentesque elit</p>
                </div>
            </div>
            <div class="container">
                <ul class="page_breadcrumbs d-flex flex-wrap">
                    <li class="page_breadcrumbs-item">
                        <a class="link" href="{{route('home')}}">Home</a>
                    </li>

                    <li class="page_breadcrumbs-item current">
                        <span>Single Product</span>
                    </li>
                </ul>
            </div>
        </header>
        <!-- Single product content start -->
        <main>
            <section class="about section--nopb">
                <div class="container">
                    <!-- Product main -->
                    <div class="about_main d-lg-flex flex-nowrap">
                        <div class="about_main-slider">
                            <div class="about_main-slider--single" data-modal="false">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="{{Storage::disk('image')->url($product->img_main)}}" data-role="gallery">
                                            <picture>
                                                <source
                                                    data-srcset="{{Storage::disk('image')->url($product->img_main)}}"
                                                    srcset="{{Storage::disk('image')->url($product->img_main)}}"
                                                    type="image/webp"
                                                />
                                                <img
                                                    class="lazy"
                                                    data-src="{{Storage::disk('image')->url($product->img_main)}}"
                                                    src="{{Storage::disk('image')->url($product->img_main)}}"
                                                    alt="media"
                                                />
                                            </picture>
                                        </a>
                                    </div>
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <a href="{{Storage::disk('image')->url($image)}}" data-role="gallery">
                                            <picture>
                                                <source
                                                    data-srcset="{{Storage::disk('image')->url($image)}}"
                                                    srcset="{{Storage::disk('image')->url($image)}}"
                                                    type="image/webp"
                                                />
                                                <img
                                                    class="lazy"
                                                    data-src="{{Storage::disk('image')->url($image)}}"
                                                    src="{{Storage::disk('image')->url($image)}}"
                                                    alt="media"
                                                />
                                            </picture>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-controls d-flex align-items-center justify-content-between">
                                    <a class="swiper-button-prev d-inline-flex align-items-center justify-content-center" href="#">
                                        <i class="icon-caret_left icon"></i>
                                    </a>
                                    <a class="swiper-button-next d-inline-flex align-items-center justify-content-center" href="#">
                                        <i class="icon-caret_right icon"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="about_main-slider--thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <picture>
                                            <source
                                                data-srcset="{{Storage::disk('image')->url($product->img_main)}}"
                                                srcset="{{Storage::disk('image')->url($product->img_main)}}"
                                                type="image/webp"
                                            />
                                            <img
                                                class="lazy"
                                                data-src="{{Storage::disk('image')->url($product->img_main)}}"
                                                src="{{Storage::disk('image')->url($product->img_main)}}"
                                                alt="media"
                                            />
                                        </picture>
                                    </div>
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <picture>
                                            <source
                                                data-srcset="{{Storage::disk('image')->url($image)}}"
                                                srcset="{{Storage::disk('image')->url($image)}}"
                                                type="image/webp"
                                            />
                                            <img
                                                class="lazy"
                                                data-src="{{Storage::disk('image')->url($image)}}"
                                                src="{{Storage::disk('image')->url($image)}}"
                                                alt="media"
                                            />
                                        </picture>
                                    </div>
                                     @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="about_main-info">
                            <div class="about_main-info_product d-sm-flex align-items-center justify-content-between">
                                <h2 class="title">{{$product->name}}</h2>
                                <div class="action d-flex">
                                    <a class="action_link d-flex align-items-center justify-content-center" href="#" data-role="wishlist">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <a class="action_link d-flex align-items-center justify-content-center" href="#" data-trigger="compare">
                                        <i class="icon-compare"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="about_main-info_rating d-flex align-items-center">
                                <ul class="stars d-flex align-items-center accent">
                                    <li class="stars_star">
                                        <i class="icon-star_fill"></i>
                                    </li>
                                    <li class="stars_star">
                                        <i class="icon-star_fill"></i>
                                    </li>
                                    <li class="stars_star">
                                        <i class="icon-star_fill"></i>
                                    </li>
                                    <li class="stars_star">
                                        <i class="icon-star_fill"></i>
                                    </li>
                                    <li class="stars_star">
                                        <i class="icon-star_fill"></i>
                                    </li>
                                </ul>
                                <a class="reviews-amount" href="#reviews">(2 customer reviews)</a>
                            </div>
                            <p class="about_main-info_description">
                                {{$product->description}}
                            </p>
                            <span class="about_main-info_price">${{number_format($product->price/100,2 , '.', ',')}}</span>
                            <div class="about_main-info_buy d-flex align-items-center">
                                <div class="qty d-flex align-items-center justify-content-between">
                                    <span class="qty_minus control disabled d-flex align-items-center">
                                        <i class="icon-minus"></i>
                                    </span>
                                    <input class="qty_amount" type="number" readonly value="1" min="1" max="99" />
                                    <span class="qty_plus control d-flex align-items-center">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                                <a class="btn" href="#">@lang('front.add-to-cart')</a>
                            </div>
                            <ul class="about_main-info_list">
                                <li class="list-item">
                                    <span class="property">@lang('front.category'):</span>
                                    <span class="value">{{$product->category->name}}</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">@lang('front.size'):</span>
                                    <span class="value">{{$product->size}}ml</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">@lang('front.plant-type'):</span>
                                    <span class="value">{{$product->plant_type}}</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">THC:</span>
                                    <span class="value">{{number_format($product->thc/100,2 , '.', ',')}}mg/g</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">CBD:</span>
                                    <span class="value">{{number_format($product->cbd/100,2 , '.', ',')}}%</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">@lang('front.effects'):</span>
                                    <span class="value">{{$product->effects}}</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">@lang('front.tags'):</span>
                                    <span class="value">{{$product->tags->pluck('name')->implode(', ')}}</span>
                                </li>
                                <li class="list-item">
                                    <span class="property">SKU:</span>
                                    <span class="value">{{$product->sku}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product additional information -->
                    <div class="about_secondary">
                        <div class="about_secondary-content">
                            <ul class="about_secondary-content_nav nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div
                                        class="nav-link active"
                                        id="description-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#description"
                                        role="tab"
                                        aria-selected="true"
                                    >
                                        Description
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div
                                        class="nav-link"
                                        id="reviews-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#reviews"
                                        role="tab"
                                        aria-selected="false"
                                    >
                                        Reviews (<span id="reviewsCount">2</span>)
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div
                                        class="nav-link"
                                        id="additional-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#additionalInfo"
                                        role="tab"
                                        aria-selected="false"
                                    >
                                        Additional Information
                                    </div>
                                </li>
                            </ul>
                            <div class="about_secondary-content_tabs tab-content" id="productTabs">
                                <div class="wrapper">
                                    <h4
                                        class="accordion_component-item_header d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#description"
                                        aria-expanded="true"
                                    >
                                        Description
                                        <i class="icon-caret_down transform icon"></i>
                                    </h4>
                                    <div
                                        class="tab-pane collapse show active"
                                        id="description"
                                        role="tabpanel"
                                        aria-labelledby="description-tab"
                                        data-bs-parent="#productTabs"
                                    >
                                        <p class="text">
                                            Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit
                                            scelerisque mauris pellentesque. Arcu felis bibendum ut tristique et egestas. Id semper risus in
                                            hendrerit gravida rutrum. Eu mi bibendum neque egestas congue.
                                        </p>
                                        <p class="text">
                                            Dignissim enim sit amet venenatis. At tellus at urna condimentum mattis pellentesque id nibh.
                                            Sollicitudin ac orci phasellus egestas tellus rutrum. Eget mi proin sed libero enim sed. Quisque
                                            non tellus orci ac auctor augue mauris. Sit amet luctus venenatis lectus magna fringilla.
                                        </p>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <h4
                                        class="accordion_component-item_header d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#reviews"
                                    >
                                        <span class="wrapper"> Reviews (<span id="reviewsCountResponsive">2</span>) </span>
                                        <i class="icon-caret_down icon"></i>
                                    </h4>
                                    <div
                                        class="tab-pane collapse"
                                        id="reviews"
                                        role="tabpanel"
                                        aria-labelledby="reviews-tab"
                                        data-bs-parent="#productTabs"
                                    >
                                        <div class="reviews-section">
                                            <ul class="reviews-section_list">
                                                <li class="review">
                                                    <div class="review_header d-sm-flex flex-wrap">
                                                        <span class="name">Dawn Fowler</span>
                                                        <div class="rating d-flex">
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star star"></i>
                                                        </div>
                                                        <span class="timestamp">September 30, 2021 at 9:52 am</span>
                                                    </div>
                                                    <p class="review_main">
                                                        Convallis posuere morbi leo urna molestie at elementum. Quis auctor elit sed
                                                        vulputate mi. In nulla posuere sollicitudin aliquam ultrices.
                                                    </p>
                                                    <div class="review_secondary d-lg-flex">
                                                        <div class="review_secondary-block">
                                                            <span class="review_secondary-block_header">Benefits:</span>
                                                            <p class="review_secondary-block_text">
                                                                In nulla posuere sollicitudin aliquam ultrices.
                                                            </p>
                                                        </div>
                                                        <div class="review_secondary-block">
                                                            <span class="review_secondary-block_header">Disadvantages:</span>
                                                            <p class="review_secondary-block_text">
                                                                Viverra aliquet eget sit amet tellus cras adipiscing enim
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <a class="review_reply link btn--underline" href="#">Reply</a>
                                                </li>
                                                <li class="review">
                                                    <div class="review_header d-sm-flex flex-wrap">
                                                        <span class="name">Charles Sanchez</span>
                                                        <div class="rating d-flex">
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                            <i class="icon-star_fill star"></i>
                                                        </div>
                                                        <span class="timestamp">October 1, 2021 at 11:52 am</span>
                                                    </div>
                                                    <p class="review_main">Aliquam sem fringilla ut morbi tincidunt augue.</p>
                                                    <ul
                                                        class="review_media d-flex flex-wrap justify-content-between justify-content-sm-start"
                                                    >
                                                        <li class="review_media-item">
                                                            <a href="front/img/placeholder.jpg" data-caption="Image caption">
                                                                <picture>
                                                                    <source
                                                                        data-srcset="front/img/placeholder.jpg"
                                                                        srcset="front/img/placeholder.jpg"
                                                                        type="image/webp"
                                                                    />
                                                                    <img
                                                                        class="gallery-img lazy"
                                                                        data-src="front/img/placeholder.jpg"
                                                                        src="front/img/placeholder.jpg"
                                                                        alt="media"
                                                                    />
                                                                </picture>
                                                            </a>
                                                        </li>
                                                        <li class="review_media-item">
                                                            <a href="front/img/placeholder.jpg" data-caption="Image caption">
                                                                <picture>
                                                                    <source
                                                                        data-srcset="front/img/placeholder.jpg"
                                                                        srcset="front/img/placeholder.jpg"
                                                                        type="image/webp"
                                                                    />
                                                                    <img
                                                                        class="gallery-img lazy"
                                                                        data-src="front/img/placeholder.jpg"
                                                                        src="front/img/placeholder.jpg"
                                                                        alt="media"
                                                                    />
                                                                </picture>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <a class="review_reply link btn--underline" href="#">Reply</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="form-section">
                                            <h4 class="form-section_header">Add Review</h4>
                                            <form
                                                class="form-section_form form d-flex flex-column flex-lg-row flex-wrap justify-content-between"
                                                action="#"
                                                method="post"
                                                id="reviewForm"
                                                data-type="userComment"
                                            >
                                                <div class="field-wrapper">
                                                    <label class="label" for="reviewName">Your Name</label>
                                                    <input class="field required" type="text" id="reviewName" placeholder="Your Name" />
                                                </div>
                                                <div class="field-wrapper">
                                                    <label class="label" for="reviewEmail">Your Email</label>
                                                    <input
                                                        class="field required"
                                                        type="text"
                                                        data-type="email"
                                                        id="reviewEmail"
                                                        placeholder="you@example.com"
                                                    />
                                                </div>
                                                <div class="field-wrapper fluid">
                                                    <label class="label" for="reviewContent">Message</label>
                                                    <textarea
                                                        class="field field--message required"
                                                        id="reviewContent"
                                                        placeholder="Type Your Message"
                                                    ></textarea>
                                                </div>
                                                <div
                                                    class="form-section_footer d-flex flex-column flex-sm-row flex-wrap justify-content-between"
                                                >
                                                    <div class="rating d-flex" data-type="changeable">
                                                        <i class="icon-star_fill star"></i>
                                                        <i class="icon-star_fill star"></i>
                                                        <i class="icon-star_fill star"></i>
                                                        <i class="icon-star_fill star"></i>
                                                        <i class="icon-star_fill star"></i>
                                                    </div>
                                                    <div class="btn-wrapper btn-wrapper--underline">
                                                        <a class="link btn--underline" href="#">Add photos</a>
                                                    </div>
                                                    <div class="btn-wrapper">
                                                        <button class="btn" type="submit">Leave a Reply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <h4
                                        class="accordion_component-item_header d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#additionalInfo"
                                    >
                                        Additional Information
                                        <i class="icon-caret_down icon"></i>
                                    </h4>
                                    <div
                                        class="tab-pane collapse"
                                        id="additionalInfo"
                                        role="tabpanel"
                                        aria-labelledby="additional-tab"
                                        data-bs-parent="#productTabs"
                                    >
                                        <table class="table d-flex flex-column">
                                            <tbody>
                                                <tr class="table_row d-flex flex-column flex-lg-row">
                                                    <th class="table_row-header">Ingredients:</th>
                                                    <td class="table_row-cell">Organic MCT Oil, CBD Isolate</td>
                                                </tr>
                                                <tr class="table_row d-flex flex-column flex-lg-row">
                                                    <th class="table_row-header">Flavors:</th>
                                                    <td class="table_row-cell">
                                                        Natural 1500mg, Calm 750mg, Focus 750mg, Energize 750mg, Sleep 750mg, Recover 750mg
                                                    </td>
                                                </tr>
                                                <tr class="table_row d-flex flex-column flex-lg-row">
                                                    <th class="table_row-header">Recommended Usage:</th>
                                                    <td class="table_row-cell">
                                                        Once a day, place a full dropper under your tongue and hold for a minute. Repeat as
                                                        necessary
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top products section start -->
            <section class="top section">
                <div class="container">
                    <h2 class="top_header">@lang('front.top-sales-products')</h2>
                    <ul class="top_list d-lg-flex flex-wrap">
                        <li class="top_list-item col-lg-6" data-order="1">
                            <div class="top_list-item_wrapper d-flex flex-column flex-sm-row flex-lg-column flex-xxl-row">
                                <div class="media">
                                    <a href="product.html" target="_blank" rel="noopener norefferer">
                                        <picture>
                                            <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                            <img class="lazy" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                                        </picture>
                                    </a>
                                </div>
                                <div class="main d-md-flex flex-column">
                                    <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer"
                                        >THC Full Spectrum: Natural</a
                                    >
                                    <ul class="main_table d-flex flex-column">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">110.00-160.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00mg/g</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price price--old">$45.99</span>
                                        <span class="price price--new">$36.87</span>
                                    </div>
                                    <div class="d-flex">
                                        <a class="btn" href="#">@lang('front.add-to-cart')</a>
                                        <div class="action d-flex">
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-role="wishlist"
                                            >
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-trigger="view"
                                            >
                                                <i class="icon-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="top_list-item col-lg-6" data-order="2">
                            <div class="top_list-item_wrapper d-flex flex-column flex-sm-row flex-lg-column flex-xxl-row">
                                <div class="media">
                                    <a href="product.html" target="_blank" rel="noopener norefferer">
                                        <picture>
                                            <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                            <img class="lazy" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                                        </picture>
                                    </a>
                                </div>
                                <div class="main d-md-flex flex-column">
                                    <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer">Black Dog</a>
                                    <ul class="main_table d-flex flex-column">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">110.00-160.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00mg/g</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price price--old">$20.14</span>
                                        <span class="price price--new">$16.97</span>
                                    </div>
                                    <div class="d-flex">
                                        <a class="btn" href="#">Add to Cart</a>
                                        <div class="action d-flex">
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-role="wishlist"
                                            >
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-trigger="view"
                                            >
                                                <i class="icon-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="top_list-item col-lg-6" data-order="3">
                            <div class="top_list-item_wrapper d-flex flex-column flex-sm-row flex-lg-column flex-xxl-row">
                                <div class="media">
                                    <a href="product.html" target="_blank" rel="noopener norefferer">
                                        <picture>
                                            <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                            <img class="lazy" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                                        </picture>
                                    </a>
                                </div>
                                <div class="main d-md-flex flex-column">
                                    <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer"
                                        >Boost THC Tincture – Indica</a
                                    >
                                    <ul class="main_table d-flex flex-column">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">110.00-160.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00mg/g</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price price--old">$43.55</span>
                                        <span class="price price--new">$26.98</span>
                                    </div>
                                    <div class="d-flex">
                                        <a class="btn" href="#">Add to Cart</a>
                                        <div class="action d-flex">
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-role="wishlist"
                                            >
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-trigger="view"
                                            >
                                                <i class="icon-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="top_list-item col-lg-6" data-order="4">
                            <div class="top_list-item_wrapper d-flex flex-column flex-sm-row flex-lg-column flex-xxl-row">
                                <div class="media">
                                    <a href="product.html" target="_blank" rel="noopener norefferer">
                                        <picture>
                                            <source data-srcset="front/img/placeholder.jpg" srcset="front/img/placeholder.jpg" type="image/webp" />
                                            <img class="lazy" data-src="front/img/placeholder.jpg" src="front/img/placeholder.jpg" alt="media" />
                                        </picture>
                                    </a>
                                </div>
                                <div class="main d-md-flex flex-column">
                                    <a class="main_title" href="product.html" target="_blank" rel="noopener norefferer">Ace Of Spade</a>
                                    <ul class="main_table d-flex flex-column">
                                        <li class="list-item">
                                            <span class="property">THC</span>
                                            <span class="value">110.00-160.00%</span>
                                        </li>
                                        <li class="list-item">
                                            <span class="property">CBD</span>
                                            <span class="value">0.00-1.00mg/g</span>
                                        </li>
                                    </ul>
                                    <div class="main_price">
                                        <span class="price price--old">$19.97</span>
                                        <span class="price price--new">$13.22</span>
                                    </div>
                                    <div class="d-flex">
                                        <a class="btn" href="#">Add to Cart</a>
                                        <div class="action d-flex">
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-role="wishlist"
                                            >
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a
                                                class="action_link d-flex align-items-center justify-content-center"
                                                href="#"
                                                data-trigger="view"
                                            >
                                                <i class="icon-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- Top products section end -->
        </main>
        <!-- Single product content end -->
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('front/css/product.min.css')}}" />
@endpush
@push('js')
    <script src="{{asset('front/js/shop.min.js')}}"></script>
@endpush
