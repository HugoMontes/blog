<?php

Route::get('/', 'FrontController@index');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('users', 'UserController', ['except' => 'show']);
        Route::resource('categories', 'CategoryController', ['except' => 'show']);
        Route::resource('tags', 'TagController', ['except' => 'show']);
        Route::resource('articles', 'ArticlesController', ['except' => 'show']);
        Route::get('images', 'ImageController@index')->name('images.index');
    });
});

Auth::routes();

