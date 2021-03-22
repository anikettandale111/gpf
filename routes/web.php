<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
    return view('auth.login');
});

Route::get('/languagechange/{locale}', 'HomeController@languagechange')->name('languagechange');
Route::get('/yearchange/{year}', 'HomeController@yearchange')->name('yearchange');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');



    // Monthly Change
    // Route::get('chalan', 'MonthlyChangeController@index');
    Route::post('deposit_insert_data', 'MonthlyChangeController@deposit_insert_data');
    Route::get('checkprv', 'MonthlyChangeController@deposit_insert_data');
    Route::post('deposit_delete/{id}', 'MonthlyChangeController@destroy');

    //chalan add
    Route::get('monthly_chalan', 'MonthlyChangeController@monthly_chalan');
    Route::post('get_chalan_amount', 'MonthlyChangeController@get_chalan_amount');
    Route::post('chalan_insert', 'MonthlyChangeController@chalan_insert');


    Route::get('change_pwd', 'HomeController@change_pwd');
    Route::post('submit_change_pwd', 'HomeController@submit_change_pwd');

    // user registration
    Route::get('user_registration', 'HomeController@user_registration');
    Route::get('user_registration_Edit/{id}', 'HomeController@user_registration_Edit');
    Route::post('user_registration_update', 'HomeController@update_req');
    Route::get('Registration_Delete/{id}/{para}', 'HomeController@Registration_Delete');

    // create registration
    Route::post('create_register', 'HomeController@create_register');

    // Nomination Recored

    Route::get('nomination_record', 'NominationController@index');
    Route::post('nomination_insert_data', 'ChalanController@nomination_insert_data');
    Route::post('nomination_Delete/{id}', 'ChalanController@nomination_Delete');
    Route::post('nomination_rerd', 'ChalanController@nomination_rerd');

    //Providing Account Number
    Route::get('ganrate_new_number', 'ProvidingAccountController@index');
    Route::post('ganrate_insert_no', 'ProvidingAccountController@ganrate_insert_no');
    Route::get('assigned_gpf_number/{id}', 'ProvidingAccountController@assigned_gpf_number');
    Route::post('ganrate_Delete/{id}', 'ProvidingAccountController@ganrate_Delete');
    Route::post('ganrate_new', 'ProvidingAccountController@ganrate_new');

    // vetan
    Route::get('vetan', 'VetanController@index');
    Route::post('vetan_insert_no', 'VetanController@vetan_insert');
    Route::post('vetan_new', 'VetanController@vetan_new');
    Route::post('vetan_Delete/{id}', 'VetanController@vetan_Delete');


    Route::get('closed_account', 'AccountclosedController@index');
    Route::post('account_Insert_Data', 'AccountclosedController@account_Insert_Data');
    Route::post('account_new', 'AccountclosedController@account_new');
    Route::post('account_Delete/{id}', 'AccountclosedController@account_Delete');

    //Bill No
    Route::get('bill_information', 'BillController@index');
    Route::post('bill_insert', 'BillController@bill_insert');
    Route::post('edit_bill','BillController@edit_bill');
    Route::post('delete_bill','BillController@delete_bill');
     // Get Max Bill Number
     Route::get('getLastBillNO', 'BillController@getlast_billnumber');

    // Districts
    Route::resource('districts', DistrictsController::class);
    // Taluka
    Route::resource('taluka', TalukaMasterController::class);
    // Department
    Route::resource('department', DepartmentMasterController::class);
    // designation
    Route::resource('designation', DesignationMasterController::class);
    //classification
    Route::resource('classification', ClassificationMasterController::class);
    //Bank
    Route::resource('bank', BankMasterController::class);
    // Year
    Route::resource('Year', YearController::class);
    // Customer Registration
    // Route::get('customer_registration', 'CustomerRegistrationController@index');
    // Route::post('custmoer_insert_data', 'CustomerRegistrationController@custmoer_insert_data');
    // Route::post('customer_delete/{id}', 'CustomerRegistrationController@customer_delete');
    // Route::get('customer_edit/{id}', 'CustomerRegistrationController@customer_edit');
    // Route::post('customer_update', 'CustomerRegistrationController@customer_update');
    // Route::post('customer_new', 'CustomerRegistrationController@customer_new');

    Route::resource('customer_registration', CustomerRegistrationController::class);
    // Common Application Forms
    Route::get('getLastApplicationNumber', 'CommonApplicationController@getLastApplicationNumber');
    Route::get('getuserdetailsbygpfno', 'CommonApplicationController@getuserdetailsbygpfno');
    // Excel/PDFFile Upload For Monthly Subscription
    Route::any('testjson', 'FileUploadController@testjson');
    Route::any('testpdf', 'FileUploadController@testpdf');
    Route::resource('fileupload', FileUploadController::class);
    // Common Application Forms
    Route::get('listcommonforms', 'CommonApplicationController@listcommonforms');
    Route::get('viewapplication/{id?}', 'CommonApplicationController@viewapplication');
    Route::resource('commonforms', CommonApplicationController::class);
    // Reasons
    // Application form
    Route::resource('commonreasons', CommonReasonsController::class);
    // Employee Reports
    Route::get('getAllEmpKhatevahi', 'EmployeeReportsController@getAllEmpKhatevahi');
    Route::get('getAllEmpKhateUtara', 'EmployeeReportsController@getAllEmpKhateUtara');
    Route::get('getAllEmpFormEN', 'EmployeeReportsController@getAllEmpFormEN');
    Route::resource('employeereports', EmployeeReportsController::class);
    // Chalan Controller
    Route::get('chalanSubscriptionDetails', 'ChalanController@chalanSubscriptionDetails');
    Route::get('chalandetails', 'ChalanController@chalandetails');
    Route::resource('chalan', ChalanController::class);
    // Chalan Controller
    Route::post('chalanTableDetails', 'SubscriptionController@chalanTableDetails');
    Route::resource('subscription', SubscriptionController::class);

    Route::get('application_form', 'ApplicationController@application_form');
    // Get Max GPF Number
    Route::get('getLastApplicationNo', 'ProvidingAccountController@getLastApplicationNo');
    Route::get('genarate_view/{id}', 'ProvidingAccountController@genarate_view');
    Route::get('master_employee_view', 'MasteremployeeController@master_employee_view');


});
