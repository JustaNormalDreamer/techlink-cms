<?php

use Illuminate\Support\Facades\Route;


//routes for categories
Route::resource('categories', 'CategoryController')->except(['show']);

//routes for posts
Route::resource('posts', 'PostController')->except(['show']);

