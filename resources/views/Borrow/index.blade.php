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

                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tampil as $e=>$a)
              @if(auth()->user()->id == $a->user_id OR auth()->user()->role == 'admin')
              
              <tr>
                <td>{{$e+1}}</td>
                <!-- @if(auth()->user()->role == 'admin')
                        <td><a href="{{ url('history/'.$a->user_id) }}"><i class="fa fa-eye"></i></a></td>
                        @endif -->
                <td>{{$a->username}}</td>
                <td>{{$a->item_name}}</td>
                <td>{{$a->total_borrow}}</td>

                @if($a->status == NULL)
                <td><label class="label label-warning">Menunggu Verifikasi</label></td>
                @endif

                @if($a->status == 1)
                <td><label class="label label-success">Sedang Di Pinjam</label></td>
                @endif

                @if($a->status == 2)
                <td><label class="label label-primary">Sudah Di Kembalikan</label></td>
                @endif

                <td>{{$a->created_at}}</td>
                <td>{{$a->name}}</td>

                <td>
                  @if(auth()->user()->role == 'admin')
                  @if($a->status == NULL)
                  <a href="Borrows/{{$a->id}}/verified" class="btn btn-primary">Verifikasi</a>



                  @elseif($a->status == 1)
                  <a href="restore/{{$a->borrow_id}}" class="btn btn-warning">Kembalikan</a>
                  @else
                  @endif
                  @endif

                  @if(auth()->user()->role == 'siswa' AND $a->status == 1)
                  <a href="restore/{{$a->borrow_id}}" class="btn btn-warning">Kembalikan</a>
                  @endif


                  @if(auth()->user()->role == 'admin')
                  <button href="/Borrow/{{$a->id}}" class="btn btn-danger btn-hapus" id="delete">Hapus</button>
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