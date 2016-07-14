@extends('layouts.app')

@section('title' , '| Your Post')

@section('content')
    <table class="table table-striped table-hover ">
        @if (session('status'))
            <ul class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <li>{{ session('status') }}</li>
            </ul>
        @endif
        <thead>
        <tr class="active">
            <td>Title</td>
            <td>Explanation</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($post as $row)
            <tr class="active">
                <td><a href="{{route('post.show',$row->id)}}" class="btn btn-link">{{$row->title}}</a></td>
                <td><a href="{{route('post.show',$row->id)}}" class="btn btn-link">{{$row->explanation}}</a></td>
                <td>
                    @if(\Auth::user()->id==$row->user_id)
                        <a href="javascript:;" data-href="{{ route('posts.show',$row->id) }}"  class="btn btn-default delete-confirm">Delete</a>
                        <a href="{{route('post.edit',$row->id)}}" class="btn btn-info">EDIT</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
