@extends('layouts.master')

@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>INI Home</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
            
             <center><h4>Nama Anggota Kelompok</h4>
              <h4>Ahmad Suherman</h4>
              <h4>Evi Novianti</h4>
              <h4>Malay Cahya</h4>
              <h4>Rudi Firmansyah</h4>
              <h4>Santi Sintiawati</h4></center>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection