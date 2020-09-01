<?php

use Illuminate\Http\Request;
use App\Borrow;
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

	Route::get('/borrows', 'BorrowController@index');
	Route::delete('/borrow/{id}', 'BorrowController@destroy');

	Route::get('/borrow_item', 'BorrowitemController@index');
	Route::get('/borrow_item/{id}/borrow', 'BorrowitemController@borrow');
	Route::post('/borrow_item/{id}/save', 'BorrowitemController@save');
	Route::get('/restore/{id}', 'BorrowitemController@restore');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

	Route::get('/students', 'StudentController@index');
	Route::get('/students/create', 'StudentController@create');
	Route::post('/students', 'StudentController@store');
	Route::delete('/students/{id}', 'StudentController@destroy');

	Route::get('/restore', 'BorrowController@history');
	Route::get('/print', 'BorrowController@print');

	Route::get('/borrows/{id}/verified', 'BorrowitemController@verified');
	Route::get('/lost/{id}', 'BorrowitemController@lost');

	Route::get('/licensor', 'LicensorController@index');
	Route::get('/licensor/create', 'LicensorController@create');
	Route::post('/licensor/create', 'LicensorController@store');
	Route::get('/licensor/{id}', 'LicensorController@edit');
	Route::post('/licensor/{id}/update', 'LicensorController@update');
	Route::delete('/licensor/{id}', 'LicensorController@destroy');

	Route::get('/borrows/trash', 'BorrowController@trash');
	Route::get('/borrows/trash/filter', 'BorrowController@filter');


	// Route::delete('/allDeleted/{$id}', 'BorrowController@deleted_all');


	// Route::delete('borrows/{id}', 'BorrowController@wew');
	// Route::post('/all-delete', 'BorrowController@deleteAll');


	Route::post('all-delete',function(Request $request) {

		$conn = mysqli_connect("localhost","root","","inventory");

		$sql = "SELECT * from borrows";

		$list = mysqli_query($conn,$sql);

		if(isset($_POST)) {

			foreach($_POST['id'] as $val) {
				$sql = Borrow::where('id',$val)->delete();
				mysqli_query($conn,$sql);
		}
	}
		return redirect()->back();
	 
	});
});




