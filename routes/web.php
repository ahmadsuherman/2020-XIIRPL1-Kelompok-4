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

Route::get('/logout', function () {
    Auth::logout();

    return redirect('/login');
});
Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){
	Route::get('/items','ItemController@index');
	Route::get('/items/create','ItemController@create');
	Route::post('/items','ItemController@store');
	Route::get('/Items/{id}/edit','ItemController@edit');
	Route::post('/Items/{id}/update','ItemController@update');
	Route::delete('/items/{id}','ItemController@destroy');
	Route::get('/Borrows','BorrowController@index');
	Route::get('/Borrows/{id}','BorrowController@PinjamBarang');
});

Route::group(['middleware' => ['auth','checkRole:admin']],function(){
	Route::get('/Students','StudentController@index');
	Route::get('/Students/create','StudentController@create');
	Route::post('/Students/store','StudentController@store');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');