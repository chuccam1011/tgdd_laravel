@extends('admin.layout.master')
@push('title') Create Ram
@endpush
@section('nav')
    <div class="nav_admin">
        @include('admin.layout.nav')
    </div>
@endsection

@section('main-panel')
    <div class="">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Brands</h4><br>
                <form method="post" enctype="multipart/form-data" action="{{route('create-brand')}}" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Brand Name" required>
                    </div>
                    <div class="form-group">
                        <label>Logo upload</label>  <input type="file" id="img" name="img" accept="image/*">

                        <input type="file" name="logo" class="file-upload-default">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<style>
    .nav_admin {
        float: left;
    }
</style>
