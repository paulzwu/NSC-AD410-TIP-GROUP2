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
	$complete_chart =  Charts::create('percentage', 'justgage')
		->title('Complete')
		->elementLabel('of 100')
		->values([65,0,100])
		->responsive(false)
		->height(300)
		->width(0)
		->colors(['#25D366', '#25D366', '#25D366']);

	$chart_inprogress =  Charts::create('percentage', 'justgage')
		->title('In-Progress')
		->elementLabel('of 100')
		->values([22,0,100])
		->responsive(false)
		->height(300)
		->width(0)
		->colors(['#1AB7EA', '#1AB7EA', '#1AB7EA']);

	$chart_notstarted =  Charts::create('percentage', 'justgage')
		->title('Not Started')
		->elementLabel('of 100')
		->values([13,0,100])
		->responsive(false)
		->height(300)
		->width(0)
		->colors(['#DD4B39', '#DD4B39', '#DD4B39']);
		
		return view('admin_dash', ['chart_complete' => $complete_chart, 'chart_inprogress' => $chart_inprogress, 'chart_notstarted' => $chart_notstarted]);

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
