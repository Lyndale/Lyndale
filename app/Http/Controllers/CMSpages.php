<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CMSpages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='CMS Pages';
       return view('pages.backend/cmspages',$data);
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
    
    public function add(){
        $data['master_title']='Add a new CMS page';
        return view('pages.backend/add_cmspage',$data);
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
    
         
    public function insert(Request $request){	
		if($request->has('page_name') && $request->has('meta_title')  && $request->has('meta_description')  && $request->has('meta_keyword')  && $request->has('title')  && $request->has('description') ){
			DB::table('cms_pages')->insert(['page_name'=>$request->page_name,'meta_title'=>$request->meta_title,'meta_description'=>$request->meta_description,'meta_keyword'=>$request->meta_keyword,'title'=>$request->title,'description'=>$request->description,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','New CMS page inserted successfully');
			return redirect('admin/cms_pages');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/cms_pages');		
		}			

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['master_title']='Edit CMS Pages';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_cmspage',$data);
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
		if($request->has('meta_title')  && $request->has('meta_description')  && $request->has('meta_keyword')  && $request->has('title')  && $request->has('description') ){
			DB::table('cms_pages')->where('id', $request->id)->update(['meta_title'=>$request->meta_title,'meta_description'=>$request->meta_description,'meta_keyword'=>$request->meta_keyword,'title'=>$request->title,'description'=>$request->description,'created'=>time(),'modified'=>time()]);
			$request->session()->flash('success','CMS page updated successfully');
			return redirect('admin/cms_pages');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/cms_pages');		
		}			

    }
    
        
    public function delete($id){
	   $data['master_title']='CMS Pages';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('cms_pages')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/cms_pages');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/cms_pages');		
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
