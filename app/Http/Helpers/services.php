<?php

function get_services(){
	$cms_pages = DB::table('services')->select("id","service_name","service_detail","service_icon","created","modified")->get();
	return $cms_pages;
}

function get_services_by_id($id){
	$cms_pages = DB::table('services')->select("id","service_name","service_detail","service_icon","created","modified")->where(array("id"=>$id,"status"=>1))->first();
	return $cms_pages;
}


?>
