<?php

function get_testimonials(){
	$cms_pages = DB::table('testimonials')->select("id","name","comment","image","created","modified")->get();
	return $cms_pages;
}

function get_testimonials_by_id($id){
	$cms_pages = DB::table('testimonials')->select("id","name","comment","image","created","modified")->where(array("id"=>$id,"status"=>1))->first();
	return $cms_pages;
}

?>
