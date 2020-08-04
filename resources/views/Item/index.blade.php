@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>ini list item</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{url('/items/create')}}" class="btn btn-sm btn-flat btn-primary btn-primary"></i> Tambah Barang</button></a>

                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
               		<table class="table myTable">
               			<thead>
               				<tr>
               					<th>#</th>
               					<th>NAMA BARANG</th>
               					<th>JUMLAH BARANG</th>
               					<th>STOK BARANG</th>
               					<th>ACTION</th>
               				</tr>
               			</thead>
               			<tbody>
               				@foreach($items as $e=>$item)
               				<tr>
               					<td>{{$e+1}}</td>
               					<td>{{$item->item_name}}</td>
               					<td>{{$item->total_item}}</td>
               					<td>{{$item->stock_item}}</td>
               					<td>
                            	<div style="width:60px"><a href="/Items/{{$item->id}}/edit" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                            	<button href="/Items/{{$item->id}}" class="btn btn-warning btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>           
               					</td>
               				</tr>
               				@endforeach
               			</tbody>
               			
               		</table>
               </div>
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