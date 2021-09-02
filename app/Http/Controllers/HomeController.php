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

class HomeController extends Controller
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
    return view('Admin.dashboard');
  }

  public function change_pwd()
  {
    return view('Admin.change_pwd');
  }

  public function submit_change_pwd(Request $request)
  {
    $user = User::where('id', Auth::id())->update(['password' => Hash::make($request->new_password)]);
    return redirect()->back()->with('success', 'Password  Udapte  Successfully ');
  }
  public function languagechange($locale)
  {
    App::setLocale($locale);
    Session::put('locale', $locale);
    return true;
  }
  public function yearchange($year)
  {
    $newYear = explode('-',$year);
    Session::put('from_year', $newYear[0]);
    Session::put('to_year', $newYear[1]);
    Session::put('financial_year', $year);
    if(date('m') > 3 && date('m') <= 12){
      $current_year = date('Y').'-'.(date('Y')+1);
    }else{
      $current_year = (date('Y')-1).'-'.date('Y');
    }
    if($current_year == $year){
      Session::put('selected_database','mysql');
    }else{
      Session::put('selected_database','mysqli_'.$year);
    }
    if(session('selected_database') == 'mysql'){
      DB::purge('mysql');
    }else{
      DB::purge('mysqli_'.$year);
    }
    return true;
  }
}
