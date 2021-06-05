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
//    return view('welcome');
    return redirect()->route('login');
});

Route::get('/timestamp', function () {
    return view('timestamp');
});

Route::get('/session', function () {
    dd(session()->all());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/print', 'HRcontroller@print')->name('print');
Route::get('/profile', 'HRcontroller@profile')->name('profile');
Route::post('/editProfile', 'HRcontroller@editProfile')->name('editProfile');

Route::get('/admin_profile', 'HRcontroller@admin_profile')->name('admin_profile');
//Route::get('/calender', 'HRcontroller@calender')->name('calender');
Route::get('/calender', 'EventController@index')->name('calender');

//work history
Route::get('/admin_workhistory', 'HRcontroller@admin_workhistory')->name('admin_workhistory');
Route::post('/workedit', 'HRcontroller@workedit')->name('workedit');
Route::post('/workdelete', 'HRcontroller@workdelete')->name('workdelete');

Route::get('/admin_kpi', 'HRcontroller@admin_kpi')->name('admin_kpi');
Route::get('/admin_calender', 'HRcontroller@admin_calender')->name('admin_calender');

Route::get('/admin_notifications', 'HRcontroller@noti')->name('noti');
Route::post('/sameNotiCon', 'HRcontroller@sameNotiCon')->name('sameNotiCon');

Route::get('/admin_salary', 'HRcontroller@admin_salary')->name('salary');

Route::get('/admin_branchLocation', 'HRcontroller@admin_branchLocation')->name('admin_branchLocation');
Route::post('/saveDepartment', 'HRcontroller@saveDepartment')->name('saveDepartment');

Route::get('/admin_certificate', 'HRcontroller@admin_certificate')->name('admin_certificate');
Route::get('/admin_payment', 'HRcontroller@admin_payment')->name('admin_payment');
//salaryEdit
Route::get('/admin_salaryEdit', 'HRcontroller@admin_salaryEdit')->name('admin_salaryEdit');
Route::post('/salaryEdit', 'HRcontroller@salaryEdit')->name('salaryEdit');

Route::get('/edit', 'HRcontroller@edit')->name('edit');
Route::get('/leave', 'HRcontroller@leave')->name('leave');
Route::get('/testex', 'HRcontroller@testex')->name('testex');
//form evident
Route::post('/saveFormEv', 'HRcontroller@saveFormEvident')->name('saveFormEvident');
//form Certificate
Route::post('/saveFormCer', 'HRcontroller@saveFormCertificate')->name('saveFormCer');
Route::get('/showPicCer', 'HRcontroller@showPicCer')->name('showPicCer');
//kpi
Route::post('/calKPI', 'HRcontroller@calKPI')->name('calKPI');
//Route::get('/testex2', 'HRcontroller@testex2')->name('testex2');
Route::get('/testex2', 'EventController@index')->name('testex2');
//holiday
Route::get('/holidayeiei', 'EventController@holiday')->name('holidayeiei');
Route::get('/holiday', 'EventController@holidaymain')->name('holiday');

//uploadfile
Route::post('/uploadfile','UploadFileController@UploadFileEvidence')->name('uploadfile');
Route::post('/storeImage','UploadFileController@storeImage')->name('storeImage');
//Route::get('/allImages','UploadFileController@allImages')->name('allImages');
//Route::delete('/deleteImage/{id}','UploadFileController@deleteImage')->name('deleteImage');

//certificate
Route::get('/cerAdd','UploadFileController@cerAdd')->name('cerAdd');
Route::get('/cerEdit','UploadFileController@cerEdit')->name('cerEdit');
Route::post('/storeImageCer','UploadFileController@storeImageCer')->name('storeImageCer');
Route::get('/deleteFIleCer','UploadFileController@deleteFIleCer')->name('deleteFIleCer');

//delete file
Route::get('/deleteFile','UploadFileController@deleteFIle')->name('deleteFIle');

//search
Route::get('/ss','SearchController@index')->name('ssearch');
Route::get('/search','SearchController@search')->name('search');
//calender
Route::get('/calender_eiei','CalenderController@calender')->name('calender_eiei');

//fullcalendar
Route::get('events', 'EventController@index')->name('events');

//edit
Route::get('/edit/{Activity_ID}/auth_idMember/{idMember}', 'EventController@edit')->name('calender_edit');
Route::post('/editSave/{idMember}', 'EventController@editSave')->name('calender_editSave');


//timestamp
Route::get('/tt', 'AnonymousController@tt')->name('timestamp');

Route::post('/workin', 'AnonymousController@workin')->name('workin');
Route::post('/workout', 'AnonymousController@workout')->name('workout');
Route::post('/OTin', 'AnonymousController@OTin')->name('OTin');
Route::post('/OTOut', 'AnonymousController@OTOut')->name('OTOut');
Route::get('/checkLogin', 'AnonymousController@checkLogin')->name('checkLogin');

//teamlist
Route::get('/teamlist','HRcontroller@teamlist')->name('teamlist');

//payment
Route::get('/payment', 'HRcontroller@payment')->name('payment');


//profile
Route::get('/profileindex', 'HRcontroller@profileindex')->name('profileindex');
//add profile
Route::post('/storeImageAddprofile','UploadFileController@storeImageAddprofile')->name('storeImageAddprofile');
Route::get('/deleteFIleAdd','UploadFileController@deleteFIleAdd')->name('deleteFIleAdd');
Route::post('/addNameFirstBeforePic','UploadFileController@addNameFirstBeforePic')->name('addNameFirstBeforePic');
Route::post('/profileAdd', 'HRcontroller@profileAdd')->name('profileAdd');
