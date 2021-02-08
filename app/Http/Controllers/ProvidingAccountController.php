<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Classification;
use App\Designation;
use App\ganrate;
use App\Taluka;
use App\Bank;
use Illuminate\Support\Facades\DB;

class ProvidingAccountController extends Controller
{
  public function index()
  {
    $data['ganrate'] = ganrate::select(
      "ganrate_new_number.*",
      "departments.department_name_mar",
      "taluka.taluka_name_mar",
      "classifications.classification_name_mar",
      "classifications.inital_letter",
      "designations.designation_name_mar",
      "bank.bank_name_mar",
      )
      ->leftJoin("departments", "departments.id", "=", "ganrate_new_number.department_id")
      ->leftJoin("taluka", "taluka.id", "=", "ganrate_new_number.taluka_id")
      ->leftJoin("classifications", "classifications.id", "=", "ganrate_new_number.classification_id")
      ->leftJoin("designations", "designations.id", "=", "ganrate_new_number.designation_id")
      ->leftJoin("bank", "bank.id", "=", "ganrate_new_number.bank_id")
      ->latest()->get();
      $data['classification'] = Classification::all();
      $data['taluka'] = Taluka::all();
      $data['designation'] = Designation::all();
      $data['department'] = Department::all();
      $data['bank'] = Bank::all();
      return view('Admin.Ganrate.ganrate_new_number', $data);
    }
    public function ganrate_new(Request $request)
    {


      $query = DB::raw('SELECT * FROM ganrate_new_number WHERE gpf_no='.$request->id);
      $result = DB::Select($query);
      if(isset($result[0])){
        return json_encode(['stuas'=>'success','msg' =>'Data Found' ,'userdata' =>$result]);
      }else{
        return json_encode(['stuas'=>'failed','msg' =>'Data Not Found' ]);
      }

    }

    public function ganrate_insert_no(Request $request)
    {
      $Newdeposit = new ganrate;
      $Newdeposit->classification_id=$request->classification_id;
      $Newdeposit->inital_letter=$request->inital_letter;
      $Newdeposit->gpf_no=$request->gpf_no;
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
      $Newdeposit->save();
      return redirect ('ganrate_new_number')->with('success',' Data  Successfully');

    }
    public function assigned_gpf_number($id)
    {
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

    public function ganrate_Delete($id)
    {
      ganrate::where('id',$id)->delete();
      return ['id'=>$id];

    }
    public function getlast_gpfnumber(){
      return ganrate::max("gpf_no");
    }
  }
