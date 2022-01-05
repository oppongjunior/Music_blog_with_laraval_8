<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Image;

class ArtistController extends Controller
{
        //contructor function to activate the authentication middle ware for this class
        public function __construct(){
            $this->middleware('auth');
        }
     
        public function index()
        {
            $artist = Artist::latest()->paginate(5);
            return view('admin.Artist.artist',["artist" => $artist]);
        }
    
        //create slider
        public function create(){
            return view('admin.Artist.addartist');
        }
    
    
        //store slider
        public function store(Request $request)
        {
            $validate = $request->validate([
                'name' => 'required|max:255',
                "summary"=>"required|max:300",
                "type"=>"required|max:255",
                'description' => 'required|max:10000',
                'image' => 'required|mimes:png,jpg,jpeg',
                "genre"=>"required|max:255",
                "country"=>"required|max:255"
                
            ]);
    
            $image_file = $request->file("image");
            $image_name = hexdec(uniqid());
            $image_ext = strtolower($image_file->getClientOriginalExtension());
    
            $image_name = $image_name . '.' . $image_ext;
            $location = "images/artist/";
            $saved_image = $location . $image_name;
    
    
            //upload image with image intervention
            Image::make($image_file)->resize(400, 500)->save($saved_image);
    
    
            //upload image
            //$image_file->move($location, $image_name);
    
    
            //insert
            $artist = new Artist();
            $artist->name = $request->input('name');
            $artist->summary = $request->input('summary');
            $artist->type = $request->input('type');
            $artist->description = $request->input('description');
            $artist->country = $request->input("country");
            $artist->genre = $request->input("genre");
            $artist->verified = 0;
            $artist->image = $saved_image;
            $artist->save();
    
            return redirect('artist/all')->with("success", "artist inserted successfully");
        }
    
        //show the about edit page
        public function edit($id){
            $artist = Artist::find($id);
            return view('admin.Artist.editartist',['artist'=>$artist]);
        }
    
        //update about
        public function update(Request $request, $id){
            $validate = $request->validate([
                'name' => 'required|max:255',
                "summary"=>"required|max:300",
                "type"=>"required|max:255",
                'description' => 'required|max:10000',
                'image' => 'mimes:png,jpg,jpeg',
                "genre"=>"required|max:255",
                "country"=>"required|max:255",
                "verified"=>"required|max:255"
            ]);
    
            $new_image = $request->input('old_image');
            if ($request->file('image')) {
                $image_file = $request->file("image");
                $image_name = hexdec(uniqid());
                $image_ext = strtolower($image_file->getClientOriginalExtension());
    
                $image_name = $image_name . '.' . $image_ext;
                $location = "images/artist/";
                $saved_image = $location . $image_name;
                unlink($request->input('old_image'));
    
                //upload image with image intervention
                Image::make($image_file)->resize(400, 500)->save($saved_image);
    
                $new_image = $saved_image;
            }
    
            $artist = Artist::find($id);
            $artist->name = $request->input('name');
            $artist->summary = $request->input('summary');
            $artist->type = $request->input('type');
            $artist->description = $request->input('description');
            $artist->country = $request->input("country");
            $artist->genre = $request->input("genre");
            $artist->verified = $request->input("verified");
            $artist->image = $new_image;
            $artist->save();
    
            return redirect('artist/all')->with("success", "artist updated successfully");
    
        }
    
    
        //delete slider
        public function destroy($id){
    
            $artist = Artist::find($id);
            $artist = $artist->image;
            unlink($artist);
            Artist::find($id)->delete();
            return redirect('artist/all')->with("success", "artist deleted successfully");
        }
}
