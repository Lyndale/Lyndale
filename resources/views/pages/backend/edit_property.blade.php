<?php 

$summary_attributes = get_summary_attributes();
$property_types = get_PropertyType();
$amenities = get_amenities();

$selected_property = get_property_by_id($id);
$property_details =  get_property_details_by_id($id);
$property_dcouments =  get_property_dcouments_by_id($id);
$additional_attributes =  get_property_summary_by_id($id);
$property_images =  get_property_images_by_id($id);
$selected_amenity = get_selected_amenities_by_id($id);

 ?>
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
    <section class="content" style="min-height: 1800px;">
		@if (Session::has('error'))
		<font style="color:red">{!! Session::get('error') !!}</font>
		@endif
		@if (Session::has('success'))
		<font style="color:green">{!! Session::get('success') !!}</font>
		@endif
      {!! Form::open(array('url' => 'admin/property', 'files'=>true , 'method' => 'post' , 'id'=>'form_editproperty')) !!}
       <input type="hidden" name="id" value="<?php echo $selected_property->id; ?>">


<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">


            
            
                       <!-- /.box-header -->
              <div class="box-body"> 
      
      <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Property Information</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				
                <div class="row form-group">
					<div class="col-md-6">
					  <label for="exampleInputEmail1">Title</label>
					  <input  name="title" id="title" class="form-control" value="<?php echo (!empty($selected_property) && !empty($selected_property->title))?$selected_property->title:''; ?>">
					  <!--<span class="glyphicon glyphicon-lock form-control-feedback">{!! $errors->first('Full_Site_Address') !!}</span>-->
					</div>
					<div class="col-md-6">
					  <label for="exampleInputEmail1">Address</label>
					  <input  name="address" id="address" class="form-control" value="<?php echo (!empty($selected_property) && !empty($selected_property->address))?$selected_property->address:''; ?>">
					  <!--<span class="glyphicon glyphicon-lock form-control-feedback">{!! $errors->first('Full_Site_Address') !!}</span>-->
					</div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Property description</label>
                  <textarea  name="property_description" rows="5" id="property_description" class="form-control"><?php echo (!empty($selected_property) && !empty($selected_property->property_description))?$selected_property->property_description:''; ?></textarea>
                </div>
                
           <div class="row form-group">
           <div class="col-md-4">
                  <label for="exampleInputPassword1">Property latitude</label>
                  <input  name="property_latitude" id="property_latitude" class="form-control" value="<?php echo (!empty($selected_property) && !empty($selected_property->property_latitude))?$selected_property->property_latitude:''; ?>">
                </div>
           <div class="col-md-4">
                  <label for="exampleInputPassword1">Property longitude</label>
                  <input  name="property_longitude" id="property_longitude" class="form-control" value="<?php echo (!empty($selected_property) && !empty($selected_property->property_longitude))?$selected_property->property_longitude:''; ?>">
                </div>
                               <div class="col-md-4">
                  <label for="exampleInputPassword1">Property type</label>
                  <select  name="property_type" id="property_type" class="form-control" >
                  
                  <option>Select your property type</option>
                <?php foreach($property_types as $key => $val){ ?>
                     <option value="<?php echo $val->id; ?>"  <?php echo (!empty($selected_property) && $selected_property->property_type==$val->id)?'selected':''; ?> > <?php echo $val->name; ?></option>
                 <?php } ?>
                 </select>
               </div>
                </div>
                
  


               
               
               <div class="row">
        <div class="col-md-4">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Property Images</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Image</th>
                  <th style="width: 40px">Action</th>
                </tr>
              <?php
               $srno =1;
               foreach($property_images as $key => $val){ ?> 
                <tr>
                  <td><?php echo $srno++; ?></td>
                  <td class="text-center"><img  src="<?php  echo URL::to('/').'/assets/property_images/'.$val->image ; ?>" width="120px" height="70px" /></td>
                  <td ><a   href="<?php echo URL::to('/admin/delete_image', ['id'=>base64_encode($val->id),'property_id'=>$id]) ?>"><i class="fa fa-bitbucket fa-2x" style="padding-top:20px;padding-left:8px;"></i></a></td>
                </tr>
               <?php } ?>

              </tbody></table>
              <div class="box-footer clearfix">
              <div class="pagination pagination-sm no-margin ">
                <label>Add more images : </label><input name="images[]" type="file" id="file" multiple />
              </div>
            </div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

        <div class="col-md-8">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Property Documents</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Document Name</th>
                  <th style="width: 40px">Action</th>
                </tr>
              <?php
               $srno =1;
               foreach($property_dcouments as $key => $val){ ?> 
                <tr>
                  <td style="padding-top:8px;padding-left:8px;"><?php echo $srno++; ?></td>
                  <td ><?php  echo $val->document ; ?></td>
                  <td ><a   href="<?php echo URL::to('/admin/delete_dcoument', ['id'=>base64_encode($val->id)]) ?>"><i class="fa fa-bitbucket fa-2x" style="padding-top:20px;padding-left:8px;"></i></a></td>
                </tr>
               <?php } ?>

              </tbody></table>
             <div class="box-footer clearfix">
              <div class="pagination pagination-sm no-margin ">
                <label>Add more documents : </label>
                <input name="documents[]" type="file" id="documents" multiple />
              </div>
            </div>
            </div>
            <!-- /.box-body -->

        

        </div>
        <!-- /.col -->
   

