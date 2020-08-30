<title>Inventory | Daftar Peminjaman</title>
@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h4>Daftar Peminjaman Barang</h4>
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
                <th>NO</th>
                <!-- @if(auth()->user()->role == 'admin')
                        <th>Details</th>
                        @endif -->
                <th>Nama Siswa</th>
                <th>Nama Barang</th>
                <th>Jumlah Pinjam</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Perizinan</th>
                @if(auth()->user()->role == 'admin')
                <th>ACTION</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($borrows as $e=>$borrow)
              @if(auth()->user()->id == $borrow->user_id OR auth()->user()->role == 'admin')
              
              <tr>
                @if($borrow->status != 2 AND $borrow->status != 3)
                <td>{{$e+1}}</td>
                <!-- @if(auth()->user()->role == 'admin')
                        <td><a href="{{ url('history/'.$borrow->user_id) }}"><i class="fa fa-eye"></i></a></td>
                        @endif -->
                <td>{{$borrow->username}}</td>
                <td>{{$borrow->item_name}}</td>
                <td>{{$borrow->total_borrow}}</td>

                @if($borrow->status == 0)
                <td><label class="label label-warning">Menunggu Verifikasi</label></td>
                @endif

                @if($borrow->status == 1)
                <td><label class="label label-success">Sedang Di Pinjam</label></td>
                @endif

                @if($borrow->status == 2)
                <td><label class="label label-primary">Sudah Di Kembalikan</label></td>
                @endif

                @if($borrow->status == 3)
                <td><label class="label label-danger">Barang Hilang</label></td>
                @endif

                <td>{{$borrow->created_at}}</td>
                <td>{{$borrow->licensor}}</td>

                <td>
                  @if(auth()->user()->role == 'admin')
                  @if($borrow->status == 0)
                  <a href="Borrows/{{$borrow->borrow_id}}/verified" class="btn btn-primary">Verifikasi</a>

                  @elseif($borrow->status == 1)
                  <a href="restore/{{$borrow->borrow_id}}" class="btn btn-warning">Kembalikan</a>
                  <a href="lost/{{$borrow->borrow_id}}" class="btn btn-info">Hilang</a>
                  @else

                  @endif

                  @endif

                  @if(auth()->user()->role == 'admin')
                    @if($borrow->status != 1)
                  <button href="/Borrow/{{$borrow->id}}" class="btn btn-danger btn-hapus" id="delete">Hapus</button>
                    @endif
                  @endif
                </td>
                @endif
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
  $(document).ready(function() {

    // btn refresh
    $('.btn-refresh').click(function(e) {
      e.preventDefault();
      $('.preloader').fadeIn();
      location.reload();
    })

  })
</script>

@endsection