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
use App\MasterVetanAyog;
use App\MonthlyTotalChalan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Vetan;
use Session;
use Config;
use Excel;
use Auth;

class VetanController extends Controller
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
        $data['designation'] = Designation::all();
        $data['department'] = Department::all();

        $data['taluka'] = Taluka::all();
        $data['vetan'] = vetan::select(
          'vetan.*',
          'taluka.taluka_name_mar',
          'designations.designation_name_mar',
          'departments.department_name_mar',

        )
        ->leftJoin("taluka", "taluka.id", "=","vetan.taluka")
        ->leftJoin("designations", "designations.id", "=", "vetan.designation")
        ->leftJoin("departments", "departments.id", "=", "vetan.department")
        ->latest()->get();
        return view('Admin.Vetan.vetan', $data);
    }

    public function vetan_insert(Request $request)
   {

    $vetan = new vetan;
    $vetan->vetan=$request->vetan;
    $vetan->gpf_no=$request->gpf_no;
    $vetan->taluka=$request->taluka;
    $vetan->department=$request->department;
    $vetan->name=$request->name;
    $vetan->designation=$request->designation;
    $vetan->hapta_no=$request->hapta_no;
    $vetan->chalna_no=$request->chalna_no;
    $vetan->month_hapta=$request->month_hapta;
    $vetan->chalna_amount=$request->chalna_amount;
    $vetan->digging=$request->digging;
    $vetan->difference=$request->difference;
    $vetan->from_interest_date=$request->from_interest_date;
    $vetan->until_date=$request->until_date;
    $vetan->difference_amount=$request->difference_amount;
    $vetan->different_interest=$request->different_interest;
    $vetan->charging_interest=$request->charging_interest;
    $vetan->shera=$request->shera;
    $vetan->save();
    return redirect ('vetan')->with('success',' Data  Successfully');

   }
  public function vetan_new(Request $request)
   {
    $query = DB::raw('SELECT * FROM master_employee WHERE gpf_no='.$request->id);
    $result = DB::Select($query);

    if(isset($result[0])){
      return json_encode(['stuas'=>'success','msg' =>'Data Found' ,'userdata' =>$result]);
    }else{
      return json_encode(['stuas'=>'failed','msg' =>'Data Not Found']);
    }

   }
  public function vetan_Delete($id)
  {
    vetan::where('id',$id)->delete();
    return ['id'=>$id];
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
  public function getIntrestRate(Request $request){
    $queryone = DB::table('master_rate_interest')->select('percent','to_month','year_to','from_month')
                ->where('year_to','>=','2019')->where('from_month','7');
    $querytwo = DB::table('master_rate_interest')->select('percent','to_month','year_to','from_month')
                ->where('year_to','>=','2020')->union($queryone)->orderBy('year_to')->get();
    return $querytwo;
  }
  public function vetanlistview(Request $request){
    $queryOne = DB::table('master_vetan_ayog_received AS va')
                ->select('va.*')
                ->where('va.Mnt','>=',4)
                ->where(['va.Year'=>Session::get('from_year')]);
    $vetandatalist = DB::table('master_vetan_ayog_received AS va')
                ->select('va.*')
                ->where('va.Mnt','<=',3)
                ->where(['va.Year'=>Session::get('to_year')])
                ->union($queryOne)
                ->get();
    return view('Admin.Vetan.listview',compact('vetandatalist'));
  }
  public function vetanfileupload(Request $request){
    if($request->ajax()){
          $originalFileName = $request->file('usersFile')->getClientOriginalName();
          $md5Name = md5_file($request->file('usersFile')->getRealPath());
          $extension = $request->file('usersFile')->getClientOriginalExtension();
          $file = $request->file('usersFile')->storeAs('public/files/SixthPay', $md5Name.'.'.$extension );
          $filepath = $md5Name.'.'.$extension;
          $data = Excel::toArray('',$file);
          $rowCount = count($data[0]);
          $duplicateData = [];
          $totalUsed = 0;
          $setColumnArray = [0 => 'SRNO',
            1 => 'GPFNO',
            2 => 'EMPLOYEE',
            3 => 'INS1',
            4 => 'INS2',
            5 => 'INS3',
            6 => 'INS4',
            7 => 'INS5',
            8 => 'TOTAL',
          ];
        if($rowCount > 0){
          $six_pay = [];
          $userDataDuplicate = [];
          $employeeNotFound = [];
          $getData = $data[0];
          $filename = date('dmyhis');
          $fileid = DB::table('tbl_upload_file')->insertGetId(['file_name'=>$filepath,'upload_by'=>Auth::id()]);
          for($i=1;$rowCount > $i;$i++){
            if($getData){
              $com_res = array_diff_assoc($setColumnArray,$getData[0]);
              if(count($com_res) == 0){
                if((int)$getData[$i][1] > 0){
                  $checkData = ['GPFNo' => $getData[$i][1],
                                'ChallanNo' => $request->chalan_id,
                              ];
                $check_duplicate = MasterVetanAyog::where($checkData)->get();
                if(count($check_duplicate) == 0){
                  if(isset($getData[$i][1]) && $getData[$i][1] !== ''){
                    $employee = Masteremployee::select('employee_id','department_id','designation_id')->where('gpf_no',$getData[$i][1])->first();
                  }
                  if(isset($employee->employee_id) && $employee->employee_id !== ''){
                    if($request->vetan_aayog == 6){
                      $d_from = '2019-07-01';
                      $d_to = Session::get('to_year').'-03-31';
                      $l_date = date('Y-m-d');
                    }elseif($request->vetan_aayog == 7){
                      $d_from = '2019-07-01';
                      $d_to = Session::get('to_year').'-03-31';
                      $l_date = date('Y-m-d');
                    }
                    if(isset($getData[$i][3]) && $getData[$i][3] > 0){
                      $hapta_no = 1;
                      $amt = $getData[$i][3];
                    }else if(isset($getData[$i][4]) && $getData[$i][4] > 0){
                      $hapta_no = 2;
                      $amt = $getData[$i][4];
                    }else if(isset($getData[$i][5]) && $getData[$i][5] > 0){
                      $hapta_no = 3;
                      $amt = $getData[$i][5];
                    }else if(isset($getData[$i][6]) && $getData[$i][6] > 0){
                      $hapta_no = 4;
                      $amt = $getData[$i][6];
                    }else if(isset($getData[$i][7]) && $getData[$i][7] > 0){
                      $hapta_no = 5;
                      $amt = $getData[$i][7];
                    }
                    $totalUsed += $amt;
                    $six_pay[] = ["GPFNo"=> $getData[$i][1],
                                  "Year" => $request->year_id,
                                  "Instalment" => $hapta_no,
                                  "ChallanNo" => $request->chalan_id,
                                  "DiffAmt" =>  $amt,
                                  "Interest" =>  0,
                                  "TotDiff" =>  (float)$amt,
                                  "Mnt" =>  $request->month_id,
                                  "Rmk" =>  'NA',
                                  "DtFrom" =>$d_from,
                                  "DtTo" =>$d_to,
                                  "LockDate" =>$l_date,
                                  "INTY1" =>  ((int)$request->hapta_no == 1)? $request->different_interest : 0,
                                  "INTY2" =>  ((int)$request->hapta_no == 2)? $request->different_interest : 0,
                                  "INTY3" =>  ((int)$request->hapta_no == 3)? $request->different_interest : 0,
                                  "INTY4" =>  ((int)$request->hapta_no == 4)? $request->different_interest : 0,
                                  "INTY5" =>  ((int)$request->hapta_no == 5)? $request->different_interest : 0,
                                  "INTY6" =>  ((int)$request->hapta_no == 6)? $request->different_interest : 0,
                                  "INTY7" =>  ((int)$request->hapta_no == 7)? $request->different_interest : 0,
                                  "INTY8" =>  ((int)$request->hapta_no == 8)? $request->different_interest : 0,
                                  "INTY9" =>  ((int)$request->hapta_no == 9)? $request->different_interest : 0,
                                  "INTY10" =>  ((int)$request->hapta_no == 10)? $request->different_interest : 0,
                                  "pay_number" => $request->vetan_aayog,
                                  "fileid" => $fileid
                                ];
                  }else{
                    $employeeNotFound[] = ['gpf_number' => $getData[$i][1]];
                  }
                }else{
                  $userDataDuplicate[] = ['gpf_number' => $getData[$i][1],
                  'Employee Name' => $getData[$i][2],];
                }
              }
            }else{
              return ['status'=>'error','message'=>'Invalid Excel Column Count '];
            }
          }
        }

        if(count($six_pay) > 0){
          $getDiffAmt = MonthlyTotalChalan::select('diff_amount')
                        ->where(['id' => $request->chalan_id])
                        ->first();
          if((int)$getDiffAmt->diff_amount >= (int)$totalUsed){
            MonthlyTotalChalan::where(['id' => $request->chalan_id])
                  ->update(['diff_amount' => ($getDiffAmt->diff_amount-$totalUsed)]);
            $getstatus = MasterVetanAyog::insert($six_pay);
              return ['status'=>'success','message'=>'Records Inserted Succesfully.','not_inserted'=>count($employeeNotFound),
                      'not_inserted_ides'=>$employeeNotFound,'user_duplicate'=>count($userDataDuplicate),
                      'user_duplicate_gpf' =>$userDataDuplicate,'fileid'=>$fileid ];
          }else{
            return ['status'=>'warning','message'=>'Chalan total amount does not matched'];
          }
        }else{
          return ['status'=>'duplicate','message'=>'Duplicate Data Found','not_inserted'=>count($employeeNotFound),
          'not_inserted_ides'=>$employeeNotFound,'user_duplicate'=>count($userDataDuplicate),'user_duplicate_gpf'=>$userDataDuplicate];
        }
      }
      return ['status' => 'error','message' => 'Invalid File Upload.'];
    }
    $month=Month::orderBy('order_by')->get();
    $taluka=Taluka::all();
    return view('Admin.Vetan.vetanfileupload',compact('month','taluka'));
  }
  public function getFileData(Request $request){
    if($request->fileid != 0){
      // $vetanayog = MasterVetanAyog::where('fileid',$request->fileid)->get();
      $vetanayog = DB::table('master_vetan_ayog_received AS ar')
        ->select('ar.*','me.employee_name')
        ->leftJoin('master_employee AS me','ar.GPFNo','me.gpf_no')
        ->where('ar.fileid',$request->fileid)
        ->get();
      return datatables()->of($vetanayog)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        return '<button onClick="deleteVetanEntry('.$row->TransId.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</button>';
      })
      ->rawColumns(['action'])
      ->make(true);
    }
    return datatables()->of([])->make(true);
  }
  public function deleteVetan($id){
    $prv = MasterVetanAyog::select('TotDiff','ChallanNo')->where('TransId',$id)->where('is_active',0)->first();
    $getDiffAmt = MonthlyTotalChalan::where(['id' => $prv->ChallanNo])
                                        ->update(['diff_amount' => DB::raw('diff_amount+'.$prv->TotDiff)]);
    $status = MasterVetanAyog::where('TransId',$id)->where('is_active',0)->delete();
    if($status){
      return ['status'=>'success','message'=>'Transaction Deleted Successfully.'];
    }else{
      return ['status'=>'success','message'=>'Record Is Approved, You can not delete.'];
    }
  }
}
