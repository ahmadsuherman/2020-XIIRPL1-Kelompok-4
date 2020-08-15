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
            \Session::flash('gagal','Stok Sudah Habis');
            return redirect('/Borrow_item');
        } elseif($stock > $tot_borrow or $stock==$tot_borrow){

            $borrow = new Borrow(); // input data baru
            $borrow->id_item=$id;
            $borrow->id_student=Auth::user()->id;
            $borrow->total_borrow=$tot_borrow;
            $borrow->save();

            $item->stock_item -=$tot_borrow;
            $borrow->status = 0;

            $item->save();


            return redirect('/Borrows')->with('sukses','data berhasil');
        } else {
            \Session::flash('gagal','Jumlah Pinjam Lebih Dari Stok');
            return redirect('/Borrow_item')->with(['error'=>'Peminjaman Tidak Berhasil']);;
        }
    }

    public function verified($id){
        Borrow::where('id',$id)->update(['status' => 1]);

        return redirect('/Borrows');

    }
    public function restore($id){
        $dt = Borrow::find($id);
        $id_item = $dt->id_item;
        $tot_borrow = $dt->total_borrow;

        $items = Item::find($id);
        $now = $items->stock_item;

        $stock_restore = $now + $tot_borrow;

        Borrow::where('id',$id)->update([
            'status'=>2
        ]);

        Item::where('id',$id_item)->update([
            'stock_item' => $stock_restore
        ]);
        \Session::flash('sukses','Data Berhasil Di Kembalikan');
        return redirect('/Borrows');
    }
}
