<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\District;
use App\Taluka;
use Session;
use Config;

class TalukaMasterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:taluka-list|taluka-create|taluka-edit|taluka-delete', ['only' => ['index','store']]);
    $this->middleware('permission:taluka-create', ['only' => ['create','store']]);
    $this->middleware('permission:taluka-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:taluka-delete', ['only' => ['destroy']]);
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
    public function index()
    {
         $district=District::all();
         $taluka = Taluka::select(
             "districts.dsitrict_id AS did",
             "districts.district_name_mar as district_name",
             "taluka.id AS tid",
             "taluka.taluka_name_en",
             "taluka.taluka_name_mar",
             "taluka.district_id")

         ->leftJoin("districts", "districts.dsitrict_id", "=", "taluka.district_id")
         ->get();
        return view('Admin.Taluka.taluka', compact("taluka","district"));
    }
    public function store(Request $request)
    {

        $collapse_div = 'taluka';
        $active_menu = 'taluka_master';
        $page_name = trans('language.h_taluka');

        if ($request->taluka_id == 0) {
            $taluka = $request->taluka_name_en;
            $taluka = $request->taluka_name_mar;
            $taluka = $request->district_id;
            taluka::create($request->all());
            $msg = " Taluka Insert Successfully";
        } else {
            $taluka =Taluka::find($request->taluka_id);
            $taluka = $request->taluka_name_en;
            $taluka = $request->taluka_name_mar;
            $taluka = $request->district_id;

            Taluka::where('id', $request->taluka_id)->update([
                'taluka_name_en' => $request->taluka_name_en,
                'taluka_name_mar' => $request->taluka_name_mar,
                'district_id' => $request->district_id,
            ]);
            $msg = " Taluka Update Successfully";
        }
        // session()->flash('msg', $msg);
        // return redirect()->back();
        return back()->with('info',$msg);
    }
    public function destroy(Request $request)
    {

        return Taluka::where('id', $request->id)->delete();
    }

}
