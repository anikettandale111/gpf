<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Taluka;
use Session;
use Config;

class DepartmentMasterController extends Controller
{
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
    public function index()
    {
        $data['department'] = Department::select('departments.*',
        'taluka.id as tid',
        'taluka.taluka_name_mar as taluka_name')
        ->leftJoin("taluka", "taluka.id", "=", "departments.taluka_id")
        ->latest()->get();
        $data['taluka']=Taluka::all();
        return view("Admin.Master.department", $data);
    }
    public function store(Request $request)
    {
        if ($request->department_id == 0) {
            $department = $request->taluka_id;
            $department = $request->department_name_en;
            $department = $request->department_name_mar;
            Department::create($request->all());
            $msg = " Recored Insert Successfully";
        } else {
            $department = Department::find($request->department_id);
            $department = $request->taluka_id;
            $department = $request->department_name_en;
            $department = $request->department_name_mar;
            Department::where('id', $request->department_id)->update([
                'taluka_id' => $request->taluka_id,
                'department_name_en' => $request->department_name_en,
                'department_name_mar' => $request->department_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);

 return redirect()->back();
    }
    public function destroy($id)
    {

        // return Department::where('id',$id)->delete();
        return true;
    }
}
