<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Config;
use App\Taluka;
use App\Department;
use App\User;
use App\Role;
use App\Designation;
use App\Bank;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Session;
use DataTable;

class EmployeeController extends Controller
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
      Session::put('from_year', date("Y"));
      Session::put('to_year', date("Y",strtotime("+1 year")));
      Session::put('financial_year', date("Y").'-'.date("Y",strtotime("+1 year")));
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
  public function index(Request $request)
  {
    $lang = app()->getLocale();
    $department = Department::select('department_code','department_name_'.$lang.' AS department_name','id AS department_id')->get();
    $designation = Designation::select('designation_name_'.$lang.' AS designation_name','id AS designation_id')->get();
    $taluka = Taluka::select('taluka_name_'.$lang.' AS taluka_name','id AS taluka_id')->get();
    $bank = Bank::select('bank_name_'.$lang.' AS bank_name','id AS bank_id')->get();
    return view('Admin.Employee.index',compact('department','designation','taluka','bank'));
  }
  public function updateBalance(Request $request){
    if($request->user_designation != ''){
      $empData['designation_id'] = ($request->user_designation) ? $request->user_designation : '';
    }
    if($request->user_taluka_name != ''){
      $empData['taluka_id'] = ($request->user_taluka_name) ? $request->user_taluka_name : '';
    }
    if($request->user_department != ''){
      $empData['department_id'] = ($request->user_department) ? $request->user_department : '';
    }
    if($request->user_bank_branch != ''){
      $empData['branch_location'] = ($request->user_bank_branch) ? $request->user_bank_branch : '';
    }
    if($request->user_bank_ifsc != ''){
      $empData['ifsc_code'] = ($request->user_bank_ifsc) ? $request->user_bank_ifsc : '';
    }
    if($request->user_bank_account_no != ''){
      $empData['bank_account_no'] = ($request->user_bank_account_no) ? $request->user_bank_account_no : '';
    }
    if($request->user_providing_bank != ''){
      $empData['bank_id'] = ($request->user_providing_bank) ? $request->user_providing_bank : '';
    }
    if($request->user_name != ''){
      $empData['employee_name'] = ($request->user_name) ? $request->user_name : '';
    }
    // return count($empData);
    if(count($empData)){
      $emp_result = Employee::where('gpf_no',$request->employee_gpf_num)
                    ->orWhere('employee_id',$request->employee_gpf_num)
                    ->update($empData);
    }

    $data['shillak_rakkam_two'] = $request->shillak_rakkam_two;
    $data['shillak_rakkam_one'] = $request->shillak_rakkam_one;
    $data['year_one'] = $request->year_one;
    $data['year_two'] = $request->year_two;
    $checkPrvQueryOne = DB::raw('SELECT * FROM employee_yearwise_opening_balance WHERE gpf_no='.$request->employee_gpf_num.' AND year='.$request->year_one );
    $resPrvQueryOne = DB::select($checkPrvQueryOne);

    if($resPrvQueryOne){
      $queryOne = DB::raw("UPDATE employee_yearwise_opening_balance SET opn_balance='.$request->shillak_rakkam_one.',close_balance='.$request->shillak_rakkam_two.' WHERE gpf_no='.$request->employee_gpf_num.'
                          AND year='.$request->year_one.' " );
      $resOne = DB::update($queryOne);
    }else{
      $queryOne = DB::raw("INSERT INTO employee_yearwise_opening_balance (opn_balance,close_balance,gpf_no,year)
                  VALUES($request->shillak_rakkam_one,$request->shillak_rakkam_two,$request->employee_gpf_num,$request->year_one)");
      $resOne = DB::insert($queryOne);
    }

    $checkPrvQueryTwo = DB::raw('SELECT * FROM employee_yearwise_opening_balance WHERE gpf_no='.$request->employee_gpf_num.' AND year='.$request->year_two );
    $resPrvQueryTwo = DB::update($checkPrvQueryTwo);
    if($resPrvQueryTwo){
      $queryTwo = DB::raw("UPDATE employee_yearwise_opening_balance SET opn_balance='.$request->shillak_rakkam_two.' WHERE gpf_no='.$request->employee_gpf_num.' AND year='.$request->year_two.'" );
      $resTwo = DB::select($queryTwo);
    }else{
      $queryTwo = DB::raw("INSERT INTO employee_yearwise_opening_balance (opn_balance,gpf_no,year) VALUES($request->shillak_rakkam_one,$request->employee_gpf_num,$request->year_two)");
      $resTwo = DB::insert($queryTwo);
    }
    return ['status'=>'success','message'=>'User Details Updated Succesfully'];
  }
  public function getEmployeeDetails(Request $request){
    $lang = app()->getLocale();
    return DB::table('master_employee as me')
    ->leftjoin('bank as bk','bk.id','=','me.bank_id')
    ->leftjoin('departments as dp','dp.department_code','=','me.department_id')
    ->leftjoin('designations as dg','dg.id','=','me.designation_id')
    ->leftjoin('classifications as cl','cl.id','=','me.classification_id')
    ->leftjoin('taluka as tl','tl.id','=','me.taluka_id')
    ->select('me.employee_id','me.gpf_no','me.employee_name','me.joining_date','me.retirement_date',
    'me.total_service','me.bank_account_no','me.branch_location','me.ifsc_code','me.bank_id',
    'me.department_id','me.designation_id','me.classification_id','me.id','bk.bank_name_'.$lang.' as bank_name','tl.taluka_name_'.$lang.' as taluka_name','dg.designation_name_'.$lang.' as designation_name','dp.department_name_'.$lang.' as department_name','cl.classification_name_'.$lang.' as classification_name','cl.inital_letter','me.taluka_id')
    ->where('me.gpf_no',$request->input_id)
    ->orWhere('me.employee_id',$request->input_id)
    ->get();
  }
  public function getEmployeeList(Request $request){
    if($request->ajax()){
      $lang = app()->getLocale();
      $emp_data = DB::table('master_employee as me')
        ->leftjoin('departments as dp','dp.department_code','=','me.department_id')
        ->leftjoin('designations as dg','dg.id','=','me.designation_id')
        ->leftjoin('classifications as cl','cl.id','=','me.classification_id')
        ->leftjoin('taluka as tl','tl.id','=','me.taluka_id')
        ->select('me.employee_id','me.gpf_no','me.employee_name','me.id','tl.taluka_name_'.$lang.' as taluka_name','dg.designation_name_'.$lang.' as designation_name','dp.department_name_'.$lang.' as department_name','cl.classification_name_'.$lang.' as classification_name','cl.inital_letter')
        ->get();
      return datatables()->of($emp_data)
        ->addIndexColumn()
        ->make(true);
    }
    return view('Admin.Master.employee');
  }
}
