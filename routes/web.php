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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('export', 'ResiController@export')->name('export');
Route::get('resi','ResiController@index')->name('resi');
Route::post('import','ResiController@import')->name('import');
Route::get('resi/fetch_data','ResiController@fetch_data')->name('fetch_data');
Route::post('resi/fetch_data_f','ResiController@fetch_data_f')->name('fetch_data_f');
