<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\Taluka;
use App\BillExpenses;
use DataTables;


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
    return ['html' => $html];
  }
}
