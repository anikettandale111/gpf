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
use Session;
use Illuminate\Support\Facades\DB;

class AccountclosedController extends Controller
{
  public function index(){
    $lang = app()->getLocale();
    $financial_year = session()->get('financial_year');
    $receivedForms = AccountNaamNirdeshan::where('financial_year',$financial_year)->get();
    return view('Closedaccount/accclosedform',compact('receivedForms'));
  }
  public function create(){
    $lang = app()->getLocale();
    $desg_data = Designation::select('id AS desg_id','designation_name_'.$lang.' AS designation_name')->get();
    $month_data=month::select('id AS month_id','month_name_'.$lang.' AS month_name')->orderBy('order_by')->get();
    return view('Closedaccount/accclosedformcreate',compact('month_data','desg_data'));
  }
  public function store(Request $request){
    $financial_year = session()->get('financial_year');
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
      'closing_balance' => ($request->closing_balance)?$request->closing_balance:'',
      'retirment_date' => ($request->retirment_date)?$request->retirment_date:'',
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
      'financial_year' => $financial_year,
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
  public function reportOne($id){
    $lang = app()->getLocale();
    $year = session()->get('year');
    $viewapplication = AccountNaamNirdeshan::where('form_id',$id)->first();
    $financial_year = session()->get('financial_year');
    $roi = DB::raw("SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=".session()->get('to_year'));
    $roi_result = DB::select($roi);
    // $roi = DB::raw('SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=2019');
    // $roi_result = DB::select($roi);
    // $financial_year = '2020-2021'; // Only for previous year
    $month_name = DB::table('master_month')->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')
                  ->orderBy('order_by')->get();
    $rqo_result = [];
    $employee_gpf_num = $viewapplication->employee_gpf_num;
    // $employee_gpf_num = 12184;
    $query_one = DB::table('master_employee AS me')
                    ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name',
                      'dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name',
                      'mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                    ->join('master_gpf_transaction AS mgt','mgt.gpf_number','me.employee_id')
                    ->join('taluka AS tl','tl.id','me.taluka_id')
                    ->join('classifications AS c','c.id','me.classification_id')
                    ->join('departments AS dp','dp.department_code','me.department_id')
                    ->join('designations AS dg','dg.id','me.designation_id')
                    ->where(['me.employee_id' =>$employee_gpf_num, 'mgt.financial_year'=>$financial_year])
                    // ->where(['me.taluka_id' =>16, 'mgt.financial_year'=>$financial_year])
                    ->groupBy('mgt.employee_id');
    $rqo_result = $query_one->get();
    $viewapplication = AccountNaamNirdeshan::where('form_id',$id)->first();
    return view('Closedaccount/aadeshone',compact('viewapplication','rqo_result','roi_result','month_name'));
  }
  public function reportTwo($id){
    $viewapplication = AccountNaamNirdeshan::where('form_id',$id)->first();
    return view('Closedaccount/aadeshtwo',compact('viewapplication'));
  }
}
