@extends('layouts.app')

@section('title' , '| Edit Post')

@section('content')
    <form action="{{route('post.update',$update->id)}}" method="post">
        {{ csrf_field() }}
        {{method_field('put')}}
        <div class="container">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" value="{{$update->title}}" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Explanation</label>
                <textarea name="explanation" class="form-control">{{$update->explanation}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Usage</label>
                <textarea type="text"  name="usage" class="form-control">{{$update->usage}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Code Example</label>
                <textarea type="text"  name="codeexample" class="form-control">{{$update->codeexample}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-default btn-block">Update</button>
            </div>
        </div>
    </form>
@endsection