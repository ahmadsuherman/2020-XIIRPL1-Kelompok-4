<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Licensor;

class LicensorController extends Controller
{
    public function index(){
        $data = Licensor::orderBy('name','asc')->get();
        return view('Licensor.index',compact('data'));
    }
    public function create(){
        return view('Licensor.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'          => 'required|unique:licensors,name',
            'phone_number'  => 'required',
            'address'       => 'required'
        ]);

        Licensor::create($request->all());

        \Session::flash('sukses','Licensor Berhasil di Tambahkan');
        return redirect('/licensor');
    }
    public function edit($id){
        $dt = licensor::find($id);
        return view('Licensor.edit', ['dt' => $dt]);
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'name'      => 'required',
            'phone_number'   => 'required',
            'address'    => 'required'
        ]);

        $licensor = Licensor::find($id);
        $licensor->name = $request->name;
        $licensor->phone_number = $request->phone_number;
        $licensor->address = $request->address;
        
        $licensor->update();
        \Session::flash('sukses', 'Data berhasil di edit');
        return redirect('/licensor');
    }
    public function destroy($id){
        try {
            Licensor::where('id',$id)->delete();
            \Session::flash('sukses','Licensor Berhasil Di Hapus');
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('/licensor');
    }

    
}
