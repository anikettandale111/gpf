<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App;
use Session;
use DB;
use App\ApplicationsForms;
use App\ganrate;

class CommonApplicationController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  public function index()
  {
    $reasons = DB::table('common_reasons')->get();
    return view('Application/commonform',compact('reasons'));
  }
  public function store(Request $request)
  {

    $data['application_number'] = $request->application_form_number;
    $data['gpf_no'] = $request->gpf_no;
    $data['user_id'] = $request->user_id;
    $data['user_empid'] = $request->user_empid;
    $data['user_name'] = $request->user_name;
    $data['user_designation'] = $request->user_designation;
    $data['user_designation_id'] = $request->user_designation_id;
    $data['bank_id'] = $request->user_bank_id;
    $data['bank_account_no'] = $request->user_bank_account_no;
    $data['bank_name'] = $request->user_bank;
    $data['bank_branch'] = $request->user_bank_location;
    $data['bank_ifsc'] = $request->user_bank_ifsc;
    $data['total_amount'] = $request->user_total_amount;
    $data['required_amount'] = $request->user_withdrawn_amount;
    $data['application_type'] = $request->user_type_of_request;
    $data['application_reason'] = $request->user_reason_withdrawn;
    if($request->user_proof)
    $data['reason_proof'] = $request->file('user_proof')->store('Files');
    if($request->user_account_stmt)
    $data['user_account_stmt'] = $request->file('user_account_stmt')->store('Files');
    $data['qualify_status'] = $request->user_qualify_criteria;
    $data['total_service_period'] = $request->user_total_work;
    $data['user_joining_date'] = $request->user_joining_date;
    $data['retritment_date'] = $request->user_retirment_date;

    ApplicationsForms::insert($data);
    Session::flash('success', 'Application Form Saved Successfully.');
    return redirect()->back();
  }
  public function update(Request $request)
  {
    DB::table('common_reasons')->where('cr_id', $request->district_id)->update(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en,'reason_description_en'=>$request->reason_description_en,'reason_description_mar'=>$request->reason_description_mar]);
    Session::flash('success', 'Reason Updated successfully.');
  }
  public function destroy(Request $request)
  {
    DB::table('common_reasons')->where('cr_id', $request->district_id)->delete();
    Session::flash('danger', 'Reason Deleted successfully.');
  }
  public function getLastApplicationNumber(){
    return ApplicationsForms::max('application_number');
  }
  public function getuserdetailsbygpfno(Request $request){
    // return ganrate::where('gpf_no',$request->input_id)->first();
    $lang = app()->getLocale();
    return DB::table('gpf_number_application as gn')
    ->join('bank as bk','bk.id','=','gn.bank_id')
    ->join('departments as dp','dp.id','=','gn.department_id')
    ->join('designations as dg','dg.id','=','gn.designation_id')
    ->join('classifications as cl','cl.id','=','gn.classification_id')
    ->join('taluka as tl','tl.id','=','gn.taluka_id')
    ->select('gn.employee_id','gn.app_no','gn.employee_name','gn.joining_date','gn.retirement_date',
    'gn.total_service','gn.bank_account_no','gn.branch_location','gn.ifsc_code','gn.bank_id',
    'gn.department_id','gn.designation_id','gn.classification_id','gn.id','bk.bank_name_'.$lang.' as bank_name','tl.taluka_name_'.$lang.' as taluka_name','dg.designation_name_'.$lang.' as designation_name','dp.department_name_'.$lang.' as department_name','cl.classification_name_'.$lang.' as classification_name','cl.inital_letter',)
    ->where('gn.app_no',$request->input_id)
    ->get();
  }
  public function listcommonforms(){
    $applicationsList = ApplicationsForms::get();
    return view('Application/receivedcommonform',compact('applicationsList'));
  }
  public function viewapplication($id){
    if(isset($id) || is_numeric($id)){
      $lang = app()->getLocale();
      $applicationsData = DB::table('application_forms as af')
      ->join('bank as bk','bk.id','=','af.bank_id')
      ->join('departments as dp','dp.id','=','af.user_department_id')
      ->join('designations as dg','dg.id','=','af.user_designation_id')
      ->select('af.user_empid','af.app_form_id','af.gpf_no','af.user_empid','af.user_name','af.user_joining_date',
      'af.retritment_date','af.total_service_period','af.bank_account_no','af.bank_branch','af.bank_ifsc','af.bank_id',
      'af.user_department_id','af.user_designation_id','af.app_form_id','af.application_type','af.application_reason',
      'af.reason_proof','af.total_amount','af.required_amount','af.qualify_status','af.user_account_stmt','bk.bank_name_'.$lang.' as bank_name','dg.designation_name_'.$lang.' as designation_name','dp.department_name_'.$lang.' as department_name')
      ->where('af.app_form_id',$id)
      ->first();
      return view('Application/viewcommonapp',compact('applicationsData'));
    } else {
      return redirect()->back();
    }
  }
  public function testpdf(Request $request){
    if(isset($request->test_pdf)){
      $parser = new \Smalot\PdfParser\Parser();
      $pdf    = $parser->parseFile($request->file('test_pdf'));
      $details = $pdf->getDetails();
      $pages = $pdf->getPages();
      $text = $pdf->getText();
      print_r($pages);
      echo "------------------------------------------------------------<br>";
      print_r($details);die();
      echo "------------------------------------------------------------<br>";
      print_r($text);die();
    }
    return view('testpdf');
  }

}
