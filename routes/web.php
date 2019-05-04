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

Route::get('/mahasiswa', function(){
	return 'Ini halaman mahasiswa';
});

Route::get('/kelas', ['middleware' => 'auth', 'uses' => 'KelasController@index']);
Route::get('/kelas', ['middleware' => 'auth', 'uses' => 'KelasController@index']);
Route::get('/kelas/new', ['middleware' => 'auth', 'uses' => 'KelasController@create']);
Route::post('/kelas/new', ['middleware' => 'auth', 'uses' => 'KelasController@store']);
Route::get('/kelas/edit/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@edit']);
Route::post('/kelas/edit/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@update']);
Route::delete('/kelas/delete/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@destroy']);
Route::get('/kelas/lihat/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@lihat']);
Auth::routes();
Route::get('/tugas/index/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@index']);
Route::post('/tugas/new/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@store']);
Route::get('/tugas/lihat/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@lihat']);
Route::get('/file/{file_tugas}','DownloadsController@download');
Route::get('/murid/index/{id}',['middleware' => 'auth', 'uses' => 'MuridController@index']);
Route::get('/murid/create/{id}',['middleware' => 'auth', 'uses' => 'MuridController@create']);
Route::get('/murid/new/{id}',['middleware' => 'auth', 'uses' => 'MuridController@store']);
Route::get('/home', 'HomeController@index')->name('home');