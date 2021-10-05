<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\Taluka;
use App\Month;
use App\Classification;
use App\Department;
use App\Designation;
use App\Masteremployee;
use Illuminate\Support\Facades\DB;
use App\Vetan;
use App\MasterVetanAyog;
use Session;
use Config;

class SixPayCommissionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:sixpay-list|sixpay-create|sixpay-delete', ['only' => ['index','store','calculationOne']]);
    $this->middleware('permission:sixpay-create', ['only' => ['create','store','calculationOne']]);    
    $this->middleware('permission:sixpay-delete', ['only' => ['destroy']]);
    
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
    $data['designation'] = Designation::all();
    $data['department'] = Department::all();
    $data['month']=month::orderBy('order_by')->get();
    $data['taluka'] = Taluka::all();
    $deposits=DB::table('master_vetan_ayog_received AS va')
    ->leftJoin('master_employee AS me','va.GPFNo','me.gpf_no')
    ->leftJoin('master_month AS mm','va.Mnt','mm.id')
    ->select('va.*','me.employee_name','mm.month_name_mar')
    ->where("va.Year", Session::get('from_year'))
    ->where("va.Mnt", ">=", 4)
    ->where("va.pay_number",6);
    $deposits_two=DB::table('master_vetan_ayog_received AS va')
    ->leftJoin('master_employee AS me','va.GPFNo','me.gpf_no')
    ->leftJoin('master_month AS mm','va.Mnt','mm.id')
    ->select('va.*','me.employee_name','mm.month_name_mar')
    ->where("va.Year", Session::get('to_year'))
    ->where("va.Mnt", "<=", 3)
    ->where("va.pay_number",6)
    ->union($deposits)
    ->get();
    $data['sixpayentry'] = $deposits_two;
    return view('Admin.Vetan.sixpay', $data);
  }
  public function store(Request $request)
  {
    $six_pay["GPFNo"]=$request->employeeGpfNo;
    $six_pay["Year"]=$request->instalmentYear;
    $six_pay["Instalment"]=$request->hapta_no;
    $six_pay["ChallanNo"]=$request->chalna_no;
    $six_pay["DiffAmt"] = $request->difference_amount;
    $six_pay["Interest"] = $request->different_interest;
    $six_pay["TotDiff"] = (float)$request->difference_amount + (float)$request->different_interest;
    $six_pay["Mnt"] = $request->instalment_month;
    $six_pay["Rmk"] = $request->shera;
    $six_pay["financial_year"] = session()->get('financial_year');
    $six_pay["DtFrom"] = date('Y-m-d',strtotime($request->from_interest_date));
    $six_pay["DtTo"] = date('Y-m-d',strtotime($request->to_intrest_date));
    $six_pay["LockDate"] = date('Y-m-d');
    $six_pay["INTY1"] = ((int)$request->hapta_no == 1)? $request->different_interest : "";
    $six_pay["INTY2"] = ((int)$request->hapta_no == 2)? $request->different_interest : "";
    $six_pay["INTY3"] = ((int)$request->hapta_no == 3)? $request->different_interest : "";
    $six_pay["INTY4"] = ((int)$request->hapta_no == 4)? $request->different_interest : "";
    $six_pay["INTY5"] = ((int)$request->hapta_no == 5)? $request->different_interest : "";
    $six_pay["INTY6"] = ((int)$request->hapta_no == 6)? $request->different_interest : "";
    $six_pay["INTY7"] = ((int)$request->hapta_no == 7)? $request->different_interest : "";
    $six_pay["INTY8"] = ((int)$request->hapta_no == 8)? $request->different_interest : "";
    $six_pay["INTY9"] = ((int)$request->hapta_no == 9)? $request->different_interest : "";
    $six_pay["INTY10"] = ((int)$request->hapta_no == 10)? $request->different_interest : "";
    $six_pay["pay_number"]=$request->vetan;
    $id = MasterVetanAyog::insertGetId($six_pay);
    if($id){
      return ['status'=>'success','message' =>'Six Pay Saved Successfully'];
    }else{
      return ['status'=>'error','message' =>'Sorry, Please try again'];
    }
  }
  public function destroy($id)
  {
    MasterVetanAyog::where('TransId',$id)->delete();
    return ['status'=>'success','message' =>'Record deleted successfully.'];
  }
  public function calculationOne()
  {
    $query = DB::raw('SELECT GPFNo,TotDiff,Interest FROM master_vetan_ayog_received WHERE pay_number = 7 AND INTY2 = 0 GROUP BY GPFNo ORDER BY TransId DESC ');
    $result = DB::Select($query);
    if(count($result)){
      foreach ($result as $key => $value) {
        // if($value->GPFNo == 13423){
        $muddal_vyaj = $value->TotDiff;
        $cal_step_one = ($muddal_vyaj * 7.1 / 12*12)/100;
        $cal_step_one = round($cal_step_one);
        $new_intrest = $value->Interest +$cal_step_one;
        $query = DB::raw('UPDATE master_vetan_ayog_received SET INTY2 = '.$cal_step_one.' AND Interest = '.$new_intrest.' WHERE pay_number = 7 AND INTY2 = 0 AND GPFNo = '.$value->GPFNo);
        $query = DB::select($query);
        // }
      }
    }
  }
}
