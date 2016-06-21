<?php

namespace App\Http\Controllers;
use DB;
use Image; 
use Illuminate\Http\Request;
use Input;
use Validator;
use URL;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;

class Property extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data['master_title']='Properties';
       return view('pages.backend/properties',$data);
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
       $data['master_title']='Edit Property';
       $data['id']=base64_decode($id);
       return view('pages.backend/edit_property',$data);
    }
    
    public function add(){
        $data['master_title']='Add a new property';
        return view('pages.backend/add_property',$data);
    }

    public function insert(Request $request){
		if($request->has('title') && $request->has('address') && $request->has('property_description') && $request->has('property_latitude') && $request->has('property_longitude')  ){
			//$data = array('Full_Site_Address'=>$request->Full_Site_Address,'property_description'=>$request->property_description,'created'=>time(),'modified'=>time());
			DB::table('property')->insert(['title'=>$request->title,'address'=>$request->address,'property_description'=>$request->property_description,'property_latitude'=>$request->property_latitude,'property_longitude'=>$request->property_longitude,'property_type'=>$request->property_type,'created'=>time(),'modified'=>time()]);
			$lastInsertedID = DB::getPdo()->lastInsertId();
			
			if(!empty($lastInsertedID)){
				
				   if($request->has('price_monthly') && $request->has('price_weekly') && $request->has('deposit') && $request->has('property_status') && $request->has('area') && $request->has('beds') && $request->has('baths') && $request->has('garages') && $request->has('rating')){		
					 DB::table('property_details')->insert(['property_id'=>$lastInsertedID,'price_monthly'=>$request->price_monthly,'price_weekly'=>$request->price_weekly,'deposit'=>$request->deposit,'property_status'=>$request->property_status,'area'=>$request->area,'beds'=>$request->beds,'baths'=>$request->baths,'garages'=>$request->garages,'rating'=>$request->rating,'created'=>time(),'modified'=>time()]);
				   }else{
					$request->session()->flash('error','All Input Fields are required in Summary Attributes');
					return redirect('admin/add_property');					   
				   }
				
			
				// getting all of the post data
				$files = Input::file('images');
				// Making counting of uploaded images
				$file_count = count($files);
				// start count how many uploaded
					// start count how many uploaded
				$uploadcount = 0;
				foreach($files as $file) {
				  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
				  $validator = Validator::make(array('file'=> $file), $rules);
				  if($validator->passes()){
					$destinationPath =  base_path().'/public/assets/property_images';
					$filename = $file->getClientOriginalName();
					$upload_success = $file->move($destinationPath, $filename);

					// open an image file
					$img = Image::make($destinationPath.'/'.$filename);

					// now you are able to resize the instance
					$img->resize(440, 330);

					// finally we save the image as a new file
					$img->save($destinationPath.'/'.$filename);

					// open an image file
					$img = Image::make($destinationPath.'/'.$filename);

					// now you are able to resize the instance
					$img->resize(950, 480);

                    $largedestinationPath = $destinationPath.'/large';
					// finally we save the image as a new file
					$img->save($largedestinationPath.'/'.$filename);

						
					exec("chmod 777 -R ".$destinationPath);
					exec("chmod 777 -R ".$largedestinationPath);
	
					DB::table('property_images')->insert(['property_id'=>$lastInsertedID,'image'=>$filename,'created'=>time()]);				
					$uploadcount ++;
				  }
				}

				// getting all of the post data
				$documents = Input::file('documents');
				// Making counting of uploaded images
				$file_count = count($documents);
				// start count how many uploaded
				// start count how many uploaded
				$uploadcount = 0;
				foreach($documents as $file) {
				  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
				  $validator = Validator::make(array('file'=> $file), $rules);
				  if($validator->passes()){
					$destinationPath =  base_path().'/public/assets/property_documents';
					$filename = $file->getClientOriginalName();
					$upload_success = $file->move($destinationPath, $filename);
					exec("chmod 777 -R ".$destinationPath);
					DB::table('property_documents')->insert(['property_id'=>$lastInsertedID,'document'=>$filename,'created'=>time()]);				
					$uploadcount ++;
				  }
				}

				if(!empty($request->summary_attributes)){
					foreach($request->summary_attributes as $key => $val){
					   DB::table('property_summary')->insert(['property_id'=>$lastInsertedID,'attribute_name'=>$key,'attribute_value'=>$val,'created'=>time(),'modified'=>time()]);
					}
				}			
						
				if(!empty($request->amenities)){
					foreach($request->amenities as $key => $val){
					   DB::table('property_amenities')->insert(['property_id'=>$lastInsertedID,'amenity_id'=>$key,'created'=>time(),'modified'=>time()]);
					}
				}			
				
				$request->session()->flash('success','Inserted successfully');
				return redirect('admin/property');	
		   }
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/add_property');		
		}	
		
			

    }
    

    
    
    
    
    
           
    public function delete($id)
    {
       $data['master_title']='Property';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('property')->where('id', $data['id'])->delete();
			DB::table('property_details')->where('property_id', $data['id'])->delete();
			DB::table('property_documents')->where('property_id', $data['id'])->delete();
			DB::table('property_summary')->where('property_id', $data['id'])->delete();
			DB::table('property_amenities')->where('property_id', $data['id'])->delete();
			DB::table('property_images')->where('property_id', $data['id'])->delete();
			return redirect('admin/property');	
		}else{
			return redirect('admin/property');		
		}
       
    }
           
    public function delete_image($id,$property_id)
    {

       $data['master_title']='Edit Property';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('property_images')->where('id', $data['id'])->delete();            
			return redirect('admin/edit_property/?id='.base64_encode($$property_id));	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/edit_property');		
		}
       
    }
           
    public function delete_dcoument($id)
    {
       $data['master_title']='Edit Property';
       $data['id']=base64_decode($id);
       	if($data['id']){
			DB::table('property_documents')->where('id', $data['id'])->delete();
			//$request->session()->flash('success','Deleted successfully');
			return redirect('admin/edit_property');	
		}else{
			//$request->session()->flash('error','There some error deleting !');
			return redirect('admin/edit_property');		
		}
       
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request){

		if($request->has('title') && $request->has('address') && $request->has('property_description') && $request->has('property_latitude') && $request->has('property_longitude')  ){
			//$data = array('Full_Site_Address'=>$request->Full_Site_Address,'property_description'=>$request->property_description,'created'=>time(),'modified'=>time());
			$res = DB::table('property')->where('id', $request->id)->update(['title'=>$request->title,'address'=>$request->address,'property_description'=>$request->property_description,'property_latitude'=>$request->property_latitude,'property_longitude'=>$request->property_longitude,'property_type'=>$request->property_type,'created'=>time(),'modified'=>time()]);
				   if($request->has('price_monthly') && $request->has('price_weekly') && $request->has('deposit') && $request->has('property_status') && $request->has('area') && $request->has('beds') && $request->has('baths') && $request->has('garages') && $request->has('rating')){		
					 DB::table('property_details')->where('property_id', $request->id)->update(['price_monthly'=>$request->price_monthly,'price_weekly'=>$request->price_weekly,'deposit'=>$request->deposit,'property_status'=>$request->property_status,'area'=>$request->area,'beds'=>$request->beds,'baths'=>$request->baths,'garages'=>$request->garages,'rating'=>$request->rating,'created'=>time(),'modified'=>time()]);
				   }else{
					$request->session()->flash('error','All Input Fields are required in Summary Attributes');
					return redirect('admin/property');					   
				   }
	
			
				// getting all of the post data
				$files = Input::file('images');
				// Making counting of uploaded images
				$file_count = count($files);
				// start count how many uploaded
					// start count how many uploaded
				$uploadcount = 0;
				foreach($files as $file) {
				  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
				  $validator = Validator::make(array('file'=> $file), $rules);
				  if($validator->passes()){
					$destinationPath =  base_path().'/public/assets/property_images';
					$filename = $file->getClientOriginalName();
					$upload_success = $file->move($destinationPath, $filename);

					// open an image file
					$img = Image::make($destinationPath.'/'.$filename);

					// now you are able to resize the instance
					$img->resize(440, 330);

					// finally we save the image as a new file
					$img->save($destinationPath.'/'.$filename);

					// open an image file
					$img = Image::make($destinationPath.'/'.$filename);

					// now you are able to resize the instance
					$img->resize(950, 480);

                    $largedestinationPath = $destinationPath.'/large';
					// finally we save the image as a new file
					$img->save($largedestinationPath.'/'.$filename);

						
					exec("chmod 777 -R ".$destinationPath);
					exec("chmod 777 -R ".$largedestinationPath);
					DB::table('property_images')->insert(['property_id'=>$request->id,'image'=>$filename,'created'=>time()]);				
					$uploadcount ++;
				  }
				}

			
			
				// getting all of the post data
				$documents = Input::file('documents');
				// Making counting of uploaded images
				$file_count = count($documents);
				// start count how many uploaded
				// start count how many uploaded
				$uploadcount = 0;
				foreach($documents as $file) {
				  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
				  $validator = Validator::make(array('file'=> $file), $rules);
				  if($validator->passes()){
					$destinationPath =  base_path().'/public/assets/property_documents';
					$filename = $file->getClientOriginalName();
					$upload_success = $file->move($destinationPath, $filename);
					exec("chmod 777 -R ".$destinationPath);
					DB::table('property_documents')->insert(['property_id'=>$request->id,'document'=>$filename,'created'=>time()]);				
					$uploadcount ++;
				  }
				}
				

				if(!empty($request->summary_attributes)){
					foreach($request->summary_attributes as $key => $val){
					   DB::table('property_summary')->insert(['property_id'=>$request->id,'attribute_name'=>$key,'attribute_value'=>$val,'created'=>time(),'modified'=>time()]);
					}
				}			
						
				if(!empty($request->amenities)){
					DB::table('property_amenities')->where('property_id', $request->id)->delete();
					foreach($request->amenities as $key => $val){
					   DB::table('property_amenities')->insert(['property_id'=>$request->id,'amenity_id'=>$key,'created'=>time(),'modified'=>time()]);
					}
				}			
				
				$request->session()->flash('success','Updated successfully');
				return redirect('admin/property');	
		   
		}else{
			$request->session()->flash('error','All Input Fields are required');
			return redirect('admin/property');		
		}	
		
			

    }




    
    
    

    public function destroy($id)
    {
        //
    }
}
