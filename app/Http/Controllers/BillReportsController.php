<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\Taluka;
use App\Month;
use App\BillExpenses;
use App\MasterMonthlySubscription;
use App\MonthlyTotalChalan;
use DataTables;
use Session;
use Excel;


class BillReportsController extends Controller
{
  public function index(Request $request){
    $billDetails = Bill::select('bill_no','id')->where('bill_check',1)->get();
    return view('Admin/BillReports/index',compact('billDetails'));
  }
  public function viewreport($billid,$reportType){
    $html = '';
    if($reportType == 1){
      $talukaData = Taluka::select('taluka_name_mar AS taluka_name','id')->get();
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      // $html .= view('Admin.BillReports.report75',compact('billid','billDetails','talukaData'))->render();
      return view('Admin.BillReports.report75',compact('billid','billDetails','talukaData'));
    }
    if($reportType == 2){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      $billExpenses = BillExpenses::where('bill_id',$billid)->sum('required_rakkam');
      // $html .= view('Admin.BillReports.report188',compact('billid','billDetails','billExpenses'))->render();
      return view('Admin.BillReports.report188',compact('billid','billDetails','billExpenses'));
    }
    if($reportType == 3){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      $billExpenses = BillExpenses::where('bill_id',$billid)->sum('required_rakkam');
      // $html .= view('Admin.BillReports.compslip',compact('billid','billDetails','billExpenses'))->render();
      return view('Admin.BillReports.compslip',compact('billid','billDetails','billExpenses'));
    }
    if($reportType == 4){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      $billExpenses = BillExpenses::where('bill_id',$billid)->sum('required_rakkam');
      // $html .= view('Admin.BillReports.order',compact('billid','billDetails','billExpenses'))->render();
      return view('Admin.BillReports.order',compact('billid','billDetails','billExpenses'));
    }
    if($reportType == 5){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      $billExpenses = BillExpenses::where('bill_id',$billid)->sum('required_rakkam');
      // $html .= view('Admin.BillReports.mtr52a',compact('billid','billDetails','billExpenses'))->render();
      return view('Admin.BillReports.mtr52a',compact('billid','billDetails','billExpenses'));
    }
    if($reportType == 6){
      $billDetails = Bill::select('bill_no','id','bill_date','bill_check','check_date','check_no')->where('id',$billid)->first();
      $billExpenses = BillExpenses::select('gpf_no','user_name','user_department','required_rakkam','bill_number','loan_agrim_pryojan' )->where('bill_id',$billid)->get();
      return view('Admin.BillReports.reportSeven',compact('billid','billDetails','billExpenses'));
    }
    if($reportType == 7){
      $monthData = Month::select('month_name_mar AS month_name','id')->orderBy('order_by','ASC')->get();
      $chalanExpenses = [];
      foreach ($monthData as $key => $value) {
        if($value->id > 3){
          $chalan_total_amount = MonthlyTotalChalan::where('chalan_month_id',$value->id)->where('year',Session::get('from_year'))->sum('amount');
          $chalan_expenses_received = MasterMonthlySubscription::where('emc_month',$value->id)->where('emc_year',Session::get('from_year'))->where('is_active',1)->sum(DB::raw('monthly_contrubition + monthly_other + loan_installment'));
          $chalanExpenses[]= ['chalan_expenses_received' => $chalan_expenses_received, 'chalan_total_amount' =>$chalan_total_amount, 'month_name' => $value->month_name.' '.Session::get('from_year')];
        }else{
          $chalan_total_amount = MonthlyTotalChalan::where('chalan_month_id',$value->id)->where('year',Session::get('to_year'))->sum('amount');
          $chalan_expenses_received = MasterMonthlySubscription::where('emc_month',$value->id)->where('emc_year',Session::get('to_year'))->where('is_active',1)->sum(DB::raw('monthly_contrubition + monthly_other + loan_installment'));
          $chalanExpenses[]= ['chalan_expenses_received' => $chalan_expenses_received, 'chalan_total_amount' =>$chalan_total_amount, 'month_name' => $value->month_name.' '.Session::get('to_year')];
        }
      }
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      // $html .= view('Admin.BillReports.mtr52a',compact('billid','billDetails','billExpenses'))->render();
      return view('Admin.BillReports.reportEightSeven',compact('billid','billDetails','chalanExpenses'));
    }
    return ['html' => $html];
  }
  public function downloadreport($billid,$reportNo){
    if($reportNo == 1){
      $talukaData = Taluka::select('taluka_name_mar AS taluka_name','id')->get();
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
      $html = view('Admin.BillReports.report75',compact('billid','billDetails','talukaData'))->render();
      // return view('Admin.BillReports.report75',compact('billid','billDetails','talukaData'));
      return Excel::download($talukaData,'invoices.xlsx','Xlsx',['name','email','contat']);
    }
  }
}
