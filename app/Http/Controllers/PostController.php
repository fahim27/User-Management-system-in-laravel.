<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){

      $posts=Post::all();
       return view('post.index',\compact('posts'));
   }
   public function create(){

    return view('post.create');
   }


public function store(Request $request){

    Post::insert([
    'title'=>$request->title,

    'description'=>$request->description
    ]);

    return redirect()->route('post.index')->with('message','Post Add successfully');
}

  public function edit($id){
     
     $post=Post::find($id);
     return view('post.edit',\compact('post'));

}
}
