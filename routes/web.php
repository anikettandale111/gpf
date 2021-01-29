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
    return view('welcome');
});

Route::get('/languagechange/{locale}', 'HomeController@languagechange')->name('languagechange');

Auth::routes();
Route::middleware('auth')->group(function(){
Route::get('/home', 'HomeController@index')->name('home');
// year
Route::get('Year','TalukaController@year');
Route::post('Year_Insert_Data','TalukaController@Year_Insert_Data');
Route::get('Year_Edit/{id}','TalukaController@Year_Edit');
Route::post('Year_Update', 'TalukaController@Year_Update');
Route::get('Year_Delete/{id}', 'TalukaController@Year_Delete');

// Monthly Change
Route::get('chalan', 'MonthlyChangeController@index');
Route::post('deposit_insert_data','MonthlyChangeController@deposit_insert_data');
Route::get('checkprv', 'MonthlyChangeController@deposit_insert_data');
Route::post('deposit_delete/{id}','MonthlyChangeController@destroy');

//chalan add
Route::get('monthly_chalan', 'MonthlyChangeController@monthly_chalan');
Route::post('get_chalan_amount', 'MonthlyChangeController@get_chalan_amount');
Route::post('chalan_insert','MonthlyChangeController@chalan_insert');


Route::get('change_pwd', 'HomeController@change_pwd');
Route::post('submit_change_pwd', 'HomeController@submit_change_pwd');

// user registration
Route::get('user_registration', 'HomeController@user_registration');
Route::get('user_registration_Edit/{id}', 'HomeController@user_registration_Edit');
Route::post('user_registration_update','HomeController@update_req');
Route::get('Registration_Delete/{id}/{para}','HomeController@Registration_Delete');

// create registration
Route::post('create_register', 'HomeController@create_register');



Route::get('Nomination_record', 'ChalanController@Nomination_record');
Route::post('Nomination_Insert_Data','ChalanController@Nomination_Insert_Data');
Route::post('nomination_Delete/{id}','ChalanController@nomination_Delete');
Route::post('nomination_rerd','ChalanController@nomination_rerd');

//Providing Account Number
Route::get('ganrate_new_number', 'ProvidingAccountController@index');
Route::post('ganrate_insert_no','ProvidingAccountController@ganrate_insert_no');
Route::get('ganrate_reports/{id}','ProvidingAccountController@ganrate_reports');
Route::post('ganrate_Delete/{id}','ProvidingAccountController@ganrate_Delete');
Route::post('ganrate_new','ProvidingAccountController@ganrate_new');

// vetan





// vetan
Route::get('vetan','VetanController@index');
Route::post('vetan_insert_no','VetanController@vetan_insert');
Route::post('vetan_new','VetanController@vetan_new');
Route::post('vetan_Delete/{id}','VetanController@vetan_Delete');


Route::get('closed_account','AccountclosedController@closed_account');
Route::post('account_Insert_Data','AccountclosedController@account_Insert_Data');
Route::post('account_new','AccountclosedController@account_new');
Route::post('account_Delete/{id}','AccountclosedController@account_Delete');

//Bill No
Route::get('bill_information','BillController@index');
Route::post('bill_insert','BillController@bill_insert');

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
// Customer Registration
Route::get('customer_registration','CustomerRegistrationController@index');
Route::post('custmoer_insert_data', 'CustomerRegistrationController@custmoer_insert_data');
Route::post('customer_delete/{id}', 'CustomerRegistrationController@customer_delete');
Route::get('Customer_edit/{id}','CustomerRegistrationController@customer_edit');
Route::post('customer_update','CustomerRegistrationController@customer_update');
Route::post('customer_new','CustomerRegistrationController@customer_new');


// Reasons
Route::resource('commonreasons', CommonReasonsController::class);
// Application form
Route::get('application_form','ApplicationController@application_form');







});
