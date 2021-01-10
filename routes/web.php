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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/konten', 'KontenController@index')->name('data.konten');

    Route::get('/form-konten', 'KontenController@showForm')->name('form.konten');
    Route::post('/add-konten', 'KontenController@addKonten')->name('add.konten');

    Route::get('/detail-konten/{data}', 'KontenController@detailKonten')->name('detail.konten');
    Route::delete('/delete/{konten}', 'KontenController@deleteKonten')->name('delete.konten');

    Route::get('/edit-konten/{konten}/edit', 'KontenController@editKonten')->name('edit.konten');
    Route::put('/edit-konten/{data}', 'KontenController@updateKonten')->name('update.konten');

    Route::get('/konten/cari','KontenController@searchKonten')->name('search.konten');
    
});
