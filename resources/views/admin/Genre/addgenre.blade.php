@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Genre Form</h4>
                <div class="card-body">
                    <form action="{{ route('store.genre') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="" class="form-label">Title</label>
                            @error("title")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="title" required id="" class="form-control" placeholder="Enter genre title" aria-describedby="helpId">
                            <br />
                        </div>
                        <div class="mb-1">
                            <label for="" class="form-label">Name</label>
                            @error("summary")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="text" name="name" required id="" class="form-control" placeholder="Enter name" aria-describedby="helpId">
                            <br />
                        </div>
                        
                        <button class="btn btn-primary btn-block" type="submit">Add Genre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
