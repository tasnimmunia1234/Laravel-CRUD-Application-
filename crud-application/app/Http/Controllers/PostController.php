<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }


    public function ourstore(Request $request){
      $validated = $request->validate([
       'name' => 'required',
       'email' => 'required|email|unique:posts,email',
       'description' => 'required',
       'image' => 'required|mimes:jpeg,png',

      ]);
      //upload image
      $imageName = time().'.'.$request->image->extension();
      $request -> image->move(public_path('image'),$imageName);
      //new post
        $post = new Post;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();
        
        return redirect()->route('home')->with('success', 'Your post successfully created!');
    }

    public function editData($id){
        $post = Post::findOrFail($id);
        return view('edit',['ourPost' => $post]);
    }
    
    public function updateData($id,Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png',
     
           ]);
           //upload image
           $imageName = time().'.'.$request->image->extension();
           $request -> image->move(public_path('image'),$imageName);
          
           $post = Post::findOrFail($id);
             $post->name = $request->name;
             $post->email = $request->email;
             $post->description = $request->description;
             $post->image = $imageName;
     
             $post->save();
             
             return redirect()->route('home')->with('success', 'Your post successfully Upadated!');

    }

    //public function deleteData($id){
       // $post = Post::findOrFail($id);
      //  $post->delete();
        
    //}
    public function deleteData($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Your post delete!');
    }
}

