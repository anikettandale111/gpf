<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\BillExpenses;
use DataTables;
use Session;
use Config;


class AntimBillController extends Controller
{
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
  public function index(Request $request){
    // $query = DB::raw('SELECT bi.*,SUM(be.required_rakkam) bill_expenses_total FROM bill_information AS bi RIGHT JOIN bill_expenses_information AS be ON be.bill_id=bi.id');
    // $data = DB::select($query);
    // dd($data);
    if ($request->ajax()) {
      $data = Bill::where('financial_year',Session::get('financial_year'))->get();
      return datatables()->of($data)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        if($row->bill_check == 1){
          $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id ="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Edit</a>';
        }else{
          $btn = '<a href="javascript:void(0)" class="btn btn-success btn-sm ">Bill Finalised</a>';
        }
        // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBill">Delete</a>';
        // $btn = $btn . ' <a href="get_bill_report/'.$row->id.'" target="_blank" class="btn btn-secondary btn-sm">ViewDetails</a>';
        return $btn;
      })
      ->addColumn('bill_expenses_total', function ($row) {
        return BillExpenses::where('bill_id',$row->id)->sum('required_rakkam');
      })
      ->addColumn('bill_status', function ($row) {
        return ($row->bill_check == 1 )?'चालू स्थिती':(($row->bill_check == 2 )?'बंद स्थिती':'धनादेश तपशील');
      })
      ->rawColumns(['action','bill_status'])
      ->make(true);
    }
    return view('Admin/AntimBill/index');
  }
  public function store(Request $request){
    if ($request->bill_row_id == 0) {
      $newBill = $request->bill_no;
      $newBill = $request->bill_date;
      $newBill = $request->amount;
      $newBill = $request->bill_check;
      $newBill = $request->check_date;
      $newBill = $request->check_no;
      Bill::create($request->all());
      $msg=" Recored Insert Successfully";
    } else {
      $newBill = Bill::find($request->bill_row_id);
      $newBill = $request->bill_no;
      $newBill = $request->financial_year;
      $newBill = $request->bill_date;
      $newBill = $request->amount;
      $newBill = $request->bill_check;
      $newBill = $request->check_date;
      $newBill = $request->check_no;
      Bill::where('id',$request->bill_row_id)->update([
        'financial_year'=>Session::get('financial_year'),
        'bill_no'=>$request->bill_no,
        'bill_date'=>$request->bill_date,
        'amount'=>$request->amount,
        'bill_check'=>$request->bill_check,
        'check_date'=>$request->check_date,
        'check_no'=>$request->check_no,
      ]);
      $msg=" Recored Update Successfully";
    }
    return ['status'=>'success','message'=>$msg];
  }
  public function getlast_billnumber(){
    return Bill::max("bill_no");
  }
  public function show(Request $req){
    $billDetails = Bill::where('id',$req->id)->first();
    $billExpenses = BillExpenses::where('bill_id',$req->id)->sum('required_rakkam');
    $billDetails['bill_expenses_total'] = $billExpenses;
    return $billDetails;
  }
  public function delete_bill(Request $req){
    return Bill::where('id',$req->id)->delete();
  }
  public function viewBillDetails($id){
    $bill = Bill::where('id',$id)->get();
    $billExpenses = BillExpenses::where('bill_id',$id)->get();
    return view('Admin/AntimBill/billdetails',compact('bill','billExpenses'));
  }
  public function get_bill_amount(Request $request){
    $billExpenses = BillExpenses::where('bill_number',$request->billno)
                    ->sum('required_rakkam');
    return ['status'=>'success','amount'=>$billExpenses];
  }
}
