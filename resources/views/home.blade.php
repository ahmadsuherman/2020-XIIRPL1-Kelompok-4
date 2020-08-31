<title>Inventory | Home</title>
@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{ $item }}</h3>

        <p>Total Semua Barang</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $borrow }}</h3>

        <p>Jumlah Total Pinjam Barang</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>

  <div class="col-lg-4 col-xs-4">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $licensor }}</h3>

        <p>Jumlah Semua pemberi izin</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
</div>


<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Smks Mahaputra Cerdas Utama</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="img/mp.jpg" alt="First slide">

            </div>
            <div class="item">
              <img src="img/mm.jpg" alt="Second slide">

            </div>
            <div class="item">
              <img src="img/rpl.jpg" alt="Third slide">
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>


@endsection