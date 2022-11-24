@extends('admin.layouts.master')
@section('title')
    @lang('translation.emails')
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
            @lang('admin.emails.emails')
        @endslot
    @endcomponent
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4 justify-content-sm-end">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal"><i class="ri-download-2-line align-bottom me-1"></i> Import</button>
                                    <a href="{{route('admin.api.emails.export')}}" type="button" class="btn btn-info bg-success"><i class="ri-upload-2-fill align-bottom me-1"></i> Export</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="#" class="btn btn-success" id="addemail-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> @lang('admin.emails.add-email')</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchEmailList" placeholder="Search Emails...">
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
                                        <a class="nav-link active fw-semibold" href="emailnav-all" data-bs-toggle="tab"
                                            role="tab">
                                            @lang('admin.all') <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold"  href="emailnav-verified" data-bs-toggle="tab"
                                            role="tab">
                                            @lang('admin.verified')  <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" href="emailnav-subscribed" data-bs-toggle="tab"
                                            role="tab">
                                            @lang('admin.emails.subscribed')  <span class="badge badge-soft-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" href="emailnav-draft" data-bs-toggle="tab"
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
                            <div class="tab-pane active emailnav-all emailnav-verified emailnav-draft" id="emailnav-all" role="tabpanel">
                                <div id="table-email-list-all" class="table-card gridjs-border-none"></div>
                            </div>
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
                        <button type="button" class="btn w-sm btn-danger " id="delete-email">@lang('admin.yes-delete')</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data"  id="importEmails">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control">
                            <button class="btn btn-primary" type="submit" id="importButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var routes = {
            apiImport: '{{route('admin.api.emails.import')}}',
            apiExport: '{{route('admin.api.emails.export')}}',
            apiEmails: '{{route('admin.api.emails')}}',
            apiEmail: {
                delete :'{{route('admin.api.email.delete')}}',
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
    <script src="{{ URL::asset('admin/assets/js/pages/email.init.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/app.min.js') }}"></script>
@endsection
