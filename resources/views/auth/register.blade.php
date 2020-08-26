
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminlte/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>INVENTORY BARANG SMK MAHAPUTRA</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register pengguna baru</p>
    <center><img src="img/mahaputra.jpg" width="30%" height="30%"></center><br>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                              <div class="form-group has-feedback">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              </div>


                              <div class="form-group has-feedback">                              
                                <input id="email" type="email" class="form-control" name="email"  placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              </div>

                               <div class="form-group has-feedback">                              
                                <input  type="text" class="form-control" name="nis"  placeholder="NIS">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                              </div>

                              <div class="form-group">
                                <select class="form-control" name="gender">
                                  <option>Laki Laki</option>
                                  <option>Perempuan</option>
                                </select>
                              </div>

                              <div class="form-group">
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

                              <div class="form-group has-feedback">                             
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              </div>

                              <div class="form-group has-feedback">                             
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                              </div>  

                              <div class="row">
                               <div class="col-xs-8 "> 
                                
                                    <label><i>Sudah punya akun?</i>
                                       @auth
                                                <a href="{{ url('/home') }}">Home</a>
                                            @else
                                               

                                                @if (Route::has('login'))
                                                    <a href="{{ route('login') }}">Login</a>
                                                @endif
                                            @endauth
                                    </label>
                               
                                </div>
                              </div>

                        <div class="form-group row mb-0">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
