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
            <form role="form" action="" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA BARANG</label>
                  <input type="text" name="item_name" class="form-control" value="{{$item_name}}" placeholder="Nama Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">JUMLAH BARANG</label>
                  <input type="number" name="total_item" class="form-control" value="{{$total_item}}" placeholder="Jumlah Barang">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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