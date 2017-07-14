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

Route::get('/', 'GallaryController@index');

Route::resource('gallary', 'GallaryController');


Route::get('/photo/search','PhotoController@search')->name('photo.search');
Route::get('gallary/show/{id}', 'GallaryController@show')->name('gallary.show');
Route::get('photo/create/{id}', 'PhotoController@create');
Route::get('photo/details/{id}', 'PhotoController@details')->name('photo.details');
Route::get('gallaries', 'GallaryController@gallaries')->name('gallaries');
Route::get('/public', 'GallaryController@publicGallary')->name('public.gallary');
Route::get('/delete/{id}', 'GallaryController@delete')->name('galary.delete');
Route::get('/deletephoto/{id}', 'PhotoController@deletePhoto')->name('photo.delete');
Route::get('/createtag', 'PhotoController@showCreateTagForm')->name('photo.tag');
Route::post('/createtag', 'PhotoController@storeTag');

Route::resource('photo', 'PhotoController');
Auth::routes();

Route::get('/home', 'HomeController@index');
