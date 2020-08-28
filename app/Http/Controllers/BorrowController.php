<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Item;
use App\Licensor;

class BorrowController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('DisablePreventBack');
  }

  public function index()
  {

    $tampil = Borrow::join('users', 'borrows.user_id', '=', 'users.id')
    ->leftjoin('items', 'borrows.id_item', '=', 'items.id')
    ->leftjoin('licensors', 'items.licensor_id', '=', 'licensors.id')
    ->select(
        'items.*',
        'users.name as username',
        'borrows.*',
        'licensors.*',
        'borrows.id as borrow_id'
      )->get();

      
    return view('Borrow.index', ['tampil' => $tampil]);
    //  $borrows = Borrow::all();
    //  $items = Item::all();
    // return view('Borrow.index',['borrows' => $borrows, 'items' => $items]);
  }

  public function borrowItem($id)
  {
    $items = Item::whereId($id)->first();
    return view('Borrow.listborrow');
  }

  public function destroy($id)
  {
    try {
      Borrow::where('id', $id)->delete();

      \Session::flash('sukses', 'Data berhasil dihapus');
    } catch (Exception $e) {
      \Session::flash('gagal', $e->getMessage());
    }
    return redirect('Borrows');
  }
  public function history()
  {
    $data = Borrow::leftjoin('users', 'borrows.user_id', '=', 'users.id')
    ->leftjoin('items', 'borrows.id_item', '=', 'items.id')
    ->leftjoin('licensors', 'items.licensor_id', '=', 'licensors.id')
    ->select(
        'items.*',
        'users.name as username',
        'borrows.*',
        'licensors.*',
        'borrows.id as borrow_id'
      )->get();
    return view('Borrow.history', ['data' => $data]);
  }

  public function print()
  {
     $data = Borrow::leftjoin('users', 'borrows.user_id', '=', 'users.id')
    ->leftjoin('items', 'borrows.id_item', '=', 'items.id')
    ->leftjoin('licensors', 'items.licensor_id', '=', 'licensors.id')
    ->select(
        'items.*',
        'users.name as username',
        'borrows.*',
        'licensors.*',
        'borrows.id as borrow_id'
      )->get();


    return view('Borrow.print', ['data' => $data]);
  }
}
