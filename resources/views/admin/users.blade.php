@extends('admin.layouts.master')
@section('title')
    @lang('translation.customers')
@endsection
@section('css')
    <link href="{{ URL::asset('admin/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/libs/gridjs/gridjs.min.css') }}">
    <link href="{{ URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            Customers
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="customerList">
                <div class="card-header border-bottom-dashed">

                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Customer List</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                                    data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add
                                    Customer</button>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal"><i class="ri-download-2-line align-bottom me-1"></i> Import</button>
                                <a href="{{route('admin.api.users.export')}}" type="button" class="btn btn-info bg-success"><i class="ri-upload-2-fill align-bottom me-1"></i> Export</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-xl-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search for customer, email, phone, status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xl-6">
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="">
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                                   id="datepicker-range" placeholder="Select date">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-4">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                data-choices-search-false name="choices-single-default" id="idStatus">
                                                <option value="" disabled>Status</option>
                                                <option value="" selected>All</option>
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-sm-4">
                                        <div>
                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i
                                                    class="ri-equalizer-fill me-2 align-bottom"></i>Filters</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
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
                <div class="card-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active customernav-all customernav-verified customernav-draft" id="customernav-all" role="tabpanel">
                            <div id="table-customer-list-all" class="table-card gridjs-border-none"></div>
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end card body -->
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <!-- Modal -->

    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                </div>
                <form action="#" id="form">
                    <div class="modal-body">
                        <input type="hidden" id="id-field" />

                        <div class="mb-3" id="modal-id" style="display: none;">
                            <label for="id-field1" class="form-label">ID</label>
                            <input type="text" id="id-field1" class="form-control" placeholder="ID"
                                   readonly />
                        </div>

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Customer
                                Name</label>
                            <input type="text" id="customername-field" class="form-control"
                                   placeholder="Enter name" required />
                        </div>
                        <div class="mb-3">
                            <label for="customersurname-field" class="form-label">Customer
                                Surname</label>
                            <input type="text" id="customersurname-field" class="form-control"
                                   placeholder="Enter surname" required />
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Email</label>
                            <input type="email" id="email-field" class="form-control"
                                   placeholder="Enter email" required />
                        </div>

                        <div class="mb-3">
                            <label for="phone-field" class="form-label">Phone</label>
                            <input type="text" id="phone-field" class="form-control" data-mask="00 (000) 000 0000"
                                   placeholder="Enter phone no." required />
                        </div>

                        <div class="mb-3">
                            <label for="date-field" class="form-label">Joining
                                Date</label>
                            <input type="date" id="date-field" class="form-control" disabled
                                   data-provider="flatpickr" data-date-format="d M, Y" required
                                   placeholder="Select date" />
                        </div>

                        <div>
                            <label for="country-field" class="form-label">Country</label>
                            <select class="form-control" data-choices data-choices-search-false
                                    name="country-field" id="country-field">
                                <option value="" disabled>Country</option>
                                <option value="England">England</option>
                                <option value="Germany">Germany</option>
                                <option value="Spain">Spain</option>
                                <option value="Italy">Italy</option>
                                <option value="Frahch">Frahch</option>
                            </select>
                        </div>
                        <div>
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" data-choices data-choices-search-false
                                    name="status-field" id="status-field">
                                <option value="" disabled>Status</option>
                                <option value="Active">Active</option>
                                <option value="Block">Block</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>
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
                                   colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>@lang('admin.are-sure')</h4>
                            <p class="text-muted mx-4 mb-0">@lang('admin.are-sure2')</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">@lang('admin.close')</button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-customer">@lang('admin.yes-delete')</button>
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
                    <form action="" method="POST" enctype="multipart/form-data"  id="importUsers">
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
    <!--end modal -->
@endsection
@section('script')
    <script>
        var routes = {
            apiImport: '{{route('admin.api.users.import')}}',
            apiExport: '{{route('admin.api.users.export')}}',
            apiUsers: '{{route('admin.api.users')}}',
            apiUser: {
                edit :'{{route('admin.api.user.edit')}}',
                delete :'{{route('admin.api.user.delete')}}',
                update :'{{route('admin.api.user.update')}}',
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ URL::asset('admin/assets/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/wnumb/wnumb.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>

    <!--ecommerce-customer init js -->
    <script src="{{ URL::asset('admin/assets/js/pages/user.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('/admin/assets/js/app.min.js') }}"></script>
@endsection
