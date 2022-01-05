<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontEndPagesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\ContactMessages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//email verification
/*
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
*/

//Frontend pages route
//home page route
Route::get('/', [FrontEndPagesController::class, "Home"]);
//contact
Route::get("/contact",[FrontEndPagesController::class, "contact"]);
Route::get("/about",[FrontEndPagesController::class, "about"]);
Route::get("/blog",[FrontEndPagesController::class, "blog"]);
Route::get("/details/{id}",[FrontEndPagesController::class, "details"]);
Route::get("all/songs",[FrontEndPagesController::class, "all_songs"]);
Route::get("category/{id}",[FrontEndPagesController::class,"category"]);
Route::get("genres/{id}",[FrontEndPagesController::class,"genreFunc"]);
Route::get("artists/{id}",[FrontEndPagesController::class,"view_artists"]);
Route::get("artists/artist/{id}",[FrontEndPagesController::class,"view_artists_song"]);
Route::post("song/search",[FrontEndPagesController::class,"song_search"]);

///Route::get("/about",[AboutController::class, "index"])->middleware("age");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();

    //$users = DB::table("users")->get();
    return view('admin.index',['users'=>$users]);
})->name('dashboard');

//user route
Route::get("user/all",[UserController::class,"index"]);
Route::get("user/add",[UserController::class,"create"])->name("add.user");
Route::post("user/store",[UserController::class,"store"])->name("store.user");
Route::get("user/delete/{id}",[UserController::class,"destroy"]);

//multipics routes
Route::get("multi/image",[BrandController::class,"mulitipic"])->name("multi.image");
Route::post("images/add",[BrandController::class,"storeImages"])->name("store.images");

//admin blog route
Route::get("blog/all",[BlogController::class,"index"])->name("all.blogs");
Route::get("blog/create",[BlogController::class,"create"])->name("add.blog");
Route::post("blog/add",[BlogController::class,"store"])->name("store.blog");
Route::get("blog/edit/{id}",[BlogController::class,"edit"]);
Route::post("blog/update/{id}",[BlogController::class,"update"]);
Route::get("blog/delete/{id}",[BlogController::class,"destroy"]);

//admin songs route
Route::get("song/all",[SongController::class,"index"])->name("all.songs");
Route::get("song/create",[SongController::class,"create"])->name("add.song");
Route::post("song/add",[SongController::class,"store"])->name("store.song");

Route::post("song/processor",[SongController::class,"song_proccessor"])->name("song.processor");
Route::get("song/generator",[SongController::class,"generator"])->name("song.generator");
Route::get("complete/add",[SongController::class,"complete_add"])->name("complete.add");
Route::post("complete/store",[SongController::class,"complete_store"]);

Route::get("song/edit/{id}",[SongController::class,"edit"]);
Route::post("song/update/{id}",[SongController::class,"update"]);
Route::get("song/delete/{id}",[SongController::class,"destroy"]);

//contact message route
Route::get("contact/messages",[ContactController::class,"index"])->name("contact.messages")->middleware('auth');
Route::post("contact/store",[ContactController::class,"store"]);
Route::get("contact/delete/{id}",[ContactController::class,"destroy"]);

//dmin genre
Route::get("genre/all",[GenreController::class,"index"])->name("all.genre");
Route::get("genre/create",[GenreController::class,"create"])->name("add.genre");
Route::post("genre/add",[GenreController::class,"store"])->name("store.genre");
Route::get("genre/edit/{id}",[GenreController::class,"edit"]);
Route::post("genre/update/{id}",[GenreController::class,"update"]);
Route::get("genre/delete/{id}",[GenreController::class,"destroy"]);

//admin artist
Route::get("artist/all",[ArtistController::class,"index"])->name("all.artist");
Route::get("artist/create",[ArtistController::class,"create"])->name("add.artist");
Route::post("artist/add",[ArtistController::class,"store"])->name("store.artist");
Route::get("artist/edit/{id}",[ArtistController::class,"edit"]);
Route::post("artist/update/{id}",[ArtistController::class,"update"]);
Route::get("artist/delete/{id}",[ArtistController::class,"destroy"]);

//admin advert
Route::get("advert/all",[AdvertController::class,"index"])->name("all.advert");
Route::get("advert/create",[AdvertController::class,"create"])->name("add.advert");
Route::post("advert/add",[AdvertController::class,"store"])->name("store.advert");
Route::get("advert/edit/{id}",[AdvertController::class,"edit"]);
Route::post("advert/update/{id}",[AdvertController::class,"update"]);
Route::get("advert/delete/{id}",[AdvertController::class,"destroy"]);

//user logout customize
Route::get("user/logout",function(){
    Auth::logout();
    return redirect()->route('login')->with("success","logout successfully");
})->name("user.logout");
