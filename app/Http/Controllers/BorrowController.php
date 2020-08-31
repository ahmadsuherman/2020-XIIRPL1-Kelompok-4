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
    ->join('items', 'borrows.id_item', '=', 'items.id')
    ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
    ->select(
        'items.*',
        'items.id as items_id',
        'users.name as username',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->get();

    return view('Borrow.index',['borrows' => $borrows]);
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
     $history = Borrow::join('users', 'borrows.user_id', '=', 'users.id')
    ->join('items', 'borrows.id_item', '=', 'items.id')
    ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
    ->select(
        'items.*',
        'users.name as username',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->get();

    return view('Borrow.history', ['history' => $history]);
  }

  public function print()
  {
     $data = Borrow::join('users', 'borrows.user_id', '=', 'users.id')
    ->join('items', 'borrows.id_item', '=', 'items.id')
    ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
    ->select(
        'items.*',
        'users.name as username',
        'borrows.*',
        'licensors.name as licensor',
        'borrows.id as borrow_id'
      )->get();

    return view('Borrow.print', ['data' => $data]);
  }
   
    public function trash(){
      $trashed = Borrow::onlyTrashed()
      ->join('users', 'borrows.user_id', '=', 'users.id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
          'items.*',
          'users.name as username',
          'borrows.*',
          'licensors.name as licensor',
          'borrows.id as borrow_id'
        )->get();

      $date_borrow = date('Y-m-d', strtotime('-1 days'));
      $date_return = date('Y-m-d');
      return view('Borrow.trash', ['trashed' => $trashed ], compact('date_borrow', 'date_return'));
    }
    public function filter(Request $request){
      $date_borrow = date('Y-m-d', strtotime($request->date_borrow));
      $date_return = date('Y-m-d', strtotime($request->date_return));

      $trashed = Borrow::onlyTrashed()->whereDate('date_borrow','>=',$date_borrow)->whereDate('updated_at','<=', $date_return)
      ->join('users', 'borrows.user_id', '=', 'users.id')
      ->join('items', 'borrows.id_item', '=', 'items.id')
      ->join('licensors', 'borrows.licensor_id', '=', 'licensors.id')
      ->select(
          'items.*',
          'users.name as username',
          'borrows.*',
          'licensors.name as licensor',
          'borrows.id as borrow_id'
        )->get();

      return view('Borrow.trash', ['trashed' => $trashed ], compact('date_borrow', 'date_return'));
    }
}

