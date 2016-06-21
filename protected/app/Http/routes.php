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
    Route::get('assessment/client/{id}','ClientAssessmentController@create');
    Route::post('assessment/create','ClientAssessmentController@store');
    Route::get('assessment/edit/{id}','ClientAssessmentController@edit');
    Route::post('assessment/edit','ClientAssessmentController@update');
    Route::get('assessment/remove/{id}','ClientAssessmentController@destroy');
    






});
