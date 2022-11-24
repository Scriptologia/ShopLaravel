@extends('admin.layouts.master')
@section('title')
    @lang('admin.roles')
@endsection
@section('css')
    <link href="{{ URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            Roles
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="roleList">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Role History</h5>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                                data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create
                                Order</button>
                            <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                    class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0 mb-3">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search for role ID, customer, role status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-3">
                                <div>
                                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                           id="demo-datepicker" placeholder="Select date">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-1 col-sm-3">
                                <div>
                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i
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
                <div class="card-body pt-0">
                    <div>
                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link All py-3 active Active" data-bs-toggle="tab" id="Active" href="#active" role="tab" aria-selected="true">
                                    <i class="ri-store-2-fill me-1 align-bottom"></i>Active Roles
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link py-3 Deleted" data-bs-toggle="tab" id="Deleted" href="#deleted" role="tab" aria-selected="false" >
                                    <i class="ri-checkbox-circle-line me-1 align-bottom"></i>Deleted Roles
                                </a>
                            </li>
                        </ul>
                        <div class="table-responsive table-card mb-1">
                            <table class="table table-nowrap align-middle" id="roleTable">
                                <thead class="text-muted table-light">
                                    <tr class="text-uppercase">
                                        <th scope="col" style="width: 25px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="id">Role ID</th>
                                        <th class="sort" data-sort="role_name">Name</th>
                                        <th class="sort" data-sort="slug">Slug</th>
                                        <th class="sort" data-sort="date">Role Date</th>
                                        <th class="sort" data-sort="deleted">Deleted</th>
                                        <th class="sort" data-sort="city">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                {{--тут список--}}
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted">We've searched more than 150+ Orders We did
                                        not find any
                                        roles for you search.</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="#" id="form-modal">
                                    <div class="modal-body">
                                        <input type="hidden" id="id-field" />

                                        <div class="mb-3" id="modal-id">
                                            <label for="roleId" class="form-label">ID</label>
                                            <input type="text" id="roleId" class="form-control" placeholder="ID" readonly />
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label for="name-field" class="form-label">Name</label>
                                                <input type="text" id="name-field" class="form-control" placeholder="Name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <label for="description-field" class="form-label">Description</label>
                                                <input type="text" id="description-field" class="form-control" placeholder="Description" />
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="mt-3"  id="permissions-field" multiply>
                                                <h5 class="fs-14 mb-3">Permissions</h5>
                                                @forelse($permissions as $name => $groups)
                                                <h5 class="fs-14 mb-3">{{$name}}</h5>
                                                <div class="d-flex flex-wrap">
                                                    @foreach($groups as $group )
                                                    <div class="form-check mb-3 col-6 col-md-4 col-lg-3">
                                                        <input class="form-check-input permissions-field" type="checkbox" name="permissions[]" value="{{$group->id}}" data-id="{{$group->id}}">
                                                        <label class="form-check-label" for="formCheck6">
                                                            {{$group->slug}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @empty
                                                    <div class="row">empty</div>
                                                @endforelse
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Add Role</button>
                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                    </lord-icon>
                                    <div class="mt-4 text-center">
                                        <h4>You are about to delete a role ?</h4>
                                        <p class="text-muted fs-15 mb-4">Deleting your role will remove
                                            all of
                                            your information from our database.</p>
                                        <div class="hstack gap-2 justify-content-center remove">
                                            <button class="btn btn-link link-success fw-medium text-decoration-none"
                                                data-bs-dismiss="modal" id="deleteRecord-close"><i class="ri-close-line me-1 align-middle"></i>
                                                Close</button>
                                            <button class="btn btn-danger" id="delete-record">Yes,
                                                Delete It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal -->
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script>
        var routes = {
            apiRoles: '{{route('admin.api.roles')}}',
            apiRole: {
                edit :'{{route('admin.api.role.edit')}}',
                delete :'{{route('admin.api.role.delete')}}',
                update :'{{route('admin.api.role.update')}}',
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ URL::asset('admin/assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!--ecommerce-customer init js -->
    <script src="{{ URL::asset('admin/assets/js/pages/role.init.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ URL::asset('/admin/assets/js/app.min.js') }}"></script>
@endsection
