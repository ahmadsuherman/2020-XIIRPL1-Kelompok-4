@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>ini list item</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-sm btn-flat btn-primary btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i>  Tambah Barang
                    </button>

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
                        <th>PERZINAN</th>
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
                        <td>{{$item->licensor}}</td>
               					<td>
                         	<a href="/Items/{{$item->id}}/edit" class="btn btn-warning btn-xs btn-edit" id="edit" ><i class="fa fa-pencil-square-o"></i></a>
                          <button href="/items/{{$item->id}}" class="btn btn-warning btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                           <!-- <a href="Items/show/{{$item->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-eye"></i></a> -->


               					</td>
               				</tr>
               				@endforeach
               			</tbody>
               			
               		</table>

      <div class="modal modal-info fade" id="modal-tambah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Tambah Barang</h4></center>
              </div>
              <div class="modal-body">
                 @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
               <form role="form" action="{{ ('/items')}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA BARANG</label>
                  <input type="text" name="item_name" class="form-control" placeholder="Nama Barang">
                </div>

                <!--  <div class="form-group">
                  <label for="exampleInputFile">MASUKAN GAMBAR</label>
                  <input type="file" name="image" id="exampleInputFile">
                </div> -->
                
                <div class="form-group">
                  <label for="exampleInputEmail1">PEMBERI IZIN</label>
                  <input type="text" name="licensor" class="form-control" placeholder="Nama Pemberi izin">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">JUMLAH BARANG</label>
                  <input type="number" name="total_item" class="form-control" placeholder="Jumlah Barang">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning Modal</h4>
              </div>
              <div class="modal-body">

            <form role="form" action="/Items/{{$item->id}}/update" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA BARANG</label>
                  <input type="text" name="item_name" class="form-control" readonly="" value="{{$item->item_name}}" placeholder="Nama Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">JUMLAH BARANG</label>
                  <input type="number" name="total_item" class="form-control" value="{{$item->total_item}}" placeholder="Jumlah Barang">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
              </div>
           </div>
            <!-- /.modal-content
          </div>
          <!-- /.modal-dialog
        </div> --> 
        <!-- /.modal -->

                  
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