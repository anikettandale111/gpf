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
  public function show(Request $request){
    $html = '';
    $billid = $request->bill_id;
    if($request->reportNo == 1){
      $talukaData = Taluka::select('taluka_name_mar AS taluka_name')->get();
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $html .= view('Admin.BillReports.report75',compact('billid','billDetails','talukaData'))->render();
    }
    if($request->reportNo == 2){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $billExpenses = BillExpenses::where('bill_id',$request->bill_id)->sum('required_rakkam');
      $html .= view('Admin.BillReports.report188',compact('billid','billDetails','billExpenses'))->render();
    }
    if($request->reportNo == 3){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $billExpenses = BillExpenses::where('bill_id',$request->bill_id)->sum('required_rakkam');
      $html .= view('Admin.BillReports.compslip',compact('billid','billDetails','billExpenses'))->render();
    }
    if($request->reportNo == 4){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $billExpenses = BillExpenses::where('bill_id',$request->bill_id)->sum('required_rakkam');
      $html .= view('Admin.BillReports.order',compact('billid','billDetails','billExpenses'))->render();
    }
    if($request->reportNo == 5){
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $billExpenses = BillExpenses::where('bill_id',$request->bill_id)->sum('required_rakkam');
      $html .= view('Admin.BillReports.testfile',compact('billid','billDetails','billExpenses'))->render();
    }
    return ['html' => $html];
  }
}
