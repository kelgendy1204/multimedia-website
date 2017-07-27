<?php

Route::get('/', 'PostsController@index')->name('home');
Route::get('/{postdesc}', 'PostsController@show')->name('showpost');
Route::get('/{postdesc}/alt/{num}', 'PostsController@showalt')->name('showaltpost');

Route::get('/admin/posts/create', 'PostsController@create')->name('createpost');
Route::get('/admin/posts/{post}/edit', 'PostsController@edit');
Route::post('/admin/posts/{post}/update', 'PostsController@update');
Route::get('/admin/posts', 'PostsController@adminindex')->name('showadminposts');
Route::post('/admin/posts', 'PostsController@store');
Route::post('/admin/posts/{postid}/delete', 'PostsController@delete')->name('deletepost');
Route::get('/admin/posts/{categoryname}', 'PostsController@adminindexbycategory')->name('adminpostsbycategory');
// ========================================= //

Route::get('/{postdesc}/تحميل مباشر', 'DownloadlinksController@show')->name('download');

Route::get('/admin/posts/{postid}/download/create', 'DownloadlinksController@create')->name('createdownloadlink');
Route::post('/admin/posts/{postid}/download/create', 'DownloadlinksController@store')->name('storedownloadlink');
Route::get('/admin/posts/{postid}/download/{downloadlinkid}/edit', 'DownloadlinksController@edit')->name('editdownloadlink');
Route::post('/admin/posts/{postid}/download/{downloadlinkid}/edit', 'DownloadlinksController@update')->name('updatedownloadlink');
Route::post('/admin/posts/{postid}/download/{downloadlinkid}/delete', 'DownloadlinksController@delete')->name('deletedownloadlink');
// ========================================= //

Route::get('/{postdesc}/مشاهدة مباشرة/{subposttitle}', 'SubpostsController@show')->name('online');

Route::get('/admin/posts/{post}/online/create', 'SubpostsController@create')->name('storesubpost');
Route::post('/admin/posts/{post}/online/create', 'SubpostsController@store');
Route::get('/admin/posts/{post}/online/{subpost}/edit', 'SubpostsController@edit')->name('editsubpost');
Route::post('/admin/posts/{post}/online/{subpost}/edit', 'SubpostsController@update');
Route::post('/admin/posts/{post}/online/{subpost}/delete', 'SubpostsController@delete');
// ========================================= //
Route::get('/{postdesc}/استماع مباشر/{playlisttitle}', 'PlaylistController@show')->name('playlist');

Route::get('/admin/posts/{post}/playlist/create', 'PlaylistController@create')->name('createplaylist');
Route::post('/admin/posts/{post}/playlist/create', 'PlaylistController@store')->name('storeplaylist');
Route::post('/admin/posts/{post}/playlist/{playlist}/delete', 'PlaylistController@delete')->name('deleteplaylist');
Route::get('/admin/posts/{post}/playlist/{playlist}/edit', 'PlaylistController@edit')->name('editplaylist');
Route::post('/admin/posts/{post}/playlist/{playlist}/edit', 'PlaylistController@update')->name('updateplaylist');
// ========================================= //

Route::get('/category/{categoryname}', 'CategoriesController@index')->name('postsbycategory');

Route::get('/admin/categories', 'CategoriesController@adminindex')->name('showcategories');
Route::get('/admin/categories/create', 'CategoriesController@create')->name('createcategory');
Route::post('/admin/categories', 'CategoriesController@store')->name('storecategory');
Route::get('/admin/categories/{category}/edit', 'CategoriesController@edit')->name('editcategory');
Route::post('/admin/categories/{category}/edit', 'CategoriesController@update')->name('updatecategory');
// ========================================= //

Route::get('/admin/mzk_admin_login', 'AdminController@login');
Route::post('/admin/mzk_admin_login', 'AdminController@authUser');
Route::get('/admin/mzk_admin_adduser', 'AdminController@addUser');
Route::post('/admin/mzk_admin_adduser', 'AdminController@storeUser');
Route::get('/admin/mzk_admin_panel', 'AdminController@index');
Route::post('/admin/mzk_admin_logout', 'AdminController@logout');
// ========================================= //
Route::get('/generatelink/{hash}', 'LinksController@generate');
Route::get('/getlink/{hash}', 'LinksController@translate');

Route::get('/admin/links/create', 'LinksController@create');
Route::post('/admin/links', 'LinksController@store');

// ================================================ //

Route::get('/admin/metadata', 'MetadataController@index')->name('metadata');
Route::post('/admin/metadata', 'MetadataController@save')->name('editmetadata');