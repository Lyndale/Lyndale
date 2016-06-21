<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Contact extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Contact';
       return view('pages.backend/contact',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['master_title']='Edit Contact';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_contact',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function update(Request $request){
		 if($request->has('phone_no')  && $request->has('email')  && $request->has('address')){
              $requested_data = array('phone_no'=>$request->phone_no,'email'=>$request->email,'address'=>$request->address,'created'=>time(),'modified'=>time());
			  DB::table('admin_contact')->where('id', $request->id)->update($requested_data);
			  $request->session()->flash('success','Contact updated successfully');
			  return redirect('admin/contact');				
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/contact');		
		}	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
