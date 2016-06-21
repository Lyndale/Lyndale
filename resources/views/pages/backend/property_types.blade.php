<?php $PropertyType=get_PropertyType(); ?>
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of <?php echo $master_title; ?> </h3>
                 <div class="pull-right">
				  <a href="<?php echo URL::to('/admin/add_property_type') ?>" class="btn btn-primary btn-flat">Add New Property</a>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr >
                  <th>Sr. No.</th>
                  <th>Property Type Name</th>
                  <th>Created</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
			<?php 
			$srno= 1;
			foreach($PropertyType as $key => $val){  ?>
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td><?php echo $val->name; ?></td>
                  <td><?php echo date('m-d-y',$val->created); ?></td>
                  <td align="center">
				  <a href="<?php echo URL::to('/admin/edit_property_type', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-fw fa-pencil fa-2x"></i></a>
                  <a href="<?php echo URL::to('/admin/delete_property_type', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-bitbucket fa-2x"></i></a>
                  </td>
                </tr>
                <?php  }  ?>
         
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection


