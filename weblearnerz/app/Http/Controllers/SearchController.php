<?php

namespace App\Http\Controllers;

use App\Language;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function getSearch()
    {
        $tag=Tag::all();
        $language=Language::all();
        $post=Post::orderBy('id','desc')->paginate(10);
        return view('search.view',compact('tag','language','post'));
    }
   public function getRedirect()
   {
       $search=urlencode(e(Input::get('search')));
       $route="search/$search";
       return redirect($route);
   }
    public function search($search)
    {
        $tag=Tag::all();
        $language=Language::all();
        $search=urldecode($search);
        $post=Post::select()
            ->where('title','LIKE','%'.$search.'%')
            ->orWhere('explanation','LIKE','%'.$search.'%')
            ->orWhere('usage','LIKE','%'.$search.'%')
            ->orWhere('codeexample','LIKE','%'.$search.'%')
            ->orderBy('id','desc')
            ->get();
        if(count($post)==0){
            return view('search.result',compact('tag','language','search'));
        }
        else{
            return view('search.result',compact('tag','language','search','post'));
        }
    }
}
