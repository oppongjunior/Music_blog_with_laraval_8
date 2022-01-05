<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BlogController extends Controller
{
    //
    //contructor function to activate the authentication middle ware for this class
    public function __construct(){
        $this->middleware('auth');
    }
 
    public function index()
    {
        $blog = Blog::latest()->paginate(5);
        return view('admin.Blog.blog',["blog" => $blog]);
    }

    //create slider
    public function create(){
        return view('admin.Blog.addblog');
    }


    //store slider
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            "summary"=>"required|max:300",
            "category"=>"required|max:255",
            'description' => 'required|max:10000',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image_file = $request->file("image");
        $image_name = hexdec(uniqid());
        $image_ext = strtolower($image_file->getClientOriginalExtension());

        $image_name = $image_name . '.' . $image_ext;
        $location = "images/blogs/";
        $saved_image = $location . $image_name;


        //upload image with image intervention
        Image::make($image_file)->resize(700, 525)->save($saved_image);


        //upload image
        //$image_file->move($location, $image_name);


        //insert
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->summary = $request->input('summary');
        $blog->category = $request->input('category');
        $blog->author = Auth::user()->id;
        $blog->description = $request->input('description');
        $blog->image = $saved_image;
        $blog->save();

        return redirect('blog/all')->with("success", "blog inserted successfully");
    }

    //show the about edit page
    public function edit($id){
        $blog = Blog::find($id);
        return view('admin.Blog.editblog',['blog'=>$blog]);
    }

    //update about
    public function update(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required|max:500',
            "summary"=>"required|max:300",
            "category"=>"required|max:255",
            'description' => 'required|max:10000',
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $new_image = $request->input('old_image');
        if ($request->file('image')) {
            $image_file = $request->file("image");
            $image_name = hexdec(uniqid());
            $image_ext = strtolower($image_file->getClientOriginalExtension());

            $image_name = $image_name . '.' . $image_ext;
            $location = "images/blogs/";
            $saved_image = $location . $image_name;
            unlink($request->input('old_image'));

            //upload image with image intervention
            Image::make($image_file)->resize(700, 525)->save($saved_image);

            $new_image = $saved_image;
        }

        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->summary = $request->input('summary');
        $blog->category = $request->input('category');
        $blog->author = Auth::user()->id;
        $blog->image = $new_image;
        $blog->save();

        return redirect('blog/all')->with("success", "blog updated successfully");

    }


    //delete slider
    public function destroy($id){

        $blog = Blog::find($id);
        $blog = $blog->image;
        unlink($blog);
        Blog::find($id)->delete();
        return redirect('blog/all')->with("success", "blog deleted successfully");
    }
}
