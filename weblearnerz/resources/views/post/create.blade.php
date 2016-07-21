@extends('layouts.app')

@section('title' , '| Create New Post')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection
@section('content')
    <form action="{{route('post.store')}}" method="post">
        {{ csrf_field() }}
        <div class="container">
            @if (session('status'))
                <ul class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <li>{{ session('status') }}</li>
                </ul>
            @endif
            <div class="form-group">
                <label for="">Title<span style="color: red">*</span></label>
                <input type="text" value="{{old('title')}}" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Explanation<span style="color: red">*</span></label>
                <textarea value="{{old('explanation')}}" name="explanation" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Usage<span style="color: red">*</span></label>
                <textarea type="text" value="{{old('usage')}}" name="usage" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Code Example<span style="color: red">*</span></label>
                <textarea type="text" value="{{old('codeexample')}}" name="codeexample" class="form-control" required></textarea>
            </div>
                <div class="form-group">
                    <label for="Languages">Languages (click ctrl for multiple) </label>
                    <select class="form-control select2-multi" name="langs[]" multiple="multiple">
                        @foreach($language as $languages)
                            <option value='{{ $languages->id }}'>{{ $languages->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Tags">Tags (click ctrl for multiple) </label>
                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach($tag as $tags)
                            <option value='{{ $tags->id }}'>{{ $tags->name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <button class="btn btn-default btn-block">Create</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection