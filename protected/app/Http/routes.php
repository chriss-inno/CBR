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
    Route::get('registration/desk','HomeController@registrationDesk');
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
    Route::get('details/summary/clients/{id}','ClientController@showSummary');
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
    Route::get('referrals/create/{id}','ClientReferralController@create');
    Route::post('referrals/create/','ClientReferralController@store');
    Route::get('referrals/edit/{id}','ClientReferralController@edit');
    Route::post('referrals/edit','ClientReferralController@update');
    Route::get('referrals/reports','ClientReferralController@reports');
    Route::get('referrals/remove/{id}','ClientReferralController@destroy');
    Route::post('referrals/Search','ClientReferralController@GetClientList');

    //Disabilities 
    Route::get('disabilities','DisabilityController@index');
    Route::get('disabilities/create','DisabilityController@create');
    Route::post('disabilities/create','DisabilityController@store');
    Route::get('disabilities/edit/{id}','DisabilityController@edit');
    Route::post('disabilities/edit','DisabilityController@update');
    Route::post('disabilities/reports','DisabilityController@reports');
    Route::post('disabilities/remove/{id}','DisabilityController@destroy');

    //Client disabilities
    Route::get('disabilities/clients','ClientDisabilityController@index');
    Route::post('disabilities/clients/create','ClientDisabilityController@store');
    Route::get('disabilities/clients/create/{id}','ClientDisabilityController@create');
    Route::get('disabilities/clients/edit/{id}','ClientDisabilityController@edit');
    Route::post('disabilities/clients/edit','ClientDisabilityController@update');
    Route::get('disabilities/clients/show/{id}','ClientDisabilityController@show');
    Route::get('disabilities/clients/remove/{id}','ClientDisabilityController@destroy');


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
    Route::get('physiotherapy','PhysiotherapyRegisterController@index');
    Route::get('physiotherapy/create/{id}','PhysiotherapyRegisterController@create');
    Route::post('physiotherapy/create','PhysiotherapyRegisterController@store');
    Route::get('physiotherapy/edit/{id}','PhysiotherapyRegisterController@edit');
    Route::post('physiotherapy/edit','PhysiotherapyRegisterController@update');
    Route::post('physiotherapy/reports','PhysiotherapyRegisterController@reports');
    Route::get('physiotherapy/remove/{id}','PhysiotherapyRegisterController@destroy');
    Route::get('physiotherapy/clients','PhysiotherapyRegisterController@getClients');

    //orthopedic
    Route::get('orthopedic','OrthopedicRegisterController@index');
    Route::get('orthopedic/create/{id}','OrthopedicRegisterController@create');
    Route::post('orthopedic/create/','OrthopedicRegisterController@store');
    Route::get('orthopedic/edit/{id}','OrthopedicRegisterController@edit');
    Route::post('orthopedic/edit','OrthopedicRegisterController@update');
    Route::post('orthopedic/reports','OrthopedicRegisterController@reports');
    Route::post('orthopedic/remove/{id}','OrthopedicRegisterController@destroy');
    Route::get('orthopedic/clients','OrthopedicRegisterController@getClients');

    //social rehabilitation
    Route::get('social/rehabilitation','OrthopedicRegisterController@index');
    Route::get('social/rehabilitation/create','OrthopedicRegisterController@create');
    Route::post('social/rehabilitation/create/','OrthopedicRegisterController@store');
    Route::get('social/rehabilitation/edit/{id}','OrthopedicRegisterController@edit');
    Route::post('social/rehabilitation/edit','OrthopedicRegisterController@update');
    Route::post('social/rehabilitation/reports','OrthopedicRegisterController@reports');
    Route::post('social/rehabilitation/remove/{id}','OrthopedicRegisterController@destroy');
    Route::get('social/rehabilitation/clients','OrthopedicRegisterController@index');
    
    //Cases
    Route::get('sr/cases','OrthopedicRegisterController@index');
    Route::get('sr/cases/create','OrthopedicRegisterController@create');
    Route::post('sr/cases/create/','OrthopedicRegisterController@store');
    Route::get('sr/cases/edit/{id}','OrthopedicRegisterController@edit');
    Route::post('sr/cases/edit','OrthopedicRegisterController@update');
    Route::post('sr/cases/reports','OrthopedicRegisterController@reports');
    Route::post('sr/cases/remove/{id}','OrthopedicRegisterController@destroy');
    Route::get('sr/cases/clients','OrthopedicRegisterController@index');

    //Material monitoring
    Route::get('sr/materials','OrthopedicRegisterController@index');
    Route::get('sr/materials/create','OrthopedicRegisterController@create');
    Route::post('sr/materials/create/','OrthopedicRegisterController@store');
    Route::get('sr/materials/edit/{id}','OrthopedicRegisterController@edit');
    Route::post('sr/materials/edit','OrthopedicRegisterController@update');
    Route::post('sr/materials/reports','OrthopedicRegisterController@reports');
    Route::post('sr/materials/remove/{id}','OrthopedicRegisterController@destroy');
    Route::get('sr/cases/clients','OrthopedicRegisterController@index');
    
    
    //Data imports
    Route::get('excel/import/clients','DataImportController@index');
    Route::get('excel/import/referrals','DataImportController@index');
    Route::get('excel/import/apu','DataImportController@index');


    //Site setup 

    Route::post('setting/organization/create','SiteSetupController@store');
    Route::post('setting/organization/edit','SiteSetupController@update');
    Route::get('setting/organization','SiteSetupController@index');
    //Reports 
    Route::get('mr/reports','ReportsController@getMrReports');
    Route::get('sr/reports','ReportsController@getSrReports');
    Route::get('general/reports','ReportsController@generalReports');

});
