<?php

function get_cms_pages(){
	$cms_pages = DB::table('cms_pages')->select("id","page_name","meta_title","title","meta_description","created")->get();
	return $cms_pages;
}

function get_cms_pages_by_id($id){
	$cms_pages = DB::table('cms_pages')->select("id","page_name","meta_title","meta_description","meta_keyword","title","description","created","modified")->where(array("id"=>$id,"status"=>1))->first();
	return $cms_pages;
}

function get_cms_page_data($page_name){
	$cms_pages = DB::table('cms_pages')->select("description")->where(array("page_name"=>$page_name,"status"=>1))->first();
	return $cms_pages;
}

?>
