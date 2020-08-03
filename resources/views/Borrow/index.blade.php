@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>ini list Borrow</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
               		<table class="table myTable">
               			<thead>
               				<tr>
               					<th>#</th>
               					<th>ID SISWA</th>
               					<th>ID BARANG</th>
               					<th>TOTAL PINJAM</th>
               					<th>ACTION</th>
               				</tr>
               			</thead>
               			<tbody>
               				@foreach($borrows as $e=>$borrow)
               				<tr>
               					<td>{{$e+1}}</td>
               					<td>{{$borrow->id_student}}</td>
               					<td>{{$borrow->id_item}}</td>
               					<td>{{$borrow->total_borrow}}</td>
               					<td>
                            	<div style="width:60px"><a href="#" class="btn btn-warning">Kembalikan<i class="fa fa-pencil-square-o"></i></a>
                            	<button href="" class="btn btn-warning btn-hapus" id="delete">Hapus<i class="fa fa-trash-o"></i></button></div>           
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