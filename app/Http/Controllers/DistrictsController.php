<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;
use  App\District;
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
        Session::flash('info', 'District name allready exits.');
        return false;
      }
      DB::table('districts')->insert(['district_name_en'=>$request->district_name_en,'district_name_mar'=>$request->district_name_mar]);
      Session::flash('success', 'District Saved successfully.');
    }
    public function update(Request $request)
    {
      DB::table('districts')->where('dsitrict_id', $request->district_id)->update(['district_name_en'=>$request->district_name_en,'district_name_mar'=>$request->district_name_mar]);
      Session::flash('success', 'District Updated successfully.');
    }
    public function destroy(Request $request){
        return District::where('cat_id', $request->cat_id)->delete();
}
}
