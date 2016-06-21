<?php

function get_amenities(){
	$amenities = DB::table('amenities')->select("id","amenities_name","status","created")->get();
	return $amenities;
}

function get_amenities_by_id($id){
	$amenity = DB::table('amenities')->select("id","amenities_name","status","created")->where(array("id"=>$id))->first();
	return $amenity;
}

function get_selected_amenities_by_id($property_id){
	$amenity = DB::table('property_amenities')->select("amenity_id")->where(array("property_id"=>$property_id))->get();
	$i=0;
	foreach($amenity as $val){
		$amenity_ids[$i++] = $val->amenity_id;
	}
	return $amenity_ids;
}

?>
