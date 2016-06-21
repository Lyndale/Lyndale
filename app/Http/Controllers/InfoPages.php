<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoPages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $data['master_title']='Tenants';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }


    public function info_for_tenants()
    {
	    $data['master_title']='Info for Tenants';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }


    public function managed_properties()
    {
	    $data['master_title']='Managed Properties';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }


    public function fees()
    {
	    $data['master_title']='Fees';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }

    public function helpful_resources()
    {
	    $data['master_title']='Helpful Resources';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }
    

    public function request_a_repair()
    {
	    $data['master_title']='Request a Repair';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }

    public function about_us()
    {
	    $data['master_title']='About Us';		
        return view('pages.frontend/InfoPages/info_page',$data);
    }

    public function meet_the_team()
    {
	    $data['master_title']='Meet The Team';		
        return view('pages.frontend/InfoPages/info_page',$data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
