<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

use App\Http\Requests;
class LanguageController extends Controller
{
    public function index()
    {
        $language=Language::all();
        return view('language.index',compact('language'));
    }

    public function store(Request $request)
    {
        Language::create($request->all());
        return back()->with('status','Language Created!');
    }

    public function show($id)
    {
        $language = Language::find($id);
        $language->posts()->detach();
        $language->delete();
        return redirect()->back()->with('status','Deleted');
    }

}
