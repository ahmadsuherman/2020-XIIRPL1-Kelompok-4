<title>Inventory | Daftar Barang</title>
@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h4>ini list item</h4>
    <div class="box box-warning">
      <div class="box-header">
        <p>
          <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
          <button type="button" class="btn btn-sm btn-flat btn-primary btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah Barang
          </button>

        </p>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table myTable">
            <thead>
              <tr>
                <th>NO</th>
                <th>NAMA BARANG</th>
                <th>JUMLAH BARANG</th>
                <th>STOK BARANG</th>
                <th>PERZINAN</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              @foreach($joins as $e=>$join)
              <tr>
                <td>{{$e+1}}</td>
                <td>{{$join->item_name}}</td>
                <td>{{$join->total_item}}</td>
                <td>{{$join->stock_item}}</td>
                <td>{{$join->name}}</td>
                <td>
                  <a href="/items/{{$join->id}}/edit" class="btn btn-primary btn-sm btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                  <button href="/items/{{$join->id}}" class="btn btn-danger btn-sm btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                  <!-- <a href="Items/show/{{$join->id}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-eye"></i></a> -->


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
                    <h4 class="modal-title">Tambah Barang</h4>
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
                        <label for="exampleInputEmail1">ATAS IZIN</label>
                        <select type="text" name="licensor_id" class="form-control select">
                          @foreach($licensors as $licensor)
                          <option value="{{ $licensor->id }}">{{$licensor->name}}</option>
                          @endforeach
                        </select> 
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