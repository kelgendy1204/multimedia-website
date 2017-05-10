<?php

Route::get('/', 'PostsController@index');

Route::get('/admin/posts/create', 'PostsController@create');
Route::get('/admin/posts/{post}/edit', 'PostsController@edit');
Route::post('/admin/posts/{post}/update', 'PostsController@update');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/download', 'PostsController@download');
Route::get('/posts/{post}/online', 'PostsController@online');
Route::post('/admin/posts', 'PostsController@store');

Route::get('/admin/categories/create', 'CategoriesController@create');
Route::post('/admin/categories', 'CategoriesController@store');

Route::get('/admin/mzk_admin_login', 'AdminController@login');
Route::post('/admin/mzk_admin_login', 'AdminController@authUser');
Route::get('/admin/mzk_admin_adduser', 'AdminController@addUser');
Route::post('/admin/mzk_admin_adduser', 'AdminController@storeUser');
Route::get('/admin/mzk_admin_panel', 'AdminController@index');
Route::post('/admin/mzk_admin_logout', 'AdminController@logout');

Route::get('/admin/links/create', 'LinksController@create');
Route::post('/admin/links', 'LinksController@store');
Route::get('/getlink/{hash}', 'LinksController@translate');
