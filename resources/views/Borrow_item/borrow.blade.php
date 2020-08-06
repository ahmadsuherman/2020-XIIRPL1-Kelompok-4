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
            <form role="form" action="/Borrow_item/{{ $items->id }}/save" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA BARANG</label>
                  <input type="text" name="item_name" readonly="" value="{{$items->item_name}}" class="form-control">
                </div>

              
                <div class="form-group">
                  <label for="exampleInputEmail1">STOK BARANG</label>
                  <input type="text" name="stock_item" readonly="" value="{{$items->stock_item}}" class="form-control" >
                </div>

         
                <div class="form-group">
                  <label for="exampleInputEmail1">JUMLAH PINJAAM</label>
                  <input type="number" name="total_borrow" class="form-control" placeholder="Jumlah Barang" min="1">
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