<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\BillExpenses;
use DataTables;


class AntimBillExpensesController extends Controller
{
  public function index(Request $request){
    $billDetails = Bill::select('bill_no','id')->where('bill_check',1)->get();
    return view('Admin/AntimBill/expenses',compact('billDetails'));
  }
  public function store(Request $request){
    $checkDuplicate = BillExpenses::where(['bill_id'=>$request->bill_no,'gpf_no'=>$request->employee_gpf_num])->count();
    if($checkDuplicate > 0){
      return ['status'=>'warning','message'=>'Duplicate Data Found'];
    }
    $data['bill_id'] = $request->bill_no;
    $data['gpf_no'] = $request->employee_gpf_num;
    $data['bill_number'] = $request->bill_number;
    $data['user_name'] = $request->user_name;
    $data['user_designation'] = $request->user_designation;
    $data['user_department'] = $request->user_department;
    $data['user_taluka_name'] = $request->user_taluka_name;
    $data['loan_agrim_niyam'] = $request->loan_agrim_niyam;
    $data['shillak_rakkam'] = $request->shillak_rakkam;
    $data['required_rakkam'] = $request->required_rakkam;
    $data['bank_name'] = $request->bank_name;
    $data['bank_ifsc_name'] = $request->bank_ifsc_name;
    $data['bank_acc_number'] = $request->bank_acc_number;
    $data['if_installment_no'] = $request->if_installment_no;
    $resultRow = BillExpenses::insert($data);
    if($resultRow){
      return ['status'=>'success','message'=>'Bill Expensess Added Successfully.'];
    }else{
      return ['status'=>'warning','message'=>'Sorry, Please Try Again.'];
    }
  }
  public function getBillExpensesDetails(Request $request){
    if(isset($request->id) && $request->id > 0){
      $id = $request->id;
      $data = BillExpenses::where('bill_id',$id)->get();
      return datatables()->of($data)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        // $btn = '<button type="button" onclick="editExpenses('.$row->id.')"  class="edit btn btn-primary btn-sm">Edit</button>';
        $btn = '<button type="button" onclick="deleteExpenses('.$row->id.')" class="btn btn-danger btn-sm">Delete</button>';
        return $btn;
      })
      ->addColumn('bill_status', function ($row) {
        return ($row->status)?'<button class="btn btn-success">Approved</button>':'<button class="btn btn-warning">Pending</button>';
      })
      ->rawColumns(['action','bill_status'])
      ->make(true);
    }else{
      return [];
    }
  }
  public function destroy(Request $request){
    $data = BillExpenses::where('id',$request->id)->delete();
    return ['status'=>'success','message'=>'Row Deleted Successfully'];
  }
}
