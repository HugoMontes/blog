<?php

Route::get('/', function () {
    return view('welcome');
    // return __('auth.failed');
});

Route::prefix('admin')->group(function () {
    Route::resource('users', 'UserController', ['except' => 'show']);
    Route::resource('categories', 'CategoryController', ['except' => 'show']);
});
