<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Item;

class BorrowController extends Controller
{
   	public function index(){

   		 $borrows = Borrow::get();
   		return view('Borrow.index',compact('borrows'));
   	}

   	public function PinjamBarang($id){
        $items= Item::whereId($id)->first();
        return view('Borrow.listborrow');
    }
}
