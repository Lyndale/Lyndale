<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Services extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Services';
       return view('pages.backend/services',$data);
    }
    
        
    public function add(){
        $data['master_title']='Add Service';
        return view('pages.backend/add_services',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
              
    public function insert(Request $request){	
		if($request->has('service_name') && $request->has('service_detail')  && $request->has('service_icon')){
			DB::table('services')->insert(['service_name'=>$request->service_name,'service_detail'=>$request->service_detail,'service_icon'=>$request->service_icon,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','New service inserted successfully');
			return redirect('admin/services');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/services');		
		}			

    }
    
    
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
       $data['master_title']='Edit Services';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_services',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
	    if($request->has('service_name') && $request->has('service_detail')  && $request->has('service_icon')){
			DB::table('services')->where('id', $request->id)->update(['service_name'=>$request->service_name,'service_detail'=>$request->service_detail,'service_icon'=>$request->service_icon,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','Service updated successfully');
			return redirect('admin/services');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/services');		
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
    
            
    public function delete($id){
	   $data['master_title']='Services';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('services')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/services');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/services');		
		}
       
    }
    
    
}
