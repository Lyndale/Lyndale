@extends('layouts.account')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $master_title; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
		@if (Session::has('error'))
		<font style="color:red">{!! Session::get('error') !!}</font>
		@endif
		@if (Session::has('success'))
		<font style="color:green">{!! Session::get('success') !!}</font>
		@endif
      {!! Form::open(array('url' => 'admin/changepassword', 'method' => 'post')) !!}
      <div class="form-group has-feedback">
        <input type="password" name="old_password" class="form-control" placeholder="Old Password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="new_password" class="form-control" placeholder="New Password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password">
      </div>
      <div class="row">
                <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection
