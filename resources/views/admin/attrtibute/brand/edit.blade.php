@extends('admin.layout.master')

@section('nav')
    <div class="nav_admin">
        @include('admin.layout.nav')
    </div>
@endsection

@section('main-panel');
<div class="">
    @include('admin.layout.main-panel')
</div>
@endsection
<style>
    .nav_admin {
        float: left;
    }
</style>
