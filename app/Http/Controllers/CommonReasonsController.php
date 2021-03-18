<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;
use Config;

class CommonReasonsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      if(session('from_year') !== null){

      } else {
        Session::put('from_year', date("Y",strtotime("-1 year")));
        Session::put('to_year', date("Y"));
        Session::put('financial_year', date("Y",strtotime("-1 year")).'-'.date("Y"));
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
        $reasons = DB::table('common_reasons')->get();
        return view('Admin/Reasons/index',compact('collapse_div','active_menu','page_name','reasons'));
    }
    public function store(Request $request)
    {
      $districts = DB::table('common_reasons')->where(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en])->get();
      if(count($districts)){
        Session::flash('info', 'Reason name allready exits.');
        return false;
      }
      DB::table('common_reasons')->insert(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en,'reason_description_en'=>$request->reason_description_en,'reason_description_mar'=>$request->reason_description_mar]);
      Session::flash('success', 'Reason Saved successfully.');
    }
    public function update(Request $request)
    {
      DB::table('common_reasons')->where('cr_id', $request->cr_id)->update(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en,'reason_description_en'=>$request->reason_description_en,'reason_description_mar'=>$request->reason_description_mar]);
      Session::flash('success', 'Reason Updated successfully.');
    }
    public function destroy(Request $request)
    {
      DB::table('common_reasons')->where('cr_id', $request->cr_id)->delete();
      Session::flash('danger', 'Reason Deleted successfully.');
    }
}
