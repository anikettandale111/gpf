<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\deposit;
use App\taluka;
use App\month;
use App\classification;
use App\department;
use App\designation;
use App\ganrate;
use DB;
use App\vetan;

class TrendController extends Controller
{


  public function ganrate_new(Request $request)
   {


    $query = DB::raw('SELECT * FROM ganrate_new_number WHERE b_no='.$request->id);
    $result = DB::Select($query);
    if(isset($result[0])){
      return json_encode(['stuas'=>'success','msg' =>'Data Found' ,'userdata' =>$result]);
    }else{
      return json_encode(['stuas'=>'failed','msg' =>'Data Not Found' ]);
    }

   }

  public function vetan()
   {

    $designation=designation::all();
    $department=department::all();
    $classification=classification::all();
    $taluka=taluka::all();
    $vetan=vetan::latest()->get();
    return view('Admin.Vetan.vetan',compact('vetan','taluka','classification','department','designation'));
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
    $query = DB::raw('SELECT * FROM ganrate_new_number WHERE b_no='.$request->id);
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


}

