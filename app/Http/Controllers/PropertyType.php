<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropertyType extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Property Types';
       return view('pages.backend/property_types',$data);
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
     public function add(){
        $data['master_title']='Add Property Type';
        return view('pages.backend/add_property_type',$data);
    }    
     
    public function edit($id)
    {
       $data['master_title']='Edit Property Type';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_property_type',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
		if($request->has('id') && $request->has('name')){
			DB::table('property_type')->where('id', $request->id)->update(['name'=>$request->name,'modified'=>time()]);
			$request->session()->flash('success','Property type updates successfully');
			return redirect('admin/property_type');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/property_type');		
		}			

    }
    
    
         
    public function insert(Request $request){	
		if($request->has('name')){
			DB::table('property_type')->insert(['name'=>$request->name,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','Property type successfully');
			return redirect('admin/property_type');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/property_type');		
		}			

    }
    
    
            
    public function delete($id)
    {
	   $data['master_title']='Property Types';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('property_type')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/property_type');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/property_type');		
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
