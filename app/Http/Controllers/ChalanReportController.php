<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\DB;
use App\Classification;
use App\Taluka;
use App\MonthlyTotalChalan;
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
    // return redirect()->back()->with('info', 'Report Work In Progress, Wait for some time.');
    $lang = app()->getLocale();
    $year = session()->get('year');
    $financial_year = session()->get('financial_year');
    $taluka_id = (isset($request->taluka_id))?$request->taluka_id:'';
    $month_id = (isset($request->month_id))?$request->month_id:'';
    $queryOne = MonthlyTotalChalan::select("taluka.taluka_name_".$lang." as taluka_name","tbl_monthly_total_chalan.created_at","tbl_monthly_total_chalan.chalan_no",
              "tbl_monthly_total_chalan.chalan_date","tbl_monthly_total_chalan.amount","tbl_monthly_total_chalan.diff_amount",
              "master_month.month_name_".$lang." as month_name",'taluka.id as taluka_ids')
                ->leftJoin("taluka", "taluka.id", "=","tbl_monthly_total_chalan.taluka")
                ->leftJoin("master_month", "master_month.id", "=", "tbl_monthly_total_chalan.chalan_month_id");
                if($taluka_id){
                  $queryOne = $queryOne->where("tbl_monthly_total_chalan.taluka", $taluka_id);
                }
                if($month_id){
                  $queryOne = $queryOne->where("tbl_monthly_total_chalan.chalan_month_id", $month_id);
                }
                $queryOne = $queryOne->where("tbl_monthly_total_chalan.year", session()->get('from_year'))
                ->where("tbl_monthly_total_chalan.chalan_month_id", ">=", 4)
                ->orderBy("tbl_monthly_total_chalan.taluka","ASC");
    $queryTwo = MonthlyTotalChalan::select("taluka.taluka_name_".$lang." as taluka_name","tbl_monthly_total_chalan.created_at","tbl_monthly_total_chalan.chalan_no",
              "tbl_monthly_total_chalan.chalan_date","tbl_monthly_total_chalan.amount","tbl_monthly_total_chalan.diff_amount",
                "master_month.month_name_".$lang." as month_name",'taluka.id as taluka_ids')
                ->leftJoin("taluka", "taluka.id", "=","tbl_monthly_total_chalan.taluka")
                ->leftJoin("master_month", "master_month.id", "=", "tbl_monthly_total_chalan.chalan_month_id");
                if($taluka_id){
                  $queryTwo = $queryTwo->where("tbl_monthly_total_chalan.taluka", $taluka_id);
                }
                if($month_id){
                  $queryTwo = $queryTwo->where("tbl_monthly_total_chalan.chalan_month_id", $month_id);
                }
    $queryTwo = $queryTwo->where("tbl_monthly_total_chalan.year", session()->get('to_year'))
                ->where("tbl_monthly_total_chalan.chalan_month_id", "<=", 3)
                ->orderBy("tbl_monthly_total_chalan.taluka","ASC")
                ->union($queryOne)
                ->get();
    $deposits_two = $queryTwo;
    if($request->view_report_type == 1){
      return view('Admin/ChalanReport/report_one',compact('deposits_two'));
    } else if ($request->view_report_type == 2){
      return view('Admin/ChalanReport/report_one',compact('deposits_two'));
    } else if ($request->view_report_type == 3){
      return view('Admin/ChalanReport/report_one',compact('deposits_two'));
    } else if ($request->view_report_type == 4){
      return view('Admin/ChalanReport/report_one',compact('deposits_two'));
    } else if ($request->view_report_type == 5){
      return view('Admin/ChalanReport/report_one',compact('deposits_two'));
    }
  }
}
