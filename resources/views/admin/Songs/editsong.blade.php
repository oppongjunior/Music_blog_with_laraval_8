@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Song Edit Form</h4>
                <div class="card-body">
                    <form action="{{ url('song/update/'.$song->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Title</label>
                            @error("title")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="title" value="{{ $song->title }}" required id="" class="form-control" placeholder="Enter blog title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Composer</label>
                            @error("composer")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="composer" value="{{ $song->composer }}" required id="" class="form-control" placeholder="Enter blog composer" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Genre</label>
                            <select class="form-control btn btn-dark text-left" name="genre" id="">
                                <option value="{{ $song->genre }}">Previous</option>
                                @foreach ($genres as $item )
                                <option value="{{ $item->name }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Producer</label>
                            @error("producer")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="producer" value="{{ $song->producer }}" required id="" class="form-control" placeholder="Enter blog producer" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Summary</label>
                            @error("summary")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="summary" value="{{ $song->summary }}" required id="" class="form-control" placeholder="Enter blog summary" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Tags</label>
                            @error("tags")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="tags" value="{{ $song->tags }}" required id="" class="form-control" placeholder="Enter tags" aria-describedby="helpId">
                            <br />
                        </div>
 
                        <div class="mb-3">
                            <label for="" class="form-label">Select Category</label>
                            <select class="form-control btn btn-dark text-left" name="category" id="">
                                <option value="{{ $song->category }}">Previous</option>
                                <option value="popular">Popular</option>
                                <option value="trending">Trending</option>
                                <option value="new_artist">New Artist</option>
                                <option value="top_songs">Top Songs</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Verify Song</label>
                            <select class="form-control btn btn-dark text-left" name="verified" id="">
                                <option value="{{ $song->verified }}">{{ $song->verified?"Yes":"No" }}</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Change Track Image</label>
                            @error("image")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="image" id="" class="form-control" aria-describedby="helpId">
                            <input type="hidden" name="old_image" value="{{ $song->image }}">
                            <br />
                            <img src="{{ asset($song->image) }}" alt="" class="img-thumbnail img-fluid w-50">
                        </div>
                        
                        <div class="mb-1">
                            <label for="" class="form-label">Description</label>
                            @error("description")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <textarea name="description" required class="form-control" id="description" rows="10" placeholder="Enter Description">{{ $song->description }}</textarea>
                            <br />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Edit Song</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
