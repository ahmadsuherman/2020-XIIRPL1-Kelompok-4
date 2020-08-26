<title>Inventory | Daftar Siswa</title>
@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h4>Daftar Siswa</h4>
    <div class="box box-warning">
      <div class="box-header">
        <p>
          <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
          <button type="button" class="btn btn-sm btn-flat btn-primary btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Siswa
          </button>

        </p>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table myTable">
            <thead>
              <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>KELAS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $e=>$user)
              <tr>
                <td>{{$e+1}}</td>
                <td>{{$user->nis}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->class}}</td>
                <td>
                  <button href="/Students/{{$user->user_id}}" class="btn btn-warning btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
        </div>
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
                <center>
                  <h4 class="modal-title">Tambah Siswa</h4>
                </center>
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

                <form role="form" action="{{ ('/Students')}}" method="post">
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NAMA SISWA</label>
                      <input type="text" name="name" class="form-control" placeholder="Nama Siswa">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIS</label>
                      <input type="text" name="nis" class="form-control" placeholder="NIS">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">EMAIL</label>
                      <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                    </div>

                    <div class="form-group">
                      <label>JENIS KELAMIN</label>
                      <select class="form-control" name="gender">
                        <option>Laki Laki</option>
                        <option>Perempuan</option>


                      </select>
                    </div>
                      <div class="form-group">
                        <label>KELAS</label>
                        <select class="form-control" name="class">
                          <option>X RPL</option>
                          <option>X MM 2</option>
                          <option>XI RPL</option>
                          <option>XI MM 1</option>
                          <option>XI MM 2</option>
                          <option>XII RPL 1</option>
                          <option>XII RPL 2</option>
                          <option>XII MM</option>

                        </select>
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