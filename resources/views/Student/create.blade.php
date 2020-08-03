@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>add item</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
            <form role="form" action="/Students/store" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA siswa</label>
                  <input type="text" name="full_name" class="form-control" placeholder="Nama Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">email</label>
                  <input type="email" name="email" class="form-control" placeholder="Jumlah Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">jenis kelamin</label>
                  <input type="text" name="gender" class="form-control" placeholder="Jumlah Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">kelas</label>
                  <input type="text" name="class" class="form-control" placeholder="Jumlah Barang">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
               
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection