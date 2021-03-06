@extends('admin.layout.master')
@push('title') Edit Operator
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
                <h4 class="card-title">Edit Operator</h4><br>
                <form method="post" enctype="multipart/form-data" action="{{route('submitEdit-opera')}}"
                      class="forms-sample">
                    @csrf
                    <input type="hidden" name="id" value="{{$opera->id}}">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="{{old('name',$opera->name)}}" class="form-control"
                               id="exampleInputName1" placeholder="Brand Name" required>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleTextarea1"
                                  rows="2">{{old('name',$opera->description)}}</textarea>
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
