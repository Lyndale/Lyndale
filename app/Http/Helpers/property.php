<?php

function get_properties(){
	$properties = DB::table('property')->select("id","title","address","property_description")->get();
	foreach($properties as $key => $val){
		$property_image = DB::table('property_images')->select("id","image")->where(array("property_id"=>$val->id))->first();
		if ($property_image) {
		   $val->image = $property_image->image;
		}	
	}
	return $properties;
}

function list_properties(){
	$properties = DB::table('property')->select("id","title","address","property_type","property_description")->get();
	foreach($properties as $key => $val){
		$property_image = DB::table('property_images')->select("id","image")->where(array("property_id"=>$val->id))->first();
		$property_details = DB::table('property_details')->select("id","price_monthly","price_weekly","property_status","area","beds","baths","garages")->where(array("property_id"=>$val->id))->first();
		if ($property_image) {
		   $val->image = $property_image->image;
		}	
		if ($property_details) {
		   $val->area = $property_details->area;
		   $val->beds = $property_details->beds;
		   $val->baths = $property_details->baths;
		   $val->price_weekly = $property_details->price_weekly;
		   $val->price_monthly = $property_details->price_monthly;
		   $val->property_status = $property_details->property_status;
		   $val->garages = $property_details->garages;
		}	
	}
	return $properties;
}

function property_detail($id){
	    $properties = DB::table('property')->select('id' ,'title', 'address', 'property_description', 'property_latitude', 'property_longitude', 'property_location', 'property_type', 'status', 'created')->where(array("id"=>$id))->first();

		$property_image = DB::table('property_images')->select("id","image")->where(array("property_id"=>$id))->get();
		$property_details = DB::table('property_details')->select('id','price_monthly', 'price_weekly', 'deposit', 'property_status', 'area', 'beds', 'baths', 'garages', 'rating', 'created')->where(array("property_id"=>$id))->first();
		
		if ($property_image) {
		   $properties->images = $property_image;
		}
			
		if ($property_details) {
		   $properties->area = $property_details->area;
		   $properties->beds = $property_details->beds;
		   $properties->baths = $property_details->baths;
		   $properties->price_weekly = $property_details->price_weekly;
		   $properties->price_monthly = $property_details->price_monthly;
		   $properties->deposit = $property_details->deposit;
		   $properties->property_status = $property_details->property_status;
		   $properties->rating = $property_details->rating;
		   $properties->created = $property_details->created;
		   $properties->garages = $property_details->garages;
	   }
	return $properties;
}

function get_properties_atHomepage(){
	$properties = DB::table('property')->select("id","title","address","property_description")->take(8)->get();
	foreach($properties as $key => $val){
		$property_image = DB::table('property_images')->select("id","image")->where(array("property_id"=>$val->id))->first();
		$property_details = DB::table('property_details')->select("id","area","beds","baths","garages")->where(array("property_id"=>$val->id))->first();
		if ($property_image) {
		   $val->image = $property_image->image;
		}	
		if ($property_details) {
		   $val->area = $property_details->area;
		   $val->beds = $property_details->beds;
		   $val->baths = $property_details->baths;
		   $val->garages = $property_details->garages;
		}	
	}
	return $properties;
}




function get_recent_properties(){
	$properties = DB::table('property')->select("id","title","address","property_description")->take(2)->get();
	foreach($properties as $key => $val){
		$property_image = DB::table('property_images')->select("id","image")->where(array("property_id"=>$val->id))->first();
		if ($property_image) {
		   $val->image = $property_image->image;
		}		
	}
	return $properties;
}


function get_property_by_id($id){
	$property = DB::table('property')->select("id","title","address","property_description","property_latitude","property_longitude","property_location","property_type")->where(array("id"=>$id,"status"=>1))->first();
	//$property->property_type = DB::table('property_type')->select("name")->where(array("id"=>$property->property_type,"status"=>1))->first();
	return $property;
}

function get_property_details_by_id($id){
	$property_details = DB::table('property_details')->select("id","price_monthly","price_weekly","deposit","property_status","area","beds","baths","garages","rating")->where(array("property_id"=>$id,"status"=>1))->first();
	return $property_details;
}

function get_property_dcouments_by_id($id){
	$property_dcouments = DB::table('property_documents')->select("id","document")->where(array("property_id"=>$id,"status"=>1))->get();
	return $property_dcouments;
}

function get_property_images_by_id($id){
	$property_images = DB::table('property_images')->select("id","image")->where(array("property_id"=>$id,"status"=>1))->get();
	return $property_images;
}

function get_property_summary_by_id($id){
	$property_summary = DB::table('property_summary')->select("id","attribute_name","attribute_value")->where(array("property_id"=>$id,"status"=>1))->get();
	return $property_summary;
}

?>
