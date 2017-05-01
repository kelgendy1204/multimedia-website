<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');


Route::get('/categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');
