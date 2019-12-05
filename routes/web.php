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

//admin

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\DashboardController@index')->name('admin');

Route::get('admin/tambalban', 'Admin\TambalBanController@index')->name('admin/tambalban');
Route::get('admin/tambalban/tambah', 'Admin\TambalBanController@create')->name('admin/tambalban/tambah');
Route::post('admin/tambalban/simpan', 'Admin\TambalBanController@store')->name('admin/tambalban/simpan');
Route::get('admin/tambalban/sunting/{id}', 'Admin\TambalBanController@edit')->name('admin/tambalban/ubah/{id}');
Route::post('admin/tambalban/perbarui/{id}', 'Admin\TambalBanController@update')->name('admin/tambalban/perbarui/{id}');
Route::get('admin/tambalban/detail/{id}', 'Admin\TambalBanController@show');
Route::get('admin/tambalban/hapus/{id}', 'Admin\TambalBanController@destroy')->name('admin/tambalban/hapus/{id}');
Route::post('admin/tambalban/update_foto', 'Admin\TambalBanController@update_foto')->name('admin/tambalban/update_foto');

Route::post('admin/tambalban/jam_operasional/simpan', 'Admin\JamOperasionalController@store')->name('admin/tambalban/jam_operasional/simpan');
Route::get('admin/tambalban/jam_operasional/hapus/{id}', 'Admin\JamOperasionalController@destroy')->name('admin/tambalban/jam_operasional/hapus/{id}');
Route::get('admin/tambalban/jam_operasional/sunting/{id}', 'Admin\JamOperasionalController@edit')->name('admin/tambalban/jam_operasional/sunting/{id}');
Route::post('admin/tambalban/jam_operasional/perbarui/', 'Admin\JamOperasionalController@update')->name('admin/tambalban/jam_operasional/perbarui/');


//Route::get('admin/tambalban/{id}/jam_operasional/hapus/{id}', [
//'as' => 'admin/tambalban/', 'uses' => 'Toko\KategoriController@destroy']);

//web enduser
//Route::get('web', 'WebController@depan')->name('web');
//Route::post('peta', 'WebController@peta')->name('peta');

//web enduser
Route::get('web', 'WebController@depan');
//Route::post('peta', 'WebController@test');
Route::get('peta', 'WebController@test');
Route::get('peta2', 'WebController@peta');
Route::get('peta/daftarlokasi', 'WebController@daftar');
Route::get('peta/cari', 'WebController@cari');
// Route::post('peta', 'WebController@peta')->name('peta');