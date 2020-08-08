<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Item;

class BorrowController extends Controller
{
   	public function index()
   	{
   	$tampil= Borrow::join('items' , 'borrows.id_item' , '=' , 'items.id')
        ->join('users' , 'borrows.id_student' ,'=', 'users.id')
        ->get();
        return view('Borrow.index', ['tampil' => $tampil]);
   		//  $borrows = Borrow::all();
   		//  $items = Item::all();
   		// return view('Borrow.index',['borrows' => $borrows, 'items' => $items]);
   	}

   	public function PinjamBarang($id){
        $items= Item::whereId($id)->first();
        return view('Borrow.listborrow');
    }
    public function restore(){ 
    	return view('Borrow.restore');
    }
}
