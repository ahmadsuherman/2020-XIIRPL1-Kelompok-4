<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Student;
use App\Borrow;
use Illuminate\Support\Facades\Auth;

class BorrowitemController extends Controller
{
    public function index(){
    	$items = Item::get();
    	return view('Borrow_item.index',compact('items'));
    }
    public function borrow($id)
    {
    	$items = Item::whereId($id)->first();
        return view('Borrow_item.borrow',compact('items'));
    }

        public function save(Request $request, $id)
        {

        // $this->validate($request,[
        //     'jml_pinjam' => 'required',
        // ]);
        // dd($request);

        $item = Item::whereId($id)->first();

        $stock = $item->stock_item;
        $tot_borrow = $request->input('total_borrow');

        if ($stock == 0){
            return 'Stok habis';
        } elseif($stock > $tot_borrow or $stock==$tot_borrow){

            $borrow = new Borrow(); // input data baru
            $borrow->id_item=$id;
            $borrow->id_student=Auth::user()->id;
            $borrow->total_borrow=$tot_borrow;
            $borrow->save();

            $item->stock_item -=$tot_borrow;
            $item->save();


            return redirect('/Borrows')->with('sukses','data berhasil');
        } else {
            return redirect('/home')->with(['error'=>'Peminjaman Tidak Berhasil']);;
        }
    }
}
