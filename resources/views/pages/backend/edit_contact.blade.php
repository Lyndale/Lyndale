<?php $Contact_info = get_Contact_info_by_id($id); ?>
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
      {!! Form::open(array('url' => 'admin/edit_contact', 'files'=>true ,  'method' => 'post', 'id'=>'')) !!}
      <input type="hidden" name="id" value="<?php echo $Contact_info->id ; ?>">
    
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				  	  
			<div class="col-md-6">	  
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="<?php echo $Contact_info->email  ?>">
                </div>
             </div>
				  	  
			<div class="col-md-6">	  
                <div class="form-group">
                  <label>Phone no</label>
                  <input type="text" name="phone_no" id="phone_no" class="form-control" value="<?php echo $Contact_info->phone_no  ?>">
                </div>
             </div>
   			  
              <div class="col-md-12">	
                <div class="form-group">
                  <label>Address</label>
                 <textarea  name="address"  id="address" rows="5" class="form-control" ><?php echo $Contact_info->address  ?></textarea>
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


