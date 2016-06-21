<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Input;
use Storage;
use File;
use Validator;
use URL;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BannerContent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Banner Content';
       return view('pages.backend/banner_content',$data);
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
       $data['master_title']='Edit Banner Content';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_banner_content',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     

         
     
    public function update(Request $request){
		 if($request->has('title')  && $request->has('description')){
              $requested_data = array('title'=>$request->title,'description'=>$request->description,'created'=>time(),'modified'=>time());
			  $file = Input::file('image');
			  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
				$destinationPath =  base_path().'/public/assets/banner_image';
				//Storage::deleteDirectory($destinationPath);
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
				exec("chmod 777 -R ".$destinationPath);
				$requested_data['image'] = $filename;
			  }	
			  DB::table('banner_content')->where('id', $request->id)->update($requested_data);
			  $request->session()->flash('success','Content updated successfully');
			  return redirect('admin/banner_content');				
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/banner_content');		
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
