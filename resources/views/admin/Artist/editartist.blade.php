@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Blog Edit Form</h4>
                <div class="card-body">
                    <form action="{{ url('artist/update/'.$artist->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Name</label>
                            @error("name")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="name" value="{{ $artist->name }}" required id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Genre</label>
                            @error("genre")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="genre" value="{{ $artist->genre }}" required id="" class="form-control" placeholder="Enter Genre" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Country</label>
                            @error("country")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="country" value="{{ $artist->country }}" required id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Summary</label>
                            @error("summary")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="summary" value="{{ $artist->summary }}" required id="" class="form-control" placeholder="Enter blog summary" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Select Type</label>
                            <select class="form-control btn btn-dark text-left" name="type" id="">
                                <option value="{{ $artist->type }}">Previous</option>
                                <option value="top_artist">Top Artist</option>
                                <option value="new_artist">New Artist</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Verified</label>
                            <select class="form-control btn btn-dark text-left" name="verified" id="">
                                <option value="{{ $artist->verified }}">Previous</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Artist Image</label>
                            @error("image")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="image" id="" class="form-control" aria-describedby="helpId">
                            <input type="hidden" name="old_image" value="{{ $artist->image }}">
                            <br />
                            <img src="{{ asset($artist->image) }}" alt="" class="img-thumbnail img-fluid">
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Description</label>
                            @error("description")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <textarea name="description" required class="form-control" id="description" rows="10" placeholder="Enter Description">{{ $artist->description }}</textarea>
                            <br />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Edit Artist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
