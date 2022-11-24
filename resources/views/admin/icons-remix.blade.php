@extends('admin.layouts.master')
@section('title') @lang('translation.remix') @endsection
@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1') Forms @endslot
        @slot('title') Remix Icons @endslot
    @endcomponent
    <div class="row">

    </div><!-- end row -->

    <div class="row">
        <div class="col-12" id="icons"></div> <!-- end col-->
    </div><!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('admin/assets/js/pages/remix-icons-listing.js') }}"></script>
    <script src="{{ URL::asset('/admin/assets/js/app.min.js') }}"></script>
@endsection
