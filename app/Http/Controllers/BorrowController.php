<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Item;
use App\Licensor;
use DB;

class BorrowController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('DisablePreventBack');
  }

  public function index()
  {
    $borrows = Borrow::join('users', 'borrows.user_id', '=', 'users.id')
      ->leftjoin('students', 'users.id', '=', 'students.user_id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
        'items.*',
        'items.id as items_id',
        'users.name as username',
        'students.class',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->get();

    return view('Borrow.index', ['borrows' => $borrows]);
  }
  public function destroy($id)
  {
    try {
      Borrow::where('id', $id)->delete();

      \Session::flash('sukses', 'Data berhasil dihapus');
    } catch (\Exception $e) {
      \Session::flash('gagal', $e->getMessage());
    }
    return redirect('borrows');
  }
  public function history()
  {
    $histories = Borrow::join('users', 'borrows.user_id', '=', 'users.id')
      ->leftjoin('students', 'users.id', '=', 'students.user_id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
        'items.*',
        'users.name as username',
        'students.class',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->get();

    return view('Borrow.history', ['histories' => $histories]);
  }

  public function print()
  {
    $data = Borrow::join('users', 'borrows.user_id', '=', 'users.id')
      ->leftjoin('students', 'users.id', '=', 'students.user_id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
        'items.*',
        'users.name as username',
        'students.class',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->get();

    return view('Borrow.print', ['data' => $data]);
  }

  public function trash()
  {
    $trashed = Borrow::onlyTrashed()
      ->join('users', 'borrows.user_id', '=', 'users.id')
      ->leftjoin('students', 'users.id', '=', 'students.user_id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
        'items.*',
        'users.name as username',
        'students.class',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrows_id'
      )->orderBy('date_borrow', 'asc')->get();


    $date_borrow = date('Y-m-d', strtotime('now'));
    $date_return = date('Y-m-d', strtotime('+1 days'));
    return view('Borrow.trash', ['trashed' => $trashed], compact('date_borrow', 'date_return'));
  }


  public function allDeletes(Request $request)
  {
    if (isset($_POST)) {

      foreach ($_POST['id'] as $val) {
        $sql = Borrow::where('id', $val)->delete();
      }
    }
    \Session::flash('sukses', 'Berhasil Di Hapus');
    return redirect()->back();
  }

  public function filter(Request $request)
  {
    $date_borrow = date('Y-m-d', strtotime($request->date_borrow));
    $date_return = date('Y-m-d', strtotime($request->date_return));

    $trashed = Borrow::onlyTrashed()->whereDate('date_borrow', '>=', $date_borrow)->whereDate('date_borrow', '<=', $date_return)
      ->join('users', 'borrows.user_id', '=', 'users.id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
        'items.*',
        'users.name as username',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->orderBy('date_borrow', 'asc')->get();

    return view('Borrow.trash', ['trashed' => $trashed], compact('date_borrow', 'date_return'));
  }
}
