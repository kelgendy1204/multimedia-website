<?php

Route::get('/', 'PostsController@index');
Route::get('/{postdesc}', 'PostsController@show')->name('postshome');

Route::get('/admin/posts/create', 'PostsController@create');
Route::get('/admin/posts/{post}/edit', 'PostsController@edit');
Route::post('/admin/posts/{post}/update', 'PostsController@update');
Route::get('/admin/posts', 'PostsController@adminindex');
Route::post('/admin/posts', 'PostsController@store');

Route::get('/{postdesc}/تحميل مباشر', 'DownloadlinksController@show')->name('download');

Route::get('/admin/posts/{postid}/download/create', 'DownloadlinksController@create')->name('createdownloadlink');
Route::post('/admin/posts/{postid}/download/create', 'DownloadlinksController@store')->name('storedownloadlink');
Route::get('/admin/posts/{postid}/download/{downloadlinkid}/edit', 'DownloadlinksController@edit')->name('editdownloadlink');
Route::post('/admin/posts/{postid}/download/{downloadlinkid}/edit', 'DownloadlinksController@update')->name('updatedownloadlink');
Route::post('/admin/posts/{postid}/download/{downloadlinkid}/delete', 'DownloadlinksController@delete')->name('deletedownloadlink');

Route::get('/{postdesc}/مشاهدة مباشرة/{subposttitle}', 'SubpostsController@show')->name('online');

Route::get('/admin/posts/{post}/online/create', 'SubpostsController@create');
Route::post('/admin/posts/{post}/online/create', 'SubpostsController@store');
Route::get('/admin/posts/{post}/online/{subpost}/edit', 'SubpostsController@edit');
Route::post('/admin/posts/{post}/online/{subpost}/edit', 'SubpostsController@update');
Route::post('/admin/posts/{post}/online/{subpost}/delete', 'SubpostsController@delete');

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

Route::get('/generatelink/{hash}', 'LinksController@generate');
Route::get('/getlink/{hash}', 'LinksController@translate');
