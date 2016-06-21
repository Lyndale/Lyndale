<?php $cms_pages=get_cms_pages(); ?>
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
                    <div class="pull-right">
				  <a href="<?php echo URL::to('/admin/add_cms_pages') ?>" class="btn btn-primary btn-flat">Add a new CMS page </a>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr >
                  <th>Sr. No.</th>
                  <th>Page Name (Not editable)</th>
                  <th>Title</th>                  
                  <th>Meta Title</th>
                  <th>Meta Description</th>
                  <th>Created Date</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
			<?php 
			$srno= 1;
			foreach($cms_pages as $key => $val){  ?>
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td style="background-color:#E1E1E1;"><b><?php echo $val->page_name; ?></b></td>
                  <td><?php echo $val->title; ?></td>
                  <td><?php echo $val->meta_title; ?></td>
                  <td><?php echo $val->meta_description; ?></td>
                  <td><?php echo date('m-d-Y',$val->created); ?></td>
                  <td align="center">
				  <a href="<?php echo URL::to('/admin/edit_cms_pages', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-fw fa-pencil fa-2x"></i></a>
                  <a href="<?php echo URL::to('/admin/delete_cms_pages', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-bitbucket fa-2x"></i></a>
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


