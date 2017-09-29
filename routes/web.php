<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::resource('users', 'UserController');
});
