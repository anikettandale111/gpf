<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;
use Session;
use Config;

class ClassificationMasterController extends Controller
{
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
    public function index()
    {
        $classification=Classification::all();
        return view ("Admin.Master.classification",compact("classification"));
    }
    public function store(Request $request)
    {
        if ($request->classification_id == 0) {
            $classification = $request->classification_name_en;
            $classification = $request->classification_name_mar;
            Classification::create($request->all());
            $msg = "Recored Insert Successfully";
        } else {
            $classification = Classification::find($request->classification_id);
            $classification = $request->classification_name_en;
            $classification = $request->classification_name_mar;
            Classification::where('id', $request->classification_id)->update([
                'classification_name_en' => $request->classification_name_en,
                'classification_name_mar' => $request->classification_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Classification::find($id)->delete();
        return ['status' => 'success'];
    }
}
