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

  public function Trend_add()
  {
    $deposits=deposit::latest()->get();
    $Month=month::all();
    $classification=classification::all();
    $taluka=taluka::all();
    return view ("Admin.trend.trend_add", compact("deposits","Month","classification","taluka"));
  }

  public function deposit_Insert_Data(Request $request)
  {
    $req = deposit::select('primary_number')->latest()->first();

    $res = deposit::where(['Currency_number'=>$request->Currency_number,'trend_no'=>$request->trend_no,'year'=>$request->year])->get();
    if(count($res) == 0)
    {
      $Newdeposit = new deposit($request->all());
      $Newdeposit->Currency_number=$request->Currency_number;
      $Newdeposit->trend_no=$request->trend_no;
      if(empty($req))
      {
        $number = "001111";
      }
      else
      {
        $number = str_pad($req->primary_number + 1, 5, 0, STR_PAD_LEFT);
      }

      $Newdeposit->primary_number=$number;
      $Newdeposit->year=$request->year;
      $Newdeposit->Classification=$request->Classification;
      $Newdeposit->Total_waste=$request->Total_waste;
      $Newdeposit->Select_taluka=$request->Select_taluka;
      $Newdeposit->amount=$request->amount;
      $Newdeposit->diff_amount= $request->The_amount;
      $Newdeposit->Shera=$request->Shera;
      $Newdeposit->save();
      return redirect()->back()->with('info_insert',' Data  Successfully');
    }
    else
    {
      return redirect()->back()->with('danger_insert','Data Alredy Exist');
    }

    $Newdeposit->primary_number=$number;
      // $Newdeposit->Currency_date=$request->Currency_date;
    $Newdeposit->Classification=$request->Classification;
    $Newdeposit->Total_waste=$request->Total_waste;
    $Newdeposit->Select_taluka=$request->Select_taluka;
    $Newdeposit->amount=$request->amount;
    $Newdeposit->diff_amount = $request->diff_amount;
    $Newdeposit->Shera=$request->Shera;
    $Newdeposit->save();
    return redirect('Trend_add')->with('info',' Data  Successfully');
  }
  public function destroy($id)
  {
       deposit::where('id',$id)->delete();
        return ['id'=>$id];

  }


  public function ganrate_new_number()
  {
    $designation=designation::all();
    $department=department::all();
    $classification=classification::all();
    $taluka=taluka::all();
    $ganrate=ganrate::latest()->get();
    return view ('Admin.Ganrate.ganrate_new_number',compact('ganrate','taluka','classification','department','designation'));
  }
  public function ganrate_insert_no(Request $request)
  {


    $Newdeposit = new ganrate;
    $Newdeposit->classification=$request->classification;
    $Newdeposit->b_no=$request->b_no;
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

