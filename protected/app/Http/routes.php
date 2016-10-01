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
    Route::get('users/remove/{id}','UserController@destroy');
    Route::resource('access/roles','UserRolesController');
    Route::get('access/roles/remove/{id}','UserRolesController@destroy');

    //Assessment roam
    Route::get('assessment/roam','ClientAssessmentController@index');

    //rehabilitation services progress
    Route::get('rehabilitation/services/progress','RehabilitationProgressController@index');
    Route::get('rehabilitation/services/progress/create','RehabilitationProgressController@create');
    Route::post('rehabilitation/services/progress/create','RehabilitationProgressController@store');
    Route::get('rehabilitation/services/progress/edit/{id}','RehabilitationProgressController@edit');
    Route::post('rehabilitation/services/progress/edit','RehabilitationProgressController@update');
    Route::get('rehabilitation/services/progress/remove/{id}','RehabilitationProgressController@destroy');

    //rehabilitation services
    Route::get('rehabilitation/services','RehabilitationServicesController@index');
    Route::get('rehabilitation/services/clients','RehabilitationServicesController@searchClient');
    Route::get('rehabilitation/services/create/{id}','RehabilitationServicesController@create');
    Route::post('rehabilitation/services/create','RehabilitationServicesController@store');
    Route::get('rehabilitation/services/edit/{id}','RehabilitationServicesController@edit');
    Route::get('rehabilitation/services/show/{id}','RehabilitationServicesController@show');
    Route::get('rehabilitation/services/pdf/{id}','RehabilitationServicesController@getPdf');
    Route::post('rehabilitation/services/edit','RehabilitationServicesController@update');
    Route::get('rehabilitation/services/remove/{id}','RehabilitationServicesController@destroy');
    Route::get('rehabilitation/services/print/{id}','RehabilitationServicesController@showPrint');


    Route::get('orthopedic/services','OrthopedicServicesController@index');
    Route::get('orthopedic/services/clients','OrthopedicServicesController@searchClient');
    Route::get('orthopedic/services/create/{id}','OrthopedicServicesController@create');
    Route::post('orthopedic/services/create','OrthopedicServicesController@store');
    Route::get('orthopedic/services/edit/{id}','OrthopedicServicesController@edit');
    Route::get('orthopedic/services/show/{id}','OrthopedicServicesController@show');
    Route::post('orthopedic/services/edit','OrthopedicServicesController@update');
    Route::get('orthopedic/services/remove/{id}','OrthopedicServicesController@destroy');
    Route::get('orthopedic/services/pdf/{id}','OrthopedicServicesController@getPdf');
    Route::get('orthopedic/services/print/{id}','OrthopedicServicesController@showPrint');
    

    //Import
    Route::get('excel/rehabilitation/services','RehabilitationServicesController@showRSImport');
    Route::get('excel/rehabilitation/services/errors','RehabilitationServicesController@showRSImportError');
    Route::post('excel/rehabilitation/services','RehabilitationServicesController@postRSImport');
    Route::get('excel/rehabilitation/progress/errors','RehabilitationServicesController@showProgressImporterrors');
    Route::post('excel/rehabilitation/progress','RehabilitationServicesController@postProgressImport');

    Route::get('excel/orthopedic/services','OrthopedicServicesController@showImport');
    Route::get('excel/orthopedic/services/errors','OrthopedicServicesController@showImportErrors');
    Route::post('excel/orthopedic/services','OrthopedicServicesController@postImport');

    //beneficiaries
    Route::get('beneficiaries','BeneficiaryController@index');
    Route::get('beneficiaries/create','BeneficiaryController@create');
    Route::post('beneficiaries/create','BeneficiaryController@store');
    Route::get('beneficiaries/edit/{id}','BeneficiaryController@edit');
    Route::get('beneficiaries/show/{id}','BeneficiaryController@show');
    Route::post('beneficiaries/edit','BeneficiaryController@update');
    Route::get('beneficiaries/remove/{id}','BeneficiaryController@destroy');
    Route::get('beneficiaries/json','BeneficiaryController@getJSonData');
   
    //Import 
    Route::get('excel/beneficiaries/errors','BeneficiaryController@showImportErrors');
    Route::get('excel/beneficiaries','BeneficiaryController@showImport');
    Route::post('excel/beneficiaries','BeneficiaryController@postImport');


    //social/needs
    Route::get('social/needs','SocialNeedController@index');
    Route::get('social/needs/beneficiaries','SocialNeedController@searchBeneficiaries');
    Route::get('social/needs/beneficiariesjson','SocialNeedController@getJSonData');
    Route::get('social/needs/create/{id}','SocialNeedController@create');
    Route::get('social/needs/pdf/{id}','SocialNeedController@getPdf');
    Route::get('social/needs/print/{id}','SocialNeedController@showPrint');
    Route::post('social/needs/create','SocialNeedController@store');
    Route::get('social/needs/edit/{id}','SocialNeedController@edit');
    Route::get('social/needs/show/{id}','SocialNeedController@show');
    Route::post('social/needs/edit','SocialNeedController@update');
    Route::get('social/needs/remove/{id}','SocialNeedController@destroy');

    //Import
    Route::get('excel/social/needs/errors','SocialNeedController@showImportErrors');
    Route::get('excel/social/needs','SocialNeedController@showImport');
    Route::post('excel/social/needs','SocialNeedController@postImport');

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
    Route::get('getallclients','ClientController@getJSonData');
    Route::get('searchclients','ClientController@getJSonDataSearch');
    
    //LiveliHood
    
     //Clients
    Route::resource('livelihood/clients','LiveHoodClientController');
    Route::get('excel/livelihood/clients','LiveHoodClientController@showImport');
    Route::post('excel/livelihood/clients','LiveHoodClientController@postImport');
    Route::get('remove/livelihood/clients/{id}','LiveHoodClientController@destroy');
    Route::get('reports/livelihood/clients','LiveHoodClientController@showReports');
    Route::get('livelihood/reports','LiveHoodClientController@showReports');

    //Groups
     Route::resource('livelihood/groups','LiveHoodGroupController');
     Route::get('excel/livelihood/groups','LiveHoodGroupController@showImport');
     Route::post('excel/livelihood/groups','LiveHoodGroupController@postImport');
     Route::get('remove/livelihood/groups/{id}','LiveHoodGroupController@destroy');


    //livelihood/materials
    Route::get('livelihood/materials','LiveliHoodsMaterialController@index');
    Route::get('livelihood/materials/beneficiaries','LiveliHoodsMaterialController@getBeneficiaries');
    Route::get('livelihood/materials/groups','LiveliHoodsMaterialController@getGroups');
    Route::get('livelihood/materials/create/{id}/{gtype}','LiveliHoodsMaterialController@create');
    Route::post('livelihood/materials/create','LiveliHoodsMaterialController@store');
    Route::get('livelihood/materials/edit/{id}','LiveliHoodsMaterialController@edit');
    Route::post('livelihood/materials/edit','LiveliHoodsMaterialController@update');
    Route::get('livelihood/materials/remove/{id}','LiveliHoodsMaterialController@destroy');
    Route::get('livelihood/materials/import','LiveliHoodsMaterialController@showImport');
    Route::post('livelihood/materials/import','LiveliHoodsMaterialController@index');

    //Fetch data
    Route::get('livelihood/getclients/json','LiveliHoodsMaterialController@getBeneficiariesJSonData');
    Route::get('livelihood/getgroups/json','LiveliHoodsMaterialController@getJSonData');


    
    //Assessments
    Route::get('assessment/{id}','ClientAssessmentController@getClientAssessments');
    Route::get('assessment','ClientAssessmentController@index');
    Route::get('assessment/client/{id}','ClientAssessmentController@newUserCreate');
    Route::post('assessment/client/','ClientAssessmentController@postNewUserCreate');
    Route::post('assessment/create','ClientAssessmentController@store');
    Route::get('assessment/create/{id}','ClientAssessmentController@create');
    Route::get('assessment/edit/{id}','ClientAssessmentController@edit');
    Route::post('assessment/edit','ClientAssessmentController@update');
    Route::get('assessment/download/{id}','ClientAssessmentController@downloadForm');
    Route::get('assessment/show/{id}','ClientAssessmentController@show');
    Route::get('assessment/print/{id}','ClientAssessmentController@printForm');
    Route::get('assessment/remove/{id}','ClientAssessmentController@destroy');


    ///Clients referrals
    Route::get('referrals','ClientReferralController@index');
    Route::get('referrals/request','ClientReferralController@referralRequest');
    Route::get('referrals/create/{id}','ClientReferralController@create');
    Route::post('referrals/create/','ClientReferralController@store');
    Route::get('referrals/print/{id}','ClientReferralController@show');
    Route::get('referrals/download/{id}','ClientReferralController@download');
    Route::get('referrals/show/{id}','ClientReferralController@show');
    Route::get('referrals/edit/{id}','ClientReferralController@edit');
    Route::post('referrals/edit','ClientReferralController@update');
    Route::get('referrals/reports','ClientReferralController@reports');
    Route::get('referrals/remove/{id}','ClientReferralController@destroy');
    Route::post('referrals/Search','ClientReferralController@GetClientList');
    

    //Disabilities 
    Route::get('general/disabilities','DisabilityController@index');
    Route::get('general/disabilities/create','DisabilityController@create');
    Route::post('general/disabilities/create','DisabilityController@store');
    Route::get('general/disabilities/edit/{id}','DisabilityController@edit');
    Route::post('general/disabilities/edit','DisabilityController@update');
    Route::post('general/disabilities/reports','DisabilityController@reports');
    Route::post('general/disabilities/remove/{id}','DisabilityController@destroy');

    //Client disabilities
    
    Route::get('disabilities/clients/show/{id}','ClientDisabilityController@showRegister');
    Route::post('disabilities/clients/show','ClientDisabilityController@postRegister');
    Route::get('disabilities','ClientDisabilityController@index');
    Route::get('disabilities/clients','ClientDisabilityController@searchClient');
    Route::get('disabledclients','ClientDisabilityController@getClients');
    Route::post('disabilities/create','ClientDisabilityController@store');
    Route::get('disabilities/create/{id}','ClientDisabilityController@create');
    Route::get('disabilities/edit/{id}','ClientDisabilityController@edit');
    Route::get('disabilities/print/{id}','ClientDisabilityController@showPrint');
    Route::get('disabilities/pdf/{id}','ClientDisabilityController@getPdf');
    Route::post('disabilities/edit','ClientDisabilityController@update');
    Route::get('disabilities/show/{id}','ClientDisabilityController@show');
    Route::get('disabilities/remove/{id}','ClientDisabilityController@destroy');


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
    Route::get('psn/assessment','PSNController@index');
    Route::get('psn/assessment/create/{id}','PSNController@create');
    Route::post('psn/assessment/create','PSNController@store');
    Route::get('psn/assessment/edit/{id}','PSNController@edit');
    Route::post('psn/assessment/edit','PSNController@update');
    Route::post('psn/assessment/reports','PSNController@reports');
    Route::get('psn/assessment/remove/{id}','PSNController@destroy');
    Route::get('social/rehabilitation/clients','PSNController@getClients');
    
    //Cases
    Route::get('sr/cases','PSNController@index');
    Route::get('sr/cases/create/{id}','PSNCaseReview@create');
    Route::post('sr/cases/create','PSNCaseReview@store');
    Route::get('sr/cases/edit/{id}','PSNCaseReview@edit');
    Route::post('sr/cases/edit','PSNCaseReview@update');
    Route::post('sr/cases/reports','PSNCaseReview@reports');
    Route::get('sr/cases/remove/{id}','PSNCaseReview@destroy');
    Route::get('sr/cases/clients','PSNCaseReview@index');

    //Material monitoring
    Route::get('sr/materials','ItemsDisbursementController@index');
    Route::post('sr/materials','ItemInventoryController@dashboard');

    Route::get('inventory','ItemInventoryController@index');
    Route::get('inventory/create','ItemInventoryController@create');
    Route::post('inventory/create','ItemInventoryController@store');
    Route::get('inventory/edit/{id}','ItemInventoryController@edit');
    Route::post('inventory/edit','ItemInventoryController@update');
    Route::get('inventory/show/{id}','ItemInventoryController@show');
    Route::get('inventory/remove/{id}','ItemInventoryController@destroy');
    Route::get('inventory/reports','ItemInventoryController@reports');
    
    //Import
    Route::get('inventory/import','ItemInventoryController@showImport');
    Route::post('inventory/import','ItemInventoryController@postImport');
    
    //Inventory categories
    Route::get('inventory/categories','ItemsCategoriesController@index');
    Route::get('inventory/categories/create','ItemsCategoriesController@create');
    Route::post('inventory/categories/create','ItemsCategoriesController@store');
    Route::get('inventory/categories/edit/{id}','ItemsCategoriesController@edit');
    Route::post('inventory/categories/edit','ItemsCategoriesController@update');
    Route::get('inventory/categories/show/{id}','ItemsCategoriesController@show');
    Route::get('inventory/categories/remove/{id}','ItemsCategoriesController@destroy');
    
    //ItemsDisbursementController
    Route::get('inventory/disbursement','ItemsDisbursementController@index');
    Route::get('inventory/disbursement/beneficiaries','ItemsDisbursementController@showBeneficiaries');
    Route::get('inventory/disbursement/create/{id}','ItemsDisbursementController@create');
    Route::post('inventory/disbursement/create','ItemsDisbursementController@store');
    Route::get('inventory/disbursement/edit/{id}','ItemsDisbursementController@edit');
    Route::get('inventory/disbursement/print/{id}','ItemsDisbursementController@show');
    Route::get('inventory/disbursement/pdf/{id}','ItemsDisbursementController@downloadPdf');
    Route::post('inventory/disbursement/edit','ItemsDisbursementController@update');
    Route::get('inventory/disbursement/show/{id}','ItemsDisbursementController@show');
    Route::get('inventory/disbursement/remove/{id}','ItemsDisbursementController@destroy');
    Route::get('inventory/disbursement/reports','ItemsDisbursementController@reports');
    Route::get('inventory/disbursement/import','ItemsDisbursementController@showImport');
    Route::post('inventory/disbursement/import','ItemsDisbursementController@postImport');
    Route::get('inventory/disbursement/import/errors','ItemsDisbursementController@showImportErrors');


    
    //ItemsReceivingController
    Route::get('inventory/received','ItemsReceivingController@index');
    Route::get('inventory/received/create','ItemsReceivingController@create');
    Route::post('inventory/received/create','ItemsReceivingController@store');
    Route::get('inventory/received/edit/{id}','ItemsReceivingController@edit');
    Route::post('inventory/received/edit','ItemsReceivingController@update');
    Route::get('inventory/received/show/{id}','ItemsReceivingController@show');
    Route::get('inventory/received/remove/{id}','ItemsReceivingController@destroy');
    Route::get('excel/import/received/items','ItemsReceivingController@showImport');
    Route::post('excel/import/received/items','ItemsReceivingController@postImport');

    //Mobility aids
    Route::get('mobility/aids','MobilityAidsController@index');
    Route::get('mobility/aids/create','MobilityAidsController@create');
    Route::post('mobility/aids/create','MobilityAidsController@store');
    Route::get('mobility/aids/edit/{id}','MobilityAidsController@edit');
    Route::post('mobility/aids/edit','MobilityAidsController@update');
    Route::get('mobility/aids/show/{id}','MobilityAidsController@show');
    Route::get('mobility/aids/remove/{id}','MobilityAidsController@destroy');

    //Data imports
    Route::get('excel/import/clients','ClientController@showImport');
    Route::post('excel/import/clients','ClientController@postImport');
    Route::post('excel/import/disabilities','ClientController@postDisabilityImport');
    Route::get('excel/import/disabilities','ClientController@showDisabilityImportError');
    Route::get('excel/import/clients/errors','ClientController@showClientImportError');
    Route::get('excel/import/referrals','ReferralImportController@index');
    Route::post('excel/import/referrals','ReferralImportController@store');
    Route::get('excel/import/apu','DataImportController@index');
    Route::get('excel/import/opu','DataImportController@index');



    //Site setup 

    Route::post('setting/organization/create','SiteSetupController@store');
    Route::post('setting/organization/edit','SiteSetupController@update');
    Route::get('setting/organization','SiteSetupController@index');
    //Reports 
    Route::get('mr/reports','ReportsController@getMrReports');
    Route::get('sr/reports','ReportsController@getSrReports');
    Route::get('general/reports','ReportsController@generalReports');


    //Reports
    Route::get('reports/assessment/roam','AssessmentRoamReportsController@index');
    Route::get('excel/export/clients','AssessmentRoamReportsController@exportClients');
    Route::get('reports/assessment/roam/generate','AssessmentRoamReportsController@showReportView');
    Route::post('reports/assessment/roam/generate','AssessmentRoamReportsController@generateReportView');

    Route::get('reports/rehabilitation/services','RehabilitationServicesReportController@index');
    Route::get('reports/rehabilitation/services/generate','RehabilitationServicesReportController@showReportView');
    Route::post('reports/rehabilitation/services/generate','RehabilitationServicesReportController@generateReportView');

    Route::get('reports/orthopedic/services','ReportsOrthopedicServicesController@index');
    Route::get('reports/orthopedic/services/generate','ReportsOrthopedicServicesController@showReportView');
    Route::post('reports/orthopedic/services/generate','ReportsOrthopedicServicesController@generateReportView');

    Route::get('reports/material/support','InventoryReportsController@index');
    Route::get('reports/material/support/generate','InventoryReportsController@showReportView');
    Route::post('reports/material/support/generate','InventoryReportsController@generateReportView');

    Route::get('reports/beneficiaries','BeneficiariesReportsController@index');
    Route::get('reports/beneficiaries/generate','BeneficiariesReportsController@showReportView');
    Route::post('reports/beneficiaries/generate','BeneficiariesReportsController@generateReportView');

    Route::get('reports/social/needs','ReportsOrthopedicServicesController@index');
    Route::get('reports/social/needs/generate','ReportsOrthopedicServicesController@showReportView');
    Route::post('reports/social/needs/generate','ReportsOrthopedicServicesController@generateReportView');


    Route::get('reports/livelihood','LiveliHoodReportController@index');

    //Backups and restore
    Route::get('backup/exports','BackupExportController@index');
    Route::post('backup/exports','BackupExportController@store');

    Route::get('backup/imports','BackupImportController@index');
    Route::post('backup/imports','BackupImportController@store');


});
