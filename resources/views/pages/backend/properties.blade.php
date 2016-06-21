<?php $properties=get_properties(); ?>
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
		

		
		
      {!! Form::open(array('url' => 'admin/amenities', 'method' => 'post' )) !!}
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of <?php echo $master_title; ?> </h3>
                 <div class="pull-right">
				  <a href="<?php echo URL::to('/admin/add_property') ?>" class="btn btn-primary btn-flat">Add New Property</a>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr >
                  <th>Sr. No.</th>
                  <th>Property Image</th>
                  <th>Property Title</th>
                  <th>Property Address</th>
                  <th>Property Description</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
			<?php 
			if(!empty($properties)){

			$srno= 1;
			foreach($properties as $key => $val){ ?>
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td><img src="<?php  echo URL::to('/').'/assets/property_images/'.$val->image ; ?>" width="300px" height="200px" /></td>
                  <td><?php echo $val->title; ?></td>
                  <td>  <?php echo $val->address; ?></td>
                  <td><?php echo $val->property_description; ?></td>
                  <td align="center">
				  <a href="<?php echo URL::to('/admin/edit_property', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-fw fa-pencil fa-2x"></i></a>
                  <a href="<?php echo URL::to('/admin/delete_property', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-bitbucket fa-2x"></i></a>
                   </td>
                </tr>
                <?php  } } ?>
         
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    {!! Form::close() !!}

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection


