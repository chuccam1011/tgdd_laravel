@extends('admin.layout.master')
@push('title') Edit Brand
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
                <form method="post" enctype="multipart/form-data" action="{{route('submitEdit-brand')}}" class="forms-sample">
                    @csrf
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="{{old('name',$brand->name)}}" class="form-control" id="exampleInputName1" placeholder="Brand Name" required>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="brand-logo">
                        <img height="150px" width="150px" src="{{asset('storage/logo/'.$brand->logo)}}" alt="image">
                    </div>
                    <div class="form-group">
                        <label>Logo upload</label><br>
                        <input type="file"  id="logo" name="logo" >
                    </div>
                    @error('logo')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleTextarea1" rows="2">{{old('name',$brand->description)}}</textarea>
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
