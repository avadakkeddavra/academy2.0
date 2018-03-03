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
Route::get('/news','NewsController@index')->name('news');
Route::post('/news','NewsController@index')->name('news.post');
Route::post('/news/search','NewsController@search')->name('news.search');
Route::get('/news/{new}','NewsController@single')->name('new.single');
Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/admin','AdminController@index')->name('admin');
	Route::post('/admin','AdminController@index')->name('admin.post');
	Route::get('/admin/materials/{type}','AdminController@materials')->name('admin.materials');
	Route::get('/admin/materials/news/{id}','AdminController@update')->name('admin.materials.update');
	Route::get('/admin/teachers','AdminController@teachers')->name('admin.teachers');
	// News operations
	Route::get('/create/{type}','AdminController@creation')->name('creation');
	Route::post('/admin/delete','AdminController@delete')->name('materials.delete');
	Route::post('/admin/update','AdminController@update')->name('materials.update');
	Route::post('/admin/restore','AdminController@restore')->name('materials.restore');
	Route::post('/admin/uploadNewsImg','AdminController@upload')->name('new.upload');


	// Creation
	Route::post('/admin/create', 'AdminController@create')->name('creation');
});
