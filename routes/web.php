<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () 
{
    return view('temp_landing');
});

Route::get('/faculty', function () 
{
	return view('faculty_dash');
});

Route::get('/admin', function () 
{
	
    	return view('admin_dash');
});

Route::get('/tip', function () 
{
	
    	return view('tip_assessment');
});

Route::get('/reports', function () 
{
	
    	return view('reporting_tool');
});

Route::get('/tipeditor', function () 
{
	
    	return view('tip_editor');
});

Route::get('/facultyfaqs', function () 
{
	
    	return view('faculty_faqs');
});

Route::get('/adminfaqs', function () 
{
	
    	return view('admin_faqs');
});
