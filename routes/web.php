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

Route::get('/keluar', function () {
    Auth::logout();

    return redirect('/login');
});

Route::get('/daftar-barang','BarangController@index');
Route::get('/daftar-barang/add','BarangController@add');
Route::post('/daftar-barang/store','BarangController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');