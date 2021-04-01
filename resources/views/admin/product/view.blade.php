@extends('admin.layout.master')
@push('title') All Products @endpush
@section('nav')
    <div class="nav_admin">
        @include('admin.layout.nav')
    </div>
@endsection

@section('main-panel')
    <div class="">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description"> All Products</p>
                <a href="{{route('create-product')}}">
                    <button type="button" class="btn btn-primary btn-fw">Create New Product</button>
                </a>
                <br>
                <br>
                <br>
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <input placeholder="Enter keyword" type="text" name="key"
                                   value="{{ request()->input('key') }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Brand</label>
                            <select name="brand_id" class="form-control">
                                <option>Select</option>
                                @foreach($brands as $brand)
                                    <option
                                        {{ old('brand_id') == $brand->id ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Is Parent</label>
                            <div class="form-control">
                                <input name="is_default" type="checkbox"
                                    {{ old('is_default')== 'on' ? 'checked' : ''}}>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </div>

                </form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> #ID</th>
                        <th> Thumbnail</th>
                        <th> Name</th>
                        <th> Type</th>
                        <th> Price</th>
                        <th> Category</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td class="py-1">
                                <img src="{{asset('storage/thumbnail/'.$product->thumbnail)}}" alt="image">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->type ? 'Parent': 'Child'}}</td>
                            </td>
                            <td>{{number_format($product->price).' VND'}}</td>
                            <td>{{$product->categories->name}}</td>
                            <td>
                                <a href="{{route('edit-product',$product->id)}}">
                                    <button type="button" class="btn btn-success btn-fw">Edit</button>
                                </a>
                                <form class="frm-delete" action="{{ route('delete-product', $product->id) }}"
                                      method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="btn-delete btn btn-danger btn-fw">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <br>
                {{--                {{$product->appends(request()->all()) }}--}}
            </div>
        </div>

    </div>

    <script>
        $('.btn-delete').click(function () {
            let isDelete = confirm('Do you want to edit this Product');
            if (isDelete) {
                $(this).parents('form').submit();
            }
        });
    </script>
@endsection
<style>
    .nav_admin {
        float: left;
    }
</style>
