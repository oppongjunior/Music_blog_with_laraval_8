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
                        All Songs
                        <div>
                            <a href="{{ route('add.song') }}"><button class="btn btn-primary">Add Song</button></a>
                            <a href="{{ route('song.generator') }}"><button class="btn btn-success">Use track generator</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm table-responsive-md">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Verified</th>
                                        <th>Title</th>
                                        <th>Composer</th>
                                        <th>Producer</th>
                                        <th>Category</th>
                                        <th>Genre</th>
                                        <th>Tags</th>
                                        <th width="25%">Image</th>
                                        <th>Summary</th>
                                        <th>Description</th>
                                        <th>Uploaded By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($songs as $item )
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->verified }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->composer }}</td>
                                        <td>{{ $item->producer }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->genre }}</td>
                                        <td>{{ $item->tags }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="{{ $item->image }}" class="img-thumbnail w-100"></td>
                                        <td>{{ $item->summary }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url("song/edit/".$item->id) }}"><button class="btn btn-info mx-2">Edit</button></a>
                                                <a href="{{ url("song/delete/".$item->id) }}"><button class="btn btn-danger">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{ $songs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
