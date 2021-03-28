@extends('admin.layout.master')
@push('title') Edit load image
@endpush
@section('nav')
    <div class="nav_admin">
        @include('admin.layout.nav')
    </div>
@endsection

@section('main-panel')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Image</h4><br>
            <form method="post" enctype="multipart/form-data" action="{{route('submitEditProduct-product')}}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label>Image upload</label><br>
                    <input type="file"  name="img[]"  multiple>
                </div>
                @error('img')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-success mr-2">Submit</button>
            </form>
        </div>
    </div>
@endsection
<style>
    .nav_admin {
        float: left;
    }
</style>
