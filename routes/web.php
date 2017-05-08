<?php

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/download', 'PostsController@download');
Route::get('/posts/{post}/online', 'PostsController@online');
Route::post('/posts', 'PostsController@store');

Route::get('/categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');

Route::get('/mzk_admin_login', 'AdminController@login');
Route::post('/mzk_admin_login', 'AdminController@authUser');
Route::get('/mzk_admin_adduser', 'AdminController@addUser');
Route::post('/mzk_admin_adduser', 'AdminController@storeUser');
Route::get('/mzk_admin_panel', 'AdminController@index');
Route::post('/mzk_admin_logout', 'AdminController@logout');

Route::get('/links/create', 'LinksController@create');
Route::post('/links', 'LinksController@store');
Route::get('/getlink/{hash}', 'LinksController@translate');
