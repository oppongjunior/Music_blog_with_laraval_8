@extends('admin.admin_layout')

@section('content')
<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif

                <script>
                    var alertList = document.querySelectorAll('.alert');
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert)
                    })

                </script>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        All Blog
                        <a href="{{ route('add.genre') }}"><button class="btn btn-primary">Add Genre</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="15%">ID</th>
                                        <th width="10%">Genre Title</th>
                                        <th width="10%">Name</th>
                                        <th width="10%">verified</th>
                                        <th width="15%">Created At</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($genre as $item )
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->verified }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url("genre/edit/".$item->id) }}"><button class="btn btn-info mx-2">Edit</button></a>
                                                <a href="{{ url("genre/delete/".$item->id) }}"><button class="btn btn-danger">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{ $genre->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
