<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class templates extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Email Templates';
       return view('pages.backend/templates',$data);
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
       $data['master_title']='Edit Template';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_template',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
		if($request->has('id') && $request->has('template_name') && $request->has('subject') && $request->has('description')){
			DB::table('template')->where('id', $request->id)->update(['template_name'=>$request->template_name,'subject'=>$request->subject,'description'=>$request->description]);
			$request->session()->flash('success','Template updates successfully');
			return redirect('admin/templates');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/templates');		
		}			

    }
    
    public function delete($id)
    {
	   $data['master_title']='Email Templates';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('template')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/templates');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/templates');		
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
