<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\DB;
use App\Classification;
use Config;
use App\Month;

class ClosedAccountReportsController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:report-closedaccountreports', ['only' => ['closedaccountreports']]);
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

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  public function index()
  {
    $month=Month::orderBy('order_by')->get();
    $classification=Classification::all();
    return view('Closedaccount/index',compact('classification','month'));
  }
  public function store(Request $request){
    $employee_gpf_num = $request->employee_gpf_num;
    $retirment_year = $request->retirment_year;
    $retirment_month = $request->retirment_month;
    $view_report_type = $request->view_report_type;
    $lang = app()->getLocale();

    $roi = DB::raw('SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to='.$retirment_year);
    $roi_result = DB::select($roi);
    $financial_year = $retirment_year.'-'.($retirment_year-1); // Only for previous year
    $month_name = DB::table('master_month')->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')->orderBy('order_by')->get();
    $rqo_result = [];
    if($request->view_report_type == 1){
      $query_one = DB::table('master_employee AS me')
                      ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                      ->join('master_gpf_transaction AS mgt','mgt.gpf_number','me.employee_id')
                      ->join('taluka AS tl','tl.id','me.taluka_id')
                      ->join('classifications AS c','c.id','me.classification_id')
                      ->join('departments AS dp','dp.department_code','me.department_id')
                      ->join('designations AS dg','dg.id','me.designation_id')
                      ->where(['me.employee_id' =>$request->employee_gpf_num, 'mgt.financial_year'=>$financial_year])
                      // ->where(['me.taluka_id' =>16, 'mgt.financial_year'=>$financial_year])
                      ->groupBy('mgt.employee_id');
      $rqo_result = $query_one->get();
      return view('Closedaccount/gpf_khate_utaran_niyam_231',compact('rqo_result','roi_result','month_name'));
    } else if ($request->view_report_type == 2){
      $query_one = DB::table('master_employee AS me')
                      ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                      ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                      ->join('taluka AS tl','tl.id','me.taluka_id')
                      ->join('classifications AS c','c.id','me.classification_id')
                      ->join('departments AS dp','dp.department_code','me.department_id')
                      ->join('designations AS dg','dg.id','me.designation_id')
                      ->where(['me.employee_id'=>$request->employee_gpf_num,'mgt.financial_year'=>$financial_year])
                      ->groupBy('mgt.employee_id');
      $rqo_result = $query_one->get();
      return view('Closedaccount/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
    } else if ($request->view_report_type == 3){
      $query_one =  DB::table('master_employee AS me')
                    ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                    ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                    ->join('taluka AS tl','tl.id','me.taluka_id')
                    ->join('classifications AS c','c.id','me.classification_id')
                    ->join('departments AS dp','dp.department_code','me.department_id')
                    ->join('designations AS dg','dg.id','me.designation_id')
                    ->where(['me.employee_id' =>$request->employee_gpf_num, 'mgt.financial_year'=>$financial_year])
                    ->groupBy('mgt.employee_id')->orderBy("me.gpf_no");
      $rqo_result = $query_one->get();
      return view('Closedaccount/gpf_bruhpatrak_naumna_89_niyam_231',compact('rqo_result','roi_result','month_name'));
    }
  }
}
