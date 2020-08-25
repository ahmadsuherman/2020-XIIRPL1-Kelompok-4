@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>Show Detail Barang</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{url('/items')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                </p>
            </div>
            <div class="box-body">
                <!-- {{ $item->image }} -->
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <tbody>
                            <tr>
                                <th>Nama Barang</th>
                                <td>:</td>
                                <td>{{ $item->item_name }}</td>

                                <th>Total Barang</th>
                                <td>:</td>
                                <td>{{ $item->total_item }}</td>

                            </tr>

                            <tr>
                                <th>Stok Barang</th>
                                <td>:</td>
                                <td>{{ $item->stock_item }}</td>

                                <th>Pemberi Izin</th>
                                <td>:</td>
                                <td>{{ $item->licensor }}</td>
                            </tr>

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