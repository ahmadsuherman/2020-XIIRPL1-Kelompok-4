@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>Pinjam Barang</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
            <form role="form" action="" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA LENGKAP</label>
                  <input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap">
                </div>

                <div class="form-group">
                  <label>KELAS</label>
                    <select class="form-control">
                      <option name="class" value="volvo">XI RPL</option>
                      <option name="class" value="saab">XI MM 1</option>
                      <option name="class" value="volvo">XI MM 2</option>
                      <option name="class" value="saab">XII RPL 1</option>
                      <option name="class" value="volvo">XII RPL 2</option>
                      <option name="class" value="saab">XII MM</option> 
                    </select>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select class="form-control">
                      <option name="gender" value="volvo">Laki-Laki</option>
                      <option name="gender" value="saab">Perempuan</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Pinjam</button>
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