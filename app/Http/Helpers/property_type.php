<?php

function get_PropertyType(){
	$PropertyType = DB::table('property_type')->select("id","name","created")->get();
	return $PropertyType;
}

function get_PropertyType_by_id($id){
	$PropertyType = DB::table('property_type')->select("id","name")->where(array("id"=>$id))->first();
	return $PropertyType;
}

?>
