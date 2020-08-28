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

	return view('auth.login');
});

Route::get('/logout', function () {
	Auth::logout();

	return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/items', 'ItemController@index');
	Route::get('/items/create', 'ItemController@create');
	Route::post('/items', 'ItemController@store');
	Route::get('/items/show/{id}', 'ItemController@show');

	Route::get('/items/{id}/edit', 'ItemController@edit');
	Route::post('/items/{id}/update', 'ItemController@update');
	Route::delete('/items/{id}', 'ItemController@destroy');


	Route::get('/Borrows', 'BorrowController@index');
	Route::get('/Borrows/{id}', 'BorrowController@borrowItem');
	Route::delete('/Borrow/{id}', 'BorrowController@destroy');

	Route::get('/Borrow_item', 'BorrowitemController@index');
	Route::get('/Borrow_item/{id}/borrow', 'BorrowitemController@borrow');
	Route::post('/Borrow_item/{id}/save', 'BorrowitemController@save');

	Route::get('/restore/{id}', 'BorrowitemController@restore');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

	Route::get('/Students', 'StudentController@index');
	Route::get('/Students/create', 'StudentController@create');
	Route::post('/Students', 'StudentController@store');
	Route::delete('/Students/{id}', 'StudentController@destroy');

	Route::get('/restore', 'BorrowController@history');

	Route::get('/print', 'BorrowController@print');

	Route::get('/Borrows/{id}/verified', 'BorrowitemController@verified');
});



Route::get('/licensor', 'LicensorController@index');
	Route::get('/licensor/create', 'LicensorController@create');
	Route::post('/licensor/create', 'LicensorController@store');
	Route::get('/licensor/{id}', 'LicensorController@edit');
	Route::post('/licensor/{id}/update', 'LicensorController@update');
	Route::delete('/licensor/{id}', 'LicensorController@destroy');







// Route::get('/history/{id}','BorrowController@history');
