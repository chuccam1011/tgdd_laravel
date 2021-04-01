@extends('admin.layout.master')
@push('title') All Operators @endpush
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
                <p class="card-description"> All Operators </p>
                <a href="{{route('create-opera')}}">
                    <button type="button" class="btn btn-primary btn-fw">Create New Operators </button>
                </a>
                @if ($operators->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> #ID</th>
                            <th> Name</th>
                            <th> Description</th>
                            <th> Create At</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operators as $opera)
                            <tr>
                                <td>{{$opera->id}}</td>
                                <td>{{$opera->name}}</td>
                                <td>{{$opera->description}}</td>
                                <td>{{$opera->created_at}}</td>
                                <td>
                                    <a href="{{route('edit-opera',$opera->id)}}">
                                        <button type="button" class="btn btn-success btn-fw">Edit</button>
                                    </a>
                                    <form class="6from-delete" action="{{route('delete-opera', $opera->id) }}"
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
