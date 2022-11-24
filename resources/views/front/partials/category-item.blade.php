<li class="categories_list-item col-6 col-md-4 col-xl-2" data-order="{{$category->id}}">
    <a class="categories_list-item_wrapper" href="#">
        <div class="media">
                                    <span class="overlay d-flex flex-column justify-content-end">
                                        <span class="overlay_content">{{$category->products_count}} Items</span>
                                    </span>
            <picture>
                <source
                        data-srcset="{{Storage::disk('image')->url($category->img)}}"
                        srcset="{{Storage::disk('image')->url($category->img)}}"
                        type="image/webp"
                />
                <img
                        class="lazy"
                        data-src="{{Storage::disk('image')->url($category->img)}}"
                        src="{{Storage::disk('image')->url($category->img)}}"
                        alt="media"
                />
            </picture>
        </div>
        <h4 class="title">{{$category->name}}</h4>
    </a>
</li>