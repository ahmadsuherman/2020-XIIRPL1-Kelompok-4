<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Item;
use App\Licensor;



class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('DisablePreventBack');
    }

    public function index()
    {
        $borrow = Borrow::count();
        $item = Item::count();
        $licensor = Licensor::count();
        
                
        return view('home',compact('borrow','item','licensor'));
    }
}
