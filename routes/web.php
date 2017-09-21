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

Route::get('/','HomeController@index')->name('home');

Route::group(['prefix'=>'user','middleware'=>'auth'],function (){
    Route::get('/pages-show','PageController@index')->name('showPage');
    Route::get('/pages-create','PageController@getAdd')->name('getAddPage');
    Route::post('pages-create','PageController@postAdd')->name('postAddPage');
    Route::get('/pages-delete/{id}','PageController@delete')->name('deletePage');
    Route::get('/pages-edit/{id}','PageController@getEdit')->name('getEditPage');
    Route::post('/pages-edit/{id}','PageController@postEdit')->name('postEditPage');

    Route::get('/pages', 'CategoriesPageController@getPostPage')->name('getPostPage');
    Route::post('/pages','CategoriesPageController@getPostPage')->name('postPostPage');
    Route::post('/get-access-token-page','CategoriesPageController@getAccessTokenPage')->name('getAccessTokenPage');

    Route::get('/reset','CategoriesPageController@reset')->name('reset');

    Route::get('/groups', 'CategoriesPageController@getPostGroup')->name('getPostGroup');
    Route::post('groups','CategoriesPageController@getPostGroup')->name('postPostGroup');
});

Route::group(['prefix' => 'facebook'], function () {
    Route::get('login','FacebookController@facebookLogin')->name('login');
    Route::get('login-callback', 'FacebookController@facebookLoginCallback');
    Route::get('logout', 'FacebookController@facebookLogout')->name('logout');
});
