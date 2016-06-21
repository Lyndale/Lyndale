<?php $summary_attributes=get_summary_attributes_by_id($id); ?>
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
      {!! Form::open(array('url' => 'admin/summary_attributes', 'method' => 'post')) !!}
      
      
<div class="box">

        <div class="box-body">
       <div class="col-sm-12 ">
		   <div class="col-sm-6">
			   <label>Property Type Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $summary_attributes->name ?>">
				<input type="hidden" name="id" class="form-control" value="<?php echo $summary_attributes->id?>">			   
	       </div>        
	   </div>
        </div>
        <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-primary " style="margin-left:30px;" type="submit">Submit</button>
              </div>
        <!-- /.box-footer-->
      </div>      
      
      
      
   
  

      <div class="col-sm-6">
      <div class="form-group has-feedback">

      </div>
      </div>
      <div class="row">
                <!-- /.col -->

        <!-- /.col -->
      </div>
    {!! Form::close() !!}

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection


