<?php

namespace App\Http\Controllers;

use App\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //tugas PBO
    //method di controller
        public function index() //ini method controller
        {
            $items = Item::get();
            return view('Item.index',compact('items'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Item.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'item_name' => 'required',
            'total_item' => 'required'
            
        ]);

        $items = new Item;
        $items->item_name = $request->item_name;
        $items->total_item = $request->total_item;
        $items->licensor = $request->licensor;  
        $total=$request->input('total_item');
        $items->total_item = $total;
        $items->stock_item= $total;
        $items->save();
        \Session::flash('sukses','data berhasil di Tambahkan');


        return redirect('/items');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('Item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        return view('Item.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = Item::find($id);
        $items->item_name = $request->item_name;
        $items->total_item = $request->total_item;
        $items->stock_item = $request->stock_item;
        
        $items->update();
        \Session::flash('sukses','data berhasil di edit');


        return redirect('/items');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {                       
        try {
            Item::where('id',$id)->delete();

            \Session::flash('sukses','data berhasil dihapus');
            
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());

        }
        return redirect('items');
     }
}
