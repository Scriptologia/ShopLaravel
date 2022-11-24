<li class="shop_products-list_item col-sm-6 col-xl-4" data-order="{{$product->sku}}">
    <div class="products_list-item_wrapper d-flex flex-column">
        <div class="media">
            <a href="{{route('product', $product)}}" target="_blank" rel="noopener norefferer">
                <picture>
                    <source data-srcset="{{asset('/front/img/'.$product->img_main)}}" srcset="{{asset('/front/img/'.$product->img_main)}}" type="image/webp" />
                    <img
                            class="lazy preview"
                            data-src="{{asset('/front/img/'.$product->img_main)}}"
                            src="{{asset('/front/img/'.$product->img_main)}}"
                            alt="{{$product->name}}"
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
            <a class="main_title" href="{{route('product',$product)}}" target="_blank" rel="noopener norefferer">
                {{$product->name}}
            </a>
            <ul class="main_table d-flex flex-column align-items-center">
                <li class="list-item">
                    <span class="property">THC</span>
                    <span class="value">{{number_format($product->thc/100,2 , '.', ',')}}%</span>
                </li>
                <li class="list-item">
                    <span class="property">CBD</span>
                    <span class="value">{{number_format($product->cbd/100,2 , '.', ',')}}%</span>
                </li>
            </ul>
            <div class="main_price">
                @if($product->discount_enable)
                <span class="price price--old">${{number_format($product->price/100,2 , '.', ',')}}</span>
                @endif
                @php
                $discount = 1 - ($product->discount * $product->discount_enable / 10000);
                $price  = $product->price * $discount;
                @endphp
                <span class="price">${{number_format($price/100,2 , '.', ',')}}</span>
            </div>
            <a class="btn btn--green" href="#">@lang('front.buttons.to-cart')</a>
        </div>
    </div>
</li>