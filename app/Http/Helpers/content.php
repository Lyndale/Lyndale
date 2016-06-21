<?php

function get_Contact_info(){
	$Contact_info = DB::table('admin_contact')->select("id","phone_no","email","address","created","modified","status")->get();
	return $Contact_info;
}

function get_Contact_information(){
	$Contact_info = DB::table('admin_contact')->select("id","phone_no","email","address","created","modified","status")->where(array("status"=>1))->first();
	return $Contact_info;
}

function get_Contact_info_by_id($id){
	$Contact_info = DB::table('admin_contact')->select("id","phone_no","email","address","created","modified")->where(array("id"=>$id,"status"=>1))->first();
	return $Contact_info;
}

function get_banner_content(){
	$banner_content = DB::table('banner_content')->select("id","image","title","description","created","modified")->get();
	return $banner_content;
}

function get_banner_content_info(){
	$banner_content = DB::table('banner_content')->select("id","image","title","description","created","modified")->first();
	return $banner_content;
}

function get_banner_content_by_id($id){
	$banner_content = DB::table('banner_content')->select("id","image","title","description","created","modified")->where(array("id"=>$id,"status"=>1))->first();
	return $banner_content;
}




function get_partners(){
	$partners = DB::table('partners')->select("id","image","created","modified","status")->get();
	return $partners;
}

function get_partners_by_id($id){
	$partners = DB::table('partners')->select("id","image","created","modified","status")->where(array("id"=>$id,"status"=>1))->first();
	return $partners;
}


function get_documents($id){
	$documents = DB::table('property_documents')->select("id","document","created","status")->where(array("property_id"=>$id,"status"=>1))->get();
	return $documents;
}

?>
