<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use  App\District;
use Config;
use Session;

class DistrictsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('permission:districts-list|districts-create|districts-edit|districts-delete', ['only' => ['index','store']]);
      $this->middleware('permission:districts-create', ['only' => ['create','store']]);
      $this->middleware('permission:districts-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:districts-delete', ['only' => ['destroy']]);
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $collapse_div = 'leaves';
        $active_menu = 'leavesAbsolute';
        $page_name = trans('language.leaves');
        $districts = DB::table('districts')->get();
        return view('Admin/Districts/index',compact('collapse_div','active_menu','page_name','districts'));
    }
    public function store(Request $request)
    {
      $districts = DB::table('districts')->where(['district_name_en'=>$request->district_name_en,'district_name_mar'=>$request->district_name_mar])->get();
      if(count($districts)){
        // Session::flash('info', 'District name allready exits.');
        return false;
      }
      DB::table('districts')->insert(['district_name_en'=>$request->district_name_en,'district_name_mar'=>$request->district_name_mar]);
      Session::flash('success', 'District Saved successfully.');
    }
    public function update(Request $request)
    {
      DB::table('districts')->where('dsitrict_id', $request->district_id)->update(['district_name_en'=>$request->district_name_en,'district_name_mar'=>$request->district_name_mar]);
      // Session::flash('success', 'District Updated successfully.');
    }
    public function destroy(Request $request){
        return District::where('cat_id', $request->cat_id)->delete();
}
}
