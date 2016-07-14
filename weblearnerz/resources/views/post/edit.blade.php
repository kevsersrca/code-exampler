@extends('layouts.app')

@section('title' , '| Edit Post')

@section('content')
    <form action="{{route('post.update',$update->id)}}" method="post">
        {{ csrf_field() }}
        {{method_field('put')}}
        <div class="container">
            @if (session('status'))
                <ul class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <li>{{ session('status') }}</li>
                </ul>
            @endif
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
                    <label for="Languages">Languages (click ctrl for multiple) </label>
                    <select class="form-control select2-multi1" name="langs[]" multiple="multiple">
                        @foreach($language as $languages)
                            <option value='{{ $languages->id }}'>{{ $languages->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Tags">Tags (click ctrl for multiple) </label>
                    <select class="form-control select2-multi2" name="tags[]" multiple="multiple">
                        @foreach($tag as $tags)
                            <option value='{{ $tags->id }}'>{{ $tags->name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <button class="btn btn-default btn-block">Update</button>
            </div>
        </div>
    </form>
@endsection
