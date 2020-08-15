@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>ini list Restorer</h4>
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
               					<th>Nama Siswa</th>
               					<th>Nama Barang</th>
               					<th>Jumlah Pinjamn</th>
               					<th>ACTION</th>
               				</tr>
               			</thead>
               			<tbody>
                    @foreach($borrows as $e=>$a)
                     @if(auth()->user()->id == $a->id_student)
               				<tr>
                        <td>{{$e+1}}</td>
               					<td>{{$a->id_item}}</td>
               					<td>{{$a->id_student}}</td>
               					<td>{{$a->total_borrow}}</td>
               					<td>
                            	<a href="" class="btn btn-primary">Done</a>
                          @if(auth()->user()->role == 'admin')
                              <button href="/Borrow/{{$a->id}}" class="btn btn-warning btn-hapus" id="delete">Hapus</button>
               					  @endif
                        </td>
               				</tr>
                      @endif
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