<?php $amenity=get_amenities_by_id($id); ?>
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
      {!! Form::open(array('url' => 'admin/amenities', 'method' => 'post')) !!}

      <div class="col-sm-6">
      <div class="form-group has-feedback">
        <input type="text" name="amenities_name" class="form-control" value="<?php echo $amenity->amenities_name ?>">
        <input type="hidden" name="id" class="form-control" value="<?php echo $amenity->id?>">
      </div>
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


