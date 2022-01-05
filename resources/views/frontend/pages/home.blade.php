@extends("frontend.layout.layout")
@section('content')

<!-- Top News Start-->
{{ asset('frontend/') }}
<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    @foreach ($trending as $trend )
                    <div class="col-md-6">
                        <div class="tn-img slider-box">
                            <img src="{{ asset($trend->image) }}" class="slider-image" />
                            <div class="tn-title">
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
            <div class="col-md-6 tn-right">
                <div class="row">
                    @foreach ($popular as $popular_track )
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img src="{{ asset($popular_track->image) }}" class="popular-image" />
                            <div class="tn-title">
                                <div>
                                    <a href="{{ url("details/$popular_track->id") }}">{{ $popular_track->title }}</a>
                                    <div>
                                        <span>{{ $popular_track->composer }}</span>
                                    </div>
                                </div>
                            </div>>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->

<!-- Category News Start-->
<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-light">New Artirst</h2>
                <div class="row cn-slider">
                    @foreach ($new_artists as $artist)
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="{{ asset($artist->image) }}" />
                            <div class="cn-title">
                                <div>
                                    <a href="{{ url("details/$artist->id") }}">{{ $artist->title }}</a>
                                    <div>
                                        <span>{{ $artist->composer }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-light">Top Songs</h2>
                <div class="row cn-slider">
                    @foreach ($top_songs as $top_song)
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="{{ asset($top_song->image) }}" />
                            <div class="cn-title">
                                <div>
                                    <a href="{{ url("details/$top_song->id") }}">{{ $top_song->title }}</a>
                                    <div>
                                        <span>{{ $top_song->composer }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News End-->

<!-- Main News Start-->
<div class="main-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($songs as $song )
                    <div class="col-md-3">
                        <div class="mn-img">
                            <img src="{{ asset($song->image) }}" />
                            <div class="mn-title">
                                <div>
                                    <a href="{{ url("details/$song->id") }}">{{ $song->title }}</a>
                                    <div>
                                        <span>{{ $song->composer }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $songs->links('pagination::bootstrap-4') }}
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
<!-- Main News End-->
@endsection
