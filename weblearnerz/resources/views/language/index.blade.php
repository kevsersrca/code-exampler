
@extends('layouts.app')

@section('title' , '| All Languages')

@section('content')
    <div class="row">
        @if (session('status'))
            <ul class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <li>{{ session('status') }}</li>
            </ul>
        @endif
        <div class="col-md-8">
            <h1>Languages</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($language as $languages)
                    <tr>
                        <th>{{ $languages->id }}</th>
                        <td>{{ $languages->name }}</td>
                        <td>{{$languages->posts()->count()}} Post</td>
                        <td><a href="javascript:;" data-href="{{ route('language.show',$languages->id) }}"  class="btn btn-warning delete-confirm">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                <form action="{{route('language.store')}}" method="post">
                    {{csrf_field()}}
                    <h2>New Language</h2>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Language Name" required>
                    </div>
                    <button class="btn btn-success btn-block btn-h1-spacing">Create</button>
                </form>
            </div>
        </div>
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
