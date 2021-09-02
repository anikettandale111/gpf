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
use App\MonthlyTotalChalan;
use Session;
use Config;
use DB;

class SubscriptionController extends Controller {
  public function __construct()
  {
    $this->middleware('auth');
    if(session('from_year') !== null){

    } else {
      Session::put('from_year', date("Y"));
      Session::put('to_year', date("Y",strtotime("+1 year")));
      Session::put('financial_year', date("Y").'-'.date("Y",strtotime("+1 year")));
    }
    $this->middleware(function ($request, $next) {
      // fetch session and use it in entire class with constructor
      $current_db = session('selected_database');
      if(session('selected_database') == null){
        $current_db = 'mysql';
        Session::put('selected_database','mysql');
      }
      Config::set('database.default',$current_db);
      return $next($request);
    });
  }
  public function index(Request $request) {
    $data ['month']=Month::orderBy('order_by')->get();
    $data ['classification']=Classification::all();
    $data ['taluka']=Taluka::all();
    return view('Admin.Chalan.monthly_chalan', $data);
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
      $data['monthly_received'] = (int)$request->deposit_amt + (int)$request->refund+ (int)$request->pending_amt;
      $data['monthly_contrubition'] = $request->deposit_amt;
      $data['loan_installment'] = $request->refund;
      $data['monthly_other'] = $request->pending_amt;
      $data['is_active'] = 0;
      $data['loan_amonut'] = 0;
      $data['modifed_by'] = Auth::id();
      $create = MasterMonthlySubscription::insert($data);
      if($create){
        /*$chalan_id = $request->chalan_id;
        $diffrence_amount = ($request->chalan_amount-($request->subscribed_rakkam+((int)$request->deposit_amt + (int)$request->refund+ (int)$request->pending_amt)));
        $updateRes = MonthlyTotalChalan::where(['id'=>$chalan_id,])->update(['diff_amount'=>$diffrence_amount]);*/
      }
      return ['status'=>'Success','message'=>' Data Successfully Added'];
    } else {
      return ['status' =>'warning' ,'message'=>'Data Already exist'];
    }
  }
  public function getChalanSubscriptionByID(Request $request){
    $lang = app()->getLocale();
    return MasterMonthlySubscription::select('master_emp_monthly_contribution_two.*','me.employee_name',
    'dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name')
    ->leftjoin('master_employee AS me','me.gpf_no','=','master_emp_monthly_contribution_two.gpf_number')
    ->leftjoin('departments AS dp','dp.department_code','=','master_emp_monthly_contribution_two.emc_dept_id')
    ->leftjoin('designations AS dg','dg.id','=','master_emp_monthly_contribution_two.emc_desg_id')
    ->where('master_emp_monthly_contribution_two.emc_id',$request->subid)
    ->first();
  }
  public function updateMonthlySubscription(Request $request){
    $up_data[] = $request->emc_row_id;
    $up_data[] = $request->prv_contribution;
    $up_data[] = $request->prv_installment;
    $up_data[] = $request->prv_other;
    $up_data[] = $request->prv_total_contri;
    $up_data[] = $request->new_contribution;
    $up_data[] = $request->new_installment;
    $up_data[] = $request->new_other;
    $up_data[] = $request->new_total_contri;
    $result = MasterMonthlySubscription::where('emc_id',$request->emc_row_id)->update();
  }
  public function deleteChalanSubscription(Request $request){
    $prvData = MasterMonthlySubscription::select('monthly_received','challan_id')
              ->where('emc_id',$request->subid)
              ->where('is_active',0)->first();
    MonthlyTotalChalan::where(['id'=>$prvData->challan_id])->update(['diff_amount'=>DB::raw('diff_amount +'.$prvData->monthly_received)]);
    $result = MasterMonthlySubscription::where('emc_id',$request->subid)->where('is_active',0)->delete();
    if($result){
      return ['status'=>'success','message' => 'Entry deleted successfully.'];
    }else{
      return ['status'=>'success','message' => 'Sorry please try again.'];
    }
  }
}
