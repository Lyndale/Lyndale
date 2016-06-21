<?php

function get_summary_attributes(){
	$summary_attributes = DB::table('summary_attributes')->select("id","name","created")->get();
	return $summary_attributes;
}


function get_summary_attributes_by_id($id){
	$summary_attributes = DB::table('summary_attributes')->select("id","name")->where(array("id"=>$id))->first();
	return $summary_attributes;
}




?>
