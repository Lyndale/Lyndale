<?php $testimonial = get_testimonials_by_id($id); ?>
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
      {!! Form::open(array('url' => 'admin/testimonials', 'method' => 'post', 'id'=>'form_edit_testimonials')) !!}
      <input type="hidden" name="id" value="<?php echo $testimonial->id; ?>">
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				  
			<div class="col-md-12">	  
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="<?php echo $testimonial->name; ?>">
                </div>
             </div>
				  
			<div class="col-md-12">	  
                <div class="form-group">
                  <label>Comment</label>
                 <textarea  name="comment"  id="comment"  rows="5" class="form-control" ><?php echo $testimonial->comment; ?></textarea>
                </div>
             </div>
				  
   			  
              <div class="col-md-12">	
                <div class="form-group">
                  <label>Add Image</label>
                  <input name="images" type="file" id="file" multiple />
                </div>
                </div>
              


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button class="btn  btn-primary btn-lg pull-right" type="submit">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

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


