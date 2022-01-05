@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Advert Edit Form</h4>
                <div class="card-body">
                    <form action="{{ url('advert/update/'.$advert->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Title</label>
                            @error("title")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="title" value="{{ $advert->title }}" required id="" class="form-control" placeholder="Enter blog title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Summary</label>
                            @error("summary")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="summary" value="{{ $advert->summary }}" required id="" class="form-control" placeholder="Enter blog summary" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Verified</label>
                            <select class="form-control btn btn-dark text-left" name="verified" id="">
                                <option value="{{ $advert->verified }}">Previous</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Advert Image</label>
                            @error("image")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="image" id="" class="form-control" aria-describedby="helpId">
                            <input type="hidden" name="old_image" value="{{ $advert->image }}">
                            <br />
                            <img src="{{ asset($advert->image) }}" alt="" class="img-thumbnail img-fluid">
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Description</label>
                            @error("description")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <textarea name="description" required class="form-control" id="description" rows="10" placeholder="Enter Description">{{ $advert->description }}</textarea>
                            <br />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Edit Advert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
