@extends('admin.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <h4 class="card-header">Song Info Generator Form</h4>
                <div class="card-body">
                    <form action="{{ route('song.processor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Track File</label>
                            @error("track")
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input type="file" name="track" required id="" class="form-control" aria-describedby="helpId">
                            <br />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Generate Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
