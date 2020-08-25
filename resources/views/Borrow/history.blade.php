<title>Inventory | Daftar Pengembalian</title>
@extends('layouts.master')

@section('content')

<body>
  <div class="row">
    <div class="col-md-12">
      <h4>Daftar Pengembalian Barang</h4>
      <div class="box box-warning">
        <div class="box-header">
          <p>
            <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
            <!--  <a target="_blank" href="{{ url('Borrows/pdf/') }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-download"></i> Export PDF</a> -->
            <a href="{{ url('/print') }}" target="_blank" class="btn btn-sm btn-flat btn-default"><i class="fa fa-print"></i> Print</a>


          </p>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table myTable">
              <thead>
                <tr>
                  <th>NO</th>

                  <th>Nama Siswa</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Pinjam</th>
                  <th>Status</th>
                  <th>Tanggal Pinjam</th>


                  <th>Perizinan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $e=>$a)

                <tr>
                  <td>{{$e+1}}</td>

                  <td>{{$a->name}}</td>
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

                  <td>{{$a->created_at}}</td>


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