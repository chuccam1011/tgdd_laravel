@extends('admin.layout.master')
@push('title') All Categories @endpush
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
                <p class="card-description"> All Categories </p>
                <a href="{{route('create-category')}}">
                    <button type="button" class="btn btn-primary btn-fw">Create New Categories</button>
                </a>
                @if ($categorys->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> #ID</th>
                            <th> Name</th>
                            <th> ProductID</th>
                            <th> Slug</th>
                            <th> Description</th>
                            <th> Create At</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorys as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->product_id}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{route('edit-category',$category->id)}}">
                                        <button type="button" class="btn btn-success btn-fw">Edit</button>
                                    </a>
                                    <form class="6from-delete" action="{{route('delete-category', $category->id) }}"
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
            let isDelete = confirm('Do you want to edit this Brand');
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
