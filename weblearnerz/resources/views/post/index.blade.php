@extends('layouts.app')

@section('title' , '| Post')

@section('content')
    <table class="table table-striped table-hover ">
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
                    <a href="javascript:;" data-href="{{ route('posts.show',$row->id) }}"  class="btn btn-default delete-confirm">Delete</a>
                    <a href="{{route('post.edit',$row->id)}}" class="btn btn-info">EDIT</a>
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
