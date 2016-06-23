<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

    //Users
    Route::get('/','HomeController@index');
    Route::get('home','HomeController@index');
    Route::get('login','UserController@login');
    Route::post('login','UserController@postLogin');
    Route::post('forgetPassword','UserController@forgotPassword');
    Route::get('logout','UserController@logout');
    Route::resource('users','UserController');

    //Countries
    Route::resource('countries','CountryController');

    //Region
    Route::resource('regions','RegionController');
    Route::get('fetch/districts/{id}','RegionController@getDistrictsById');
    Route::get('remove/regions/{id}','RegionController@destroy');

    //Districts
    Route::resource('districts','DistrictController');
    Route::get('remove/districts/{id}','DistrictController@destroy');

    //Departments
    Route::resource('departments','DepartmentsController');
    Route::get('remove/departments/{id}','DepartmentsController@destroy');

    //Centres
    Route::resource('centres','CentreController');
    Route::get('remove/centres/{id}','CentreController@destroy');

    //Camps
    Route::resource('camps','CampController');
    Route::get('remove/camps/{id}','CampController@destroy');
    Route::get('fetch/centres/{id}','CampController@getCentresById');

    //Clients
    Route::resource('clients','ClientController');
    Route::get('remove/clients/{id}','ClientController@destroy');
    Route::get('progress/monitoring','ClientController@index');
    Route::get('progress/assessment','ClientController@index');


    //Assessments
    Route::get('assessment/client/{id}','ClientAssessmentController@newUserCreate');
    Route::post('assessment/client/','ClientAssessmentController@postNewUserCreate');
    Route::post('assessment/create','ClientAssessmentController@store');
    Route::get('assessment/create/{id}','ClientAssessmentController@create');
    Route::get('assessment/edit/{id}','ClientAssessmentController@edit');
    Route::post('assessment/edit','ClientAssessmentController@update');
    Route::get('assessment/remove/{id}','ClientAssessmentController@destroy');


    ///Clients referrals
    Route::get('referrals','ClientReferralController@index');
    Route::get('referrals/request','ClientReferralController@referralRequest');
    Route::get('referrals/create','ClientReferralController@create');
    Route::post('referrals/create/','ClientReferralController@store');
    Route::get('referrals/edit/{id}','ClientReferralController@edit');
    Route::post('referrals/edit','ClientReferralController@update');
    Route::post('referrals/reports','ClientReferralController@reports');
    Route::post('referrals/remove/{id}','ClientReferralController@destroy');
    Route::post('referrals/Search','ClientReferralController@GetClientList');

    //Disabilities 
    Route::get('disabilities','ClientReferralController@index');
    Route::get('disabilities/create','ClientReferralController@create');
    Route::post('disabilities/create/','ClientReferralController@store');
    Route::get('disabilities/edit/{id}','ClientReferralController@edit');
    Route::post('disabilities/edit','ClientReferralController@update');
    Route::post('disabilities/reports','ClientReferralController@reports');
    Route::post('disabilities/remove/{id}','ClientReferralController@destroy');
    Route::get('disabilities/clients','ClientReferralController@index');


    //Cases
    Route::get('attendance','ClientReferralController@index');
    Route::get('attendance/create','ClientReferralController@create');
    Route::post('attendance/create/','ClientReferralController@store');
    Route::get('attendance/edit/{id}','ClientReferralController@edit');
    Route::post('attendance/edit','ClientReferralController@update');
    Route::post('attendance/reports','ClientReferralController@reports');
    Route::post('attendance/remove/{id}','ClientReferralController@destroy');
    Route::get('attendance/clients','ClientReferralController@index');

    //Physiotherapy
    Route::get('physiotherapy','ClientReferralController@index');
    Route::get('physiotherapy/create','ClientReferralController@create');
    Route::post('physiotherapy/create/','ClientReferralController@store');
    Route::get('physiotherapy/edit/{id}','ClientReferralController@edit');
    Route::post('physiotherapy/edit','ClientReferralController@update');
    Route::post('physiotherapy/reports','ClientReferralController@reports');
    Route::post('physiotherapy/remove/{id}','ClientReferralController@destroy');
    Route::get('physiotherapy/clients','ClientReferralController@index');

    //orthopedic
    Route::get('orthopedic','ClientReferralController@index');
    Route::get('orthopedic/create','ClientReferralController@create');
    Route::post('orthopedic/create/','ClientReferralController@store');
    Route::get('orthopedic/edit/{id}','ClientReferralController@edit');
    Route::post('orthopedic/edit','ClientReferralController@update');
    Route::post('orthopedic/reports','ClientReferralController@reports');
    Route::post('orthopedic/remove/{id}','ClientReferralController@destroy');
    Route::get('orthopedic/clients','ClientReferralController@index');
    
    //Reports 
    Route::get('reports/medical_rehabilitation','ReportsController@medicalRehabilitation');
    Route::get('reports/medical_rehabilitation','ReportsController@medicalRehabilitation');
    
    





});
