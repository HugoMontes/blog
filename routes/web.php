<?php

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('users', 'UserController', ['except' => 'show']);
        Route::resource('categories', 'CategoryController', ['except' => 'show']);
        Route::resource('tags', 'TagController', ['except' => 'show']);
        Route::resource('articles', 'ArticlesController', ['except' => 'show']);
        Route::get('images', 'ImageController@index')->name('images.index');
    });
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
