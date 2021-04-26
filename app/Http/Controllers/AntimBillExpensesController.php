<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Bill;
use App\Taluka;
use App\BillExpenses;
use DataTables;
use Excel;

class AntimBillExpensesController extends Controller
{
  public function index(Request $request){
    $billDetails = Bill::select('bill_no','id')->where('bill_check',1)->get();
    return view('Admin/AntimBill/expenses',compact('billDetails'));
  }
  public function store(Request $request){
    if($request->file('employee_expenses_file') !== null){
        $originalFileName = $request->file('employee_expenses_file')->getClientOriginalName();
        $md5Name = md5_file($request->file('employee_expenses_file')->getRealPath());
        $extension = $request->file('employee_expenses_file')->getClientOriginalExtension();
        $file = $request->file('employee_expenses_file')->storeAs('files', $md5Name.'.'.$extension);
        $filepath = $md5Name.'.'.$extension;
        $data = Excel::toArray('',$file);
        $rowCount = count($data[0]);
        $duplicateData = [];
        $setColumnArray = [0 => 'GPF_NO' ,
                            1 => 'EMPLOYEE_NAME' ,
                            2 => 'APPROVED_AMOUNT' ,
                            3 => 'AGRIM_NIYAM' ,
                            4 => 'INSTALLMENT' ,
                            5 => 'LOAN_READON',
                            6 => 'BANK_NAME',
                            7 => 'IFSC_CODE',
                            8 => 'ACCOUNT_NUMBER'
                          ];
      if($rowCount > 0){
        $userData = [];
        $userDataDuplicate = [];
        $employeeNotFound = [];
        $getData = $data[0];
        $totalUsed = 0;
        $filename = date('dmyhis');
        for($i=1;$rowCount > $i;$i++){
          if($getData){
            $com_res = array_diff_assoc($setColumnArray,$getData[0]);
            if(count($com_res) == 0){
              $checkData = [
                'bill_id' => $request->bill_no,
                'gpf_no' => substr($getData[$i][0], 1),
                'bill_number' => $request->bill_number,
                'required_rakkam' => $getData[$i][2],
              ];
              $check_duplicate = BillExpenses::where($checkData)->first();
              if($check_duplicate == null){
                if(isset($getData[$i][0]) && $getData[$i][0] !== ''){
                  $lang = 'mar';
                  $tg = mb_strtoupper($getData[$i][0]);
                  str_replace('P','',$tg);
                  $emp_gpf_no = (int)$tg;
                  $employee = DB::table('master_employee as me')
                  ->leftjoin('bank as bk','bk.id','=','me.bank_id')
                  ->leftjoin('departments as dp','dp.department_code','=','me.department_id')
                  ->leftjoin('designations as dg','dg.id','=','me.designation_id')
                  ->leftjoin('taluka as tl','tl.id','=','me.taluka_id')
                  ->leftjoin('employee_yearwise_opening_balance as yob','yob.gpf_no','=','me.gpf_no')
                  ->select('me.employee_name','tl.taluka_name_'.$lang.' as taluka_name',
                  'dg.designation_name_'.$lang.' as designation_name','dp.department_name_'.$lang.' as department_name','yob.opn_balance' )
                  ->where('me.gpf_no',$emp_gpf_no)
                  ->first();
                  if($employee !== null ){
                    $u_data['bill_id'] = $request->bill_no;
                    $u_data['gpf_no'] = substr($getData[$i][0], 1);
                    $u_data['bill_number'] = $request->bill_number;
                    $u_data['user_name'] = $employee->employee_name;
                    $u_data['user_designation'] = $employee->designation_name;
                    $u_data['user_department'] = $employee->department_name;
                    $u_data['user_taluka_name'] = $employee->taluka_name;
                    $u_data['loan_agrim_niyam'] = $getData[$i][3];
                    $u_data['shillak_rakkam'] = $employee->opn_balance;
                    $u_data['required_rakkam'] = $getData[$i][2];
                    $u_data['bank_name'] = $getData[$i][6];
                    $u_data['bank_ifsc_name'] = $getData[$i][7];
                    $u_data['bank_acc_number'] = $getData[$i][8];
                    $u_data['if_installment_no'] = $getData[$i][8];
                    $userData[] = $u_data;
                  }
                }
                if(isset($employee->employee_id) && $employee->employee_id !== ''){
                  $totalUsed += (int)$getData[$i][3] + (int)$getData[$i][4] + (int)$getData[$i][5];
                } else {
                  $employeeNotFound[] = ['gpf_number' => $getData[$i][1]];
                }
              } else {
                $userDataDuplicate[] = $check_duplicate;
              }
            }else{
              return ['status'=>'error','message'=>'Invalid Excel Column Count '];
            }
          }
        }
        if(count($userData) > 0){
          $resultRow = BillExpenses::insert($userData);
          if($resultRow){
            return ['status'=>'success','message'=>'Bill Expensess Added Successfully.'];
            // return redirect()->back()->with('message','Bill Expensess Added Successfully.');
          } else {
            return ['status'=>'warning','message'=>'Sorry, Please Try Again.'];
            // return redirect()->back()->with('message','Sorry, Please Try Again.');
          }
        }
        if(count($userDataDuplicate) > 0){
          return ['status'=>'success','message'=>'Duplicate Details Found.'];
          // return redirect()->back()->with('message','Duplicate Details Found.');
        } else {
          return ['status'=>'warning','message'=>'Sorry, Please Try Again.'];
          // return redirect()->back()->with('message','Sorry, Please Try Again.');
        }
      }
    }else{
      $checkDuplicate = BillExpenses::where(['bill_id'=>$request->bill_no,'gpf_no'=>$request->employee_gpf_num])->count();
      if($checkDuplicate > 0){
        return ['status'=>'warning','message'=>'Duplicate Data Found'];
        // return redirect()->back()->with('message','Duplicate Data Found');
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
        // return redirect()->back()->with('message','Bill Expensess Added Successfully.');
      }else{
        return ['status'=>'warning','message'=>'Sorry, Please Try Again.'];
        // return redirect()->back()->with('message','Sorry, Please Try Again.');
      }
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
  public function get_bill_report($billid){
    $talukaData = Taluka::select('taluka_name_mar AS taluka_name')->get();
    $billDetails = Bill::select('bill_no','id','bill_date')->where('id',$billid)->first();
    $billid = $billid;
    // $billExpensesReport = BillExpenses::where('bill_id',$billid)->orderBy('user_taluka_name')->get();
    return view('Admin.AntimBill.billreportone',compact('billid','billDetails','talukaData'));
  }
}
