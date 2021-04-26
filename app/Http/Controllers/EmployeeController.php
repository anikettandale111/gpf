<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Config;
use App\Taluka;
use App\Department;
use App\User;
use App\Role;
use App\Designation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Session;

class EmployeeController extends Controller
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
    return view('Admin.Employee.index');
  }
}
