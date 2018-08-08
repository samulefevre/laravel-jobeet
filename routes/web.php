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
    return view('layout');
});

Route::get('/job/', 'JobController@list');
Route::get('/job/{id}/show', 'JobController@show')->name('job.show');
Route::get('/job/{id}/edit', 'JobController@edit')->name('job.edit');