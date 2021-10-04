<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Smalot;
use App;
use Auth;
use Session;
use DB;
use Excel;
use Config;
use App\Month;
use App\Masteremployee;
use App\MasterMonthlySubscription;
use App\MonthlyTotalChalan;
use App\Taluka;
use App\ApplicationsForms;
use App\Ganrate;
use App\PDFMonthlyFile;

class FileUploadController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:chalan-fileupload|chalan-fileupload-create|chalan-fileupload-delete|chalan-fileupload-edit|chalan-pdffileupload|chalan-pdffileupload-create|chalan-pdffileupload-edit|chalan-pdffileupload-delete', ['only' => ['index','store','pdffileupload','confirmpdfdata','confirmpdfdata','testJsonData']]);
    $this->middleware('permission:chalan-fileupload-create', ['only' => ['index','store','pdffileupload']]);
    
    $this->middleware('permission:chalan-fileupload-edit', ['only' => ['store','index']]);

    $this->middleware('permission:chalan-pdffileupload-create', ['only' => ['pdffileupload','confirmpdfdata']]);
    $this->middleware('permission:chalan-pdffileupload-edit', ['only' => ['pdffileupload','confirmpdfdata']]);
    $this->middleware('permission:chalan-fileupload-delete', ['only' => ['deleteChalanSubscription']]);
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
    $month=Month::orderBy('order_by')->get();
    $taluka=Taluka::all();
    return view('fileupload/index',compact('month','taluka'));
  }
  public function store(Request $request){

    $originalFileName = $request->file('usersFile')->getClientOriginalName();
    $md5Name = md5_file($request->file('usersFile')->getRealPath());
    $extension = $request->file('usersFile')->getClientOriginalExtension();
    $file = $request->file('usersFile')->storeAs('public/files', $md5Name.'.'.$extension );
    $filepath = $md5Name.'.'.$extension;
    $data = Excel::toArray('',$file);
    $rowCount = count($data[0]);
    $duplicateData = [];
    $totalUsed = 0;
    $setColumnArray = [0 => 'Sr.No' ,
    1 => 'NZP No.' ,
    2 => 'Teacher Name' ,
    3 => 'Amount' ,
    4 => 'Lone' ,
    5 => 'Total' ,
    6 => 'Remark'
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
            'taluka_id' =>$request->taluka_id,
            'challan_id' => $request->chalan_id,
            'emc_month' => $request->month_id,
            'emc_year' => $request->year_id,
          ];
          // $checkData = ['gpf_number' => '17667',
          //     'taluka_id' =>2,
          //     'challan_id' => 16330,
          //     'emc_month' => 1,
          //     'emc_year' => 2022,
          //   ];
          $check_duplicate = MasterMonthlySubscription::where($checkData)->get();
          if(count($check_duplicate) == 0){
            if(isset($getData[$i][1]) && $getData[$i][1] !== ''){
              $employee = Masteremployee::select('employee_id','department_id','designation_id')->where('gpf_no',$getData[$i][1])->first();
            }
            if(isset($employee->employee_id) && $employee->employee_id !== ''){
              $userData[] = ['gpf_number' => $getData[$i][1],
              'classification_id' => $request->classification_id,
              'taluka_id' =>$request->taluka_id,
              'challan_id' => $request->chalan_id,
              'challan_number' => $request->chalan_number,
              'emc_month' => $request->month_id,
              'emc_year' => $request->year_id,
              'emc_emp_id' => $employee->employee_id,
              'emc_desg_id' => $employee->designation_id,
              'emc_dept_id' => $employee->department_id,
              'monthly_contrubition' => $getData[$i][3],
              'loan_installment' => $getData[$i][4],
              'monthly_received' => (int)$getData[$i][3] + (int)$getData[$i][4],
              'remark' => $getData[$i][6],
              'modifed_by' => Auth::id(),
            ];
            $totalUsed += (int)$getData[$i][5];
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
    /*MonthlyTotalChalan::where(['id' => $request->chalan_id])
    ->update(['diff_amount' => ($getDiffAmt->diff_amount-$totalUsed)]);*/
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
return ['status'=>'error','message'=>'Invalid File. '];
}
public function pdffileupload(Request $request){
  /* Python PDF Process Start*/
  if($request->ajax()){
    if(isset($request->usersFile)){
      $originalFileName = $request->file('usersFile')->getClientOriginalName();
      $md5Name = md5_file($request->file('usersFile')->getRealPath());
      $extension = $request->file('usersFile')->getClientOriginalExtension();
      $file = $request->file('usersFile')->storeAs('public/files', $md5Name.'.'.$extension );
      $filepath = $md5Name.'.'.$extension;

      $pdf_file = $request->usersFile;
      if (!is_readable($pdf_file)) {
        print("Error: file does not exist or is not readable: $pdf_file\n");
        return;
      }
      $c = curl_init();
      $cfile = curl_file_create($pdf_file, 'application/pdf');
      $apikey = '9ckfvsg6cwop'; // from https://pdftables.com/api
      curl_setopt($c, CURLOPT_URL, "http://216.10.245.164/api/pdf_to_json");
      curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
      curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($c, CURLOPT_FAILONERROR,true);
      curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");
      $result = curl_exec($c);
      if (curl_errno($c) > 0) {
        print('Error calling PDFTables: '.curl_error($c).PHP_EOL);
      }
      $dataarry = json_decode($result);
      $insert = [];
      $dont_insert = [];
      $first_data = count($dataarry->data);
      for($k=0;$k < $first_data;$k++){
        if(isset($dataarry->data[$k])){
          $data_array = array($dataarry->data[$k]);
          $dataarry_count = count(array($dataarry->data[$k]));
          for($i=0;$i < $dataarry_count;$i++ ){
            $data_two = array($data_array[$i]->data);
            $gpf=[];
            $data_three = array($data_two[$i]);
            for($j=0;$j<count($data_three);$j++){
              $data_four = count($data_three[$j]);
              for($m=0;$m<$data_four;$m++){
                if(isset($data_three[$j][$m][1]->text)){
                  $gpf = explode("/",trim($data_three[$j][$m][1]->text));
                  if(isset($gpf[1]) && strlen($gpf[1]) >= 4){
                    $file_gpf_number = str_replace(array("\n", "\r"), '', $gpf[1]);
                    $gpf_number_data =  explode('/',$data_three[$j][$m][1]->text);
                    $prv_check = array_search($file_gpf_number, array_column($insert, 'gpf_number'));
                    if(!$prv_check){
                      $employee = Masteremployee::select('inital_letter','taluka_id','employee_id','department_id','designation_id','employee_name')
                                  ->where('employee_id',trim($file_gpf_number))->first();
                      // var_dump($data_three[$j][$m]);
                      // echo '----------------------------------<br>---------------------------------------';
                      $monthly_other = '';
                      $loan_installment = '';
                      if(str_replace(',','',$data_three[$j][$m][4]->text) > 0){
                        if(strlen($gpf[1]) == 6){
                          if($data_three[$j][$m][5]->text == "0 0 0 0/0"){
                            $monthly_contrubition = str_replace(',','',$data_three[$j][$m][4]->text);
                          }else{
                            $monthly_contrubition = str_replace(',','',$data_three[$j][$m][5]->text);
                          }
                        }else{
                          $monthly_contrubition = str_replace(',','',$data_three[$j][$m][4]->text);
                        }
                      }else{
                        if($data_three[$j][$m][5]->text == "0 0 0 0/0"){
                          $monthly_contrubition = str_replace(',','',$data_three[$j][$m][4]->text);
                        }else{
                          $monthly_contrubition = str_replace(',','',$data_three[$j][$m][5]->text);
                        }
                      }
                      if($data_three[$j][$m][5]->text == "0 0 0 0/0"){
                        $total = (isset($data_three[$j][$m][10]->text)) ? str_replace(',','',$data_three[$j][$m][10]->text) : str_replace(',','',$data_three[$j][$m][7]->text);
                        $loan_installment = (isset($data_three[$j][$m][6]->text) && $data_three[$j][$m][6]->text > 0)? str_replace(',','',$data_three[$j][$m][6]->text):'';
                      }else{
                        // print_r($data_three[$j][$m]);
                        $total = (isset($data_three[$j][$m][9]->text) && $data_three[$j][$m][9]->text > 0)? str_replace(',','',$data_three[$j][$m][9]->text)
                                : ((isset($data_three[$j][$m][10]->text) && $data_three[$j][$m][10]->text > 0) ? str_replace(',','',$data_three[$j][$m][10]->text) : '' );
                        $monthly_other = (isset($data_three[$j][$m][6]->text) && $data_three[$j][$m][6]->text > 0)? str_replace(',','',$data_three[$j][$m][6]->text):'';
                        $loan_installment = (isset($data_three[$j][$m][7]->text) && $data_three[$j][$m][7]->text > 0)? str_replace(',','',$data_three[$j][$m][7]->text)
                                : ((isset($data_three[$j][$m][8]->text)) ? str_replace(',','',$data_three[$j][$m][8]->text) : '' );
                        if((isset($data_three[$j][$m][8]->text) && $data_three[$j][$m][8]->text > 0)) {
                          $total = (isset($data_three[$j][$m][10]->text)) ? str_replace(',','', $data_three[$j][$m][10]->text ):'';
                        }
                      }
                      $insert[] = [
                      'gpf_number' => (isset($file_gpf_number) && $file_gpf_number !== '') ? (int)trim($file_gpf_number) : $data_three[$j][$m][1]->text,
                      'employee_name' => (isset($employee->employee_name)) ?$employee->employee_name : $data_three[$j][$m][2]->text,
                      // 'data_two_3' => (isset($data_three[$j][$m][3]->text))?$data_three[$j][$m][3]->text:'', // PDF Pay-DP Column
                      'monthly_contrubition' => $monthly_contrubition,  // PDF Substratcion
                      // 'monthly_received' => (isset($data_three[$j][$m][5]->text))?$data_three[$j][$m][5]->text:'', // Pay/DA/Arr
                      'monthly_other' => $monthly_other, // GPF Arr
                      'loan_installment' => $loan_installment, // Refund Amount
                      // 'loan_amonut' => (isset($data_three[$j][$m][8]->text))?$data_three[$j][$m][8]->text:'', // Cur inst / Total Instalment
                      // 'monthly_received' => (isset($data_three[$j][$m][9]->text) && $data_three[$j][$m][9]->text > 0)? str_replace(',','',$data_three[$j][$m][9]->text):'', // Total
                      'monthly_received' => $total, // Total
                      'remark' => (isset($data_three[$j][$m][10]->text))?$data_three[$j][$m][10]->text:'',
                      // 'file_for_year' => $request->year_id ,
                      // 'file_for_month' => $request->month_id ,
                      // 'chalan_serial_number' => $request->chalan_number ,
                      // 'file_taluka_id' => $request->taluka_id ,
                      // 'emc_desg_id' => $employee->designation_id ,
                      // 'emc_dept_id' => $employee->department_id ,
                      // 'created_by' => Auth::id(),
                      'file_name' => $filepath,
                      ]; // Remark
                    }
                  }else{
                    if(isset($data_three[$j][2][1]->text) && strpos($data_three[$j][2][1]->text,'NZPGPF') !== false){
                      $dont_insert[] = [
                      'gpf_number' => (isset($data_three[$j][$m][1]->text))?$data_three[$j][$m][1]->text:'',
                      'employee_name' => (isset($data_three[$j][$m][2]->text))?$data_three[$j][$m][2]->text:'',
                      // 'data_two_3' => (isset($data_three[$j][$m][3]->text))?$data_three[$j][$m][3]->text:'', // PDF Pay-DP Column
                      'monthly_contrubition' => (isset($data_three[$j][$m][4]->text))?$data_three[$j][$m][4]->text:'', // PDF Substratcion
                      // 'monthly_received' => (isset($data_three[$j][$m][5]->text))?$data_three[$j][$m][5]->text:'', // Pay/DA/Arr
                      'monthly_other' => (isset($data_three[$j][$m][6]->text))?$data_three[$j][$m][6]->text:'', // GPF Arr
                      'loan_installment' => (isset($data_three[$j][$m][7]->text))?$data_three[$j][$m][7]->text:'', // Refund Amount
                      // 'loan_amonut' => (isset($data_three[$j][$m][8]->text))?$data_three[$j][$m][8]->text:'', // Cur inst / Total Instalment
                      'monthly_received' => (isset($data_three[$j][$m][9]->text))?$data_three[$j][$m][9]->text:'', // Total
                      'remark' => (isset($data_three[$j][$m][10]->text))?$data_three[$j][$m][10]->text:'']; // Remark
                    }
                  }
                }
              }
            }
          }
        }
      }
      if(count($insert)){
        return ['status'=>'success','message'=>'PDF File upload successfully','insertdata' => $insert];
      }
      return ['status'=>'success','message'=>'PDF File upload successfully'];
    }

  }
  $month=Month::orderBy('order_by')->get();
  $taluka=Taluka::all();
  return view('testpdf',compact('month','taluka'));
}
public function confirmpdfdata(Request $request){
  if(count($request->dummy_gpf_numbers)){
    $userData = [];
    $userDataDuplicate = [];
    $employeeNotFound = [];
    $message = '';
    $totalUsed = 0;
    for($i=0;$i < count($request->dummy_gpf_numbers); $i++){
      $checkData = ['gpf_number' => $request->dummy_gpf_numbers[$i],
                    'taluka_id' =>$request->taluka_id,
                    'challan_id' => $request->chalan_id,
                    'emc_month' => $request->month_id,
                    'emc_year' => $request->year_id,];

      $check_duplicate = MasterMonthlySubscription::where($checkData)->get();
      if(count($check_duplicate) == 0){
        if(isset($request->dummy_gpf_numbers[$i]) && $request->dummy_gpf_numbers[$i] !== ''){
          $employee = Masteremployee::select('employee_id','department_id','designation_id')->where('gpf_no',$request->dummy_gpf_numbers[$i])->first();
        }
        if(isset($employee->employee_id) && $employee->employee_id !== ''){
          if((int)$request->dummy_monthly_received[$i] > 0){
            $userData[] = ['gpf_number' => $request->dummy_gpf_numbers[$i],
                            'classification_id' => $request->classification_id,
                            'taluka_id' =>$request->taluka_id,
                            'challan_id' => $request->chalan_id,
                            'challan_number' => $request->chalan_serial_no,
                            'emc_month' => $request->month_id,
                            'emc_year' => $request->year_id,
                            'emc_emp_id' => $employee->employee_id,
                            'emc_desg_id' => $employee->designation_id,
                            'emc_dept_id' => $employee->department_id,
                            'monthly_contrubition' => $request->dummy_monthly_contrubition[$i],
                            'loan_installment' => $request->dummy_loan_installment[$i],
                            'monthly_received' => $request->dummy_monthly_received[$i],
                            'modifed_by' => Auth::id() ];
            $totalUsed += (int)$request->dummy_monthly_received[$i];
          }
        } else {
          $employeeNotFound[] = ['gpf_number' => $request->dummy_gpf_numbers[$i]];
        }
      } else {
        $userDataDuplicate[] = ['gpf_number' => $request->dummy_gpf_numbers[$i],'Employee Name' => $request->dummy_employee_name[$i],];
      }
    }
    if(count($userDataDuplicate)){
      $message .= 'Found Duplicate Records '.count($userDataDuplicate);
    }
    if(count($employeeNotFound)){
      $message .= 'Employee Not Found Records '.count($employeeNotFound);
    }
    if(count($userData)){
      $getDiffAmt = MonthlyTotalChalan::select('diff_amount')
      ->where(['id' => $request->chalan_id,'chalan_serial_no' => $request->chalan_serial_no])
      ->first();
      if((int)$getDiffAmt->diff_amount >= (int)$totalUsed){
        MonthlyTotalChalan::where(['id' => $request->chalan_id])
        ->update(['diff_amount' => ($getDiffAmt->diff_amount-$totalUsed)]);
        $getstatus = MasterMonthlySubscription::insert($userData);
      }else{
        return ['status'=>'warning','message'=>'Chalan total amount does not matched'.$request->chalan_khatavani.'-'.$totalUsed];
      }
      $message .= 'Employee Details Saved '.count($userData);
    }
    return ['status'=>'success','message' => $message];
  }
  return ['status'=>'success','message'=>'PDF File upload successfully'];
}
public function testJsonData($str){
    $dataarry = json_decode($str);
    // var_dump($dataarry);
    $insert = [];
    $dont_insert = [];
    $first_data = count(array($dataarry));
    for($k=0;$k < $first_data;$k++){
      if(isset($dataarry->data[$k]->data)){
        $data_array = $dataarry->data[$k]->data;
        $dataarry_count = count($dataarry->data[$k]->data);
        for($i=4;$i < $dataarry_count;$i++ ){
          $data_count_two = count($data_array[$i]);
          $data_two = $data_array[$i];
          $gpf=[];
          if(isset($data_two[1]->text)){
            $gpf = explode("/",$data_two[1]->text);
          }
          if(isset($gpf[1]) && strlen($gpf[1]) >= 5){
            $insert[] = ['data_two_0' => $data_two[0]->text,
            'data_two_1' => (isset($data_two[1]->text))?$data_two[1]->text:'',
            'data_two_2' => (isset($data_two[2]->text))?$data_two[2]->text:'',
            'data_two_3' => (isset($data_two[3]->text))?$data_two[3]->text:'',
            'data_two_4' => (isset($data_two[4]->text))?$data_two[4]->text:'',
            'data_two_5' => (isset($data_two[5]->text))?$data_two[5]->text:'',
            'data_two_6' => (isset($data_two[6]->text))?$data_two[6]->text:'',
            'data_two_7' => (isset($data_two[7]->text))?$data_two[7]->text:'',
            'data_two_8' => (isset($data_two[8]->text))?$data_two[8]->text:'',
            'data_two_9' => (isset($data_two[9]->text))?$data_two[9]->text:'',
            'data_two_10' => (isset($data_two[10]->text))?$data_two[10]->text:''];
          }else{
            if(isset($data_two[1]->text) && strpos($data_two[1]->text,'NZPGPF') !== false){
              $dont_insert[] = ['data_two_0' => $data_two[0]->text,
              'data_two_1' => (isset($data_two[1]->text))?$data_two[1]->text:'',
              'data_two_2' => (isset($data_two[2]->text))?$data_two[2]->text:'',
              'data_two_3' => (isset($data_two[3]->text))?$data_two[3]->text:'',
              'data_two_4' => (isset($data_two[4]->text))?$data_two[4]->text:'',
              'data_two_5' => (isset($data_two[5]->text))?$data_two[5]->text:'',
              'data_two_6' => (isset($data_two[6]->text))?$data_two[6]->text:'',
              'data_two_7' => (isset($data_two[7]->text))?$data_two[7]->text:'',
              'data_two_8' => (isset($data_two[8]->text))?$data_two[8]->text:'',
              'data_two_9' => (isset($data_two[9]->text))?$data_two[9]->text:'',
              'data_two_10' => (isset($data_two[10]->text))?$data_two[10]->text:''];
            }
          }
        }
      }
    }
    // print_r($insert);dd();
    return view('Reports/verifypdfdata',compact('insert','dont_insert'));
  }
}
