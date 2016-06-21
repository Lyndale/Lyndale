<?php $banner_content = get_banner_content_by_id($id); ?>
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
      {!! Form::open(array('url' => 'admin/edit_banner_content', 'files'=>true ,  'method' => 'post', 'id'=>'')) !!}
      <input type="hidden" name="id" value="<?php echo $banner_content->id ; ?>">
    
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				  	  
			<div class="col-md-12">	  
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo $banner_content->title  ?>">
                </div>
             </div>
   			  
              <div class="col-md-12">	
                <div class="form-group">
                  <label>Description</label>
                 <textarea  name="description"  id="description" rows="5" class="form-control" ><?php echo $banner_content->description  ?></textarea>
                </div>
                </div>
 				  
			<div class="col-md-12">	  
                <div class="form-group">
                  <label>Image</label>
                  <input name="image" type="file" id="file" multiple />
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


