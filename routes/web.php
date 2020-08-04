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
    return view('welcome'); // '/' adalah url yang mengarahkan aktor ke view welcome
});

Route::get('/logout', function () {  // menampilkan url logout
    Auth::logout(); //menggunakan function logout

    return redirect('/login'); //redirect setelah logout kembali ke form login
});
Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){ // Middleware berfungsi sebagai menyediakan mekanisme penyaringan HTTP request yang masuk ke aplikasi anda atau dengan kata lain setiap kali ada request yang masuk maka akan difilter oleh Middleware.
																			// sedangkan checkrole:admin/siswa berfungsi sebagai pengecekan aktor bahwa dia login sebagai apa (admin/user,siswa)
	Route::get('/items','ItemController@index'); // '/items' adalah url dengan method get yang mengarahkan admin/siswa ke function index yang ada di ItemController
	Route::get('/items/create','ItemController@create'); //  '/items/create' adalah url dengan method get yang mengarahkan admin/siswa ke function create yang ada di ItemController
	Route::post('/items','ItemController@store'); // '/items' adalah url dengan method post yang mengarahkan admin/siswa ke function create yang ada di ItemController 
	Route::get('/Items/{id}/edit','ItemController@edit'); // '/items/{id}/edit' adalah url dengan method get yang mengarahkan admin/siswa ke function edit yang ada di ItemController 
	Route::post('/Items/{id}/update','ItemController@update'); // '/items/{id}/update' adalah url dengan method post yang mengarahkan admin/siswa ke function update yang ada di ItemController 

	Route::delete('/Items/{id}','ItemController@destroy'); // '/items/{id}' adalah url dengan method delete yang mengarahkan admin/siswa ke function delete yang ada di ItemController 

	Route::delete('/items/{id}','ItemController@destroy'); // '/items/{id}' adalah url dengan method delete yang mengarahkan admin/siswa ke function delete yang ada di ItemController 

	Route::get('/Borrows','BorrowController@index'); // '/borrows' adalah url dengan method get yang mengarahkan admin/siswa ke function index yang ada di BorrowController 
	Route::get('/Borrows/{id}','BorrowController@PinjamBarang'); // '/borrows/{id}' adalah url dengan method get yang mengarahkan admin/siswa ke function PinjamBarang yang ada di BorrowController 
});

Route::group(['middleware' => ['auth','checkRole:admin']],function(){ // Middleware berfungsi sebagai menyediakan mekanisme penyaringan HTTP request yang masuk ke aplikasi anda atau dengan kata lain setiap kali ada request yang masuk maka akan difilter oleh Middleware.
																	//checkrole:admin 
	Route::get('/Students','StudentController@index'); // '/students' adalah url dengan method get yang mengarahkan admin ke function index yang ada di StudentController
	Route::get('/Students/create','StudentController@create'); // '/students/create' adalah url dengan method get yang mengarahkan admin ke function create yang ada di StudentController
	Route::post('/Students/store','StudentController@store'); // '/students/store' adalah url dengan method post yang mengarahkan admin ke function store yang ada di StudentController

});
Auth::routes(); // yaitu class helper yang nge generate semua route untuk authentikasi


Route::get('/home', 'HomeController@index')->name('home'); // "/home" adalah url setelah login dengan method get yang mengarahkan admin/user,siswa ke function index yang ada di HomeController

Route::get('/Borrow_item','BorrowitemController@index');
Route::get('/Borrow_item/{id}/borrow','BorrowitemController@borrow'); 
Route::post('/Borrow_item/{id}/save','BorrowitemController@save'); 

Route::get('/home', 'HomeController@index')->name('home'); // "/home" adalah url setelah login dengan method get yang mengarahkan admin/user,siswa ke function index yang ada di HomeController

