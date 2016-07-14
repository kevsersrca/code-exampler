<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    //get user's posts
    public function index()
    {
        $post=\Auth::user()->posts()->get();
        return view('post.posts',compact('post'));
    }
    //post delete method
    public function show($id)
    {
        $post =Post::find($id);
        $post->tags()->detach();
        $post->languages()->detach();
        $post->delete();
        return view('home')->with('status','Deleted');
    }


}
