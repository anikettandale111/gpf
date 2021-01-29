<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taluka;
use App\Year;
use Auth;
use App\Customer;
use App\master;
use App\department;
use App\designation;
use App\classification;
use App\month;
use DB;
use App\District;

class TalukaController extends Controller
{


    public function year()
    {
        $Year=year::all();
        $Month=month::all();
        return view('Admin.Year.year', compact('Year','Month'));
    }
    public function Year_Insert_Data(Request $request)
    {
        $Newyear= new year();
        $Newyear->year=$request->year;
        $Newyear->percent=$request->percent;
        $Newyear->from_month=$request->from_month;
        $Newyear->to_month=$request->to_month;
        $Newyear->save();
       return redirect('Year')->with('info',' Data  Successfully ');
    }
    public function Year_Edit($id)
    {
        $yedit=year::where('id','=',$id)->first();
        $Month=month::all();
        return view ('Admin.Year.year_edit', compact('yedit','Month'));
    }
    public function Year_Update(Request $request)
    {
        $Newyear= year::find($request->id);
        $Newyear->year=$request->year;
        $Newyear->percent=$request->percent;
        $Newyear->from_month=$request->from_month;
        $Newyear->to_month=$request->to_month;
        $Newyear->save();
        return redirect('Year')->with('success',' Data  Udapte  Successfully ');
    }
    public function Year_Delete($id)
    {
        year::where('id',$id)->delete();
        return redirect("Year")->with('danger',' Data Deleted Successfully ');
    }











}
