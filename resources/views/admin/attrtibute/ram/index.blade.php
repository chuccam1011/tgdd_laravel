@extends('admin.layout.master')
@push('title') All Ram @endpush
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
                <p class="card-description"> All Ram </p>
                <a href="{{route('create-ram')}}">
                    <button type="button" class="btn btn-primary btn-fw">Create New Ram</button>
                </a>
                @if ($rams->count())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th> #ID</th>
                        <th> Name</th>
                        <th> Description</th>
                        <th> Number Product</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($rams as $ram)
                        <tr>

                            <td>{{$ram->id}}</td>
                            <td>{{$ram->name}}</td>
                            </td>
                            <td>{{$ram->description}}</td>
                            <td>{{$ram->created_at}}</td>
                            <td>
                                <a href="{{route('edit-ram',$ram->id)}}">
                                    <button type="button" class="btn btn-success btn-fw">Edit</button>
                                </a>
                                <form class="frm-delete" action="{{ route('delete-ram', $ram->id) }}" method="POST">
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
