<?php

function get_templates(){
	$templates = DB::table('template')->select("id","template_name","subject","description")->get();
	return $templates;
}

function get_template_by_id($id){
	$template = DB::table('template')->select("id","template_name","subject","description")->where(array("id"=>$id))->first();
	return $template;
}

?>
