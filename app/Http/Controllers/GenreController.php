<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;


class GenreController extends Controller
{
        //
    //contructor function to activate the authentication middle ware for this class
    public function __construct(){
        $this->middleware('auth');
    }
 
    public function index()
    {
        $genre = Genre::latest()->paginate(10);
        return view('admin.Genre.genre',["genre" => $genre]);
    }

    //create genre
    public function create(){
        return view('admin.Genre.addgenre');
    }


    //store genre
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            "name"=>"required|max:255",
        ]);

       
        $genre = new Genre();
        $genre->title = $request->input('title');
        $genre->name = $request->input('name');
        $genre->verified = 0;
        $genre->save();

        return redirect('genre/all')->with("success", "genre inserted successfully");
    }

    //show the genre edit page
    public function edit($id){
        $genre = Genre::find($id);
        return view('admin.Genre.editgenre',['genre'=>$genre]);
    }

    //update genre
    public function update(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required|max:500',
            "name"=>"required|max:300",
            "verified"=>"required|max:255",
        ]);

        $genre = Genre::find($id);
        $genre->title = $request->input('title');
        $genre->name = $request->input('name');
        $genre->verified = $request->input('verified');
        $genre->save();

        return redirect('genre/all')->with("success", "genre updated successfully");

    }


    //delete genre
    public function destroy($id){

        $genre = Genre::find($id)->delete();
        return redirect('genre/all')->with("success", "genre deleted successfully");
    }
}
