<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Comment;

class PostController extends Controller
{
    //post all view
    public function index()
    {
        $post=Post::all();
        return view('post.index',compact('post'));
    }
    // get post create view
    public function create()
    {
        $language=Language::get();
        $tag=Tag::get();
        return view('post.create',compact('language'),compact('tag'));
    }
    //post store
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->user_id=$request->user()->id;
        $post->title = $request->title;
        $post->explanation = $request->explanation;
        $post->usage = $request->usage;
        $post->codeexample = $request->codeexample;
        $post->save();
        $post->languages()->sync($request->langs, false);
        $post->tags()->sync($request->tags, false);
        return redirect()->back()->with('status','Post Created!');
    }
    //Post only view
    public function show($id)
    {
        $comments = Post::findOrFail($id)->comments()->get();
        $row = Post::findOrFail($id);
        return view('post.view',compact('row','comments'));
    }
    //get edit page
    public function edit($id)
    {
        $language=Language::get();
        $tag=Tag::get();
        $update =\Auth::user()->posts()->findOrFail($id);
        return view('post.edit', compact('update','language','tag'));
    }
    //update post method
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->user_id=$request->user()->id;
        $post->title = $request->title;
        $post->explanation = $request->explanation;
        $post->usage = $request->usage;
        $post->codeexample = $request->codeexample;
        $post->save();
        if (isset($request->tags)) { $post->tags()->sync($request->tags);} else {$post->tags()->sync(array());}
        if (isset($request->langs)) {$post->languages()->sync($request->langs);} else {$post->languages()->sync(array());}
        return redirect()->back()->with('status','Post Updated!');
    }

}
