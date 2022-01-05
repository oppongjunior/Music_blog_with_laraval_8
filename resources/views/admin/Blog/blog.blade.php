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
                        <a href="{{ route('add.blog') }}"><button class="btn btn-primary">Add Blog</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="15%">ID</th>
                                        <th width="10%">Service Title</th>
                                        <th width="10%">Summary</th>
                                        <th width="10%">Author</th>
                                        <th width="5%">Category</th>
                                        <th width="25%">Image</th>
                                        <th width="15%">Description</th>
                                        <th width="15%">Created At</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog as $item )
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->summary }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="{{ $item->image }}" class="img-thumbnail w-100"></td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ url("blog/edit/".$item->id) }}"><button class="btn btn-info mx-2">Edit</button></a>
                                                <a href="{{ url("blog/delete/".$item->id) }}"><button class="btn btn-danger">Delete</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{ $blog->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
