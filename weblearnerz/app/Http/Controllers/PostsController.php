<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{

    public function index()
    {
        $post=\Auth::user()->posts()->get();
        return view('post.posts',compact('post'));
    }

    public function show($id)
    {
        $post=Post::findOrFail($id)->delete();
        return redirect()->route('post.index');
    }


}
