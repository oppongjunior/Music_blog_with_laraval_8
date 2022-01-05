<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Owenoj\LaravelGetId3\GetId3;
use Image;
use File;
use ParagonIE\ConstantTime\Hex;

class SongController extends Controller
{
    ///contructor function to activate the authentication middle ware for this class
    public function __construct()
    {
        $this->middleware('auth');
    }

    //show the admin all songs page
    public function index()
    {
        $songs = Songs::latest()->paginate(20);
        return view("admin.Songs.songs", ["songs" => $songs]);
    }

    //show the crate a song page
    public function create()
    {
        return view('admin.Songs.addsong');
    }

    //show the generate a song's data page
    public function generator()
    {
        return view("admin.Songs.generator");
    }

    //process and view a song mete data
    public function song_proccessor(Request $request)
    {
        $validate = $request->validate([
            'track.*' => 'required|mimes:mp3,flac,wav,wma,acc|size:30000000'
        ]);

        $track_file = $request->file('track');
        $track = GetId3::fromUploadedFile(request()->file('track'));

        if ($track->getArtwork(true)) {
            $image_file = $track->getArtwork(true);
            $title = $track->getTitle();
            $composer = $track->getArtist();
            $genres = $track->getGenres();
            $album = $track->getAlbum();
            $artist = $track->getArtist();

            $unique_id = hexdec(uniqid());
            $image_ext = "jpg";

            $image_name = $unique_id . '.' . $image_ext;
            $location = "images/temp/";
            $saved_image = $location . $image_name;
            Image::make($image_file)->resize(700, 700)->save($saved_image);

            //save track file in a temporary folder
            $track_ext = strtolower($track_file->getClientOriginalExtension());
            $track_name = $unique_id . "." . $track_ext;
            $track_location = "songs/temp/";
            $track_file->move($track_location, $track_name);

            //get genres
            $genre = "";
            foreach ($genres as $item) {
                $genre .= $item;
            }


            return view("admin.Songs.save", ["title" => $title, "composer" => $composer, "genre" => $genre, "album" => $album, "artist" => $artist, "image" => $image_name, "track" => $track_name]);
        }

        // display in view
        return redirect("song/create")->with("success", "This audio has no metedata, please enter the data manually");
    }

    //view the save song form
    public function complete_add()
    {
        return view("admin.Songs.save");
    }

