<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('login',array('uses'=>'Login@showLogin'));
    Route::get('logout',array('uses'=>'Login@doLogout'));
	Route::get('/',array('uses'=>'Admin@dashboard'));
	Route::get('changepassword',array('uses'=>'Admin@changePassword'));
	Route::post('changepassword',array('uses'=>'Admin@do_changePassword'));
	Route::get('profile',array('uses'=>'Admin@profile'));
	Route::post('profile',array('uses'=>'Admin@update_profile'));
	Route::post('checklogin',array('uses'=>'Login@doLogin'));
	
	Route::get('amenities',array('uses'=>'Amenities@index'));
	Route::post('amenities',array('uses'=>'Amenities@update'));
	Route::get('edit_amenity/{id}',array('uses'=>'Amenities@edit'));	
	Route::get('add_amenity',array('uses'=>'Amenities@add'));	
	Route::post('add_amenity',array('uses'=>'Amenities@insert'));
	Route::get('delete_amenity/{id}',array('uses'=>'Amenities@delete'));	
	
	Route::get('templates',array('uses'=>'templates@index'));
	Route::post('templates',array('uses'=>'templates@update'));	
	Route::get('edit_template/{id}',array('uses'=>'templates@edit'));	
	Route::get('delete_template/{id}',array('uses'=>'templates@delete'));	
	
	Route::get('property',array('uses'=>'Property@index'));
	Route::post('property',array('uses'=>'Property@update'));	
	Route::get('add_property',array('uses'=>'Property@add'));
	Route::post('add_property',array('uses'=>'Property@insert'));
	Route::get('edit_property/{id}',array('uses'=>'Property@edit'));	
	Route::get('delete_property/{id}',array('uses'=>'Property@delete'));
	Route::get('delete_image/{id}/{property_id}',array('uses'=>'Property@delete_image'));	
	Route::get('delete_dcoument/{id}',array('uses'=>'Property@delete_dcoument'));			
	
	Route::get('property_type',array('uses'=>'PropertyType@index'));
	Route::post('property_type',array('uses'=>'PropertyType@update'));	
	Route::get('add_property_type',array('uses'=>'PropertyType@add'));
	Route::post('add_property_type',array('uses'=>'PropertyType@insert'));
	Route::get('edit_property_type/{id}',array('uses'=>'PropertyType@edit'));	
	Route::get('delete_property_type/{id}',array('uses'=>'PropertyType@delete'));		
	
	Route::get('testimonials',array('uses'=>'Testimonials@index'));
	Route::post('testimonials',array('uses'=>'Testimonials@update'));	
	Route::get('add_testimonials',array('uses'=>'Testimonials@add'));
	Route::post('add_testimonials',array('uses'=>'Testimonials@insert'));
	Route::get('edit_testimonials/{id}',array('uses'=>'Testimonials@edit'));	
	Route::get('delete_testimonials/{id}',array('uses'=>'Testimonials@delete'));		
	
	Route::get('cms_pages',array('uses'=>'CMSpages@index'));
	Route::post('cms_pages',array('uses'=>'CMSpages@update'));	
	Route::get('add_cms_pages',array('uses'=>'CMSpages@add'));
	Route::post('add_cms_pages',array('uses'=>'CMSpages@insert'));
	Route::get('edit_cms_pages/{id}',array('uses'=>'CMSpages@edit'));	
	Route::get('delete_cms_pages/{id}',array('uses'=>'CMSpages@delete'));		
	
	Route::get('summary_attributes',array('uses'=>'SummaryAttributes@index'));
	Route::post('summary_attributes',array('uses'=>'SummaryAttributes@update'));	
	Route::get('add_summary_attributes',array('uses'=>'SummaryAttributes@add'));
	Route::post('add_summary_attributes',array('uses'=>'SummaryAttributes@insert'));
	Route::get('edit_summary_attributes/{id}',array('uses'=>'SummaryAttributes@edit'));	
	Route::get('delete_summary_attributes/{id}',array('uses'=>'SummaryAttributes@delete'));		
	
	Route::get('banner_content',array('uses'=>'BannerContent@index'));	
	Route::get('edit_banner_content/{id}',array('uses'=>'BannerContent@edit'));	
	Route::post('edit_banner_content',array('uses'=>'BannerContent@update'));	
	
	Route::get('services',array('uses'=>'Services@index'));
	Route::post('services',array('uses'=>'Services@update'));	
	Route::get('add_services',array('uses'=>'Services@add'));
	Route::post('add_services',array('uses'=>'Services@insert'));
	Route::get('edit_services/{id}',array('uses'=>'Services@edit'));	
	Route::get('delete_services/{id}',array('uses'=>'Services@delete'));		
	
	Route::get('partners',array('uses'=>'Partners@index'));
	Route::post('partners',array('uses'=>'Partners@update'));	
	Route::post('add_partners',array('uses'=>'Partners@insert'));
	Route::get('edit_partners/{id}',array('uses'=>'Partners@edit'));	
	Route::get('delete_partners/{id}',array('uses'=>'Partners@delete'));		
	
	Route::get('contact',array('uses'=>'Contact@index'));	
	Route::get('edit_contact/{id}',array('uses'=>'Contact@edit'));	
	Route::post('edit_contact',array('uses'=>'Contact@update'));		
});

	Route::get('/',array('uses'=>'Home@index'));
	Route::get('home',array('uses'=>'Home@index'));	
	
	Route::get('tenants',array('uses'=>'InfoPages@index'));
	Route::get('info_for_tenants',array('uses'=>'InfoPages@info_for_tenants'));
	Route::get('managed_properties',array('uses'=>'InfoPages@managed_properties'));
	Route::get('fees',array('uses'=>'InfoPages@fees'));
	Route::get('helpful_resources',array('uses'=>'InfoPages@helpful_resources'));
	Route::get('request_a_repair',array('uses'=>'InfoPages@request_a_repair'));
	Route::get('about_us',array('uses'=>'InfoPages@about_us'));
	Route::get('meet_the_team',array('uses'=>'InfoPages@meet_the_team'));
	Route::get('property',array('uses'=>'PropertyFrontend@index'));	
	Route::get('property_detail/{id}',array('uses'=>'PropertyFrontend@property_detail'));


