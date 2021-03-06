@extends('layouts.app')
@section('title','| Search')
@section('style')
    <style>
        div a
        {
            color:black;
            float: left;
        }
        .panel-body{display: none;}
    </style>
@endsection
@section('content')
    @if (session('status'))
        <ul class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <li>{{ session('status') }}</li>
        </ul>
    @endif
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{url('/searchredirect')}}" role="search">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="search" placeholder="Search" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm center-block"><i class=" glyphicon glyphicon-search"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
                <h3>Tags</h3>
                @foreach($tag as $tags)
                    <input type="checkbox" name="tag[]"  value="{{$tags->name}}" >{{$tags->name}}
                    <div class="clearfix">
                        <hr>
                    </div>

                @endforeach
                <h3>Languages</h3>
                @foreach($language as $languages)
                     <input type="checkbox" name="tag[]"  value="{{$languages->name}}" >{{$languages->name}}
                    <div class="clearfix">
                        <hr>
                    </div>
                @endforeach
        </div>
        <div class="col-md-9 content">
            <h4>Results:{{$search}}</h4>
            @if(isset($post))
                @foreach($post as $posts)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $posts->title }}</h3>
                        </div>
                        <div class="panel-body">
                            <p><b>Explanation:</b><pre>{{ $posts->explanation }}</pre></p>
                            <p><b>Usage:</b><pre>{{ $posts->usage }}</pre></p>
                            <p><b>Code Example:</b><pre>{{ $posts->codeexample }}</pre></p>
                            <label for="Tags"><b>Tags:</b></label>
                            <pre>
                                @foreach($posts->tags as $tag)
                                    <a href="">{{ $tag->name }},</a>
                                @endforeach
                            </pre>
                            <label for="Languages"><b>Languages:</b></label>
                            <pre>
                               @foreach($posts->languages as $languages)
                                    <a href="">{{ $languages->name }},</a>
                                @endforeach
                            </pre>
                            <h3>Comments</h3>
                            <div class="comment">
                                <form method="post" action="{{route('comment.store')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                    <div class="form-group">
                                        <textarea required="required" placeholder="Enter comment here" name = "comment" class="form-control" required></textarea>
                                    </div>
                                    <input type="submit" name='add' class="btn btn-success" value = "Sent"/>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".content").on('click','.panel-heading',function(){
                $(".panel-body").slideUp("slow");
                var el = $(this).parent(".panel-default").children(".panel-body");
                el.css('display') == 'block' ?  el.slideUp('slow') : el.slideDown('slow')
            });
        });
    </script>
@endsection
