<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SummaryAttributes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Additional Summary Attributes';
       return view('pages.backend/summary_attributes',$data);
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
 	   $data['master_title']='Add Additional Summary Attributes';
        return view('pages.backend/add_summary_attributes',$data);
    }     
     
    public function edit($id)
    {
	   $data['master_title']='Edit Additional Summary Attributes';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_summary_attributes',$data);
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
			DB::table('summary_attributes')->where('id', $request->id)->update(['name'=>$request->name,'modified'=>time()]);
			$request->session()->flash('success','Summary attributes updates successfully');
			return redirect('admin/summary_attributes');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/summary_attributes');		
		}			

    }
    
        
         
    public function insert(Request $request){	
		if($request->has('name')){
			DB::table('summary_attributes')->insert(['name'=>$request->name,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','Summary attributes successfully');
			return redirect('admin/summary_attributes');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/summary_attributes');		
		}			

    }
    
        
            
    public function delete($id)
    {
	   $data['master_title']='Additional Summary Attributes';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('summary_attributes')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/summary_attributes');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/summary_attributes');		
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
