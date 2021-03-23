@extends('admin.layout.master')
@push('title') Create Ram
@endpush
@section('nav')
    <div class="nav_admin">
        @include('admin.layout.nav')
    </div>
@endsection

@section('main-panel');
<div class="">
    @include('admin.layout.form-lib')
</div>
@endsection
<style>
    .nav_admin {
        float: left;
    }
</style>
