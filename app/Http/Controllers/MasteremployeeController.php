<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masteremployee;
use Session;
use Config;

class MasteremployeeController extends Controller
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
 public function master_employee_view()
 {
    $data['master_employee_view'] = Masteremployee::select("master_employee.*","departments.department_name_mar",
                          "taluka.taluka_name_mar","classifications.classification_name_mar","classifications.inital_letter",
                          "designations.designation_name_mar","bank.bank_name_mar",)
        ->leftJoin("departments", "departments.id", "=", "master_employee.department_id")
        ->leftJoin("taluka", "taluka.id", "=", "master_employee.taluka_id")
        ->leftJoin("classifications", "classifications.id", "=", "master_employee.classification_id")
        ->leftJoin("designations", "designations.id", "=", "master_employee.designation_id")
        ->leftJoin("bank", "bank.id", "=", "master_employee.bank_id")
        ->latest()->get();
      return view('Admin.Ganrate.master_employee',$data);
 }
}
