<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Amenities extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Amenities';
       return view('pages.backend/amenities',$data);
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
       $data['master_title']='Edit Amenity';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_amenities',$data);
    }
    
        
    public function delete($id)
    {
	   $data['master_title']='Amenities';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('amenities')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/amenities');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/amenities');		
		}
       
    }
    public function add(){
        $data['master_title']='Add a new amenity';
        return view('pages.backend/add_amenities',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
		if($request->has('id') && $request->has('amenities_name')){
			DB::table('amenities')->where('id', $request->id)->update(['amenities_name'=>$request->amenities_name,'modified'=>time()]);
			$request->session()->flash('success','Amenity name updates successfully');
			return redirect('admin/amenities');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/amenities');		
		}			

    }
     
    public function insert(Request $request){	
		if($request->has('amenities_name')){
			DB::table('amenities')->where('id', $request->id)->insert(['amenities_name'=>$request->amenities_name,'status'=>1,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','New Amenity successfully');
			return redirect('admin/amenities');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/amenities');		
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
