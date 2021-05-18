<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\Taluka;
use App\Month;
use App\Classification;
use App\Department;
use App\Designation;
use App\Masteremployee;
use Illuminate\Support\Facades\DB;
use App\Vetan;

class VetanController extends Controller
{
    public function index()
    {
        $data['designation'] = Designation::all();
        $data['department'] = Department::all();

        $data['taluka'] = Taluka::all();
        $data['vetan'] = vetan::select(
          'vetan.*',
          'taluka.taluka_name_mar',
          'designations.designation_name_mar',
          'departments.department_name_mar',

        )
        ->leftJoin("taluka", "taluka.id", "=","vetan.taluka")
        ->leftJoin("designations", "designations.id", "=", "vetan.designation")
        ->leftJoin("departments", "departments.id", "=", "vetan.department")
        ->latest()->get();
        return view('Admin.Vetan.vetan', $data);
    }

    public function vetan_insert(Request $request)
   {

    $vetan = new vetan;
    $vetan->vetan=$request->vetan;
    $vetan->gpf_no=$request->gpf_no;
    $vetan->taluka=$request->taluka;
    $vetan->department=$request->department;
    $vetan->name=$request->name;
    $vetan->designation=$request->designation;
    $vetan->hapta_no=$request->hapta_no;
    $vetan->chalna_no=$request->chalna_no;
    $vetan->month_hapta=$request->month_hapta;
    $vetan->chalna_amount=$request->chalna_amount;
    $vetan->digging=$request->digging;
    $vetan->difference=$request->difference;
    $vetan->from_interest_date=$request->from_interest_date;
    $vetan->until_date=$request->until_date;
    $vetan->difference_amount=$request->difference_amount;
    $vetan->different_interest=$request->different_interest;
    $vetan->charging_interest=$request->charging_interest;
    $vetan->shera=$request->shera;
    $vetan->save();
    return redirect ('vetan')->with('success',' Data  Successfully');

   }
  public function vetan_new(Request $request)
   {
    $query = DB::raw('SELECT * FROM master_employee WHERE gpf_no='.$request->id);
    $result = DB::Select($query);

    if(isset($result[0])){
      return json_encode(['stuas'=>'success','msg' =>'Data Found' ,'userdata' =>$result]);
    }else{
      return json_encode(['stuas'=>'failed','msg' =>'Data Not Found']);
    }

   }
  public function vetan_Delete($id)
  {
    vetan::where('id',$id)->delete();
    return ['id'=>$id];
  }
  public function calculationOne()
  {
    $query = DB::raw('SELECT GPFNo,TotDiff FROM master_vetan_ayog_received WHERE pay_number = 7 AND INTY2 = 0 GROUP BY GPFNo ORDER BY TransId DESC ');
    $result = DB::Select($query);
    if(count($result)){
      foreach ($result as $key => $value) {
        if($value->GPFNo == 13423){
          $muddal_vyaj = $value->TotDiff;
          $cal_step_one = ($muddal_vyaj * 7.1 / 12*12)/100;
          $cal_step_one = round($cal_step_one);
          $query = DB::raw('UPDATE master_vetan_ayog_received SET INTY2 = '.$cal_step_one.' WHERE pay_number = 7 AND INTY2 = 0 AND GPFNo = '.$value->GPFNo);
          $query = DB::select($query);
        }
      }
    }
  }
}
