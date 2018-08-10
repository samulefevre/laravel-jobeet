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

Route::get('/', 'JobController@index');
Route::get('/job/', 'JobController@list');
Route::get('/job/{company}/{location}/{id}/{position}', 'JobController@show')->name('job.show');
Route::get('/job/{id}/edit', 'JobController@edit')->name('job.edit');

Route::get('/category/{slug}/{page}', 'CategoryController@show')->name('category.show');