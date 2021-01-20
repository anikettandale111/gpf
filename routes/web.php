<?php

use Illuminate\Support\Facades\Route;

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
Route::get('Taluka', 'TalukaController@index');
Route::post('Taluka_Insert_Data', 'TalukaController@Taluka_Insert_Data');
Route::get('Taluka_Edit/{id}', 'TalukaController@Taluka_Edit');
Route::post('Taluka_Update', 'TalukaController@Taluka_Update');
Route::get('Talukat_Delete/{id}', 'TalukaController@Talukat_Delete');

Route::get('Year','TalukaController@year');
Route::post('Year_Insert_Data','TalukaController@Year_Insert_Data');
Route::get('Year_Edit/{id}','TalukaController@Year_Edit');
Route::post('Year_Update', 'TalukaController@Year_Update');
Route::get('Year_Delete/{id}', 'TalukaController@Year_Delete');

Route::get('Customer_Registration','TalukaController@Customer_Registration');
Route::post('Custmoer_Insert_Data', 'TalukaController@Custmoer_Insert_Data');
Route::post('Customer_Delete/{id}', 'TalukaController@Customer_Delete');
Route::get('Customer_Edit/{id}','TalukaController@Customer_Edit');
Route::post('Update_Customer','TalukaController@Update_Customer');
Route::post('Customer_new','TalukaController@Customer_new');


Route::get('Master','TalukaController@Master');
Route::post('Master_Insert_Data','TalukaController@Master_Insert_Data');
Route::get('master_Edit/{id}','TalukaController@master_Edit');
Route::post('Update_master','TalukaController@Update_master');
Route::get('master_Delete/{id}','TalukaController@master_Delete');

Route::get('department','TalukaController@department');
Route::post('department_Insert_Data','TalukaController@department_Insert_Data');
Route::get('department_Edit/{id}','TalukaController@department_Edit');
Route::post('Update_department','TalukaController@Update_department');
Route::get('department_Delete/{id}', 'TalukaController@department_Delete');

Route::get('designation','TalukaController@designation');
Route::post('designation_Insert_Data','TalukaController@designation_Insert_Data');
Route::get('designation_Edit/{id}','TalukaController@designation_Edit');
Route::post('Update_designation','TalukaController@Update_designation');
Route::get('designation_Delete/{id}', 'TalukaController@designation_Delete');

Route::get('classification','TalukaController@classification');
Route::post('classification_Insert_Data','TalukaController@classification_Insert_Data');
Route::get('classification_Edit/{id}','TalukaController@classification_Edit');
Route::post('Update_classification','TalukaController@Update_classification');
Route::get('classification_Delete/{id}', 'TalukaController@classification_Delete');



Route::get('Trend_add', 'TrendController@Trend_add');

Route::post('deposit_Insert_Data','TrendController@deposit_Insert_Data');
Route::get('checkprv', 'TrendController@deposit_Insert_Data');

// Route::get('	/{id}', 'TrendController@deposit_Delete');
Route::get('deposit_Delete/{id}','TrendController@destroy');

Route::get('change_pwd', 'HomeController@change_pwd');
Route::post('submit_change_pwd', 'HomeController@submit_change_pwd');

Route::get('user_registration', 'HomeController@user_registration');
Route::get('user_registration_Edit/{id}', 'HomeController@user_registration_Edit');
Route::post('user_registration_update','HomeController@update_req');
Route::get('Registration_Delete/{id}/{para}','HomeController@Registration_Delete');

Route::post('create_register', 'HomeController@create_register');

Route::get('monthly_chalan', 'ChalanController@index');
Route::post('get_chalan_amount', 'ChalanController@get_chalan_amount');

Route::get('Nomination_record', 'ChalanController@Nomination_record');
Route::post('Nomination_Insert_Data','ChalanController@Nomination_Insert_Data');
Route::post('nomination_Delete/{id}','ChalanController@nomination_Delete');
Route::post('nomination_rerd','ChalanController@nomination_rerd');



Route::get('ganrate_new_number', 'TrendController@ganrate_new_number');
Route::post('ganrate_insert_no','TrendController@ganrate_insert_no');
Route::get('ganrate_reports/{id}','TrendController@ganrate_reports');
Route::post('ganrate_Delete/{id}','TrendController@ganrate_Delete');
Route::post('ganrate_new','TrendController@ganrate_new');

Route::get('vetan','TrendController@vetan');
Route::post('vetan_insert_no','TrendController@vetan_insert');
Route::post('vetan_new','TrendController@vetan_new');
Route::post('vetan_Delete/{id}','TrendController@vetan_Delete');


Route::get('closed_account','AccountclosedController@closed_account');
Route::post('account_Insert_Data','AccountclosedController@account_Insert_Data');
Route::post('account_new','AccountclosedController@account_new');
Route::post('account_Delete/{id}','AccountclosedController@account_Delete');

//chalan add
Route::post('chalan_insert','ChalanController@chalan_insert');



});
