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
    if($request->view_report_type == 1){

      $query = DB::raw('SELECT CONCAT(clf.inital_letter,emc.gpf_number) AS inital_gpf_number,emc.emc_month,emc.emc_year,
                        mm.month_name_'.$lang.' AS month_name,SUM(emc.monthly_contrubition) AS monthly_contrubition,SUM(emc.monthly_received) AS monthly_received,SUM(emc.loan_amonut) AS loan_amonut,SUM(emc.monthly_other) AS monthly_other,emc.remark,emc.loan_installment,
                        mm.id AS monthid FROM master_emp_monthly_contribution emc
                        LEFT JOIN master_month mm ON mm.id=emc.emc_month
                        LEFT JOIN classifications clf ON clf.id=emc.classification_id
                        WHERE emc.gpf_number='.$request->employee_gpf_num.'
                        AND emc.emc_year=2019 AND emc.emc_month >= 4
                        GROUP BY emc.emc_month ');
      $result = DB::select($query);
      $employee_name = DB::raw('SELECT me.employee_name,op.opn_balance AS opening_balance,tl.taluka_name_'.$lang.' AS taluka_name,
                        dp.department_name_'.$lang.' AS department_name,dg.designation_name_'.$lang.' AS designation_name
                        FROM master_employee me
                        LEFT JOIN employee_yearwise_opening_balance op ON op.gpf_no='.$request->employee_gpf_num.'
                        LEFT JOIN taluka tl ON tl.id=me.taluka_id
                        LEFT JOIN departments dp ON dp.department_code=me.department_id
                        LEFT JOIN designations dg ON dg.id=me.designation_id
                        WHERE me.gpf_no='.$request->employee_gpf_num.' AND op.year=2019');
      $emp_name = DB::select($employee_name);
      $roi = DB::raw('SELECT percent,to_month FROM master_rate_interest WHERE year_to=2019');
      $roi_result = DB::select($roi);
      return view('Reports/gpf_khate_utaran_niyam_231',compact('result','emp_name','roi_result'));
    } else if ($request->view_report_type == 2){
      // $emp_number = DB::table('master_employee')->select('gpf_no')->where('taluka_id', 7)->where('gpf_no','>',0)->get();
      $roi = DB::raw('SELECT ri.percent,ri.to_month,mm.month_name_mar FROM master_rate_interest AS ri LEFT JOIN master_month mm ON mm.id=ri.to_month WHERE year_to=2019');
      $roi_result = DB::select($roi);
      $month_name = DB::table('master_month')->select(DB::raw('month_name_'.$lang.' AS month_name'),'transaction_month AS trans_month')->orderBy('order_by')->get();
      $rqo_result = [];
      // $otherInstall = [];
      // foreach($emp_number AS $erow){
        // if(isset($erow->gpf_no) && $erow->gpf_no > 0){
        $query_one = DB::table('master_employee AS me')
        ->select('mgt.gpf_number', 'mgt.opening_balance', 'month_april_other', 'month_may_other', 'month_june_other', 'month_july_other', 'month_aug_other', 'month_september_other', 'month_octomber_other', 'month_november_other', 'month_december_other', 'month_jan_other', 'month_feb_other', 'month_march_other', 'month_april_recive', 'month_may_recive', 'month_june_recive', 'month_july_recive', 'month_aug_recive', 'month_september_recive', 'month_octomber_recive', 'month_november_recive', 'month_december_recive', 'month_jan_recive', 'month_feb_recive', 'month_march_recive', 'month_april_loan', 'month_may_loan', 'month_june_loan', 'month_july_loan', 'month_aug_loan', 'month_september_loan', 'month_octomber_loan', 'month_november_loan', 'month_december_loan', 'month_jan_loan', 'month_feb_loan', 'month_march_loan', 'month_jan_loan_emi', 'month_feb_loan_emi', 'month_march_loan_emi', 'month_april_loan_emi', 'month_may_loan_emi', 'month_june_loan_emi', 'month_july_loan_emi', 'month_aug_loan_emi', 'month_september_loan_emi', 'month_octomber_loan_emi', 'month_november_loan_emi', 'month_december_loan_emi', 'remark', 'month_april_contri', 'month_may_contri', 'month_june_contri', 'month_july_contri', 'month_aug_contri', 'month_september_contri', 'month_octomber_contri', 'month_november_contri', 'month_december_contri', 'month_jan_contri', 'month_feb_contri', 'month_march_contri','me.employee_name','tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mgt.remark')
        ->join('master_gpf_transaction AS mgt','mgt.employee_id','me.id')
        ->join('taluka AS tl','tl.id','me.taluka_id')
        ->join('departments AS dp','dp.department_code','me.department_id')
        ->join('designations AS dg','dg.id','me.designation_id')
        // ->where(['mgt.gpf_number' =>$erow->gpf_no, 'mgt.financial_year'=>"2019-2020"])
        ->where(['me.taluka_id' =>12, 'mgt.financial_year'=>"2019-2020"])
        ->groupBy('mgt.employee_id');
        $rqo_result = $query_one->get();
        // $otherInstall[] = DB::table('master_vetan_ayog_received AS va')
        // ->select('va.instalment','va.DiffAmt','va.Interest')
        // ->where(['va.GPFNo' =>$erow->gpf_no,'va.Year'=>2019])
        // ->first();
      //   }
      // }
      return view('Reports/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
    } else if ($request->view_report_type == 3){
      $query = DB::raw('SELECT CONCAT(clf.inital_letter,emc.gpf_number) AS inital_gpf_number,emc.emc_month,emc.emc_year,mm.month_name_'.$lang.' AS month_name,
      dp.department_name_'.$lang.' AS department_name,dg.designation_name_'.$lang.' AS designation_name,tl.taluka_name_'.$lang.' AS taluka_name,emc.monthly_contrubition,
      emc.monthly_received,emc.loan_amonut,emc.monthly_other,emc.remark,emc.loan_installment
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
                  ->where(['me.taluka_id' =>3, 'mgt.financial_year'=>"2019-2020"])
                  ->groupBy('mgt.employee_id');
    $rqo_result = $query_one->get();
    return view('Reports/gpf_khatevahi_namuna_88_niyam_231',compact('rqo_result','roi_result','month_name'));
  }
}
