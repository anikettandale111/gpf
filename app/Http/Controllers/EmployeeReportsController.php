<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Classification;

class EmployeeReportsController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  public function index()
  {
    $classification=Classification::all();
    return view('Reports/index',compact('classification'));
  }
  public function store(Request $request){
    $lang = app()->getLocale();
    $year = session()->get('year');
    $roi = DB::raw('SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=2019');
    $roi_result = DB::select($roi);
    $month_name = DB::table('master_month')->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')->orderBy('order_by')->get();
    $rqo_result = [];
    if($request->view_report_type == 1){
      $query_one = DB::table('master_employee AS me')
                      ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance')
                      ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                      ->join('taluka AS tl','tl.id','me.taluka_id')
                      ->join('departments AS dp','dp.department_code','me.department_id')
                      ->join('designations AS dg','dg.id','me.designation_id')
                      ->where(['mgt.gpf_number' =>$request->employee_gpf_num, 'mgt.financial_year'=>"2019-2020"])
                      // ->where(['me.taluka_id' =>16, 'mgt.financial_year'=>"2019-2020"])
                      ->groupBy('mgt.employee_id');
      $rqo_result = $query_one->get();
      return view('Reports/gpf_khate_utaran_niyam_231',compact('rqo_result','roi_result','month_name'));
    } else if ($request->view_report_type == 2){
      $query_one = DB::table('master_employee AS me')
                      ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance')
                      ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                      ->join('taluka AS tl','tl.id','me.taluka_id')
                      ->join('departments AS dp','dp.department_code','me.department_id')
                      ->join('designations AS dg','dg.id','me.designation_id')
                      ->where(['me.taluka_id' =>1, 'mgt.financial_year'=>"2019-2020"])
                      ->groupBy('mgt.employee_id');
      $rqo_result = $query_one->get();
      return view('Reports/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
    } else if ($request->view_report_type == 3){
    $query = DB::raw('SELECT CONCAT(clf.inital_letter,emc.gpf_number) AS inital_gpf_number,emc.emc_month,emc.emc_year,
                mm.month_name_'.$lang.' AS month_name,dp.department_name_'.$lang.' AS department_name,dg.designation_name_'.$lang.' AS designation_name,tl.taluka_name_'.$lang.' AS taluka_name,emc.monthly_contrubition,emc.monthly_received,emc.loan_amonut,
                emc.monthly_other,emc.remark,emc.loan_installment
                FROM master_emp_monthly_contribution emc
                LEFT JOIN departments dp ON dp.id=emc.emc_dept_id
                LEFT JOIN designations dg ON dg.id=emc.emc_desg_id
                LEFT JOIN master_month mm ON mm.id=emc.emc_month
                LEFT JOIN taluka tl ON tl.id=emc.taluka_id
                LEFT JOIN classifications clf ON clf.id=emc.classification_id
                WHERE emc.gpf_number='.$request->employee_gpf_num_inital.$request->employee_gpf_num.'
                AND emc.emc_year=2021
                ORDER BY emc.emc_month');
      $result = DB::select($query);
      $employee_name = DB::raw('SELECT employee_name,opening_balance FROM master_employee WHERE gpf_no='.$request->employee_gpf_num.' LIMIT 1');
      $emp_name = DB::select($employee_name);
      $roi = DB::raw('SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=2019');
      $roi_result = DB::select($roi);
      return view('Reports/gpf_bruhpatrak_naumna_89_niyam_231',compact('result','emp_name','roi_result'));
    }
  }
  public function getAllEmpKhatevahi(){
    $lang = app()->getLocale();
    $roi_result = DB::table('master_rate_interest AS ri')
            ->select('ri.percent','ri.to_month','mm.month_name_mar')
            ->leftjoin('master_month AS mm','mm.id','=','ri.to_month')
            ->where('ri.year_to','2019')
            ->get();
    $month_name = DB::table('master_month')
                  ->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')
                  ->orderBy('order_by')
                  ->get();
    $rqo_result = [];
    $query_one = DB::table('master_employee AS me')
                  ->select('mgt.*','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.opening_balance')
                  ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
                  ->join('taluka AS tl','tl.id','me.taluka_id')
                  ->join('departments AS dp','dp.department_code','me.department_id')
                  ->join('designations AS dg','dg.id','me.designation_id')
                  ->where(['me.taluka_id' =>1, 'mgt.financial_year'=>"2019-2020"])
                  ->groupBy('mgt.employee_id');
    $rqo_result = $query_one->get();
    return view('Reports/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
  }
}
