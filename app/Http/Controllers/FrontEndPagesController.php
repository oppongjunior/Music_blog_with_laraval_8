<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Songs;
use Illuminate\Http\Request;

class FrontEndPagesController extends Controller
{
    //
    public function Home(){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $songs = Songs::where("verified",1)->orderByDesc("created_at")->paginate(30);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();
        return view("frontend.pages.home",["genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs,"songs"=>$songs]);
    }
    public function details($id){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $song = Songs::find($id);
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();
        return view("frontend.pages.details",["genres"=>$genres,"adverts"=>$adverts,"song"=>$song,"trending"=>$trending,"top_songs"=>$top_songs,"artists"=>$artists]);
    }
    public function all_songs(){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $songs = Songs::where("verified",1)->orderByDesc("created_at")->paginate(30);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();
        return view("frontend.pages.all_songs",["genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs,"songs"=>$songs]);
    }

    public function category($id){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $songs = Songs::where("verified",1)->where("category",$id)->orderByDesc("created_at")->paginate(30);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();
        return view("frontend.pages.category",["genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs,"songs"=>$songs]);
    }
    public function genreFunc($id){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $songs = Songs::where("verified",1)->where("genre","like","%$id%")->orderByDesc("created_at")->paginate(30);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();

        return view("frontend.pages.genre",["genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs,"songs"=>$songs]);
    }
    public function view_artists($id){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $all_artists = Artist::where("verified",1)->where("type",$id)->orderByDesc("created_at")->paginate(60);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();

        return view("frontend.pages.artists",["all_artists"=>$all_artists,"genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs]);
    }
    public function view_artists_song($id){
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $songs = Songs::where("verified",1)->where("composer","like","%$id%")->orderByDesc("created_at")->paginate(30);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();

        return view("frontend.pages.artist_songs",["id"=>$id,"genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs,"songs"=>$songs]);
    }
    public function song_search(Request $request){
        $search_word = $request->input("search");
        $genres = Genre::where("verified",1)->orderBy("title")->get();
        $trending = Songs::where("category","trending")->orderByDesc("created_at")->take(5)->get();
        $popular = Songs::where("category","popular")->orderByDesc("created_at")->take(4)->get();
        $artist_new = Songs::where("category","new_artist")->orderByDesc("created_at")->take(10)->get();
        $top_songs = Songs::where("category","top_songs")->orderByDesc("created_at")->take(10)->get();
        $songs = Songs::where("verified",1)
        ->where("composer","like","%%$search_word%%")
        ->orwhere("title","like","%%$search_word%%")
        ->orwhere("tags","like","%%$search_word%%")
        ->orwhere("genre","like","%%$search_word%%")
        ->orwhere("producer","like","%%$search_word%%")
        ->orwhere("description","like","%%$search_word%%")
        ->orderByDesc("created_at")
        ->paginate(30);
        $artists = Artist::where("verified",1)->where("type","top_artist")->orderBy("name")->take(10)->get();
        $adverts = Advert::where("verified",1)->orderByDesc("created_at")->take(3)->get();

        return view("frontend.pages.search",["search_word"=>$search_word,"genres"=>$genres,"adverts"=>$adverts,"artists"=>$artists,"trending"=>$trending,"popular"=>$popular,"new_artists"=>$artist_new,"top_songs"=>$top_songs,"songs"=>$songs]);
    }

}
