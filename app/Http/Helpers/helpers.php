<?php
function check_session_and_exit(){
	$value=Request::session()->get('userdata');
	if(empty($value)){		
		return Redirect::to('admin/login')->send();
	}
}

function session_check_user(){
	$value=Request::session()->get('userdata');
	if(!empty($value)){		
		return Redirect::to('admin/')->send();
	}
}

function get_Admin_Session(){
	$value=Request::session()->get('userdata');
	return $value;
}

function get_current_adminData(){
	$value=Request::session()->get('userdata');
	$users = DB::table('admins')->select("id","first_name","last_name","email")->where(array("id"=>$value->id))->first();
	return $users;
}


?>