    //store generated data
    public function complete_store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            "summary" => "required|max:300",
            "category" => "required|max:255",
            'description' => 'required|max:10000',
            'image.*' => 'mimes:png,jpg,jpeg',
            "genre" => 'required|max:255',
            "producer" => 'required|max:255',
            "tags" => 'required|max:255',
            "composer" => 'required|max:255',
        ]);

        if ($request->file("image")) {
            $image_file = $request->file("image");
            $image_name = hexdec(uniqid());
            $image_ext = strtolower($image_file->getClientOriginalExtension());

            $image_name = $image_name . '.' . $image_ext;
            $location = "images/tracks/";
            $saved_image = $location . $image_name;

            //upload image with image intervention
            Image::make($image_file)->resize(700, 700)->save($saved_image);
            unlink("images/temp/" . $request->input("old_image"));
        } else {
            //move image
            $location = "images/tracks/";
            $saved_image = $location . $request->input("old_image");
            File::move("images/temp/" . $request->input("old_image"), $saved_image);
        }

        //move track to the permenent folder
        $track_location = "songs/tracks/";
        $saved_track = $track_location . $request->input("track");
        File::move("songs/temp/" . $request->input("track"), $saved_track);

        //insert
        $song = new Songs();
        $song->title = $request->input('title');
        $song->summary = $request->input('summary');
        $song->category = $request->input('category');
        $song->genre = $request->input('genre');
        $song->composer = $request->input('composer');
        $song->producer = $request->input('producer');
        $song->tags = $request->input('tags');
        $song->verified = 0;
        $song->track = "songs/tracks/" . $request->input("track");
        $song->uploader = Auth::user()->id;
        $song->description = $request->input('description');
        $song->image = $saved_image;
        $song->save();

        return redirect('song/all')->with("success", "song inserted successfully");
    }
    //store song
    public function store(Request $request)
    {
        //validate data
        $validate = $request->validate([
            'title' => 'required|max:255',
            "summary" => "required|max:300",
            "category" => "required|max:255",
            'description' => 'required|max:10000',
            'image.*' => 'required|mimes:png,jpg,jpeg',
            "genre" => 'required|max:255',
            "composer" => 'required|max:255',
            "producer" => 'required|max:255',
            "tags" => 'required|max:255',
            'track.*' => 'required|mimes:mp3,flac,wav,wma,acc|size:30000000'
        ]);

        //create a unique name;
        $unique_id = hexdec(uniqid());

        //process and upload image
        $image_file = $request->file("image");
        $image_ext = strtolower($image_file->getClientOriginalExtension());
        $image_name = $unique_id . '.' . $image_ext;
        $location = "images/tracks/";
        $saved_image = $location . $image_name;
        //upload image with image intervention


        if (Image::make($image_file)->resize(700, 700)->save($saved_image)) {
            //process and upload track
            $track_file = $request->file("track");
            $track_ext = strtolower($track_file->getClientOriginalExtension());
            $track_name = $unique_id . "." . $track_ext;
            $track_location = "songs/tracks/";
            $saved_track = $track_location . $track_name;
            //File::move($track_location, $saved_track);
            $track_file->move(public_path('/songs/tracks'), $track_name);
        }




        //insert into database
        $song = new Songs();
        $song->title = $request->input('title');
        $song->summary = $request->input('summary');
        $song->category = $request->input('category');
        $song->genre = $request->input('genre');
        $song->composer = $request->input('composer');
        $song->producer = $request->input('producer');
        $song->tags = $request->input('tags');
        $song->track = $saved_track;
        $song->verified = 0;
        $song->uploader = Auth::user()->id;
        $song->description = $request->input('description');
        $song->image = $saved_image;
        $song->save();

        return redirect('song/all')->with("success", "song inserted successfully");
    }



    //show the about edit page
    public function edit($id)
    {
        $song = Songs::find($id);
        $genres = Genre::all();
        return view("admin.Songs.editsong", ['song' => $song,"genres"=>$genres]);
    }

    //update edit
    public function update(Request $request, $id)
    {
        //validate
        $validate = $request->validate([
            'title' => 'required|max:255',
            "summary" => "required|max:300",
            "category" => "required|max:255",
            'description' => 'required|max:10000',
            'image.*' => 'mimes:png,jpg,jpeg',
            "genre" => 'required|max:255',
            "composer" => 'required|max:255',
            "producer" => 'required|max:255',
            "tags" => 'required|max:255',
            "verified" => "required|max:255",
        ]);

        //process image in change
        $new_image = $request->input('old_image');
        if ($request->file('image')) {
            $image_file = $request->file("image");
            $image_name = hexdec(uniqid());
            $image_ext = strtolower($image_file->getClientOriginalExtension());

            $image_name = $image_name . '.' . $image_ext;
            $location = "images/tracks/";
            $saved_image = $location . $image_name;
            unlink($request->input('old_image'));

            //upload image with image intervention
            Image::make($image_file)->resize(700, 700)->save($saved_image);

            $new_image = $saved_image;
        }

        //update the database
        $song = Songs::find($id);
        $song->title = $request->input('title');
        $song->summary = $request->input('summary');
        $song->category = $request->input('category');
        $song->genre = $request->input('genre');
        $song->composer = $request->input('composer');
        $song->producer = $request->input('producer');
        $song->tags = $request->input('tags');
        $song->verified = $request->input("verified");
        $song->uploader = Auth::user()->id;
        $song->description = $request->input('description');
        $song->image = $new_image;
        $song->save();


        return redirect('song/all')->with("success", "Song updated successfully");
    }


    //delete
    public function destroy($id)
    {

        $song = Songs::find($id);
        $track_image = $song->image;
        $track = $song->track;

        unlink($track_image);
        unlink($track);

        Songs::find($id)->delete();
        return redirect('song/all')->with("success", "Song deleted successfully");
    }
}
