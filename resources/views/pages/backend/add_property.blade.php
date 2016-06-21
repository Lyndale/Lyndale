<?php 

$summary_attributes = get_summary_attributes();
$property_types = get_PropertyType();
$amenities = get_amenities();
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
    <section class="content" style="min-height: 1500px;">
		@if (Session::has('error'))
		<font style="color:red">{!! Session::get('error') !!}</font>
		@endif
		@if (Session::has('success'))
		<font style="color:green">{!! Session::get('success') !!}</font>
		@endif
      {!! Form::open(array('url' => 'admin/add_property', 'files'=>true , 'method' => 'post' , 'id'=>'form_addproperty')) !!}

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
					  <input  name="title" id="title" class="form-control">
					  <!--<span class="glyphicon glyphicon-lock form-control-feedback">{!! $errors->first('Full_Site_Address') !!}</span>-->
					</div>
					<div class="col-md-6">
					  <label for="exampleInputEmail1">Address</label>
					  <input  name="address" id="address" class="form-control">
					  <!--<span class="glyphicon glyphicon-lock form-control-feedback">{!! $errors->first('Full_Site_Address') !!}</span>-->
					</div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Property description</label>
                  <textarea  name="property_description" id="property_description" class="form-control"></textarea>
                </div>
                
           <div class="row form-group">
           <div class="col-md-6">
                  <label for="exampleInputPassword1">Property latitude</label>
                  <input  name="property_latitude" id="property_latitude" class="form-control">
                </div>
           <div class="col-md-6">
                  <label for="exampleInputPassword1">Property longitude</label>
                  <input  name="property_longitude" id="property_longitude" class="form-control">
                </div>
                </div>
                
           <div class="row form-group">
               <div class="col-md-4">
                  <label for="exampleInputPassword1">Property type</label>
                  <select  name="property_type" id="property_type" class="form-control">
                  
                  <option>Select your property type</option>
                <?php foreach($property_types as $key => $val){ ?>
                     <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                 <?php } ?>
                 </select>
               </div>
                <div class="col-md-4">
                    <label for="exampleInputPassword1">Property Images</label>
                    <input name="images[]" type="file" id="file" multiple />

                  </div>
                    <div class="col-md-4">
                    <label for="exampleInputPassword1">Property Documents</label>
                    <input name="documents[]" type="file" id="documents" multiple />

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
							<input   name="price_monthly" id="price_monthly" class="form-control">
						</div>
					</div>
                    
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Price weekly</label>
							<input   name="price_weekly" id="price_weekly" class="form-control">
						</div>
					</div>
                    
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Deposit</label>
							<input   name="deposit" id="deposit" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Status</label>
							<input   name="property_status" id="property_status" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Area</label>
							<input   name="area" id="area" class="form-control">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Beds</label>
							<input   name="beds" id="beds" class="form-control">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Baths</label>
							<input   name="baths" id="baths" class="form-control">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Garages</label>
							<input   name="garages" id="garages" class="form-control">
						</div>
					</div>					
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Rating</label>
							<input   name="rating" id="rating" class="form-control">
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
							  <input type="checkbox"  name="amenities[<?php echo $val->id; ?>]">
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

	