</div>
      

                </div> 
           </div>
           </div>
                
             
     
             
             
             
             
             
             
             
             
                 
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Summary Attributes</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Price monthly</label>
							<input   name="price_monthly" id="price_monthly" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->price_monthly))?$property_details->price_monthly:''; ?>">
						</div>
					</div>
                    
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Price weekly</label>
							<input   name="price_weekly" id="price_weekly" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->price_weekly))?$property_details->price_weekly:''; ?>" >
						</div>
					</div>
                    
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Deposit</label>
							<input   name="deposit" id="deposit" class="form-control"  value="<?php echo (!empty($property_details) && !empty($property_details->deposit))?$property_details->deposit:''; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Status</label>
							<input   name="property_status" id="property_status" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->property_status))?$property_details->property_status:''; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Area</label>
							<input   name="area" id="area" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->area))?$property_details->area:''; ?>">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Beds</label>
							<input   name="beds" id="beds" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->beds))?$property_details->beds:''; ?>">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Baths</label>
							<input   name="baths" id="baths" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->baths))?$property_details->baths:''; ?>">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Garages</label>
							<input   name="garages" id="garages" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->garages))?$property_details->garages:''; ?>">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Rating</label>
							<input   name="rating" id="rating" class="form-control" value="<?php echo (!empty($property_details) && !empty($property_details->rating))?$property_details->rating:''; ?>">
						</div>
					</div>						                    
				</div>
				
				<?php if(!empty($summary_attributes)){ ?>
				<div class="callout callout-info" style="width:49%;padding: 9px 5px 3px 15px;border-color: #5D5D5D; background-color: #D2D6DE !important;">
					<h4 style="color:#000;">Additional Attributes</h4>
				</div>
				<?php  foreach($summary_attributes as $key => $val){ ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputPassword1"><?php  echo $val->name; ?></label>
						<input   name="summary_attributes[<?php  echo $val->name; ?>]" class="form-control">
					</div>
				</div>
				<?php } } ?>

			</div>
            <!-- /.box-body -->
          </div>
          
           <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Amenities</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
				
					<?php foreach($amenities as $key => $val){ ?>
						<div class="form-group">
						  <div class="checkbox">
							<label>
							  <input type="checkbox"  name="amenities[<?php echo $val->id; ?>]" <?php echo (in_array($val->id,$selected_amenity))?'checked':''; ?>>
							  <?php echo $val->amenities_name; ?>
							</label>
						  </div>
						</div>

                    <?php } ?>
                
            </div>
            <!-- /.box-body -->
          </div>

          </div>
   
              <div class="box-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
                
            </div>
            <!-- /.box-body -->

            </form>
          </div>
          <!-- /.box -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


    {!! Form::close() !!}

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
@endsection

	
