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
        $post=Post::orderBy('id','desc')->paginate(10);
        $language=Language::all();
        return view('search.view',compact('tag','post','language'));
    }

    public function search(Requests\SearchRequest $request)
    {
        $tag=Tag::all();
        $language=Language::all();
        $search=urlencode(e($request->search));
        $collection = Post::query();
        if($request->has('search'))
        {
            $collection=$this->postSearch($search,$collection);
        }
        if($request->has('tag'))
        {
            $collection = $this->tagSearch($request->tag,$collection);
        }
        if($request->has('language'))
        {
            $collection = $this->languageSearch($request->language,$collection);
        }
        
        $collection = $collection->get();
        return view('search.view',compact('tag','search','collection','language'));
    }
    //postSearch method
    public function postSearch($search,$collection)
    {
        $collection=$collection->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('explanation','LIKE','%'.$search.'%')
                ->orWhere('usage','LIKE','%'.$search.'%')
                ->orWhere('codeexample','LIKE','%'.$search.'%')
                ->orderBy('id','desc');
        });
        return $collection;
    }
    //tagSearch method
    public function tagSearch($tag,$collection)
    {
        $collection = $collection->whereHas('tags', function ($query) use ($tag) {
            $query->whereIn('tag_id', $tag);
        });
        return $collection;
    }
    //languageSearch method
    public function languageSearch($language,$collection)
    {
        $collection = $collection->where(function ($q) use ($language) {
            $q->whereIn('language_id', $language)
                ->orderBy('id','desc');
        });
        return $collection;
    }
}
