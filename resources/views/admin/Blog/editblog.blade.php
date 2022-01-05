@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Blog Edit Form</h4>
                <div class="card-body">
                    <form action="{{ url('blog/update/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Title</label>
                            @error("title")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="title" value="{{ $blog->title }}" required id="" class="form-control" placeholder="Enter blog title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Summary</label>
                            @error("summary")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="summary" value="{{ $blog->summary }}" required id="" class="form-control" placeholder="Enter blog summary" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Category</label>
                            <select class="form-control btn btn-dark text-left" name="category" id="">
                                <option value="{{ $blog->category }}">Previous</option>
                                <option value="Technology">Technology</option>
                                <option value="Social">Social</option>
                                <option value="Politics">Politics</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="" class="form-label">blog Image</label>
                            @error("image")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="image" id="" class="form-control" aria-describedby="helpId">
                            <input type="hidden" name="old_image" value="{{ $blog->image }}">
                            <br />
                            <img src="{{ asset($blog->image) }}" alt="" class="img-thumbnail img-fluid">
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Description</label>
                            @error("description")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <textarea name="description" required class="form-control" id="description" rows="10" placeholder="Enter Description">{{ $blog->description }}</textarea>
                            <br />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Edit blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
