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
    if($request->reportNo == 1){
      $talukaData = Taluka::select('taluka_name_mar AS taluka_name')->get();
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $billid = $request->bill_id;
      $html .= view('Admin.AntimBill.billreportone',compact('billid','billDetails','talukaData'))->render();
    }
    if($request->reportNo == 2){
      $talukaData = Taluka::select('id','taluka_name_mar AS taluka_name')->get();
      $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$request->bill_id)->first();
      $billid = $request->bill_id;
      $html .= view('Admin.AntimBill.billreportone',compact('billid','billDetails','talukaData'))->render();
    }
    return ['html' => $html];
  }
}
