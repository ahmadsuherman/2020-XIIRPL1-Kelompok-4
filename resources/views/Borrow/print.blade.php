@extends('layouts.master')

@section('content')

<body onload="window.print();">
  <div class="row">
    <div class="col-md-12">
      <b>
        <center><i>
            <h2>Daftar Peminjaman Barang</h2>
          </i></center>
      </b>
      <div class="box box-warning">
        <div class="box-header">

        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>NO</th>

                  <th>Nama Siswa</th>
                  <th>Kelas</th>              
                  <th>Nama Barang</th>
                  <th>Jumlah Pinjam</th>
                  <th>Status</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Pengembalian</th>

                  <th>Perizinan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $e=>$a)

                <tr>
                  <td>{{$e+1}}</td>

                  <td>{{$a->username}}</td>
                  <td>{{$a->class}}</td>
                  <td>{{$a->item_name}}</td>
                  <td>{{$a->total_borrow}}</td>

                  @if($a->status == 0)
                  <td><label class="label label-warning">Menunggu Verifikasi</label></td>
                  @endif

                  @if($a->status == 1)
                  <td><label class="label label-success">Sedang Di Pinjam</label></td>
                  @endif

                  @if($a->status == 2)
                  <td><label class="label label-primary">Sudah Di Kembalikan</label></td>
                  @endif

                  @if($a->status == 3)
                  <td><label class="label label-danger">Barang Hilang</label></td>
                  @endif

                  <td>{{ date('d M Y h:i:s', strtotime($a->date_borrow)) }}</td>
                  <td>{{ date('d M Y h:i:s', strtotime($a->date_return)) }}</td>

                  <td>{{$a->licensor}}</td>


                </tr>

                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-4">
      <center>
        <p>Mengetahui,</p>
        <br>
        <br>
        <br>
        <br>
        Enjang Suryana<br>
        (Staf Tata Usaha)
      </center>

    </div>

  </div>

</body>
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