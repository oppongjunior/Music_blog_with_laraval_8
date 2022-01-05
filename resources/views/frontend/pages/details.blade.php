@extends("frontend.layout.layout")
@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-light">Track details</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Single News Start-->
<div class="single-news">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="sn-container">
                    <div class="sn-img">
                        <img src="{{ asset("$song->image") }}" class="main-image " />
                    </div>
                    <div class="sn-content text-light">
                        <h1 class="sn-title text-light">{{ $song->title }}</h1>
                        <p class="text-light">
                            {{ $song->description }}
                        </p>

                        <div>
                            <audio src="{{ asset($song->track) }}" controls></audio>
                            <div class="text-center">
                                <a href="{{ asset($song->track) }}" download class="btn btn-danger">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sn-related">
                    <h2 class="text-light">Trending</h2>
                    <div class="row sn-slider">
                        @foreach ($trending as $trend )
                        <div class="col-md-4">
                            <div class="sn-img">
                                <img src="{{ asset($trend->image )}}" />
                                <div class="sn-title text-light">
                                    <div>
                                        <a href="{{ url("details/$trend->id") }}">{{ $trend->title }}</a>
                                        <div>
                                            <span>{{ $trend->composer }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar bg-dark text-light px-2 py-3">
                    <div class="sidebar-widget">
                        <div class="sidebar-widget">
                            <h3 class="sw-title text-light">Search Songs</h3>
                            <form method="post" action="{{ url('song/search') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="search" name="search" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Search Track">
                                </div>
                                <button class="btn btn-danger btn-block">Search</button>
                            </form>
                        </div>
                        <h3 class="sw-title text-light">Top Songs</h3>
                        <div class="news-list">
                            @foreach ($top_songs as $top_song )
                            <div class="nl-item">
                                <div class="nl-img">
                                    <img src="{{ asset($top_song->image) }}" />
                                </div>
                                <div class="nl-title">
                                    <a href="{{ url("details/$top_song->id") }}" class="text-light">{{ $top_song->title }}</a>
                                    <div>
                                        <span>{{ $top_song->composer }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="advert">
                        @foreach ($adverts as $advert)
                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="#"><img src="{{ asset($advert->image) }}" class="w-100" alt="Image"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sw-title text-light">Artists</h3>
                        <div class="tags">
                            @foreach ($artists as $artist )
                            <a href="">{{ $artist->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single News End-->

@endsection
