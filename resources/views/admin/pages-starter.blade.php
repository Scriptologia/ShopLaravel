@extends('admin.layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('admin.components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter  @endslot
@endcomponent
@endsection
@section('script')
<script src="{{ URL::asset('/admin/assets/js/app.min.js') }}"></script>
@endsection
