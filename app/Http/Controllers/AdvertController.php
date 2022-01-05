<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
class AdvertController extends Controller
{
    //
    //contructor function to activate the authentication middle ware for this class
    public function __construct(){
        $this->middleware('auth');
    }
 
    public function index()
    {
        $advert = Advert::latest()->paginate(5);
        return view('admin.Advert.advert',["advert" => $advert]);
    }

    //create slider
    public function create(){
        return view('admin.Advert.addadvert');
    }


    //store slider
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            "summary"=>"required|max:300",
            'description' => 'required|max:10000',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image_file = $request->file("image");
        $image_name = hexdec(uniqid());
        $image_ext = strtolower($image_file->getClientOriginalExtension());

        $image_name = $image_name . '.' . $image_ext;
        $location = "images/advert/";
        $saved_image = $location . $image_name;


        //upload image with image intervention
        Image::make($image_file)->resize(400, 500)->save($saved_image);


        //upload image
        //$image_file->move($location, $image_name);


        //insert
        $advert = new Advert();
        $advert->title = $request->input('title');
        $advert->summary = $request->input('summary');
        $advert->uploader = Auth::user()->id;
        $advert->verified = 0;
        $advert->description = $request->input('description');
        $advert->image = $saved_image;
        $advert->save();

        return redirect('advert/all')->with("success", "advert inserted successfully");
    }

    //show the about edit page
    public function edit($id){
        $advert = Advert::find($id);
        return view('admin.Advert.editadvert',['advert'=>$advert]);
    }

    //update about
    public function update(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required|max:500',
            "summary"=>"required|max:300",
            "verified"=>"required|max:255",
            'description' => 'required|max:10000',
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $new_image = $request->input('old_image');
        if ($request->file('image')) {
            $image_file = $request->file("image");
            $image_name = hexdec(uniqid());
            $image_ext = strtolower($image_file->getClientOriginalExtension());

            $image_name = $image_name . '.' . $image_ext;
            $location = "images/advert/";
            $saved_image = $location . $image_name;
            unlink($request->input('old_image'));

            //upload image with image intervention
            Image::make($image_file)->resize(400, 500)->save($saved_image);

            $new_image = $saved_image;
        }

        $advert = Advert::find($id);
        $advert->title = $request->input('title');
        $advert->description = $request->input('description');
        $advert->summary = $request->input('summary');
        $advert->verified = $request->input('verified');
        $advert->uploader = Auth::user()->id;
        $advert->image = $new_image;
        $advert->save();

        return redirect('advert/all')->with("success", "advert updated successfully");

    }


    //delete slider
    public function destroy($id){

        $advert = Advert::find($id);
        $advert = $advert->image;
        unlink($advert);
        Advert::find($id)->delete();
        return redirect('advert/all')->with("success", "advert deleted successfully");
    }
}
