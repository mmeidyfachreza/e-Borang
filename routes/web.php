<?php
use Illuminate\Support\Facades\Route;

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

Route::get('/','indexController@index');

Route::get('/tes', function () {
    return view('layouts.eborang2');
});

Route::middleware(['Khusus:admin'])->group(function () {
    Route::resource('admin/kategori-dokumen', 'KatDokumenController');
    //Route::resource('admin/dokumen', 'DokumenController');
});


//Route::resource('books', 'FileController');

Route::get('operator/indexfile','FileController@index')->name('operator.indexfile');
Route::get('operator/tambahfile','FileController@create');
Route::get('operator/{id}','FileController@show');
Route::post('operator/simpanfile','FileController@store');
Route::get('operator/edit/{id}','FileController@edit')->name('files.edit');
Route::post('operator/edit/{id}','FileController@update')->name('files.update');
Route::get('operator/hapus/{id}','FileController@destroy')->name('files.hapus');

Route::get('files/{uuid}/download', 'FileController@download')->name('files.download');


Route::get('/operator','operatorController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
