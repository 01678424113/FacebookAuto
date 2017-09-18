<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/pages','CategoriesPageController@getPostPage')->name('getPostPage');
Route::get('/groups','CategoriesPageController@getPostGroup')->name('getPostGroup');
