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


Route::get('/kelas', ['middleware' => 'auth', 'uses' => 'KelasController@index']);
Route::get('/kelas/new', ['middleware' => 'auth', 'uses' => 'KelasController@create']);
Route::post('/kelas/new', ['middleware' => 'auth', 'uses' => 'KelasController@store']);
Route::get('/kelas/edit/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@edit']);
Route::post('/kelas/edit/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@update']);
Route::delete('/kelas/delete/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@destroy']);
Route::get('/kelas/lihat/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@lihat']);
Route::get('/kelas/post/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@post']);
Route::post('/kelas/post/{id}', ['middleware' => 'auth', 'uses' => 'KelasController@post']);
Route::post('/kelas/cari', ['middleware' => 'auth', 'uses' => 'KelasController@cari']);
Route::post('/kelas/rating', ['middleware' => 'auth', 'uses' => 'KelasController@rating']);

Route::get('/kelassaya', ['middleware' => 'auth', 'uses' => 'KelassayaController@index']);

Auth::routes();
Route::get('/tugas/index/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@index']);
Route::post('/tugas/new/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@store']);
Route::get('/tugas/lihat/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@lihat']);
Route::get('/tugas/daftar/{id}', ['middleware' => 'auth', 'uses' => 'TugasController@daftar']);

Route::get('/tugas/upload/{id}', ['middleware' => 'auth', 'uses' => 'UploadController@index']);
Route::post('/tugas/upload/{id}', ['middleware' => 'auth', 'uses' => 'UploadController@store']);
Route::get('/file/{file_tugas}','DownloadsController@download');

Route::get('/murid/index/{id}',['middleware' => 'auth', 'uses' => 'MuridController@index']);
Route::get('/murid/create/{id}',['middleware' => 'auth', 'uses' => 'MuridController@create']);
Route::get('/murid/new/{id}',['middleware' => 'auth', 'uses' => 'MuridController@store']);
Route::post('/murid/new/{id}',['middleware' => 'auth', 'uses' => 'MuridController@store']);

Route::get('/profile',['middleware' => 'auth', 'uses' => 'ProfileController@index']);
Route::get('/profile/lihat/{id}',['middleware' => 'auth', 'uses' => 'ProfileController@indexlihat']);
Route::get('/profile/edit/{id}',['middleware' => 'auth', 'uses' => 'ProfileController@edit']);
Route::post('/profile/edit/{id}',['middleware' => 'auth', 'uses' => 'ProfileController@update']);
Route::get('/profile/editakun/{id}',['middleware' => 'auth', 'uses' => 'ProfileController@editakun']);
Route::post('/profile/editakun/{id}',['middleware' => 'auth', 'uses' => 'ProfileController@updateakun']);

Route::get('/kelassaya', ['middleware' => 'auth', 'uses' => 'KelassayaController@index']);
Route::get('/kelassaya/lihat/{id}', ['middleware' => 'auth', 'uses' => 'KelassayaController@lihat']);


Route::post('/home/cari', ['middleware' => 'auth', 'uses' => 'HomeController@cari']);
Route::get('/home', 'HomeController@index')->name('home');
