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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PegawaiController@index');
Route::get('/pegawai/export_excel', 'PegawaiController@export_excel');
Route::post('/pegawai/import_excel', 'PegawaiController@import_excel');