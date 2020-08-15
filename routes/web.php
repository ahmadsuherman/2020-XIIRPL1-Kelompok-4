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
Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){ 
																			
	Route::get('/items','ItemController@index');
	Route::get('/items/create','ItemController@create'); 
	Route::post('/items','ItemController@store'); 

	Route::get('/Items/show/{id}','ItemController@show');

	Route::get('/Items/{id}/edit','ItemController@edit'); 
	Route::post('/Items/{id}/update','ItemController@update');  
	Route::delete('/Items/{id}','ItemController@destroy'); 
	Route::delete('/items/{id}','ItemController@destroy'); 
	Route::get('/Borrows','BorrowController@index'); 
	Route::get('/Borrows/{id}','BorrowController@borrowItem'); 
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/Borrow_item','BorrowitemController@index'); 
	Route::get('/Borrow_item/{id}/borrow','BorrowitemController@borrow');  
	Route::post('/Borrow_item/{id}/save','BorrowitemController@save'); 
	Route::delete('/Borrow/{id}','BorrowController@destroy');

	Route::get('/home', 'HomeController@index')->name('home'); 

});

Route::group(['middleware' => ['auth','checkRole:admin']],function(){ 
																	
	Route::get('/Students','StudentController@index'); 
	Route::get('/Students/create','StudentController@create');
	Route::post('/Students','StudentController@store');
	Route::delete('/Students/{id}','StudentController@destroy');

});
Auth::routes();


Route::get('/restore/{id}','BorrowitemController@restore');

Route::get('/restore','BorrowitemController@history');

Route::get('/Borrows/{id}','BorrowitemController@verified');

