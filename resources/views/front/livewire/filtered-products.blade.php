<div class="" style="width:inherit;">
    <div wire:key="sort" class="shop_panel d-flex flex-wrap justify-content-between">
        @livewire('filter-for-products')
        <a
                class="filterTrigger d-inline-flex d-lg-none align-items-center justify-content-center"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#shopFilters"
        >
            @lang('front.filter.filters')
            <i class="icon-caret_down icon"></i>
        </a>
        <span class="showing">@lang('front.filter.filters') {{$products->links()->paginator->firstItem()}}
            @lang('front.filter.showing') –{{$products->links()->paginator->lastItem()}} @lang('front.filter.of') {{$products->links()->paginator->total()}} @lang('front.filter.results')</span>
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
        {{--TODO не реализованный фронтером фильтр--}}
    </div>
<div class="shop_products">
    <ul class="shop_products-list d-sm-flex flex-wrap">
        @foreach($products as $product)
            @include('front.partials.product-item')
        @endforeach
    </ul>
    {{$products->links()}}
</div>
</div>
