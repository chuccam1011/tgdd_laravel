@extends('admin.layout.master')
@push('title') All Image Product @endpush
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
                <p class="card-description"> All Image Product </p>
                <a href="{{route('upload-product-image')}}">
                    <button type="button" class="btn btn-primary btn-fw">Up Load New Image of Product</button>
                </a>

                @if ($images->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> #ID</th>
                            <th> Image</th>
                            <th> Path</th>
                            <th> ProductID</th>
                            <th> Create At</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td>{{$image->id}}</td>
                                <td class="product-image">
                                    <img height="250px" width="250px" src="{{asset('storage/img/'.$image->img)}}"
                                         alt="image">
                                </td>
                                <td>{{asset('storage/img/'.$image->img)}}</td>
                                <td>{{$image->product_id}}</td>
                                <td>{{$image->created_at}}</td>
                                <td>
{{--                                    <a href="{{route('edit-product-image',$image->id)}}">--}}
{{--                                        <button type="button" class="btn btn-success btn-fw">Edit</button>--}}
{{--                                    </a>--}}
                                    <form class="6from-delete" action="{{route('delete-product-image', $image->id) }}"
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
            let isDelete = confirm('Do you want to delete this Image');
            if (isDelete) {
                $(this).parents('form').submit();
            }
        });
    </script>
@endsection
<style>
    .product-image img{
        height:150px!important;
        width:150px!important;
        border-radius:unset!important;
    }
    .nav_admin {
        float: left;
    }
</style>
