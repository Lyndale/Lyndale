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

class Partners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Partners';
       return view('pages.backend/partners',$data);
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
       $data['master_title']='Edit Partners';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_partners',$data);
    }
        
    public function add(){
        $data['master_title']='Add a new partner';
        return view('pages.backend/add_partners',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function insert(Request $request){
              $requested_data = array('created'=>time(),'modified'=>time());
			  $file = Input::file('image');
			  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
				$destinationPath =  base_path().'/public/assets/partners_image';
				//Storage::deleteDirectory($destinationPath);
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
				exec("chmod 777 -R ".$destinationPath);
				$requested_data['image'] = $filename;
			  }	
			  if(DB::table('partners')->insert($requested_data)){
				  $request->session()->flash('success','Partner inserted successfully');
				  return redirect('admin/partners');				
			  }else{
				$request->session()->flash('error','All Input Fields are required');
				return redirect('admin/partners');		
			  }	
    }
     
    public function update(Request $request){
              $requested_data = array('created'=>time(),'modified'=>time());
			  $file = Input::file('image');
			  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
				$destinationPath =  base_path().'/public/assets/partners_image';
				//Storage::deleteDirectory($destinationPath);
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
				exec("chmod 777 -R ".$destinationPath);
				$requested_data['image'] = $filename;
			  }	
			  if(DB::table('partners')->where('id', $request->id)->update($requested_data)){
			  $request->session()->flash('success','Partner updated successfully');
			  return redirect('admin/partners');				
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/partners');		
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
	   $data['master_title']='Partners';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('partners')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Delete successfully');
			return redirect('admin/partners');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/partners');		
		}
       
    }
}
