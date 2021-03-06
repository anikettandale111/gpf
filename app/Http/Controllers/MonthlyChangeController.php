<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\deposit;
use App\Taluka;
use App\month;
use App\Classification;
use App\Chalan;
use Illuminate\Support\Facades\Auth;
use DB;

class MonthlyChangeController extends Controller
{
    public function index()
    {
         $data['deposits']=deposit::select(
            "deposits.*",
            "deposits.id as deposit_id",
            "taluka.id as  tid",
            "taluka.taluka_name_mar as taluka_name",
            "classifications.id as cid",
            "classifications.classification_name_mar",
            "master_month.month_name_mar",
         )
         ->leftJoin("taluka", "taluka.id", "=","deposits.taluka")
         ->leftJoin("classifications", "classifications.id", "=", "deposits.classification")
         ->leftJoin("master_month", "master_month.id", "=", "deposits.chalan_no")
         ->latest()->get();

         $data ['month']=month::all();
         $data ['classification']=Classification::all();
         $data ['taluka']=Taluka::all();

        return view ("Admin.Chalan.chalan", $data);
    }

  public function deposit_insert_data(Request $request)
  {
    $req = deposit::select('primary_number')->latest()->first();
    $res = deposit::where(['chalan_no'=>$request->chalan_no,'app_no'=>$request->app_no,'year'=>$request->year])->get();
    if(count($res) == 0)
    {
      $Newdeposit = new deposit($request->all());
      $Newdeposit->chalan_no=$request->chalan_no;
      $Newdeposit->app_no=$request->app_no;
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
      $Newdeposit->classification=$request->classification;
      $Newdeposit->total_waste=$request->total_waste;
      $Newdeposit->taluka=$request->taluka;
      $Newdeposit->amount=$request->amount;
      $Newdeposit->diff_amount= $request->diff_amount;
      $Newdeposit->shera=$request->shera;
      $Newdeposit->save();
      return redirect()->back()->with('info_insert',' Data  Successfully');
    }
    else
    {
      return redirect()->back()->with('danger_insert','Data Alredy Exist');
    }

    $Newdeposit->primary_number=$number;
    $Newdeposit->classification=$request->classification;
    $Newdeposit->total_waste=$request->total_waste;
    $Newdeposit->taluka=$request->taluka;
    $Newdeposit->amount=$request->amount;
    $Newdeposit->diff_amount = $request->diff_amount;
    $Newdeposit->shera=$request->shera;
    $Newdeposit->save();
    return redirect('chalan')->with('info',' Data  Successfully');
  }
  public function destroy($id)
  {
    deposit::where('id',$id)->delete();
        return ['id'=>$id];

  }

  public function monthly_chalan()
    {
        $data['deposits']=deposit::select(
            "deposits.*",
            "deposits.id as deposit_id",
            "taluka.id as  tid",
            "taluka.taluka_name_mar as taluka_name",
            "classifications.id as cid",
            "classifications.classification_name_mar",
            "master_month.month_name_mar",

         )
         ->leftJoin("taluka", "taluka.id", "=","deposits.taluka")
         ->leftJoin("classifications", "classifications.id", "=", "deposits.classification")
         ->leftJoin("master_month", "master_month.id", "=", "deposits.chalan_no")
         ->latest()->get();

         $data ['month']=month::all();
         $data ['classification']=Classification::all();
         $data ['taluka']=Taluka::all();
        return view('Admin.monthly_chalan', $data);
    }
    public function get_chalan_amount(Request $request)
    {
       $data['chalan_no'] = $request->chalan_no;
       $data['year'] = $request->year;
       $data['app_no'] = $request->app_no;
       $deposits=deposit::select('amount','primary_number','diff_amount','taluka','classification')->where($data)->first();
       $res = '';
       if(!empty($deposits->primary_number))
       {
            $res = Chalan::select('chalan.*','users.name')->where('chalan.primary_number',$deposits->primary_number)
            ->leftjoin('users','users.id','=','chalan.created_by')
            ->latest()->get();
       }
       return ['amt'=>$deposits,'chalan'=>$res];
    }

    public function chalan_insert(Request $request)
    {

        $res = Chalan::where(['app_no'=>$request->app_no,'year'=>$request->year,'month'=>$request->chalan_no,'gpf_no'=>$request->account_id])->get();

        if(count($res) == 0)
        {
            $arr['year'] = $request->year;
            $arr['month'] = $request->chalan_no;
            $arr['app_no'] = $request->app_no;
            $arr['primary_number'] = $request->primary_number;
            $arr['taluka'] = $request->taluka;
            $arr['classification'] = $request->classification;
            $final_amt_diff = $request->diffrence_amount - ($request->deposit_amt + $request->refund + $request->pending_amt);
            $arr['final_amt_diff'] = $final_amt_diff;
            $arr['gpf_no'] = $request->account_id;
            $arr['deposit'] = $request->deposit_amt;
            $arr['partava'] = $request->refund;
            $arr['pending_amt'] = $request->pending_amt;
            $arr['total'] = $request->total;
            $arr['created_by'] = Auth::id();
            $arr['modified_by'] = Auth::id();
            $create = Chalan::Create($arr);
            deposit::where('primary_number',$request->primary_number)->update(['diff_amount'=>$final_amt_diff,'modified_by'=>Auth::id()]);

            return redirect()->back()->with('info',' Data Successfully Added');
        }
        else
        {
            return redirect()->back()->with('danger',' Data Already exist');
        }
    }



}
