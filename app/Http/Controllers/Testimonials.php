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


class Testimonials extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Testimonials';
       return view('pages.backend/testimonials',$data);
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
        $data['master_title']='Add Testimonials';
        return view('pages.backend/add_testimonials',$data);
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
       $data['master_title']='Edit Testimonials';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_testimonial',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function insert(Request $request){	 	  
		 if($request->has('name') && $request->has('comment')){
              $requested_data = array('name'=>$request->name,'comment'=>$request->comment,'created'=>time(),'modified'=>time());
			  $file = Input::file('image');
			  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
				$destinationPath =  base_path().'/public/assets/testimonial_images';
				//Storage::deleteDirectory($destinationPath);
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
					// open an image file
					$img = Image::make($destinationPath.'/'.$filename);
					// now you are able to resize the instance
					$img->resize(188, 188);
					// finally we save the image as a new file
					$img->save($destinationPath.'/'.$filename);
					exec("chmod 777 -R ".$destinationPath);
				$requested_data['image'] = $filename;
			  }	
			  DB::table('testimonials')->insert($requested_data);
			  $request->session()->flash('success','New testimonial inserted successfully');
			  return redirect('admin/testimonials');				  	  
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/testimonials');		
		}			

    }    
     
    public function update(Request $request)
    {
		if($request->has('name') && $request->has('comment')){
              $requested_data = array('name'=>$request->name,'comment'=>$request->comment,'created'=>time(),'modified'=>time());
			  $file = Input::file('image');
			  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
				$destinationPath =  base_path().'/public/assets/testimonial_images';
				//Storage::deleteDirectory($destinationPath);
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
					// open an image file
					$img = Image::make($destinationPath.'/'.$filename);
					// now you are able to resize the instance
					$img->resize(188, 188);
					// finally we save the image as a new file
					$img->save($destinationPath.'/'.$filename);
					exec("chmod 777 -R ".$destinationPath);
				$requested_data['image'] = $filename;
			  }	
			  DB::table('testimonials')->where('id', $request->id)->update($requested_data);
			  $request->session()->flash('success','New testimonial updated successfully');
			  return redirect('admin/testimonials');	
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/testimonials');		
		}	
    }


  
           
    public function delete($id)
    {
       $data['master_title']='Testimonials';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('testimonials')->where('id', $data['id'])->delete();
			return redirect('admin/testimonials');	
		}else{
			return redirect('admin/testimonials');		
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
