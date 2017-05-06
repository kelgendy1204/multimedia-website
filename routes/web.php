<?php

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/download', 'PostsController@download');
Route::get('/posts/{post}/online', 'PostsController@online');
Route::post('/posts', 'PostsController@store');

Route::get('/categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');

Auth::routes();

Route::get('/mzk_admin_area', 'AdminController@index');
