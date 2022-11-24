@extends('admin.layouts.master')
@section('title')
    @lang('translation.products')
@endsection
@section('css')
    <link href="{{ URL::asset('admin/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/libs/gridjs/gridjs.min.css') }}">
    <link href="http://shoplaravel/admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            @lang('admin.ecommerce')
        @endslot
        @slot('title')
            @lang('admin.product.products')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">@lang('admin.filters')</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="text-decoration-underline" id="clearall">@lang('admin.clear-all')</a>
                        </div>
                    </div>
                </div>

                <div class="accordion accordion-flush filter-accordion">
{{--фильтр категорий--}}
                    <div class="card-body border-bottom">
                        <div>
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">@lang('admin.product.products')</p>
                            <ul class="list-unstyled mb-0 filter-list">
                                @foreach($categories as $category)
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname" data-category-id="{{$category->id}}">{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
{{--фильтр по цене--}}
                    <div class="card-body border-bottom">
                        <p class="text-muted text-uppercase fs-12 fw-medium mb-4">@lang('admin.price')</p>

                        <div id="product-price-range"></div>
                        <div class="formCost d-flex gap-2 align-items-center mt-3">
                            <input class="form-control form-control-sm" type="text" id="minCost" value="0" /> <span class="fw-semibold text-muted">@lang('admin.to')</span>
                            <input class="form-control form-control-sm" type="text" id="maxCost" value="1000" />
                        </div>
                    </div>

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
                                        <input class="form-check-input" type="radio" value="5000" name="discount"
                                            id="productdiscountRadio6">
                                        <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="4000" name="discount"
                                            id="productdiscountRadio5">
                                        <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="3000" name="discount"
                                            id="productdiscountRadio4">
                                        <label class="form-check-label" for="productdiscountRadio4">
                                            30% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="2000" name="discount"
                                            id="productdiscountRadio3">
                                        <label class="form-check-label" for="productdiscountRadio3">
                                            20% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1000" name="discount"
                                            id="productdiscountRadio2">
                                        <label class="form-check-label" for="productdiscountRadio2">
                                            10% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="discount"
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
                                        <input class="form-check-input" type="radio" value="8" name="rating"
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
                                        <input class="form-check-input" type="radio" value="6" name="rating"
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
                                        <input class="form-check-input" type="radio" value="4" name="rating"
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
                                        <input class="form-check-input" type="radio" value="0" name="rating"
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
                                    <a href="{{route('admin.product.create')}}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> @lang('admin.product.add-product')</a>
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
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="productnav-all"
                                            role="tab">
                                            @lang('admin.all') <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="productnav-published"
                                            role="tab">
                                            @lang('admin.published')  <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="productnav-draft"
                                            role="tab">
                                            @lang('admin.draft') <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        @lang('admin.select') <div id="select-content" class="text-body fw-semibold px-1"></div> @lang('admin.result') <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">@lang('admin.remove')</button>
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
                            <h4>@lang('admin.are-sure')</h4>
                            <p class="text-muted mx-4 mb-0">@lang('admin.are-sure2')</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">@lang('admin.close')</button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-product">@lang('admin.yes-delete')</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script>
        var maxPrice = '{{$maxPrice}}';
        var imgURL = '{{Storage::disk('image')->url('')}}';
        var routes = {
            product: {
                edit :'{{route('admin.product.edit')}}',
{{--                create :'{{route('admin.product.create')}}',--}}
                view :'{{route('admin.product.view')}}',
            },
            apiProducts: '{{route('admin.api.products')}}',
            apiProduct: {
                edit :'{{route('admin.api.product.edit')}}',
                delete :'{{route('admin.api.product.delete')}}',
                view :'{{route('admin.api.product.view')}}',
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('admin/assets/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/wnumb/wnumb.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="http://shoplaravel/admin/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ URL::asset('admin/assets/js/pages/product.init.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/app.min.js') }}"></script>
@endsection
