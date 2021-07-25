<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taluka;
use App\Year;
use Auth;
use App\Customer;
use App\Master;
use App\department;
use App\designation;
use App\classification;
use App\Month;
use DB;
use App\District;
use Session;
use Config;

class TalukaController extends Controller
{
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
    public function Year_Insert_Data(Request $request)
    {
        $Newyear= new Year();
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
