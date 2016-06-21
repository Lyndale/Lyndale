
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
      {!! Form::open(array('url' => 'admin/partners', 'files'=>true ,  'method' => 'post', 'id'=>'form_add_partner')) !!}
      <input type="hidden" name="id" value="<?php echo $id ; ?>">
    
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				  	  
 				  
			<div class="col-md-12">	  
                <div class="form-group">
                  <label>Image</label>
                  <input name="image" type="file" id="file"  />
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


