<?php

use Yajra\DataTables\DataTables;
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
    // Route::get('/konten', 'KontenController@getIndex')->name('data.konten');
    Route::get('/konten', 'KontenController@getIndex')->name('data.konten');
    Route::get('/konten-data', 'KontenController@anyData')->name('getdata.konten');
    // Route::get('konten3', function(DataTables $dataTables) {
    //     $model = App\Konten::query();

    //     return $dataTables->eloquent($model)->toJson();
    // })->name('json.konten');
    // Route::controller('konten', 'KontenController', [
    //     'anyData'  => 'datatables.data',
    //     'getIndex' => 'datatables',
    // ]);

    Route::get('/form-konten', 'KontenController@showForm')->name('form.konten');
    Route::post('/add-konten', 'KontenController@addKonten')->name('add.konten');

    Route::get('/detail-konten/{data}', 'KontenController@detailKonten')->name('detail.konten');
    Route::delete('/delete/{konten}', 'KontenController@deleteKonten')->name('delete.konten');

    Route::get('/edit-konten/{konten}/edit', 'KontenController@editKonten')->name('edit.konten');
    Route::put('/edit-konten/{data}', 'KontenController@updateKonten')->name('update.konten');

    Route::get('/konten/cari','KontenController@searchKonten')->name('search.konten');

    Route::get('/role','RoleController@index')->name('role.view');

});


Route::prefix('/apj')->group(function () {
    Route::get('/', 'ApjController@index')->name('data.apj');

    Route::get('/form-apj', 'ApjController@showForm')->name('form.apj');
    Route::post('/add-apj', 'ApjController@create')->name('add.apj');

    Route::get('/detail-apj/{data}', 'ApjController@detail')->name('detail.apj');
    Route::delete('/delete/{apj}', 'ApjController@destroy')->name('delete.apj');

    Route::get('/edit-apj/{apj}/edit', 'ApjController@edit')->name('edit.apj');
    Route::put('/edit-apj/{data}', 'ApjController@update')->name('update.apj');

    Route::get('/apj/cari','ApjController@search')->name('search.apj');
});
