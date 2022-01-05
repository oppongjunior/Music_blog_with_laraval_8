@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Save Song Form</h4>
                <div class="card-body">
                    <form action="{{ url('complete/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Title</label>
                            @error("title")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" value="{{ $title }}" name="title" required id="" class="form-control" placeholder="Enter service title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Composers</label>
                            @error("composer")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" value="{{ $composer }}" name="composer" required id="" class="form-control" placeholder="Enter composers" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Producer</label>
                            @error("producer")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" value="{{ $artist }}" name="producer" required id="" class="form-control" placeholder="Enter Producer" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Genre</label>
                            @error("genre")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text"  name="genre" value="{{ $genre }}" required id="" class="form-control" placeholder="Enter Genre" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Tags</label>
                            @error("tags")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="tags" id="" class="form-control" placeholder="Enter Tags" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Summary</label>
                            @error("summary")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="summary" required id="" class="form-control" placeholder="Enter summary title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Category</label>
                            <select class="form-control btn btn-dark text-left" name="category" id="">
                              <option value="popular">Popular</option>
                              <option value="trending">Trending</option>
                              <option value="new_artist">New Artist</option>
                              <option value="top_songs">Top Songs</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Track Cover Image</label>
                            @error("image")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="image" id="" class="form-control" aria-describedby="helpId">
                            <input type="hidden" value="{{ $image }}" name="old_image" required id="" class="form-control" aria-describedby="helpId">
                            <br />
                            <img src="{{ asset("images/temp/$image") }}" class="img-fluid w-50" alt="">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" value="{{ $track }}" name="track" id="" class="form-control" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Description</label>
                            @error("description")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <textarea name="description" required class="form-control" id="description" rows="10" placeholder="Enter Description"></textarea>
                            <br />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Add Song</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
