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

Route::get('/', function () {
    return "HelloWorld";
});

Route::post('a/login','AuthController@login');
Route::delete('a/logout','AuthController@logout');

/*管理员相关用户数据交互接口*/
Route::group(['prefix'=>'a','middleware'=>'manager'],function(){

	/*-------------------一级--------------------*/
    Route::get('clist','AdminController@getCompany');
	Route::get('alist/company/{id}','AdminController@getProject');
	Route::post('company','AdminController@createCompany');
	Route::post('add','AdminController@createApp');
	Route::get('ainfo/id/{id}','AdminController@getAppInfo');
	Route::post('edit','AdminController@updateApp');
	Route::get('alist/all','AdminController@getAllApp');
    Route::delete('delapp','AdminController@delApp');
	/*-------------------二级--------------------*/
	Route::post('create','AdminController@createAdmin');
	Route::post('permission/id/{id}','AdminController@setAdmin');
	Route::post('permission','AdminController@updateAdmin');
	Route::post('permission/setall','AdminController@setAllPermission');
	Route::get('mlist','AdminController@getAdmin');
	Route::get('info/id/{id}','AdminController@getAdminInfo');
	Route::get('getalist','AdminController@get_alist');
    Route::delete('delmgr','AdminController@delmgr');
	/*-------------------三级--------------------*/
	Route::get('getlist','AdminController@get_app_list');
	Route::get('getapp','AdminController@get_app_info');
	Route::post('setalert','AdminController@setAlert');
	
	
});
/* 获取数据接口 */
Route::group(['prefix'=>'d','middleware'=>'manager'],function(){
	Route::get('newuserdev','DataController@get_new_user_dev');
	Route::get('activeuserdev','DataController@get_Active_User_Device');
	Route::get('paymoney','DataController@get_pay_count');
	Route::get('payuser','DataController@get_pay_user');
    Route::get('download','DataController@get_downloaded_count');
    
	Route::get('newdev','DataController@get_new_dev');
	Route::get('devfirsttime','DataController@get_dev_first_time');
	Route::get('newuser','DataController@get_new_user');
	Route::get('userfirsttime','DataController@get_user_first_time');

	
	Route::get('dayactivedev','DataController@get_day_active_dev');
    Route::get('weekactivedev','DataController@get_week_active_dev');
    Route::get('monthactivedev','DataController@get_month_active_dev');
	Route::get('alreadyplaydev','DataController@already_play_dev');

	Route::get('dayactiveuser','DataController@get_day_active_user');
    Route::get('weekactiveuser','DataController@get_week_active_user');
    Route::get('monthactiveuser','DataController@get_month_active_user');
	Route::get('alreadyplayuser','DataController@already_play_user');
	
	Route::get('devicesurvive','DataController@get_survive_device');
	Route::get('usersurvive','DataController@get_survive_user');

    Route::get('app/{id}/{type}/{param}','DataController@getFeaturesData');
    Route::get('devarea','DataController@getDevArea');
    Route::get('userarea','DataController@getUserArea');
});

/*view 展示接口*/
Route::get('login','ViewController@login');
Route::get('manager','ViewController@showData');


/*Hadoop 接口*/
Route::post('upload/{xx}','UploadController@upload');
Route::post('mail/send','MailController@send');

