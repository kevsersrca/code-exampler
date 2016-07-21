<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{

    public function index()
    {
        $tag=Tag::all();
        return view('tag.index',compact('tag'));
    }

    public function store(Request $request)
    {
        Tag::create($request->all());
        return back()->with('status','Tag Created!');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->back()->with('status','Deleted');
    }

}
