@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h4>Edit Pemberi Izin</h4>
    <div class="box box-warning">
      <div class="box-header">
        <p>
          <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
          <a href="{{ url('licensor') }}" class="btn btn-sm btn-flat btn-primary "><i class="fa fa-backward"></i> Back</a>
        </p>
      </div>
      <div class="box-body">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('licensor/'.$dt->id)}}" method="post" role="form">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="name" value="{{$dt->name}}" readonly="" class="form-control">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">No Telepon</label>
              <input type="number" name="phone_number" value="{{$dt->phone_number}}" class="form-control">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <textarea type="text" name="address" class="form-control" rows="5">{{$dt->address}}</textarea>
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection