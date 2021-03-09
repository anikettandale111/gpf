<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Taluka;
use App\Month;
use App\Classification;
use App\Chalan;
use App\MasterMonthlySubscription;
use DataTable;
use App\Deposit;

class SubscriptionController extends Controller {
  public function index(Request $request) {
    $data ['month']=month::all();
    $data ['classification']=Classification::all();
    $data ['taluka']=Taluka::all();
    return view('Admin.chalan.monthly_chalan', $data);
  }
  public function store(Request $request){
    $res = MasterMonthlySubscription::where(['gpf_number'=>$request->gpf_account_id,'challan_id'=>$request->chalan_id])->get();
    if(count($res) == 0) {
      $data['gpf_number'] = $request->gpf_account_id;
      $data['classification_id'] = $request->classification_id;
      $data['taluka_id'] = $request->taluka_id;
      $data['challan_id'] = $request->chalan_id;
      $data['challan_number'] = $request->chalan_number;
      $data['emc_month'] = $request->chalan_month;
      $data['emc_year'] = $request->selected_year;
      $data['emc_emp_id'] = $request->user_id;
      $data['emc_desg_id'] = $request->user_designation_id;
      $data['emc_dept_id'] = $request->user_department_id;
      $data['monthly_received'] = $request->total_monthly_pay;
      $data['monthly_contrubition'] = $request->deposit_amt;
      $data['loan_installment'] = $request->pending_amt;
      $data['monthly_other'] = 0;
      $data['loan_amonut'] = $request->refund;
      $data['modifed_by'] = Auth::id();
      print_r($data);dd();
      $create = MasterMonthlySubscription::insert($data);
      return ['status'=>'Success','message'=>' Data Successfully Added'];
    } else {
      return ['status' =>'warning' ,'message'=>'Data Already exist'];
    }
  }
  public function chalanTableDetails(Request $request){
    return MasterMonthlySubscription::where('challan_id',$request->chalan_id)->get();
  }
}
