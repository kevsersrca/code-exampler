<?php



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
    Route::get('/home', 'HomeController@index');
    Route::get('/','HomeController@index');
    Route::resource('post','PostController');
    Route::resource('posts', 'PostsController', ['only' => ['show']]);
});


