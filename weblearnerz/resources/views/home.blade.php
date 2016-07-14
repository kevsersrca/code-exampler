@extends('layouts.app')
@section('title','| Home')
@section('content')
    @if (session('status'))
        <ul class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <li>{{ session('status') }}</li>
        </ul>
    @endif
    <div class="jumbotron">
        <h1>Welcome to Laravel-Blog</h1>
        <pre>
            This is a simple laravel-blog.
            Properties:
                -Post Add-Update-Delete
                -User register-activation-login-forgotten password-reset password
                -Comment Add-Delete
                -Language Add-Delete
                -Post attach Language and detach
                -Tags Add-Delete
                -Post attach Tag and detach
            Usage Programming Tools
                -Html
                -Css
                -Bootstrap
                -Jquery
                -Mysql
                -Laravel
        </pre>
    </div>
@endsection
