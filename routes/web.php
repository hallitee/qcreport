<?php
use App\product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\qcpass;

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

Route::get('/', function () {
    return view('/home');
})->middleware('auth');

Auth::routes();
Route::get('get/product', function(Request $r){
	$p = product::where('mat_id',$r->id)->get();
	return Response::json($p);
});
Route::get('testapprovalemail', function(Request $req){
	$p = qcpass::with('product.measures')->find(1);
	return view('email.newApproval')->with(['pass'=>$p]);
})->middleware('auth');
Route::get('qcpass/print', 'QcpassController@printpass')->middleware('auth')->name("qcpass.print");
Route::put('qcpass/superappr', 'QcpassController@approveqcpass')->middleware('auth')->name("super.appr");
Route::get('qcpass/appr', 'QcpassController@approval')->middleware('auth')->name("qcpass.appr");
Route::get('pass/edit', 'QcpassController@analysisedit')->middleware('auth')->name("analyse.edit");
Route::get('pass/start', 'QcpassController@analysis')->middleware('auth')->name("start.analyse");
Route::get('report/avg', 'DailyreportController@avg')->middleware('auth')->name("report.history");
Route::get('report/history', 'DailyreportController@report')->middleware('auth')->name("report.history");
Route::get('report/search', 'DailyreportController@search')->middleware('auth')->name("report.search");
Route::get('report/start', 'DailyreportController@getprod')->middleware('auth')->name('report.getprod');
Route::get('product/test', 'ProductController@loadTest')->middleware('auth')->name('product.test');
Route::resource('report', 'DailyreportController', ['parameters'=>['report'=>'id']]);
Route::resource('qcpass', 'QcpassController', ['parameters'=>['qcpass'=>'id']]);
Route::resource('user', 'UserController', ['parameters'=>['user'=>'id']]);
Route::resource('entity', 'EntityController', ['parameters'=>['entity'=>'id']]);
Route::resource('spec', 'SpecificationController', ['parameters'=>['spec'=>'id']]);
Route::resource('product', 'ProductController', ['parameters'=>['product'=>'id']]);
Route::resource('matgroup', 'MatgroupController', ['parameters'=>['matgroup'=>'id']]);
Route::resource('measuregrp', 'MeasuregrpController', ['parameters'=>['measuregrp'=>'id']]);
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('report','DailyreportController');