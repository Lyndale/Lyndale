<?php $Contact_info=get_Contact_info(); ?>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of <?php echo $master_title; ?> </h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr >
                  <th>Sr. No.</th>
                  <th>Email</th>                  
                  <th>Phone no</th>
                  <th>Address</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
			<?php 
			$srno= 1;
			foreach($Contact_info as $key => $val){  ?>
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td><?php echo $val->email; ?></td>
                  <td><?php echo $val->phone_no; ?></td>
                  <td><?php echo $val->address; ?></td>
                  <td><?php echo date('m-d-Y',$val->created); ?></td>
                  <td><?php echo ($val->status==1)?'Active':''; ?></td>
                  <td align="center">
				  <a href="<?php echo URL::to('/admin/edit_contact', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-fw fa-pencil fa-2x"></i></a>
                  </td>
                </tr>
                <?php  }  ?>
         
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


