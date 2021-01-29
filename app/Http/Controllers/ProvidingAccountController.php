<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Classification;
use App\Designation;
use App\ganrate;
use App\Taluka;

class ProvidingAccountController extends Controller
{
    public function index()
    {
        $data['ganrate'] = ganrate::select(
            "ganrate_new_number.*",
            "departments.department_name_mar",
            "taluka.taluka_name_mar",
            "classifications.classification_name_mar",
            "designations.designation_name_mar",

            )

        ->leftJoin("departments", "departments.id", "=", "ganrate_new_number.id")
        ->leftJoin("taluka", "taluka.id", "=", "ganrate_new_number.id")
        ->leftJoin("classifications", "classifications.id", "=", "ganrate_new_number.id")
        ->leftJoin("designations", "designations.id", "=", "ganrate_new_number.id")
        ->latest()->get();
        $data['classification'] = Classification::all();
        $data['taluka'] = Taluka::all();
        $data['designation'] = Designation::all();
        $data['department'] = Department::all();
        return view('Admin.Ganrate.ganrate_new_number', $data);
    }
    public function ganrate_insert_no(Request $request)
  {
    $req = ganrate::select('gpf_no')->latest()->first();
    $Newdeposit = new ganrate;
    $Newdeposit->classification=$request->classification;
    if(empty($req))
    {
        $number = "001111";
    }
    else
    {
        $number = str_pad($req->gpf_no + 1, 5, 0, STR_PAD_LEFT);
    }
    $Newdeposit->gpf_no=$number;
    $Newdeposit->taluka=$request->taluka;
    $Newdeposit->department=$request->department;
    $Newdeposit->name=$request->name;
    $Newdeposit->designation=$request->designation;
    $Newdeposit->account_no=$request->account_no;
    $Newdeposit->date_of_birthday=$request->date_of_birthday;
    $Newdeposit->date_birth=$request->date_birth;
    $Newdeposit->date_dated=$request->date_dated;
    $Newdeposit->c_v_letter=$request->c_v_letter;
    $Newdeposit->yes=$request->yes;
    $Newdeposit->save();
    return redirect ('ganrate_new_number')->with('success',' Data  Successfully');

  }
  public function ganrate_reports($id)
  {
     $ganratereports=ganrate::where('id', $id)->first();
     return view ('Admin.Ganrate.ganratereports', compact('ganratereports'));
  }

  public function ganrate_Delete($id)
  {
     ganrate::where('id',$id)->delete();
     return ['id'=>$id];

   }

}
