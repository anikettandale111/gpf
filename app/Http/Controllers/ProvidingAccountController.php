<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Classification;
use App\Designation;
use App\Masteremployee;
use App\GenerateApplication;
use App\Taluka;
use App\Bank;
use Auth;

class ProvidingAccountController extends Controller
{
  public function index() {
    // $data['ganrate'] = GenerateApplication::select("gpf_number_application.*","departments.department_name_mar",
    // "taluka.taluka_name_mar","classifications.classification_name_mar","classifications.inital_letter",
    // "designations.designation_name_mar","bank.bank_name_mar")
    //   ->leftJoin("departments", "departments.id", "=", "gpf_number_application.department_id")
    //   ->leftJoin("taluka", "taluka.id", "=", "gpf_number_application.taluka_id")
    //   ->leftJoin("classifications", "classifications.id", "=", "gpf_number_application.classification_id")
    //   ->leftJoin("designations", "designations.id", "=", "gpf_number_application.designation_id")
    //   ->leftJoin("bank", "bank.id", "=", "gpf_number_application.bank_id")
    //   ->latest()->get();
    $data['ganrate'] = GenerateApplication::select("gpf_number_application.*","departments.department_name_mar",
    "taluka.taluka_name_mar","classifications.classification_name_mar","classifications.inital_letter",
    "designations.designation_name_mar","bank.bank_name_mar")
    ->leftJoin("departments", "departments.id", "=", "gpf_number_application.department_id")
    ->leftJoin("taluka", "taluka.id", "=", "gpf_number_application.taluka_id")
    ->leftJoin("classifications", "classifications.id", "=", "gpf_number_application.classification_id")
    ->leftJoin("designations", "designations.id", "=", "gpf_number_application.designation_id")
    ->leftJoin("bank", "bank.id", "=", "gpf_number_application.bank_id")
    ->latest()->get();
    $data['classification'] = Classification::all();
    $data['taluka'] = Taluka::all();
    $data['designation'] = Designation::all();
    $data['department'] = Department::all();
    $data['bank'] = Bank::all();
    return view('Admin.Ganrate.ganrate_new_number', $data);
  }
  public function ganrate_insert_no(Request $request) {
    $Newdeposit = new GenerateApplication;
    $Newdeposit->classification_id=$request->classification_id;
    $Newdeposit->inital_letter=$request->inital_letter;
    $Newdeposit->app_no=$request->new_application_gpf_no;
    $Newdeposit->employee_id=$request->employee_id;
    $Newdeposit->taluka_id=$request->taluka_id;
    $Newdeposit->department_id=$request->department_id;
    $Newdeposit->employee_name=$request->employee_name;
    $Newdeposit->designation_id=$request->designation_id;
    $Newdeposit->bank_account_no=$request->account_no;
    $Newdeposit->date_of_birth=$request->date_of_birthday;
    $Newdeposit->joining_date=$request->joining_date;
    $Newdeposit->retirement_date=$request->retirement_date;
    $Newdeposit->bank_id=$request->bank_id;
    $Newdeposit->branch_location=$request->branch_location;
    $Newdeposit->IFSC_code=$request->IFSC_code;
    $Newdeposit->bank_account_no=$request->bank_account_no;
    $Newdeposit->opening_balance=$request->opening_balance;
    $Newdeposit->c_v_letter=$request->c_v_letter;
    $Newdeposit->gpf_no_status=$request->gpf_no_status;
    if($request->attachment_one)
    $Newdeposit->attachment_one = $request->file('attachment_one')->store('Files');
    if($request->attachment_two)
    $Newdeposit->attachment_two = $request->file('attachment_two')->store('Files');
    if($request->attachment_three)
    $Newdeposit->attachment_three = $request->file('attachment_three')->store('Files');
    if($request->attachment_four)
    $Newdeposit->attachment_four = $request->file('attachment_four')->store('Files');
    $Newdeposit->save();
    return redirect ('ganrate_new_number')->with('success',' Data  Successfully');
  }
  public function assigned_gpf_number($id) {
    // $ganratereports=ganrate::where('id', $id)->first();
    $lang = app()->getLocale();
    $ganratereports=DB::table('ganrate_new_number as gn')
    ->leftJoin('designations as de','de.id','=','gn.designation_id')
    ->leftJoin('taluka as tl','tl.id','=','gn.taluka_id')
    ->select('gn.id','gn.c_v_letter','gn.gpf_no','gn.employee_name','de.designation_name_'.$lang.' as designation_name','tl.taluka_name_'.$lang.' as taluka_name',
    'gn.created_at')
    ->where('gn.id', $id)->first();
    return view ('Admin.Ganrate.ganratereports', compact('ganratereports'));
  }
  public function getlast_gpfnumber() {
    return GenerateApplication::max("app_no");
  }
  public function getLastApplicationNo() {
    return GenerateApplication::max("app_no");
  }
  public function genarate_view($id) {
    $data['ganarate_view'] = GenerateApplication::select("gpf_number_application.*","departments.department_name_mar","taluka.taluka_name_mar",
    "classifications.classification_name_mar","classifications.inital_letter","designations.designation_name_mar",
    "bank.bank_name_mar")
    ->where('gpf_number_application.id',$id)
    ->leftJoin("departments", "departments.id", "=", "gpf_number_application.department_id")
    ->leftJoin("taluka", "taluka.id", "=", "gpf_number_application.taluka_id")
    ->leftJoin("classifications", "classifications.id", "=", "gpf_number_application.classification_id")
    ->leftJoin("designations", "designations.id", "=", "gpf_number_application.designation_id")
    ->leftJoin("bank", "bank.id", "=", "gpf_number_application.bank_id")
    ->latest()->get();
    return view('Admin.Ganrate.ganarate_view',$data);
  }
  public function  genaratetrans() {
    return view ('genaratetrans');
  }
  public function approved_new_gpf_no(Request $request){
    if(isset($request->appId) && $request->appId !== ''){
      GenerateApplication::where('id',$request->appId)
                              ->update(['app_status'=> 1,'remark'=> $request->remark,'modified_by'=>Auth::id()]);
      return ['status'=>'success','message'=>'Application Approved Successfully'];
    }
  }
  public function reject_new_gpf_no(Request $request){
    if(isset($request->appId) && $request->appId !== ''){
      GenerateApplication::where('id',$request->appId)
                          ->update(['app_status'=> 1,'remark'=> $request->remark,'modified_by'=>Auth::id()]);
      return ['status'=>'success','message'=>'Application Rejected Successfully'];
    }
  }
}
