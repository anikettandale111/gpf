<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taluka;
use App\Month;
use App\Classification;
use App\Chalan;
use App\MasterMonthlySubscription;
use App\MonthlyTotalChalan;
use DataTable;
use Session;
use Config;
use DB;

class ChalanController extends Controller
{
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
    $data ['month']=month::orderBy('order_by')->get();
    $data ['classification']=Classification::all();
    $data ['taluka']=Taluka::all();
    if($request->ajax()){
      $deposits=MonthlyTotalChalan::select("tbl_monthly_total_chalan.*","tbl_monthly_total_chalan.created_at AS crateddate","tbl_monthly_total_chalan.id as chalan_id","taluka.id as  tid","taluka.taluka_name_mar as taluka_name","classifications.id as cid","classifications.classification_name_mar","master_month.month_name_mar",)
      ->leftJoin("taluka", "taluka.id", "=","tbl_monthly_total_chalan.taluka")
      ->leftJoin("classifications", "classifications.id", "=", "tbl_monthly_total_chalan.classification")
      ->leftJoin("master_month", "master_month.id", "=", "tbl_monthly_total_chalan.chalan_month_id")
      ->where("tbl_monthly_total_chalan.year", session()->get('from_year'))
      ->where("tbl_monthly_total_chalan.chalan_month_id", ">=", 4)
      ->where("tbl_monthly_total_chalan.is_delete", "=", 1);
      $deposits_two=MonthlyTotalChalan::select("tbl_monthly_total_chalan.*","tbl_monthly_total_chalan.created_at AS crateddate","tbl_monthly_total_chalan.id as chalan_id","taluka.id as  tid","taluka.taluka_name_mar as taluka_name","classifications.id as cid","classifications.classification_name_mar","master_month.month_name_mar",)
      ->leftJoin("taluka", "taluka.id", "=","tbl_monthly_total_chalan.taluka")
      ->leftJoin("classifications", "classifications.id", "=", "tbl_monthly_total_chalan.classification")
      ->leftJoin("master_month", "master_month.id", "=", "tbl_monthly_total_chalan.chalan_month_id")
      ->where("tbl_monthly_total_chalan.year", session()->get('to_year'))
      ->where("tbl_monthly_total_chalan.chalan_month_id", "<=", 3)
      ->where("tbl_monthly_total_chalan.is_delete", "=", 1)
      ->union($deposits)
      ->latest()->get();

      return datatables()->of($deposits_two)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        $btn = '<button onClick="editChalan('.$row->id.')" data-original-title="Edit" class="btn btn-primary btn-sm">Edit</button>';
        $btn = $btn.'<button onClick="deleteChalan('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</button>';
        return $btn;
      })
      ->rawColumns(['action'])
      ->make(true);
    }
    return view ("Admin.Chalan.chalan", $data);
  }
  public function store(Request $request){
    // $req = MonthlyTotalChalan::select('primary_number')->latest()->first();
      $monthName = month::select('month_name_mar')->where('id',$request->chalan_month)->first();
      if($request->chalan_sr_id > 0){
        $result = MonthlyTotalChalan::where('id',$request->chalan_sr_id)->first();
        if(isset($result) && $result)
        {
          $data['amount'] = $request->chalan_amount;
          $data['diff_amount'] = ($request->chalan_amount-$result->distrubuted_amt);
          //$data['distrubuted_amt'] = $request->chalan_amount;
        }
      }
      else
      {
        $data['amount'] = $request->chalan_amount;
        $data['diff_amount'] = $request->chalan_amount;
       // $data['distrubuted_amt'] = $request->chalan_amount;
      }
      $data['year'] = $request->chalan_year;
      $data['chalan_date'] = $request->chalan_date;
      $data['classification'] = $request->classification_type;
      $data['taluka'] = $request->chalan_taluka;
      
      $data['remark'] = $request->chalan_remark;
      $data['chalan_month_id'] = $request->chalan_month;
      $data['chalan_serial_no'] = $request->chalan_serial_no;
      $data['chalan_date'] = $request->chalan_date;
      $data['chalan_no'] = $monthName->month_name_mar.' '.$request->chalan_serial_no;
      $data['total_waste'] = 0;
      $msg =' Chalan Already Exists with same details';
      $status = "danger";
      if($request->chalan_sr_id > 0){
        MonthlyTotalChalan::where('id',$request->chalan_sr_id)->update($data);
        $msg ='Chalan Details Updated Successfully';
        $status = "success";
      } else {
        $res = MonthlyTotalChalan::where(['chalan_month_id'=>$request->chalan_month,
              'chalan_serial_no'=>$request->chalan_serial_no,'year'=>$request->chalan_year,
              'taluka'=>$request->chalan_taluka])->get();
          if(count($res) == 0) {
            MonthlyTotalChalan::insertGetId($data);
            $status = "success";
            $msg ='Chalan Details Saved Successfully';
          }
      }
    return redirect()->back()->with(session()->flash($status, $msg));
  }
  public function chalandetails(Request $request){
    $data['chalan_month_id'] = $request->chalan_month;
    $data['year'] = $request->year;
    $data['chalan_serial_no'] = $request->chalan_number;
    $data['taluka'] = $request->chalan_taluka;
    // $deposits=MonthlyTotalChalan::select('id as chalan_id','amount','primary_number','diff_amount','taluka','classification')->where($data)->first();
    $deposits = MonthlyTotalChalan::select('id as chalan_id','amount','year','chalan_month_id','chalan_serial_no',
              'diff_amount','taluka','classification')
              ->where($data)
              ->first();
    $res = '';
    $distributed_rakkam = 0;
    if(!empty($deposits->chalan_id))
    {
      $lang = app()->getLocale();
      $distributed_rakkam = MasterMonthlySubscription::where('challan_id',$deposits->chalan_id)->sum('monthly_received');
      $res = MasterMonthlySubscription::select('master_emp_monthly_contribution_two.*','users.name','me.employee_name',
      'tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mm.month_name_'.$lang.' AS month_name')
      ->where('master_emp_monthly_contribution_two.challan_id',$deposits->chalan_id)
      ->join('users','users.id','=','master_emp_monthly_contribution_two.modifed_by')
      ->join('master_employee AS me','me.gpf_no','=','master_emp_monthly_contribution_two.gpf_number')
      ->join('taluka AS tl','tl.id','=','master_emp_monthly_contribution_two.taluka_id')
      ->leftjoin('departments AS dp','dp.id','=','master_emp_monthly_contribution_two.emc_dept_id')
      ->leftjoin('designations AS dg','dg.id','=','master_emp_monthly_contribution_two.emc_desg_id')
      ->leftjoin('master_month AS mm','mm.id','=','master_emp_monthly_contribution_two.emc_month')
      ->latest()->get();
    }
    return ['amt'=>$deposits,'chalan'=>$res,'distributed_rakkam'=>$distributed_rakkam];
  }
  public function chalanSubscriptionDetails(Request $request){
    if($request->chalan_month == ''){
      $empty_res = [];
      return datatables()->of($empty_res)
      ->addIndexColumn()->make(true);
    }
    $data['chalan_month_id'] = $request->chalan_month;
    $data['year'] = $request->year;
    $data['chalan_serial_no'] = $request->chalan_number;
    $data['taluka'] = $request->chalan_taluka;
    // $deposits=MonthlyTotalChalan::select('id as chalan_id','amount','primary_number','diff_amount','taluka','classification')->where($data)->first();
    $deposits = MonthlyTotalChalan::select('id as chalan_id','amount','year','chalan_month_id','chalan_serial_no',
              'diff_amount','taluka','classification')
              ->where($data)
              ->first();
    $res = '';
    if(!empty($deposits->chalan_id))
    {
      $lang = app()->getLocale();
      $res = MasterMonthlySubscription::select('master_emp_monthly_contribution_two.*','users.name','me.employee_name',
      'tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mm.month_name_'.$lang.' AS month_name')
      ->where('master_emp_monthly_contribution_two.challan_id',$deposits->chalan_id)
      ->leftjoin('users','users.id','=','master_emp_monthly_contribution_two.modifed_by')
      ->leftjoin('master_employee AS me','me.gpf_no','=','master_emp_monthly_contribution_two.gpf_number')
      ->leftjoin('taluka AS tl','tl.id','=','master_emp_monthly_contribution_two.taluka_id')
      ->leftjoin('departments AS dp','dp.id','=','master_emp_monthly_contribution_two.emc_dept_id')
      ->leftjoin('designations AS dg','dg.id','=','master_emp_monthly_contribution_two.emc_desg_id')
      ->leftjoin('master_month AS mm','mm.id','=','master_emp_monthly_contribution_two.emc_month')
      ->latest()->get();
      if($request->ajax()){
        return datatables()->of($res)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id ="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Edit</a>';
          $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBill">Delete</a>';
          return $btn;
        })
        ->addColumn('empTotal', function ($row) {
          return $total = $row->monthly_received;
        })
        ->rawColumns(['empTotal','action'])
        ->make(true);
      }
    }else{
      return ['data' => []];
    }
  }
  public function show($chid){
    return MonthlyTotalChalan::where('id',$chid)->first();
  }
  public function destroy($chid){
    $res = MonthlyTotalChalan::where('id',$chid)->update(['is_delete' => 0]);
    return ['status' => 'success','message' => 'Chalan Deleted Successfully.'];
  }
  public function monthlyEntryApproved(Request $request){
    $data['month']=month::orderBy('order_by')->get();
    $data['classification']=Classification::all();
    $data['taluka']=Taluka::all();
    if($request->ajax()){
      if(count($request->id_data)){
        DB::table('master_emp_monthly_contribution_two')->whereIn('emc_id',$request->id_data)->update(['is_active' => 1]);
        return ['status'=>'success','message' => 'Masik Chalan Khatawani Approved Succesfully'];
      }
      return ['status'=>'Error','message' => 'Sorry! Invalid Details Provided'];
    }
    return view ("Admin.Chalan.monthly_entry_approved", $data);
  }
  public function getuserchalandetails(){

  }
  public function chalanNumbers(Request $request){
    $data['year'] = $request->ch_year;
    $data['chalan_month_id'] = $request->ch_month;
    $data['taluka'] = $request->ch_taluka;
    return MonthlyTotalChalan::where($data)->get();
  }
}
