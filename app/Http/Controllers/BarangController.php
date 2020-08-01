<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
class BarangController extends Controller
{
    public function index(){
    	$title = 'Daftar Barang';
    	$data = Barang::orderBy('id')->get();
    	return view('Barang.index',compact('title','data'));
    }
    public function add(){
    	$title = 'Tambah Barang';
    	return view('Barang.add',compact('title'));
    }
    public function store(Request $request){
    	
    	// $this->validate($request,[
    	// 	$item_name		= 'required',
    	// 	$total_item		= 'required'
    	// 	]);

    	// $a['item_name'] = $request->item_name;
    	// $a['total_item'] = $request->total_item;  
    	// $a['created_at'] = date('Y-m-d H-i-s');
    	// $a['updated_at'] = date('Y-m-d H-i-s');

    	// Barang::insert($a);
    	// \Session::flash('sukses','Barang Berhasil Ditambahkan');
    	// return redirect('/daftar-barang');


    }
}
