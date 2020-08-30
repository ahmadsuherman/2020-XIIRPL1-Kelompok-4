<title>Inventory | Peminjam Barang</title>
@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>Pinjam Barang</h4>
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
                                <th>NAMA BARANG</th>
                                <th>JUMLAH BARANG</th>
                                <th>STOK BARANG</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $e=>$item)
                            @if($item->stock_item != 0)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$item->item_name}}</td>
                                <td>{{$item->total_item}}</td>
                                <td>{{$item->stock_item}}</td>
                                <td>         
                                    <a href="/Borrow_item/{{$item->id}}/borrow" type="button" class="btn btn-sm btn-info">PINJAM</a>
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