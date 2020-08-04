<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Student;
class BorrowitemController extends Controller
{
    public function index(){
    	$items = Item::get();
    	return view('Borrow_item.index',compact('items'));
    }
    public function borrow($id){

    	$items = Student::find($id);
        return view('Borrow_item.borrow',compact('items'));
    }
    public function save(){

    }
}
