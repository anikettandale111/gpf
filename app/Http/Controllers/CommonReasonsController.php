<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;

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
      DB::table('common_reasons')->where('cr_id', $request->district_id)->update(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en,'reason_description_en'=>$request->reason_description_en,'reason_description_mar'=>$request->reason_description_mar]);
      Session::flash('success', 'Reason Updated successfully.');
    }
    public function destroy(Request $request)
    {
      DB::table('common_reasons')->where('cr_id', $request->district_id)->delete();
      Session::flash('danger', 'Reason Deleted successfully.');
    }
}
