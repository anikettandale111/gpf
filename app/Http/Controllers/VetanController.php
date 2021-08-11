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
use Illuminate\Support\Facades\Storage;
use App\Vetan;
use Session;
use Config;
use Excel;

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
            3 => 'AMOUNT',
            4 => 'INS1',
            5 => 'INS2',
            6 => 'INS3',
            7 => 'INS4',
            8 => 'INS5',
            9 => 'TOTAL',
          ];
        if($rowCount > 0){
          $userData = [];
          $userDataDuplicate = [];
          $employeeNotFound = [];
          $getData = $data[0];
          $filename = date('dmyhis');
          for($i=2;$rowCount > $i;$i++){
            if($getData){
              $com_res = array_diff_assoc($setColumnArray,$getData[1]);
              if(count($com_res) == 0){
                if((int)$getData[$i][1] > 0){
                  $checkData = ['gpf_number' => $getData[$i][1],
                  'challan_id' => $request->chalan_id,
                  'emc_month' => $request->month_id,
                  'emc_year' => $request->year_id,
                ];
                $check_duplicate = MasterMonthlySubscription::where($checkData)->get();
                if(count($check_duplicate) == 0){
                  if(isset($getData[$i][1]) && $getData[$i][1] !== ''){
                    $employee = Masteremployee::select('employee_id','department_id','designation_id')->where('gpf_no',$getData[$i][1])->first();
                  }
                  if(isset($employee->employee_id) && $employee->employee_id !== ''){
                    $six_pay["GPFNo"]=$getData[$i][1];
                    $six_pay["Year"]=$request->instalmentYear;
                    $six_pay["Instalment"]=$request->hapta_no;
                    $six_pay["ChallanNo"]=$request->chalna_no;
                    $six_pay["DiffAmt"] = $getData[$i][3];
                    $six_pay["Interest"] = $getData[$i][9];
                    $six_pay["TotDiff"] = (float)$request->difference_amount + (float)$request->different_interest;
                    $six_pay["Mnt"] = $request->instalment_month;
                    $six_pay["Rmk"] = 'NA';
                    $six_pay["DtFrom"] = date('Y-m-d',strtotime($request->from_interest_date));
                    $six_pay["DtTo"] = date('Y-m-d',strtotime($request->to_intrest_date));
                    $six_pay["LockDate"] = date('Y-m-d');
                    $six_pay["INTY1"] = ((int)$request->hapta_no == 1)? $request->different_interest : 0;
                    $six_pay["INTY2"] = ((int)$request->hapta_no == 2)? $request->different_interest : 0;
                    $six_pay["INTY3"] = ((int)$request->hapta_no == 3)? $request->different_interest : 0;
                    $six_pay["INTY4"] = ((int)$request->hapta_no == 4)? $request->different_interest : 0;
                    $six_pay["INTY5"] = ((int)$request->hapta_no == 5)? $request->different_interest : 0;
                    $six_pay["INTY6"] = ((int)$request->hapta_no == 6)? $request->different_interest : 0;
                    $six_pay["INTY7"] = ((int)$request->hapta_no == 7)? $request->different_interest : 0;
                    $six_pay["INTY8"] = ((int)$request->hapta_no == 8)? $request->different_interest : 0;
                    $six_pay["INTY9"] = ((int)$request->hapta_no == 9)? $request->different_interest : 0;
                    $six_pay["INTY10"] = ((int)$request->hapta_no == 10)? $request->different_interest : 0;
                    $six_pay["pay_number"]=$request->vetan_aayog;
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
        if(count($userData) > 0){
          $getDiffAmt = MonthlyTotalChalan::select('diff_amount')
                        ->where(['id' => $request->chalan_id,'chalan_serial_no' => $request->chalan_number])
                        ->first();
          if((int)$getDiffAmt->diff_amount >= (int)$totalUsed){
            MonthlyTotalChalan::where(['id' => $request->chalan_id])
                  ->update(['diff_amount' => ($getDiffAmt->diff_amount-$totalUsed)]);
            $getstatus = MasterMonthlySubscription::insert($userData);
              return ['status'=>'status','message'=>'Records Inserted Succesfully.','not_inserted'=>count($employeeNotFound),
                      'not_inserted_ides'=>$employeeNotFound,'user_duplicate'=>count($userDataDuplicate),
                      'user_duplicate_gpf' =>$userDataDuplicate ];
          }else{
            return ['status'=>'warning','message'=>'Chalan total amount does not matched'.$request->chalan_khatavani.'-'.$totalUsed];
          }
        }else{
          return ['status'=>'duplicate','message'=>'Duplicate Data Found','not_inserted'=>count($employeeNotFound),
          'not_inserted_ides'=>$employeeNotFound,'user_duplicate'=>count($userDataDuplicate),'user_duplicate_gpf'=>$userDataDuplicate];
        }
      }
      return ['status' => 'error','message' => 'Invalid File Upload.'];
    }
    return view('Admin.Vetan.vetanfileupload');
  }
}
