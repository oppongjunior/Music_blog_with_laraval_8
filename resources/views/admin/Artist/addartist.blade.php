@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Artist Form</h4>
                <div class="card-body">
                    <form action="{{ route('store.artist') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Name</label>
                            @error("name")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="name" required id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Genre</label>
                            @error("genre")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="genre" required id="" class="form-control" placeholder="Enter Genre" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Country</label>
                            @error("country")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="country" required id="" class="form-control" placeholder="Enter Name" aria-describedby="helpId">
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
                            <label for="" class="form-label">Select Type</label>
                            <select class="form-control btn btn-dark text-left" name="type" id="">
                              <option value="top_artist">Top Artist</option>
                              <option value="new_artist">New Artist</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Artist Image</label>
                            @error("image")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="image" required id="" class="form-control" aria-describedby="helpId">
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
                        <button class="btn btn-primary btn-block" type="submit">Add Artist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
