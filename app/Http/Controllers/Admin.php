<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
		check_session_and_exit();
	} 
     
     
    public function index()
    {
        //
    }
    
    public function do_changePassword(Request $request){
		if($request->has('old_password') && $request->has('new_password')  && $request->has('confirm_new_password')){
			$user_id=get_Admin_Session();
			$password = DB::table('admins')->select("password")->where(array("id"=>$user_id->id))->first();	
			if($password->password==md5($request->old_password)){
				if($request->new_password==$request->confirm_new_password){
					DB::table('admins')->where('id', $user_id->id)->update(['password'=>md5($request->new_password)]);
					$request->session()->flash('success','Password Updated successfully');
					return redirect('admin/changepassword');	
				}else{
					$request->session()->flash('error','Password and Confirm password should be same');
					return redirect('admin/changepassword');
				}
			}else{
				$request->session()->flash('error','Wrong Old Password');
				return redirect('admin/changepassword');	
			}
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/changepassword');		
		}		
		
	}
	
	public function changePassword(){
		$data['master_title']='Change password';		
		return view('pages.backend/changepassword',$data);
	}
	
	public function profile(){
		$data['master_title']='Profile';		
		return view('pages.backend/profile',$data);
	}
	
	public function update_profile(Request $request){
		if($request->has('first_name') && $request->has('last_name')  && $request->has('email')){
			$user_id=get_Admin_Session();
			DB::table('admins')->where('id', $user_id->id)->update(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'email'=>$request->email]);
			$request->session()->flash('success','Profile Updates successfully');
			return redirect('admin/profile');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/profile');		
		}	
	}
	
    public function dashboard(Request $request){
		$value=$request->session()->get('userdata');
		$data['master_title']='Dashboard';	
		return view('pages.backend/dashboard',$data);
	}
    
}
