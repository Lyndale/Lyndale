<?php $template=get_template_by_id($id); ?>
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
      {!! Form::open(array('url' => 'admin/templates', 'method' => 'post')) !!}
      
      
<div class="box">

        <div class="box-body">
       <div class="col-sm-12 ">
		   <div class="col-sm-6">
			   <label>Template Name</label>
				<input type="text" name="template_name" class="form-control" value="<?php echo $template->template_name ?>">
				<input type="hidden" name="id" class="form-control" value="<?php echo $template->id?>">			   
	       </div>     
       
		   <div class="col-sm-6">
			   	<label>Template Name</label>
				<input type="text" name="subject" class="form-control" value="<?php echo $template->subject ?>">		   
	       </div>     
	   </div>
	   	<div class="col-sm-12 ">
	   	<div class="col-sm-12 ">
			   	<label>Description</label>
				<textarea  name="description" class="form-control" ><?php echo $template->description ?></textarea>		     
	   </div> 
	   </div> 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
                 <div class="col-xs-4 pull-right" >
				  <button type="submit" class="btn btn-primary btn-block btn-flat ">Update</button>
				</div>
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


