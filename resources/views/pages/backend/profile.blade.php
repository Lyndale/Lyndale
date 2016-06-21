<?php $adminData=get_current_adminData(); ?>
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
      {!! Form::open(array('url' => 'admin/profile', 'method' => 'post')) !!}
      <div class="form-group has-feedback">
        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $adminData->first_name; ?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $adminData->last_name; ?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $adminData->email; ?>">
      </div>
      <div class="row">
                <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
        
        <div class="col-xs-4">
          <a href="<?php echo URL::to('admin/changepassword'); ?>">Change password</a>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection
