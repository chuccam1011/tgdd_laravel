@extends('admin.layout.master')
@push('title') Edit Categories
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
                <h4 class="card-title">Edit Categories</h4><br>
                <form method="post" enctype="multipart/form-data" action="{{route('submitEdit-category')}}"
                      class="forms-sample">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="{{old('name',$category->name)}}" class="form-control"
                               id="exampleInputName1" placeholder="Brand Name" required>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" name="slug" value="{{old('name',$category->slug)}}" class="form-control"
                               id="exampleInputName1" placeholder="Slug category" required>
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-check form-check-flat">
                        <label class="form-check-label">
                            <input name="is-change-slug" type="checkbox" class="form-check-input" checked=""> Change Slug by Name<i class="input-helper"></i>
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleTextarea1"
                                  rows="2">{{old('name',$category->description)}}</textarea>
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
