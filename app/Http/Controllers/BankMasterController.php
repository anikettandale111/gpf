<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Config;
use Excel;
use Session;

class BankMasterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:bank-list|bank-create|bank-edit|bank-delete', ['only' => ['index','store']]);
    $this->middleware('permission:bank-create', ['only' => ['create','store']]);
    $this->middleware('permission:bank-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:bank-delete', ['only' => ['destroy']]);
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
        $bank = Bank::all();
        return view('Admin.Master.bank', compact('bank'));
    }
    public function store(Request $request)
    {
        if ($request->bank_id == 0) {
            $bank = $request->bank_name_en;
            $bank = $request->bank_name_mar;
            Bank::create($request->all());
            $msg = "Recored Insert Successfully";
        } else {
            $bank = Bank::find($request->bank_id);
            $bank = $request->bank_name_en;
            $bank = $request->bank_name_mar;
            Bank::where('id', $request->bank_id)->update([
                'bank_name_en' => $request->bank_name_en,
                'bank_name_mar' => $request->bank_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Bank::find($id)->delete();
        return ['status' => 'success'];
    }
}
