@extends('layouts.app')

@section('title' , '| Post View')

@section('content')
        <div class="well">
            <h1 class="list-group-item-heading text-center">
                <div class="clearfix">{{$row->title}}</div>
            </h1>
            <h3 class="list-group-item-text">Post Explanation:
                <div class="clearfix well">{{$row->explanation}}</div>
            </h3>
            <h3 class="list-group-item-text">Post Usage:
                <div class="clearfix well">{{$row->usage}}</div>
            </h3>
            <h3 class="list-group-item-text">Code Example:
                <div class="clearfix well">{{$row->codeexample}}</div>
            </h3>
            <a href="{{route('post.edit',$row->id)}}" class="btn btn-success">Edit</a>
        </div>
@endsection