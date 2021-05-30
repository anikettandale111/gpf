<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\DB;
use App\Classification;
use App\Taluka;
use App\Month;
use Config;

class ChalanReportController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
    if(session('from_year') !== null){

    } else {
      Session::put('from_year', date("Y",strtotime("-1 year")));
      Session::put('to_year', date("Y"));
      Session::put('financial_year', date("Y",strtotime("-1 year")).'-'.date("Y"));
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
    $talukaList=Taluka::all();
    $monthList=Month::all();
    return view('Admin/ChalanReport/index',compact('talukaList','monthList'));
  }
  public function store(Request $request){
    $lang = app()->getLocale();
    $year = session()->get('year');
    $financial_year = session()->get('financial_year');
    $roi = DB::raw("SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=".session()->get('to_year'));
    $roi_result = DB::select($roi );

    // $roi = DB::raw('SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=2019');
    // $roi_result = DB::select($roi);
    // $financial_year = '2019-2020'; // Only for previous year
    $month_name = DB::table('master_month')->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')->orderBy('order_by')->get();
    $rqo_result = [];
    $query_result = DB::table('master_vetan_ayog_received')->select('TransId', 'GPFNo','TotDiff','Interest')
                                          ->where(['GPFNo' =>$request->employee_gpf_num,'pay_number'=>7,'INTY2'=>0])->get();
      if(count($query_result)){
        foreach ($query_result as $key => $value) {
          $muddal_vyaj = $value->TotDiff;
          $cal_step_one = ($muddal_vyaj * 7.1 / 12*12)/100;
          $cal_step_one = round($cal_step_one);
          $new_intrest = $value->Interest +$cal_step_one;
          $query = DB::raw('UPDATE master_vetan_ayog_received SET INTY2 = '.$cal_step_one.', Interest = '.$new_intrest.' WHERE TransId = '.$value->TransId);
          $query = DB::select($query);
        }
      }
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
      return view('Reports/gpf_khate_utaran_niyam_231',compact('rqo_result','roi_result','month_name'));
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
      return view('Reports/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
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
      return view('Reports/gpf_bruhpatrak_naumna_89_niyam_231',compact('rqo_result','roi_result','month_name'));
    } else if ($request->view_report_type == 4){
      $query_one =  DB::table('master_employee AS me')
                    ->select('me.gpf_no','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name',"c.inital_letter","me.antim_partava_status")
                    ->join('taluka AS tl','tl.id','me.taluka_id')
                    ->join('classifications AS c','c.id','me.classification_id')
                    ->join('departments AS dp','dp.department_code','me.department_id')
                    ->join('designations AS dg','dg.id','me.designation_id')
                    ->where(['me.employee_id' =>$request->employee_gpf_num])
                    ->orderBy("me.gpf_no");
      $rqo_result = $query_one->first();
      $chalanQuery = DB::table('master_emp_monthly_contribution_two AS mct')
                    ->select('mct.monthly_contrubition','mct.monthly_received','mct.loan_installment','mct.monthly_other',
                      'mct.gpf_number','mct.challan_number','mm.month_name_'.$lang.' as month_name')
                    ->join('taluka AS tl','tl.id','mct.taluka_id')
                    ->join('master_month AS mm','mm.id','mct.emc_month')
                    ->where('mct.gpf_number','11684')
                    ->orderBy('mct.emc_id')
                    ->get();
      return view('Reports/chalan_nihay',compact('rqo_result','roi_result','month_name','chalanQuery'));
    }
  }
  public function getAllEmpKhatevahi(Request $request){
    // $financial_year = '2019-2020'; //use for Previous Year
    $financial_year = "'".session()->get('financial_year')."'"; //use for current year
    $lang = app()->getLocale();
    $roi_result = DB::table('master_rate_interest AS ri')
            ->select('ri.percent','ri.to_month','mm.month_name_mar')
            ->leftjoin('master_month AS mm','mm.id','=','ri.to_month')
            ->where('ri.year_to',session()->get('to_year'))
            ->get();
    $month_name = DB::table('master_month')
                  ->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')
                  ->orderBy('order_by')
                  ->get();
    $rqo_result = [];
    $query_one = DB::table('master_employee AS me')
                  ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                  ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                  ->join('taluka AS tl','tl.id','me.taluka_id')
                  ->join('classifications AS c','c.id','me.classification_id')
                  ->join('departments AS dp','dp.department_code','me.department_id')
                  ->join('designations AS dg','dg.id','me.designation_id')
                  ->where(['me.taluka_id' =>$request->taluka_id, 'mgt.financial_year'=>$financial_year])
                  ->groupBy('mgt.employee_id')->orderBy("me.gpf_no");
    $rqo_result = $query_one->get();
    return view('Reports/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
  }
  public function getAllEmpKhateUtara(Request $request){
    // $financial_year = '2019-2020'; //use for Previous Year
    $financial_year = "'".session()->get('financial_year')."'"; //use for current year
    $lang = app()->getLocale();
    $roi_result = DB::table('master_rate_interest AS ri')
            ->select('ri.percent','ri.to_month','mm.month_name_mar')
            ->leftjoin('master_month AS mm','mm.id','=','ri.to_month')
            ->where('ri.year_to',session()->get('to_year'))
            ->get();
    $month_name = DB::table('master_month')
                  ->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')
                  ->orderBy('order_by')
                  ->get();
    $rqo_result = [];
    $query_one = DB::table('master_employee AS me')
                  ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                  ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                  ->join('taluka AS tl','tl.id','me.taluka_id')
                  ->join('classifications AS c','c.id','me.classification_id')
                  ->join('departments AS dp','dp.department_code','me.department_id')
                  ->join('designations AS dg','dg.id','me.designation_id')
                  ->where(['me.taluka_id' =>$request->taluka_id, 'mgt.financial_year'=>$financial_year])
                  ->groupBy('mgt.employee_id')->orderBy("me.gpf_no");
    $rqo_result = $query_one->get();
    return view('Reports/gpf_khate_utaran_niyam_231',compact('rqo_result','roi_result','month_name'));
  }
  public function getAllEmpFormEN(Request $request){
    // $financial_year = '2019-2020'; //use for Previous Year
    $financial_year = "'".session()->get('financial_year')."'"; //use for current year
    $lang = app()->getLocale();
    $roi_result = DB::table('master_rate_interest AS ri')
            ->select('ri.percent','ri.to_month','mm.month_name_mar')
            ->leftjoin('master_month AS mm','mm.id','=','ri.to_month')
            ->where('ri.year_to',session()->get('to_year'))
            ->get();
    $month_name = DB::table('master_month')
                  ->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')
                  ->orderBy('order_by')
                  ->get();
    $rqo_result = [];
    $query_one = DB::table('master_employee AS me')
                  ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance',"c.inital_letter","me.antim_partava_status")
                  ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                  ->join('taluka AS tl','tl.id','me.taluka_id')
                  ->join('classifications AS c','c.id','me.classification_id')
                  ->join('departments AS dp','dp.department_code','me.department_id')
                  ->join('designations AS dg','dg.id','me.designation_id')
                  ->where(['me.taluka_id' =>$request->taluka_id, 'mgt.financial_year'=>$financial_year])
                  ->groupBy('mgt.employee_id')->orderBy("me.gpf_no");
    $rqo_result = $query_one->get();
    return view('Reports/gpf_bruhpatrak_naumna_89_niyam_231',compact('rqo_result','roi_result','month_name'));
  }
}