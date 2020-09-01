<title>Inventory | Edit Barang</title>
@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>Edit Data Barang</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
                <form role="form" action="/items/{{$items->id}}/update" method="post">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NAMA BARANG</label>
                            <input type="text" name="item_name" class="form-control" readonly="" value="{{$items->item_name}}" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">JUMLAH BARANG</label>
                            <input type="number" name="total_item" class="form-control" value="{{$items->total_item}}" placeholder="Jumlah Barang">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

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