@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Tambah Pemberi Izin</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
            <form action="{{url('licensor/create')}}" method="post" role="form">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="name" class="form-control" placeholder="Nama Pemberi Izin">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">No Telepon</label>
                  <input type="number" name="phone_number" class="form-control" placeholder="No Telepon">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea type="text" name="address" class="form-control" placeholder="Alamat" rows="5"></textarea> 
                </div>
                
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
               
            </div>
        </div>
    </div>
</div>
 
@endsection