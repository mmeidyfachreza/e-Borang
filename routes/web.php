<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

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

Route::get('/','indexController@index');
Route::post('/','indexController@search')->name('guest.search');

Route::middleware(['Khusus:admin'])->group(function () {
    Route::resource('admin/kategori-dokumen', 'KatDokumenController');
    Route::resource('admin/user', 'userController');
    Route::get('admin','adminController@index')->name('admin.dashboard');
    Route::post('/user','userController@search')->name('user.search');
    //Route::resource('admin/dokumen', 'DokumenController');
});

Route::middleware(['Khusus:operator|admin'])->group(function () {
    Route::get('/operator','operatorController@index')->name('operator.dashboard');
    Route::get('dokumen/','FileController@index')->name('files.indexfile');
    Route::get('dokumen/tambahfile','FileController@create')->name('files.create');
    Route::get('dokumen/{id}','FileController@show');
    Route::post('dokumen/simpanfile','FileController@store')->name('files.store');
    Route::get('dokumen/edit/{id}','FileController@edit')->name('files.edit');
    Route::post('dokumen/edit/{id}','FileController@update')->name('files.update');
    Route::get('dokumen/hapus/{id}','FileController@destroy')->name('files.hapus');
});

Route::middleware(['Khusus:admin|operator|dosen'])->group(function () {
    Route::get('dokumen/{uuid}/download','FileController@download')->name('files.download');    
});


Route::get('/tes', function () {
    return view('auth.login2');
});


