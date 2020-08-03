@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>ini list item</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                <a href="/Students/create" class="btn btn-success">Tambah</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
               		<table class="table myTable">
               			<thead>
               				<tr>
               					<th>#</th>
               					<th>NAMA</th>
               					<th>JENIS KELAMIN</th>
                        <th>KELAS</th>
               					<th>ACTION</th>
               				</tr>
               			</thead>
               			<tbody>
               				@foreach($students as $e=>$student)
               				<tr>
               					<td>{{$e+1}}</td>
                        <td>{{$student->full_name}}</td>
               					<td>{{$student->gender}}</td>
               					<td>{{$student->class}}</td>
               					<td>
                            	<div style="width:60px"><a href="" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                            	<button href="" class="btn btn-warning btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button></div>           
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