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
    Route::resource('user_registration', UserRegistrationController::class);

    // Route::get('user_registration', 'HomeController@user_registration');
    // Route::get('user_registration_Edit/{id}', 'HomeController@user_registration_Edit');
    // Route::post('user_registration_update', 'HomeController@update_req');
    // Route::get('Registration_Delete/{id}/{para}', 'HomeController@Registration_Delete');

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

    // Get Bill Rport Amount
    Route::get('get_bill_report/{id?}', 'AntimBillExpensesController@get_bill_report');
    // Get Bill Total Amount
    Route::post('get_bill_amount', 'AntimBillController@get_bill_amount');
    // Get Max Bill Number
    Route::get('getLastBillNO', 'AntimBillController@getlast_billnumber');

    Route::resource('antimbill', AntimBillController::class);
    //Antim Bill Pryojan Expenses
    Route::get('getBillExpensesDetails', 'AntimBillExpensesController@getBillExpensesDetails');
    Route::resource('antimbillexpenses', AntimBillExpensesController::class);
    Route::post('viewreport/{billid?}/{rtype?}', 'BillReportsController@viewreport');
    Route::resource('billreports', BillReportsController::class);

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
    // Common Application Forms
    Route::get('getLastApplicationNumber', 'CommonApplicationController@getLastApplicationNumber');
    Route::get('getuserdetailsbygpfno', 'CommonApplicationController@getuserdetailsbygpfno');
    Route::get('getUserBalances', 'CommonApplicationController@getUserBalances');
    Route::post('updateBalance', 'EmployeeController@updateBalance');
    // Excel/PDFFile Upload For Monthly Subscription
    Route::any('testjson', 'FileUploadController@testjson');
    Route::any('testpdf', 'FileUploadController@testpdf');
    Route::resource('fileupload', FileUploadController::class);
    // Common Application Forms
    Route::get('listcommonforms', 'CommonApplicationController@listcommonforms');
    Route::get('viewapplication/{id?}', 'CommonApplicationController@viewapplication');
    Route::resource('commonforms', CommonApplicationController::class);
    // Reasons3
    // Application form
    Route::resource('commonreasons', CommonReasonsController::class);
    // Employee Reports
    Route::get('getAllEmpKhatevahi', 'EmployeeReportsController@getAllEmpKhatevahi');
    Route::get('getAllEmpKhateUtara', 'EmployeeReportsController@getAllEmpKhateUtara');
    Route::get('getAllEmpFormEN', 'EmployeeReportsController@getAllEmpFormEN');
    Route::resource('employeereports', EmployeeReportsController::class);
    Route::resource('closedaccountreports', ClosedAccountReportsController::class);
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
    Route::post('approved_new_gpf_no', 'ProvidingAccountController@approved_new_gpf_no');
    Route::post('reject_new_gpf_no', 'ProvidingAccountController@reject_new_gpf_no');
    Route::get('master_employee_view', 'MasteremployeeController@master_employee_view');

    Route::get('reportone/{id}', 'AccountclosedController@reportone');
    Route::get('reporttwo/{id}', 'AccountclosedController@reporttwo');
    Route::resource('accountclosed',AccountclosedController::class);

    Route::get('getEmployeeDetails', 'EmployeeController@getEmployeeDetails');
    Route::get('employee_list', 'EmployeeController@getEmployeeList');
    Route::resource('employee',EmployeeController::class);
    Route::resource('transfer',TransferController::class);
    Route::resource('chalanGhoshwara',ChalanReportController::class);

    Route::get('calculationOne', 'VetanController@calculationOne');
});
