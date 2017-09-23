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

Route::group(['prefix'=>'user','middleware'=>'userLogin'],function (){
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

    Route::get('/groups-show','GroupController@index')->name('showGroup');
    Route::get('/groups-create','GroupController@getAdd')->name('getAddGroup');
    Route::post('groups-create','GroupController@postAdd')->name('postAddGroup');
    Route::get('/groups-delete/{id}','GroupController@delete')->name('deleteGroup');
    Route::get('/groups-edit/{id}','GroupController@getEdit')->name('getEditGroup');
    Route::post('/groups-edit/{id}','GroupController@postEdit')->name('postEditGroup');

    Route::get('/groups-me', 'CategoriesPageController@getPostGroupMe')->name('getPostGroupMe');
    Route::post('groups-me','CategoriesPageController@getPostGroupMe')->name('postPostGroupMe');
    Route::get('/groups-id', 'CategoriesPageController@getPostGroupId')->name('getPostGroupId');
    Route::post('groups-id','CategoriesPageController@getPostGroupId')->name('postPostGroupId');
    Route::get('/groups-category', 'CategoriesPageController@getPostGroupCategory')->name('getPostGroupCategory');
    Route::post('groups-category','CategoriesPageController@getPostGroupCategory')->name('postPostGroupCategory');

    Route::group(['prefix'=>'ajax'],function (){
       Route::get('/group/{id_category}','AjaxController@getListGroup')->name('ajaxGroup');
    });
});

Route::group(['prefix' => 'facebook'], function () {
    Route::get('login','FacebookController@facebookLogin')->name('login');
    Route::get('login-callback', 'FacebookController@facebookLoginCallback');
    Route::get('logout', 'FacebookController@facebookLogout')->name('logout');
});
