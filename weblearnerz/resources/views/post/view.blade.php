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
            @if(\Auth::user()->id==$row->user_id)
            <a href="{{route('post.edit',$row->id)}}" class="btn btn-success">Edit</a>
            <a href="javascript:;" data-href="{{ route('posts.show',$row->id) }}"  class="btn btn-danger delete-confirm">Delete</a>
            @endif
    </div>

    <div class="panel-body">
        <form method="post" action="{{route('comment.store')}}">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $row->id }}">
            <div class="form-group">
                <textarea required="required" placeholder="Enter comment here" name = "comment" class="form-control"></textarea>
            </div>
            <input type="submit" name='add' class="btn btn-success" value = "Sent"/>
        </form>
    </div>
    <div>
        @if($comments)
            <ul style="list-style: none; padding: 0">
                @foreach($comments as $comment)
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{App\User::find($comment->user_id)->name}}</h3>
                        </div>
                        <div class="panel-body">
                            <p>{{ $comment->comment }}</p>
                            @if(\Auth::user()->id==$comment->user_id)
                            <a href="javascript:;" data-href="{{ route('comment.show',$comment->id) }}"  class="btn btn-link delete-confirm btn-block pull-right">Delete</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>

@endsection
@section("scripts")
    <script>
        $(document).ready(function() {
            $('.delete-confirm').click(function(event) {
                if(confirm('Are you sure?'))
                {
                    location = $(this).data('href');
                }
            });
        });
    </script>
@stop

