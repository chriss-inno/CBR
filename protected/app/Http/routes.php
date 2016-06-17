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

    //Districts
    Route::resource('districts','DistrictController');

    //Departments
    Route::resource('departments','DepartmentsController');

    //Centres
    Route::resource('centres','CentreController');

    //Camps
    Route::resource('camps','CampController');

    //Clients
    Route::resource('clients','ClientController');

});
