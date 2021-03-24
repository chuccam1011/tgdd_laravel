@extends('admin.layout.master')
@push('title') All Brands @endpush
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
                <p class="card-description"> All Brands </p>
                <a href="{{route('create-brand')}}">
                    <button type="button" class="btn btn-primary btn-fw">Create New Brand</button>
                </a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> Logo</th>
                        <th> Name</th>
                        <th> Description</th>
                        <th> Number Product</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($brands as $brand)
                        <tr>
                            <td class="py-1">
                                <img src="{{asset('storage/logo/'.$brand->logo)}}" alt="image">
                            </td>
                            <td>{{$brand->name}}</td>
                            </td>
                            <td>{{$brand->description}}</td>
                            <td>{{$brand->created_at}}</td>
                            <td>
                                <a href="{{route('edit-brand',$brand->id)}}">
                                    <button type="button" class="btn btn-success btn-fw">Edit</button>
                                </a>
                                <form class="frm-delete" action="{{ route('delete-brand', $brand->id) }}" method="POST">
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
