@extends('layouts.login')
@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
  <div class="login-logo">
    <b>Admin Login
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
@if (Session::has('error'))
<font style="color:red">{!! Session::get('error') !!}</font>
@endif
    {!! Form::open(array('url' => 'admin/checklogin', 'method' => 'post')) !!}
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
</body>
@endsection

