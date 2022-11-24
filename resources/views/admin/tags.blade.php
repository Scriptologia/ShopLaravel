@extends('admin.layouts.master')
@section('title')
    @lang('admin.roles')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/libs/gridjs/gridjs.min.css') }}">
    <link href="{{ URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            Tags
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="tagList">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Tag History</h5>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                                    data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create
                                Order
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0 mb-3">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                           placeholder="Search for tag ID, customer, tag status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-3">
                                <div>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                           data-date-format="d M, Y" data-range-date="true"
                                           id="demo-datepicker" placeholder="Select date">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-1 col-sm-3">
                                <div>
                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();"><i
                                                class="ri-equalizer-fill me-1 align-bottom"></i>
                                        Filters
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" href="tagnav-all" data-bs-toggle="tab"
                                       role="tab">
                                        @lang('admin.all') <span
                                                class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" href="tagnav-draft" data-bs-toggle="tab"
                                       role="tab">
                                        @lang('admin.draft') <span
                                                class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <div id="selection-element">
                                <div class="my-n1 d-flex align-items-center text-muted">
                                    @lang('admin.select')
                                    <div id="select-content"
                                         class="text-body fw-semibold px-1"></div> @lang('admin.result')
                                    <button type="button" class="btn btn-link link-danger p-0 ms-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#removeItemModal">@lang('admin.remove')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active tagnav-all tagnav-verified tagnav-draft" id="tagnav-all"
                             role="tabpanel">
                            <div id="table-tag-list-all" class="table-card gridjs-border-none"></div>
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="#" id="form-modal">
                    <div class="modal-body">
                        <input type="hidden" id="id-field"/>
                        <div class="mb-3" id="modal-id">
                            <label for="tagId" class="form-label">ID</label>
                            <input type="text" id="tagId" class="form-control" placeholder="ID" readonly/>
                        </div>
                        <div class="col">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                @foreach(config('translatable.languages') as $lang)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if($lang == 'en') active @endif fw-semibold" data-bs-toggle="tab"
                                           href="#{{$lang}}" role="tab" aria-selected="true">
                                            {{$lang}} <span
                                                    class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content col-md-12 mb-3">
                            @foreach(config('translatable.languages') as $lang)
                            <div class="tab-pane fade @if($lang == 'en') show active @endif " role="tabpanel"
                                 id="{{$lang}}">
                                <label for="name-field" class="form-label">Name</label>
                                <input type="text" class="form-control name-field" placeholder="Name"/>
                            </div>
                                @endforeach
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Tag</button>
                                <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                                   colors="primary:#f7b84b,secondary:#f06548"
                                   style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>@lang('admin.are-sure')</h4>
                            <p class="text-muted mx-4 mb-0">@lang('admin.are-sure2')</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light"
                                data-bs-dismiss="modal">@lang('admin.close')</button>
                        <button type="button" class="btn w-sm btn-danger "
                                id="delete-record">@lang('admin.yes-delete')</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
    <!--end modal -->
@endsection
@section('script')
    <script>
        var langs = @json(config('translatable.languages'));
        var routes = {
            apiTags: '{{route('admin.api.tags')}}',
            apiTag: {
                edit: '{{route('admin.api.tag.edit')}}',
                delete: '{{route('admin.api.tag.delete')}}',
                update: '{{route('admin.api.tag.update')}}',
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ URL::asset('admin/assets/libs/gridjs/gridjs.min.js') }}"></script>

    <!--ecommerce-customer init js -->
    <script src="{{ URL::asset('admin/assets/js/pages/tag.init.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ URL::asset('/admin/assets/js/app.min.js') }}"></script>
@endsection
