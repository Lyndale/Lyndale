<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Login extends Controller
{
	
	 public function __construct(){
		session_check_user();
	} 
	
    public function showLogin(){
		$data['master_title']='Login to Access';
		
		return view('pages.backend/login',$data);
		
	}
	
    
    public function doLogin(Request $request)
	{
		if($request->has('email') && $request->has('password')){
			$users = DB::table('admins')->select("id","first_name","last_name","email")->where(array("email"=>$request->email,"password"=>md5($request->password)))->first();
			if(!empty($users->id)){
				$request->session()->put('userdata',$users);
				return redirect('admin');
			}else{
				$request->session()->flash('error','Invalid credentials');
				return redirect('admin/login');	
			}
		}else{
			$request->session()->flash('error','Invalid credentials');
			return redirect('admin/login');	
		}
	}
	
	public function doLogout(Request $request){			
		$request->session()->flush();
		return redirect('admin/login');	
	}
}
