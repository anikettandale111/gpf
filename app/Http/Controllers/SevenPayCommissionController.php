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
use Illuminate\Support\Facades\URL;
use App\Vetan;
use App\MasterVetanAyog;
use Session;
use Config;

class SevenPayCommissionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:sevenpay-list|sevenpay-create|sevenpay-delete', ['only' => ['index','store']]);
    $this->middleware('permission:sevenpay-create', ['only' => ['create','store']]);    
    $this->middleware('permission:sevenpay-delete', ['only' => ['destroy']]);
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
  public function index(request $request)
  {
    $data['designation'] = Designation::all();
    $data['department'] = Department::all();
    $data['month']=month::orderBy('order_by')->get();
    $data['taluka'] = Taluka::all();
   
    if($request->ajax()){

        $employeeGpfNo_search = $request->employeeGpfNo_search;
        $employee_name_search = $request->employee_name_search;
        $taluka_search = $request->taluka_search;
        $employee_department_search = $request->employee_department_search;
        $chalan_taluka_search= $request->chalan_taluka_search;
        $chalan_serial_no_search= $request->chalan_serial_no_search;    


      $deposits=DB::table('master_vetan_ayog_received AS va')
      ->join('master_employee AS me','va.GPFNo','me.gpf_no')
      ->join('master_month AS mm','va.Mnt','mm.id')
      ->join("tbl_monthly_total_chalan","tbl_monthly_total_chalan.id","va.ChallanNo")
      ->select('va.*','me.employee_name','mm.month_name_mar')
      ->where("va.Year", Session::get('from_year'))
      ->where("va.Mnt", ">=", 4)
      ->where("va.pay_number",7);

   

      $deposits_two=DB::table('master_vetan_ayog_received AS va')
      ->join('master_employee AS me','va.GPFNo','me.gpf_no')
      ->join('master_month AS mm','va.Mnt','mm.id')
      ->join("tbl_monthly_total_chalan","tbl_monthly_total_chalan.id","va.ChallanNo")
      ->select('va.*','me.employee_name','mm.month_name_mar')
      ->where("va.Year", Session::get('to_year'))
      ->where("va.Mnt", "<=", 3)
      ->where("va.pay_number",7);

        if ($employeeGpfNo_search) {
            $deposits->where("va.GPFNo", '=', "{$employeeGpfNo_search}");
            $deposits_two->where("va.GPFNo", '=', "{$employeeGpfNo_search}");
        }
        if ($employee_name_search) {
          $deposits->where("me.employee_name", 'like', "%{$chalan_date_search}%");
          $deposits_two->where("me.employee_name", 'like', "%{$chalan_date_search}%");
        }
        if ($taluka_search) {
          $deposits->where("me.taluka_id", '=', "{$taluka_search}");
          $deposits_two->where("me.taluka_id", '=', "{$taluka_search}");
        }
        if ($employee_department_search) {
          $deposits->where("me.department_id", '=', "{$employee_department_search}");
          $deposits_two->where("me.department_id", '=', "{$employee_department_search}");
        }
        if ($chalan_taluka_search) {
          $deposits->where("tbl_monthly_total_chalan.taluka", '=', "{$chalan_taluka_search}");
          $deposits_two->where("tbl_monthly_total_chalan.taluka", '=', "{$chalan_taluka_search}");
        }

    if ($chalan_serial_no_search) {
      $deposits->where("tbl_monthly_total_chalan.chalan_serial_no", '=', "{$chalan_serial_no_search}");
      $deposits_two->where("tbl_monthly_total_chalan.chalan_serial_no", '=', "{$chalan_serial_no_search}");
    }

    $deposits_three = $deposits_two->union($deposits)
    ->get();

    return datatables()->of($deposits_three)
    ->addIndexColumn()
    
    ->addColumn('action', function ($row) {
      $btn="";
      
        
      
        $btn = '<button class="btn btn-danger btn-flat btn-sm remove-user" data-id="'.$row->TransId .'" data-action="'.url('vetan_Delete',$row->TransId).'" onclick="deleteConfirmation(\''.$row->TransId.'\')">
                          <i class="fa fa-trash"></i>
                        </button>';
       /* if(Auth::user()->role_id==2 && $row->is_active==0 && $row->amount == $row->distrubuted_amt && $row->send_to_approval == 0)
        {
          if(Auth::user()->can('chalan-sendapproval'))
          { 
            $btn = $btn.'<button data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row->id.'" data-chalan=" Challan No.'.$row->chalan_serial_no.' Month Of '.$row->month_name_mar.' Taluka:'.$row->taluka_name.' Classification:'.$row->classification_name_mar.' Total Amount:'.$row->amount.'" class="btn btn-warning btn-sm">Send to Approval</button>';
          }
        }*/
        
      return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
  }
    $data['sevenpayentry'] = "";
    return view('Admin.Vetan.sevenpay', $data);
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
      return ['status'=>'success','message' =>'Seven Pay Saved Successfully'.$id];
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
