@extends('admin.layout.master')
@push('title') All Cam After @endpush
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
                <p class="card-description"> All Cam After </p>
                <a href="{{route('create-cam_after')}}">
                    <button type="button" class="btn btn-primary btn-fw">Create New Cam After</button>
                </a>

                @if ($camAfters->count())
                    <br>
                    <br>
                    <br>
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <input placeholder="Enter keyword" type="text" name="key" value="{{ request()->input('key') }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <br>
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
                        @foreach($camAfters as $cam_after)
                            <tr>
                                <td>{{$cam_after->id}}</td>
                                <td>{{$cam_after->name}}</td>
                                <td>{{$cam_after->description}}</td>
                                <td>{{$cam_after->created_at}}</td>
                                <td>
                                    <a href="{{route('edit-cam_after',$cam_after->id)}}">
                                        <button type="button" class="btn btn-success btn-fw">Edit</button>
                                    </a>
                                    <form class="6from-delete" action="{{route('delete-cam_after', $cam_after->id) }}"
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
                    {{$camAfters->appends(request()->all()) }}

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
