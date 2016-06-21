<?php $partners=get_partners(); ?>
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
            </div>   			  
         
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">

                <thead>
                <tr >
                  <th>Sr. No.</th>
                  <th>Image</th>                  
                  <th>Created Date</th>
                  <th>Status</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
			<?php 
			$srno= 1;
			foreach($partners as $key => $val){  ?>
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td><img src="<?php  echo URL::to('/').'/assets/partners_image/'.$val->image ; ?>"  width="120px" /></td>
                  <td><?php echo date('m-d-Y',$val->created); ?></td>
                  <td><?php echo ($val->status==1)?'Active':'Deactivated'; ?></td>
                  <td align="center">
				  <a href="<?php echo URL::to('/admin/edit_partners', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-fw fa-pencil fa-2x"></i></a>
                  <a href="<?php echo URL::to('/admin/delete_partners', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-bitbucket fa-2x"></i></a>                 
                  </td>
                </tr>
                <?php  }  ?>
         
                </tbody>
              
              </table>
       {!! Form::open(array('url' => 'admin/add_partners', 'files'=>true ,  'method' => 'post', 'id' => 'form_add_partner')) !!}  
		<div class="col-md-4 pull-right">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Partner</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
				<input name="image" type="file" id="file"  /><br/>
              <button type="submit" class="btn btn-primary btn-flat pull-right">Add Partner</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        {!! Form::close() !!}  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection


