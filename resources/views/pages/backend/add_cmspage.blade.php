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
      {!! Form::open(array('url' => 'admin/add_cms_pages', 'method' => 'post', 'id'=>'form_add_cmspages')) !!}
    
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
				  
			<div class="col-md-6">	  
                <div class="form-group">
                  <label>Page name</label>
                  <input type="text" name="page_name" id="page_name" class="form-control">
                </div>
             </div>
				  
			<div class="col-md-6">	  
                <div class="form-group">
                  <label>Meta title</label>
                  <input type="text" name="meta_title" id="meta_title" class="form-control">
                </div>
             </div>
				  
			<div class="col-md-6">	  
                <div class="form-group">
                  <label>Meta description</label>
                 <textarea  name="meta_description"  id="meta_description"  rows="5" class="form-control" ></textarea>
                </div>
             </div>
				  
			<div class="col-md-6">	  
                <div class="form-group">
                  <label>Meta keyword</label>
                 <textarea  name="meta_keyword"  id="meta_keyword" rows="5" class="form-control" ></textarea>
                </div>
             </div>  
				  
			<div class="col-md-12">	  
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" id="title" class="form-control">
                </div>
             </div>
   			  
              <div class="col-md-12">	
                <div class="form-group">
                  <label>Description</label>
                 <textarea  name="description"  id="description" rows="5" class="form-control" ></textarea>
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


