<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\DB;
use Config;

class CommonReasonsController extends Controller
{
  public function __construct() {
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

  public function index(Request $request) {
    $collapse_div = 'leaves';
    $active_menu = 'leavesAbsolute';
    $page_name = trans('language.leaves');
    if($request->ajax()){
      $reasons = DB::table('common_reasons')->get();
      return datatables()->of($reasons)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        $btn = '<button onClick="editReasons('.$row->cr_id.')" class="btn btn-primary btn-sm">Edit</button>';
        $btn = $btn .'<button onClick="deleteReasons('.$row->cr_id.')" class="btn btn-danger btn-sm">Delete</button>';
        return $btn;
      })
      ->addColumn('reason_status', function ($row) {
        return ($row->reason_status)?'<label class="btn btn-success">Active</label>':'<label class="btn btn-warning">Inactive</label>';
      })
      ->rawColumns(['action','reason_status'])
      ->make(true);
    }
    return view('Admin/Reasons/index',compact('collapse_div','active_menu','page_name'));
  }
  public function store(Request $request)
  {
    $districts = DB::table('common_reasons')->where(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en])->get();
    if(count($districts)){
      Session::flash('info', 'Reason name allready exits.');
      return false;
    }
    DB::table('common_reasons')->insert(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en,'reason_description_en'=>$request->reason_description_en,'reason_description_mar'=>$request->reason_description_mar,'withdrawn_percent'=>$request->reason_withdrawn_percent,'reason_status'=>$request->reason_status]);
    return ['status' => 'success','message'=>'Details Saved Successfully'];
  }
  public function update(Request $request)
  {
    DB::table('common_reasons')->where('cr_id', $request->cr_id)->update(['reason_name_mar'=>$request->reason_name_mar,'reason_name_en'=>$request->reason_name_en,'reason_description_en'=>$request->reason_description_en,'reason_description_mar'=>$request->reason_description_mar,'withdrawn_percent'=>$request->reason_withdrawn_percent,'reason_status'=>$request->reason_status]);
    return ['status' => 'success','message'=>'Details Updated Successfully'];
  }
  public function show(Request $request){
    return DB::table('common_reasons')->where('cr_id', $request->id)->get();
  }
  public function destroy(Request $request)
  {
    return DB::table('common_reasons')->where('cr_id', $request->cr_id)->delete();
  }
}
