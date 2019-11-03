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

Route::get('admin/tambalban', 'Admin\TambalBanController@index')->name('admin/tambalban');
Route::get('admin/tambalban/tambah', 'Admin\TambalBanController@create')->name('admin/tambalban/tambah');
Route::post('admin/tambalban/simpan', 'Admin\TambalBanController@store')->name('admin/tambalban/simpan');
Route::get('admin/tambalban/sunting/{id}', 'Admin\TambalBanController@edit')->name('admin/tambalban/ubah/{id}');
Route::post('admin/tambalban/perbarui/{id}', 'Admin\TambalBanController@update')->name('admin/tambalban/perbarui/{id}');
Route::get('admin/tambalban/detail/{id}', 'Admin\TambalBanController@show');
Route::get('admin/tambalban/hapus/{id}', 'Admin\TambalBanController@destroy')->name('admin/tambalban/hapus/{id}');
