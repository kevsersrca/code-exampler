<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    //store comment method
    public function store(Request $request)
    {
        $input['user_id'] =$request->user()->id;
        $input['post_id'] = $request->input('post_id');
        $input['comment'] = $request->input('comment');
        Post::find($request->input('post_id'))->comments()->create( $input );
        return back()->with('status', 'Comment added');
    }


    //Delete comment method
    public function show($id)
    {
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('status','Deleted');
    }

}
