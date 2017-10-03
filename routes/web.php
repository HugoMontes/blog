<?php

Route::get('/', 'FrontController@index');
Route::get('categories/{category}', 'FrontController@searchCategory')->name('search.category');
Route::get('tags/{tag}', 'FrontController@searchTag')->name('search.tag');
Route::get('articles/{slug}', 'FrontController@viewArticle')->name('view.article');

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

