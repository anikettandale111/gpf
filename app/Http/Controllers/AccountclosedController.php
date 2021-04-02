<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taluka;
use App\Year;
use App\Account;
use App\Bank;
use App\Department;
use App\Designation;
use App\Classification;
use App\Month;
use App\AccountNaamNirdeshan;
use Illuminate\Support\Facades\DB;

class AccountclosedController extends Controller
{
  public function index(){
    $lang = app()->getLocale();
    $receivedForms = AccountNaamNirdeshan::get();
    return view('Closedaccount/accclosedform',compact('receivedForms'));
  }
  public function create(){
    $lang = app()->getLocale();
    $desg_data = Designation::select('id AS desg_id','designation_name_'.$lang.' AS designation_name')->get();
    $month_data=month::select('id AS month_id','month_name_'.$lang.' AS month_name')->orderBy('order_by')->get();
    return view('Closedaccount/accclosedformcreate',compact('month_data','desg_data'));
  }
  public function store(Request $request){
    $form_data = [
      'form_type' => $request->form_type,
      'employee_gpf_num' => ($request->employee_gpf_num)?$request->employee_gpf_num:'',
      'user_name' => ($request->user_name)?$request->user_name:'',
      'user_designation' => ($request->user_designation)?$request->user_designation:'',
      'user_joining_date' => ($request->user_joining_date)?$request->user_joining_date:'',
      'user_taluka_name' => ($request->user_taluka_name)?$request->user_taluka_name:'',
      'user_department' => ($request->user_department)?$request->user_department:'',
      'applicant_relation' => ($request->applicant_relation)?$request->applicant_relation:'',
      'applicant_name' => ($request->applicant_name)?$request->applicant_name:'',
      'applicantion_date' => ($request->applicantion_date)?$request->applicantion_date:'',
      'gat_vikas_adhikari_no' => ($request->gat_vikas_adhikari_no)?$request->gat_vikas_adhikari_no:'',
      'zp_adhikari_no' => ($request->zp_adhikari_no)?$request->zp_adhikari_no:'',
      'antim_pryojan' => ($request->antim_pryojan)?$request->antim_pryojan:'',
      'antim_pay_month' => ($request->antim_pay_month)?$request->antim_pay_month:'',
      'antim_pay_year' => ($request->antim_pay_year)?$request->antim_pay_year:'',
      'antim_6pay_month' => ($request->antim_6pay_month)?$request->antim_6pay_month:'',
      'antim_6pay_year' => ($request->antim_6pay_year)?$request->antim_6pay_year:'',
      'antim_instllment_month' => ($request->antim_instllment_month)?$request->antim_instllment_month:'',
      'antim_instllment_year' => ($request->antim_instllment_year)?$request->antim_instllment_year:'',
      'fo_gat_vikas_adhikari_no' => ($request->fo_gat_vikas_adhikari_no)?$request->fo_gat_vikas_adhikari_no:'',
      'fo_zp_adhikari_no' => ($request->fo_zp_adhikari_no)?$request->fo_zp_adhikari_no:'',
      'vibhag_samiti_no' => ($request->vibhag_samiti_no)?$request->vibhag_samiti_no:'',
      'transfer_prmotion_office' => ($request->transfer_prmotion_office)?$request->transfer_prmotion_office:'',
      'transfer_office_gpf_no' => ($request->transfer_office_gpf_no)?$request->transfer_office_gpf_no:'',
      'application_copy_kramanak_one' => ($request->application_copy_kramanak_one)?$request->application_copy_kramanak_one:'',
      'application_copy_kramanak_two' => ($request->application_copy_kramanak_two)?$request->application_copy_kramanak_two:'',
      'application_copy_kramanak_three' => ($request->application_copy_kramanak_three)?$request->application_copy_kramanak_three:'',
      'account_closed_ft_transfer' => ($request->account_closed_ft_transfer)?$request->account_closed_ft_transfer:'',
    ];
    $result_id = AccountNaamNirdeshan::insert($form_data);
    if($result_id > 0){
      return ['status'=>'success','message'=>'Form Saved Successfully'];
    }else{
      return ['status'=>'danger','message'=>'Sorry,Please Try Again.'];
    }
  }
  public function show($id){
    $viewapplication = AccountNaamNirdeshan::where('form_id',$id)->get();
    return view('Closedaccount/accclosedview',compact('viewapplication'));
  }
}
