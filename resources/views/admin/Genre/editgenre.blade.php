@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Genre Edit Form</h4>
                <div class="card-body">
                    <form action="{{ url('genre/update/'.$genre->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Title</label>
                            @error("title")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="title" value="{{ $genre->title }}" required id="" class="form-control" placeholder="Enter title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Name</label>
                            @error("name")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="name" value="{{ $genre->name }}" required id="" class="form-control" placeholder="Enter name" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Genre</label>
                            <select class="form-control btn btn-dark text-left" name="verified" id="">
                                <option value="{{ $genre->verified }}">Previous</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                          </div>
                        <button class="btn btn-primary btn-block" type="submit">Edit Genre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
