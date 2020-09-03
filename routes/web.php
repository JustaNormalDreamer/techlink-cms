<?php

use Illuminate\Support\Facades\Route;


Route::resource('categories', 'CategoryController');

Route::resource('posts', 'PostController');