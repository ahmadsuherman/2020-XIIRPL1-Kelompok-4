<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Student;
use App\Borrow;
use Illuminate\Support\Facades\Auth;

class BorrowitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('DisablePreventBack');
    }

    public function index()
    {
        $items = Item::get();
        return view('Borrow_item.index', compact('items'));
    }
    public function borrow($id)
    {
        $items = Item::whereId($id)->first();
        return view('Borrow_item.borrow', compact('items'));
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

        if ($stock == 0) {
            \Session::flash('gagal', 'Stok Sudah Habis');
            return redirect('/Borrow_item');
        } elseif ($stock > $tot_borrow or $stock == $tot_borrow) {

            $borrow = new Borrow(); // input data baru
            $borrow->id_item = $id;
            $borrow->id_student = Auth::user()->id;
            $borrow->total_borrow = $tot_borrow;
            $borrow->save();

            $item->stock_item -= $tot_borrow;
            $borrow->status = 0;

            $item->save();


            return redirect('/Borrows')->with('sukses', 'data berhasil');
        } else {
            \Session::flash('gagal', 'Jumlah Pinjam Lebih Dari Stok');
            return redirect('/Borrow_item')->with(['error' => 'Peminjaman Tidak Berhasil']);;
        }
    }

    public function verified($id)
    {
        Borrow::where('id', $id)->update([
            'status' => 1
        ]);
        \Session::flash('sukses', 'Data Berhasil di Verifikasi');
        return redirect('/Borrows');
    }
    public function restore($id)
    {


        $borrow = Borrow::whereId($id)->first();

        $item = Item::whereId($borrow->id_item)->first();

        //mengembalikan jumlah stock sesuai barang yang di pinjam
        $item->stock_item += $borrow->total_borrow;

        //merubah status pinjam menjadi dikembalikan
        $borrow->status = '2';

        //save edit items dan borrows
        $borrow->save();
        $item->save();
        \Session::flash('sukses', 'Barang Berhasil Di Kemablikan');
        return back();
    }
}
