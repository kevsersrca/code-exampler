@extends('layouts.app')

@section('title' , '| Create New Post')

@section('content')
    <form action="{{route('post.store')}}" method="post">
        {{ csrf_field() }}
        <div class="container">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" value="{{old('title')}}" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Explanation</label>
                <textarea value="{{old('explanation')}}" name="explanation" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Usage</label>
                <textarea type="text" value="{{old('usage')}}" name="usage" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Code Example</label>
                <textarea type="text" value="{{old('codeexample')}}" name="codeexample" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-default btn-block">Create</button>
            </div>
        </div>
    </form>
@endsection