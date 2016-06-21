<?php $banner_content=get_banner_content(); ?>
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
                  <th>Image</th>                  
                  <th>Banner Title</th>
                  <th>Banner Description</th>
                  <th>Created Date</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
			<?php 
			$srno= 1;
			foreach($banner_content as $key => $val){  ?>
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td><img src="<?php  echo URL::to('/').'/assets/banner_image/'.$val->image ; ?>" width="300px" height="200px" /></td>
                  <td><?php echo $val->title; ?></td>
                  <td><?php echo $val->description; ?></td>
                  <td><?php echo date('m-d-Y',$val->created); ?></td>
                  <td align="center">
				  <a href="<?php echo URL::to('/admin/edit_banner_content', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-fw fa-pencil fa-2x"></i></a>
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


