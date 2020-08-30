<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Student;
use App\Borrow;
use App\Licensor;



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

        $licensors = Licensor::get();
        $joins = Borrow::join('licensors', 'borrows.licensor_id', '=', 'licensors.id')->select(
        'licensors.*',
        'borrows.*')->get();
        return view('Borrow_item.borrow', compact('items'),  ['licensors' => $licensors]);
    }

    public function save(Request $request, $id)
    {

        // $this->validate($request,[
        //     'licensor' => 'required',
        //     'jml_pinjam' => 'required'      
        // ]);

        $item = Item::whereId($id)->first();
        $stock = $item->stock_item;

        $tot_borrow = $request->input('total_borrow');

        if ($stock == 0) {
            \Session::flash('gagal', 'Stok Sudah Habis');
            return redirect('/Borrow_item');
        } elseif ($stock > $tot_borrow or $stock == $tot_borrow) {

            $borrow = new Borrow(); // input data baru
            $borrow->id_item = $id;
            $borrow->user_id = Auth::user()->id;
            $borrow->licensor_id = $request->licensor_id;
            $borrow->total_borrow = $tot_borrow;
            $borrow->status = $request->status;
            $borrow->save();

            // $item->stock_item -= $tot_borrow;
            $item->save();


            return redirect('/Borrows')->with('sukses', 'Data berhasil');
        } else {
            \Session::flash('gagal', 'Jumlah Pinjam Lebih Dari Stok');
            return redirect('/Borrow_item');    
        }
    }

    public function verified($id)
    {

        $borrow = Borrow::whereId($id)->first();
        $id_item = $borrow->id_item;
        $total_borrow = $borrow->total_borrow;
        $borrow->save();

        $item = Item::whereId($id_item)->first();
        $stock = $item->stock_item;
        $item->save();

        $now_stock = $stock -= $total_borrow;
        if ($now_stock < 0) {
            \Session::flash('gagal', 'Stock Barang Sudah Tidak ada');
            return redirect()->back();
        } else {
            
            Borrow::where('id', $id)->update([
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            Item::where('id',$id_item)->update([
                'stock_item' => $now_stock
            ]);            
        }
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
        $borrow->updated_at = date('Y-m-d H:i:s');

        //save edit items dan borrows
        $borrow->save();
        $item->save();
        \Session::flash('sukses', 'Barang Berhasil Di Kembalikan');
        return back();
    }
    public function lost($id){
        Borrow::where('id', $id)->update([
            'status' => 3,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        \Session::flash('sukses', 'Data Hilang Berhasil di Simpan');
        return redirect('/Borrows');
    }
}
