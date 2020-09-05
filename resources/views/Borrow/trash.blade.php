@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>History Peminjaman Barang</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa  fa-search"></i> Cari</button>
                    
                </p>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table myTable">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Pinjam</th>
                      <th>Status</th>
                      <th>Tanggal Pinjam</th>
                       <th>Tanggal Kembali</th>
                      <th>Perizinan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trashed as $e=>$trash)

                    <tr>
                      <td>{{$e+1}}</td>
                      <td>{{$trash->username}}</td>
                      <td>{{$trash->class}}</td>
                      
                      <td>{{$trash->item_name}}</td>
                      <td>{{$trash->total_borrow}}</td>

                      @if($trash->status == 0)
                      <td><label class="label label-warning">Menunggu Verifikasi</label></td>
                      @endif

                      @if($trash->status == 1)
                      <td><label class="label label-success">Sedang Di Pinjam</label></td>
                      @endif               

                      @if($trash->status == 2)
                      <td><label class="label label-primary">Sudah Di Kembalikan</label></td>
                      @endif

                      @if($trash->status == 3)
                      <td><label class="label label-danger">Barang Hilang</label></td>
                      @endif

                      @if($trash->date_borrow == NULL)
                      <td> - </td>
                      @else
                      <td>{{ date('d M Y H:i:s', strtotime($trash->date_borrow )) }}</td>
                      @endif

                      @if($trash->date_return == NULL)
                      <td> - </td>
                      @else
                      <td>{{ date('d M Y H:i:s', strtotime($trash->date_return )) }}</td>
                      @endif
                      <td>{{$trash->licensor}}</td>


                    </tr>

                    @endforeach
                  </tbody>

                </table>

              </div>
            </div>
        </div>
    </div>
</div>
 
 <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Tanggal awal pinjam - akhir</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
            <form role="form" method="get" action="{{ url('borrows/trash/filter') }}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dari Tanggal-Bulan Pinjam</label>
                  <input type="text" name="date_borrow" class="form-control datepicker" autocomplete="off" id="exampleInputEmail1" value="{{ $date_borrow }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ke Tanggal-Bulan Pinjam</label>
                  <input type="text" name="date_return" class="form-control datepicker" autocomplete="off" id="exampleInputPassword1" value="{{ $date_return }}">
                </div>
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lihat</button>
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

        $('.btn-filter').click(function(e){
            e.preventDefault();
            $('#modal-filter').modal();
        })
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection