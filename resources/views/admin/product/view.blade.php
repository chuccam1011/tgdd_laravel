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
                <form action="">
                    <div class="row">
                        <div class="col-md-2">
                            <input placeholder="Enter keyword" type="text" name="key"
                                   value="{{ request()->input('key') }}" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <option value>Select</option>
                                @foreach($categories as $category)
                                    <option
                                        {{  request()->input('category_id') == $category->id ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Brand</label>
                            <select name="brand_id" class="form-control">
                                <option value>Select</option>
                                @foreach($brands as $brand)
                                    <option
                                        {{ request()->input('brand_id') == $brand->id ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Is Parent</label>
                            <div class="">
                                <input name="is_default" type="checkbox"
                                    {{ request()->input('is_default')== 'on' ? 'checked' : ''}}>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label for="">Order By</label>
                            <select name="order_by" class="form-control">
                                @foreach($attributes as $key =>$attribute)
                                    <option
                                        {{ request()->input('order_by') == $key ? 'selected' : '' }} value="{{$key}}">{{$attribute}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="">Sort</label>
                            <select name="sort" class="form-control">
                                @foreach($sorts as $key => $sort)
                                    <option
                                        {{ request()->input('sort') == $key ? 'selected' : '' }} value="{{$key}}">{{$sort}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-1">
                            <a href="{{route('view-product')}}">Clear All</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                        <div class="col-md-6">Number of Products ( {{$products->count()}} )</div>
                    </div>
                </form>
                @if ($products->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> #ID</th>
                            <th> Thumbnail</th>
                            <th> Name</th>
                            <th> Type</th>
                            <th> Price</th>
                            <th> Category</th>
                            <th> Brand</th>
                            <th> Qty</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td class="product-image">
                                    <img src="{{asset('storage/thumbnail/'.$product->thumbnail)}}" alt="image">
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->is_default ? 'Parent': 'Child'}}</td>
                                </td>
                                <td>{{number_format($product->price).' VND'}}</td>
                                <td>{{$product->categories->name}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->qty}}</td>
                                <td>
                                    <a href="{{route('edit-product',$product->id)}}">
                                        <button type="button" class="btn btn-dark btn-fw">Edit</button>
                                    </a>
                                    @if ($product->is_default)
                                        <br>
                                        <a href="{{route('create-child-product',$product->id)}}">
                                            <button type="button" class="btn btn-success btn-fw">Create Child
                                                Product
                                            </button>
                                        </a>
                                    @endif

                                    <form class="frm-delete" action="{{ route('delete-product', $product->id) }}"
                                          method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn-delete btn btn-danger btn-fw">Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <br>
                    {{$products->appends(request()->all())}}
                @else
                    <br>
                    <br>
                    <p>There is no result </p>
                @endif
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
    .product-image img {
        height: 150px !important;
        width: 150px !important;
        border-radius: unset !important;
    }

    .nav_admin {
        float: left;
    }
</style>

