<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taluka;
use App\month;
use App\Classification;
use App\Chalan;
use App\MasterMonthlySubscription;
use App\MonthlyTotalChalan;
use DataTable;

class ChalanController extends Controller
{
  public function index(Request $request) {
    $data ['month']=month::all();
    $data ['classification']=Classification::all();
    $data ['taluka']=Taluka::all();
    if($request->ajax()){
      $deposits=MonthlyTotalChalan::select("tbl_monthly_total_chalan.*","tbl_monthly_total_chalan.created_at AS crateddate","tbl_monthly_total_chalan.id as deposit_id","taluka.id as  tid","taluka.taluka_name_mar as taluka_name","classifications.id as cid","classifications.classification_name_mar","master_month.month_name_mar",)
      ->leftJoin("taluka", "taluka.id", "=","tbl_monthly_total_chalan.taluka")
      ->leftJoin("classifications", "classifications.id", "=", "tbl_monthly_total_chalan.classification")
      ->leftJoin("master_month", "master_month.id", "=", "tbl_monthly_total_chalan.chalan_no")
      ->latest()->get();

      return datatables()->of($deposits)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id ="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Edit</a>';
        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBill">Delete</a>';
        return $btn;
      })
      ->rawColumns(['action'])
      ->make(true);
    }
    return view ("Admin.Chalan.chalan", $data);
  }
  public function store(Request $request){
    $req = MonthlyTotalChalan::select('primary_number')->latest()->first();
    $res = MonthlyTotalChalan::where(['chalan_no'=>$request->chalan_no,'app_no'=>$request->app_no,'year'=>$request->year])->get();
    if(count($res) == 0)
    {
      $Newdeposit = new deposit($request->all());
      $Newdeposit->chalan_no=$request->chalan_no;
      $Newdeposit->app_no=$request->app_no;
      if(empty($req)) {
        $number = "001111";
      } else {
        $number = str_pad($req->primary_number + 1, 5, 0, STR_PAD_LEFT);
      }
      $Newdeposit->primary_number=$number;
      $Newdeposit->year=$request->year;
      $Newdeposit->classification=$request->classification;
      $Newdeposit->total_waste=$request->total_waste;
      $Newdeposit->taluka=$request->taluka;
      $Newdeposit->amount=$request->amount;
      $Newdeposit->diff_amount= $request->diff_amount;
      $Newdeposit->shera=$request->shera;
      $Newdeposit->save();
      $msg =' Data Saved Successfully';
    } else {
      $msg =' Chalan Already Exists with same details';
    }
    return redirect()->back()->with(session()->flash('msg', $msg));
  }
  public function chalandetails(Request $request){
    $data['chalan_no'] = $request->chalan_month;
    $data['year'] = $request->year;
    $data['app_no'] = $request->chalan_number;
    $deposits=MonthlyTotalChalan::select('id as chalan_id','amount','primary_number','diff_amount','taluka','classification')->where($data)->first();
    $res = '';
    dd();
    if(!empty($deposits->chalan_id))
    {
        $lang = app()->getLocale();
        $res = MasterMonthlySubscription::select('master_emp_monthly_contribution.*','users.name','me.employee_name',
                'tl.taluka_name_'.$lang.' AS taluka_name','dp.department_name_'.$lang.' AS department_name','dg.designation_name_'.$lang.' AS designation_name','mm.month_name_'.$lang.' AS month_name')
               ->where('master_emp_monthly_contribution.challan_id',$deposits->chalan_id)
               ->leftjoin('users','users.id','=','master_emp_monthly_contribution.modifed_by')
               ->leftjoin('master_employee AS me','me.gpf_no','=','master_emp_monthly_contribution.gpf_number')
               ->leftjoin('taluka AS tl','tl.id','=','master_emp_monthly_contribution.taluka_id')
               ->leftjoin('departments AS dp','dp.id','=','master_emp_monthly_contribution.emc_dept_id')
               ->leftjoin('designations AS dg','dg.id','=','master_emp_monthly_contribution.emc_desg_id')
               ->leftjoin('master_month AS mm','mm.id','=','master_emp_monthly_contribution.emc_month')
               ->latest()->get();
    }
    return ['amt'=>$deposits,'chalan'=>$res];
  }
}
