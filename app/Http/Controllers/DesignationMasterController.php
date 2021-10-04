<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
use Session;
use Config;

class DesignationMasterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:designation-list|designation-create|designation-edit|designation-delete', ['only' => ['index','store']]);
    $this->middleware('permission:designation-create', ['only' => ['create','store']]);
    $this->middleware('permission:designation-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:designation-delete', ['only' => ['destroy']]);
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
        $designation = Designation::all();
        return view("Admin.Master.designation", compact("designation"));
    }
    public function store(Request $request)
    {
        if ($request->designation_id == 0) {
            $designation = $request->designation_name_en;
            $designation = $request->designation_name_mar;
            Designation::create($request->all());
            $msg = "Recored Insert Successfully";
        } else {
            $designation = Designation::find($request->designation_id);
            $designation = $request->designation_name_en;
            $designation = $request->designation_name_mar;
            Designation::where('id', $request->designation_id)->update([
                'designation_name_en' => $request->designation_name_en,
                'designation_name_mar' => $request->designation_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Designation::find($id)->delete();
        return ['status' => 'success'];
    }
}
