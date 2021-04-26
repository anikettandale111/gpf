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
                              'monthly_received' => $getData[$i][5],
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
        }else{
          return ['status'=>'error','message'=>'Invalid Excel Column Count '];
        }
      }
    }
    if(count($userData) > 0){
        $getDiffAmt = MonthlyTotalChalan::select('diff_amount')
                      ->where(['id' => $request->chalan_id,'chalan_serial_no' => $request->chalan_number])
                      ->first();
        $m = (int)$getDiffAmt->diff_amount .'>= '.(int)$totalUsed;
        if((int)$getDiffAmt->diff_amount >= (int)$totalUsed){
          MonthlyTotalChalan::where(['id' => $request->chalan_id])
                              ->update(['diff_amount' => ($getDiffAmt->diff_amount-$totalUsed)]);
          $getstatus = MasterMonthlySubscription::insert($userData);
          return ['status'=>'status','message'=>'Records Inserted Succesfully.','not_inserted'=>count($employeeNotFound),
          'not_inserted_ides'=>$employeeNotFound,'user_duplicate'=>count($userDataDuplicate),
          'user_duplicate_gpf' =>$userDataDuplicate ];
        }else{
            return ['status'=>'warning','message'=>'Chalan total amount does not matched ' $m.' -- '.$request->chalan_khatavani.'-'.$totalUsed];
        }
      }else{
      return ['status'=>'duplicate','message'=>'Duplicate Data Found','not_inserted'=>count($employeeNotFound),
      'not_inserted_ides'=>$employeeNotFound,'user_duplicate'=>count($userDataDuplicate),'user_duplicate_gpf'=>$userDataDuplicate];
    }
  }
  return ['status'=>'error','message'=>'Invalid File. '];
}
public function testpdf(Request $request){
  if(isset($request->test_pdf)){
    /* READ EXCEL FILE START */
    $p = $request->file('test_pdf')->store('Files');
    // $path = $request-  >file('test_pdf')->getRealPath();
    $data = Excel::toArray('',$p);
    if(count($data[0])){
      echo '<pre>';
      $getcount = count($data[0]);
      for($i=0;$getcount > $i;$i++){
        if($data[0][1]){
          if (strpos($data[0][$i][1], 'NZPGPF') !== false) {
            // print_r($data[0][$i]);
            $j=$i;
            $k=$i;
            $data[0][$i][1];
            if(strpos($data[0][$i][1], 'NZPGPF') !== true){
              echo $data[0][$i][1].$data[0][($j+1)][1];
              // echo '------------------------------------------';
            }
            echo "<br>";
          }else{
            // print_r($data[0][$i]);
            // echo '######################################################';
          }
        }
      }
    }
    die();
    /* READ EXCEL FILE END */

    /* API CODE SAMPLE START */
    // $pdf_file = $request->test_pdf;
    // if (!is_readable($pdf_file)) {
    //   print("Error: file does not exist or is not readable: $pdf_file\n");
    //   return;
    // }
    // $c = curl_init();
    // $cfile = curl_file_create($pdf_file, 'application/pdf');
    // $apikey = '9ckfvsg6cwop'; // from https://pdftables.com/api
    // curl_setopt($c, CURLOPT_URL, "https://pdftables.com/api?key=$apikey&format=html");
    // curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
    // curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($c, CURLOPT_FAILONERROR,true);
    // curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");
    // $result = curl_exec($c);
    // if (curl_errno($c) > 0) {
    //   print('Error calling PDFTables: '.curl_error($c).PHP_EOL);
    // } else {
    //   // save the CSV we got from PDFTables to a file
    //   $file = fopen('converttest.html', 'w');
    //   file_put_contents ('files/'.$file, $result);
    //   $request->file('files/'.$file)->store();
    // }
    // print_r($result);
    // curl_close($c);
    // die();
    /* API CODE SAMPLE END */


    /* SAMLOT PDF PARCER CODE SAMPLE START */
    $parser = new \Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile($request->file('test_pdf'));
    // $details = $pdf->getDetails();
    // $text =  $pdf->getSectionsText();
    $pages = $pdf->getPages();
    $page     = $pages[0];
    $text_two = nl2br($page->getText());
    $content  = $page->getText();
    // $out      = $content;

    /* SAMLOT PDF PARCER CODE SAMPLE END */
  }
  return view('testpdf');
}
public function testjson(){
  $str = '[
    {
      "extraction_method": "lattice",
      "top": 54.0,
      "left": 61.34,
      "width": 719.3200073242188,
      "height": 74.0,
      "right": 780.66003,
      "bottom": 128.0,
      "data": [
        [
          {
            "top": 54.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 32.0,
            "text": "Schedule showing the Subscriptions and Refund of the GPF for following Government Servants\rFrom Major Head 8336/8009"
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          }
        ],
        [
          {
            "top": 86.0,
            "left": 61.34,
            "width": 359.6600036621094,
            "height": 14.0,
            "text": "For the Month of December 2020"
          },
          {
            "top": 86.0,
            "left": 421.0,
            "width": 359.6600341796875,
            "height": 14.0,
            "text": "Treasury : NASHIK ,DISTRICT TREASURY OFFICE(5101)"
          }
        ],
        [
          {
            "top": 100.0,
            "left": 61.34,
            "width": 359.6600036621094,
            "height": 14.0,
            "text": "AG Office : A. G. Mumbai"
          },
          {
            "top": 100.0,
            "left": 421.0,
            "width": 359.6600341796875,
            "height": 14.0,
            "text": ""
          }
        ],
        [
          {
            "top": 114.0,
            "left": 61.34,
            "width": 359.6600036621094,
            "height": 14.0,
            "text": "Name of the Office : Head Office-Education(Prim),ZP NASHIK(02510100019)"
          },
          {
            "top": 114.0,
            "left": 421.0,
            "width": 359.6600341796875,
            "height": 14.0,
            "text": ""
          }
        ]
      ]
    },
    {
      "extraction_method": "lattice",
      "top": 144.0,
      "left": 61.34,
      "width": 719.3199462890625,
      "height": 397.0,
      "right": 780.66,
      "bottom": 541.0,
      "data": [
        [
          {
            "top": 144.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 44.0,
            "text": "Sr.No."
          },
          {
            "top": 144.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 44.0,
            "text": "Account\rNo."
          },
          {
            "top": 144.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 44.0,
            "text": ""
          },
          {
            "top": 144.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 44.0,
            "text": "Name of Govt.\rServant(Employee Code)"
          },
          {
            "top": 144.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Pay-DP"
          },
          {
            "top": 144.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Subs"
          },
          {
            "top": 144.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 44.0,
            "text": "Pay/D\rA Arr\rMerge"
          },
          {
            "top": 144.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 44.0,
            "text": "GPF\rArr"
          },
          {
            "top": 144.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 44.0,
            "text": "Refund\rAmount"
          },
          {
            "top": 144.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 44.0,
            "text": "Cur\rInst/Tot.In\rst"
          },
          {
            "top": 144.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Total"
          },
          {
            "top": 144.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 44.0,
            "text": ""
          },
          {
            "top": 144.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Remark\rs"
          }
        ],
        [
          {
            "top": 188.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "1"
          },
          {
            "top": 188.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/10\r405"
          },
          {
            "top": 188.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 188.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "GAYAIKAWAD SANJAY\rBHIKAJI(02ZPESBGM6301)"
          },
          {
            "top": 188.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "39900\r0"
          },
          {
            "top": 188.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "10,000"
          },
          {
            "top": 188.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 188.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 188.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 188.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 188.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "10,000"
          },
          {
            "top": 188.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 188.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 216.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 41.0,
            "text": "2"
          },
          {
            "top": 216.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 41.0,
            "text": "NZPGPF/10\r808"
          },
          {
            "top": 216.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 216.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 41.0,
            "text": "KULKARNI SANDHYA\rPURUSHOTTAM(02ZPESPKF\r6401)"
          },
          {
            "top": 216.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "50500\r0"
          },
          {
            "top": 216.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "30,000"
          },
          {
            "top": 216.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 216.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 216.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 216.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 216.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "30,000"
          },
          {
            "top": 216.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 216.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 257.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "3"
          },
          {
            "top": 257.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/10\r840"
          },
          {
            "top": 257.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 257.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "DIXIT NIRANJAN\rRAMESH(02ZPENRDM6301)"
          },
          {
            "top": 257.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "56800\r0"
          },
          {
            "top": 257.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "4,000"
          },
          {
            "top": 257.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 257.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 257.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 257.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 257.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "4,000"
          },
          {
            "top": 257.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 257.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 285.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "4"
          },
          {
            "top": 285.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/15\r084"
          },
          {
            "top": 285.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 285.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "JAGDALE VIJAY\rBABURAO(02ZPEVBJM6701)"
          },
          {
            "top": 285.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "49000\r0"
          },
          {
            "top": 285.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "10,000"
          },
          {
            "top": 285.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 285.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 285.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 285.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 285.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "10,000"
          },
          {
            "top": 285.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 285.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 313.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "5"
          },
          {
            "top": 313.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/15\r393"
          },
          {
            "top": 313.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 313.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "AHIRE AVINASH\rRAMDAS(02ZPEARAM7001)"
          },
          {
            "top": 313.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "33300\r0"
          },
          {
            "top": 313.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "9,000"
          },
          {
            "top": 313.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 313.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 313.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 313.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 313.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "9,000"
          },
          {
            "top": 313.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 313.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 341.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 41.0,
            "text": "6"
          },
          {
            "top": 341.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 41.0,
            "text": "NZPGPF/15\r425"
          },
          {
            "top": 341.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 341.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 41.0,
            "text": "GAVALI CHNDRASHEKHAR\rDATTATRAY(02ZPECDGM64\r01)"
          },
          {
            "top": 341.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "47600\r0"
          },
          {
            "top": 341.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "30,000"
          },
          {
            "top": 341.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 341.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 341.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 341.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 341.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "30,000"
          },
          {
            "top": 341.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 341.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 382.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "7"
          },
          {
            "top": 382.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/15\r518"
          },
          {
            "top": 382.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 382.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "HAGAWANE SITARAM\rGOVIND(02ZPESGHM6601)"
          },
          {
            "top": 382.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "49000\r0"
          },
          {
            "top": 382.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "20,000"
          },
          {
            "top": 382.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 382.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 382.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 382.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 382.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "20,000"
          },
          {
            "top": 382.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 382.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 410.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 41.0,
            "text": "8"
          },
          {
            "top": 410.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 41.0,
            "text": "NZPGPF/16\r296"
          },
          {
            "top": 410.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 410.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 41.0,
            "text": "JADHAV NANDKUMAR\rDHONDOPANT(02ZPENDJM6\r301)"
          },
          {
            "top": 410.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "27842\r0"
          },
          {
            "top": 410.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "14,000"
          },
          {
            "top": 410.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 410.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 410.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 410.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 410.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "14,000"
          },
          {
            "top": 410.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 410.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 451.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 41.0,
            "text": "9"
          },
          {
            "top": 451.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 41.0,
            "text": "NZPGPF/16\r669"
          },
          {
            "top": 451.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 451.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 41.0,
            "text": "CHANDRATRE RAVINDRA\rGANGADHAR(02ZPERGCM6\r601)"
          },
          {
            "top": 451.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "50500\r0"
          },
          {
            "top": 451.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "20,000"
          },
          {
            "top": 451.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 451.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 451.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 451.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 451.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "20,000"
          },
          {
            "top": 451.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 451.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 492.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "10"
          },
          {
            "top": 492.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/17\r617"
          },
          {
            "top": 492.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 492.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "KAILASPANDAV SANGITA\r(02ZPESKPF7301)"
          },
          {
            "top": 492.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "42300\r0"
          },
          {
            "top": 492.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "25,000"
          },
          {
            "top": 492.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 492.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 492.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 492.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 492.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "25,000"
          },
          {
            "top": 492.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 492.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 520.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 21.0,
            "text": "11"
          },
          {
            "top": 520.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 21.0,
            "text": "NZPGPF/17"
          },
          {
            "top": 520.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 21.0,
            "text": ""
          },
          {
            "top": 520.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 21.0,
            "text": "BHADANE ARUN"
          },
          {
            "top": 520.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 21.0,
            "text": "42470"
          },
          {
            "top": 520.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 21.0,
            "text": "5,000"
          },
          {
            "top": 520.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 21.0,
            "text": "0"
          },
          {
            "top": 520.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 21.0,
            "text": "0"
          },
          {
            "top": 520.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 21.0,
            "text": "0"
          },
          {
            "top": 520.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 21.0,
            "text": "0/0"
          },
          {
            "top": 520.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 21.0,
            "text": "5,000"
          },
          {
            "top": 520.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 21.0,
            "text": ""
          },
          {
            "top": 520.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 21.0,
            "text": ""
          }
        ]
      ]
    },
    {
      "extraction_method": "lattice",
      "top": 54.0,
      "left": 61.340004,
      "width": 719.320068359375,
      "height": 306.0,
      "right": 780.6601,
      "bottom": 360.0,
      "data": [
        [
          {
            "top": 54.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "967"
          },
          {
            "top": 54.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "DASHRATH(02ZPEADBM740\r1)"
          },
          {
            "top": 54.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 54.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 82.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "12"
          },
          {
            "top": 82.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/18\r327"
          },
          {
            "top": 82.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "PATOLE NILESH\rASHOK(02ZPENAPM7502)"
          },
          {
            "top": 82.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "66000\r0"
          },
          {
            "top": 82.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "6,000"
          },
          {
            "top": 82.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 82.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 82.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 82.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 82.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "6,000"
          },
          {
            "top": 82.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 110.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 41.0,
            "text": "13"
          },
          {
            "top": 110.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 41.0,
            "text": "NZPGPF/18\r759"
          },
          {
            "top": 110.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 41.0,
            "text": "SONAWANE SUNIL\rBARIKRAO(02ZPESBSM7301\r)"
          },
          {
            "top": 110.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 41.0,
            "text": "39900\r0"
          },
          {
            "top": 110.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 41.0,
            "text": "10,000"
          },
          {
            "top": 110.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 110.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 110.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 110.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 110.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 41.0,
            "text": "10,000"
          },
          {
            "top": 110.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 151.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "14"
          },
          {
            "top": 151.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/21\r215"
          },
          {
            "top": 151.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "PATEL SALIM\rMUSA(02ZPESMPM7602)"
          },
          {
            "top": 151.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "33300\r0"
          },
          {
            "top": 151.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "3,000"
          },
          {
            "top": 151.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 151.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 151.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "5,576"
          },
          {
            "top": 151.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "22/36"
          },
          {
            "top": 151.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "8,576"
          },
          {
            "top": 151.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 179.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 41.0,
            "text": "15"
          },
          {
            "top": 179.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 41.0,
            "text": "NZPGPF/21\r216"
          },
          {
            "top": 179.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 41.0,
            "text": "MANKAR SUNIL\rDAMODHAR(02ZPESDMM63\r01)"
          },
          {
            "top": 179.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 41.0,
            "text": "37600\r0"
          },
          {
            "top": 179.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 41.0,
            "text": "10,000"
          },
          {
            "top": 179.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 179.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 179.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 179.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 179.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 41.0,
            "text": "10,000"
          },
          {
            "top": 179.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 220.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "16"
          },
          {
            "top": 220.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/21\r533"
          },
          {
            "top": 220.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "BHOI DHANRAJ\rRAJARAM(02ZPEDRBM8101)"
          },
          {
            "top": 220.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "41100\r0"
          },
          {
            "top": 220.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "13,556"
          },
          {
            "top": 220.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 220.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 220.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 220.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 220.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "13,556"
          },
          {
            "top": 220.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 248.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "17"
          },
          {
            "top": 248.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/21\r906"
          },
          {
            "top": 248.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "ZOLE SANTOSH\rNANDU(02ZPEZSNM7601)"
          },
          {
            "top": 248.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "60400\r0"
          },
          {
            "top": 248.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "12,000"
          },
          {
            "top": 248.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 248.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 248.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 248.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 248.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "12,000"
          },
          {
            "top": 248.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 276.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "18"
          },
          {
            "top": 276.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/22\r005"
          },
          {
            "top": 276.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "JAGTAP MANISHA\rBHASKAR(02ZPEMBJF7301)"
          },
          {
            "top": 276.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "33377\r0"
          },
          {
            "top": 276.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "1,500"
          },
          {
            "top": 276.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 276.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 276.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 276.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 276.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "1,500"
          },
          {
            "top": 276.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 304.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "19"
          },
          {
            "top": 304.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/22\r092"
          },
          {
            "top": 304.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "KULKARNI VAIJAYANTI\rKESHAV(02ZPEVKKF7001)"
          },
          {
            "top": 304.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "38750\r0"
          },
          {
            "top": 304.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "15,000"
          },
          {
            "top": 304.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 304.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 304.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 304.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 304.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "15,000"
          },
          {
            "top": 304.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 332.0,
            "left": 61.340004,
            "width": 52.12005615234375,
            "height": 28.0,
            "text": "20"
          },
          {
            "top": 332.0,
            "left": 113.46006,
            "width": 72.97466278076172,
            "height": 28.0,
            "text": "NZPGPF/22\r166"
          },
          {
            "top": 332.0,
            "left": 186.43472,
            "width": 182.44497680664062,
            "height": 28.0,
            "text": "DIXIT SHRIRANG\rARVIND(02ZPESADM8101)"
          },
          {
            "top": 332.0,
            "left": 368.8797,
            "width": 52.12030029296875,
            "height": 28.0,
            "text": "36400\r0"
          },
          {
            "top": 332.0,
            "left": 421.0,
            "width": 52.11993408203125,
            "height": 28.0,
            "text": "4,000"
          },
          {
            "top": 332.0,
            "left": 473.11993,
            "width": 41.7003173828125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 332.0,
            "left": 514.82025,
            "width": 36.48992919921875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 332.0,
            "left": 551.3102,
            "width": 62.54931640625,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 332.0,
            "left": 613.8595,
            "width": 62.549072265625,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 332.0,
            "left": 676.40857,
            "width": 52.12615966796875,
            "height": 28.0,
            "text": "4,000"
          },
          {
            "top": 332.0,
            "left": 728.5347,
            "width": 52.1253662109375,
            "height": 28.0,
            "text": ""
          }
        ]
      ]
    },
    {
      "extraction_method": "lattice",
      "top": 54.0,
      "left": 61.34,
      "width": 719.3200073242188,
      "height": 281.0,
      "right": 780.66003,
      "bottom": 335.0,
      "data": [
        [
          {
            "top": 54.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 44.0,
            "text": "Sr.No."
          },
          {
            "top": 54.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 44.0,
            "text": "Account\rNo."
          },
          {
            "top": 54.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 44.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 44.0,
            "text": "Name of Govt.\rServant(Employee Code)"
          },
          {
            "top": 54.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Pay-DP"
          },
          {
            "top": 54.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Subs"
          },
          {
            "top": 54.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 44.0,
            "text": "Pay/D\rA Arr\rMerge"
          },
          {
            "top": 54.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 44.0,
            "text": "GPF\rArr"
          },
          {
            "top": 54.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 44.0,
            "text": "Refund\rAmount"
          },
          {
            "top": 54.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 44.0,
            "text": "Cur\rInst/Tot.In\rst"
          },
          {
            "top": 54.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Total"
          },
          {
            "top": 54.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 44.0,
            "text": ""
          },
          {
            "top": 54.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 44.0,
            "text": "Remark\rs"
          }
        ],
        [
          {
            "top": 98.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "21"
          },
          {
            "top": 98.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/22\r507"
          },
          {
            "top": 98.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 98.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "SASANE ANIL\rRAMESH(02ZPEARSM7201)"
          },
          {
            "top": 98.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "30500\r0"
          },
          {
            "top": 98.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "10,000"
          },
          {
            "top": 98.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 98.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 98.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 98.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 98.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "10,000"
          },
          {
            "top": 98.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 98.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 126.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 41.0,
            "text": "22"
          },
          {
            "top": 126.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 41.0,
            "text": "NZPGPF/22\r508"
          },
          {
            "top": 126.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 126.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 41.0,
            "text": "MADANE DATTATRAY\rVASANTRAO(02ZPEDVMM77\r01)"
          },
          {
            "top": 126.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "34300\r0"
          },
          {
            "top": 126.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "12,000"
          },
          {
            "top": 126.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 126.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 126.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 126.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 126.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "12,000"
          },
          {
            "top": 126.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 126.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 167.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "23"
          },
          {
            "top": 167.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/22\r555"
          },
          {
            "top": 167.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 167.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "KACHARE VISHWAS\rKHANDU(02ZPEVKKM7901)"
          },
          {
            "top": 167.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "34410\r0"
          },
          {
            "top": 167.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "1,000"
          },
          {
            "top": 167.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 167.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 167.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 167.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 167.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "1,000"
          },
          {
            "top": 167.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 167.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 195.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 41.0,
            "text": "24"
          },
          {
            "top": 195.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 41.0,
            "text": "NZPGPF/23\r601"
          },
          {
            "top": 195.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 195.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 41.0,
            "text": "KODE RAVINDRA\rDATTATRAY(02ZPERDKM79\r01)"
          },
          {
            "top": 195.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "28400\r0"
          },
          {
            "top": 195.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "7,000"
          },
          {
            "top": 195.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 195.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 195.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0"
          },
          {
            "top": 195.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 41.0,
            "text": "0/0"
          },
          {
            "top": 195.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": "7,000"
          },
          {
            "top": 195.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 41.0,
            "text": ""
          },
          {
            "top": 195.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 41.0,
            "text": ""
          }
        ],
        [
          {
            "top": 236.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "25"
          },
          {
            "top": 236.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/23\r955"
          },
          {
            "top": 236.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 236.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "KULKURNI DINANATH\rSRIPAD(02ZPEDSKM8301)"
          },
          {
            "top": 236.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "26800\r0"
          },
          {
            "top": 236.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "1,000"
          },
          {
            "top": 236.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 236.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 236.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 236.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 236.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "1,000"
          },
          {
            "top": 236.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 236.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 264.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "26"
          },
          {
            "top": 264.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": "NZPGPF/24\r945"
          },
          {
            "top": 264.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 264.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": "PINGALKAR MANISHA\rUMAKANT(02ZPEMUPF7201)"
          },
          {
            "top": 264.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "60400\r0"
          },
          {
            "top": 264.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "5,000"
          },
          {
            "top": 264.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 264.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 264.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0"
          },
          {
            "top": 264.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "0/0"
          },
          {
            "top": 264.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "5,000"
          },
          {
            "top": 264.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 264.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 292.0,
            "left": 61.34,
            "width": 52.119998931884766,
            "height": 28.0,
            "text": "TOTAL\r(`)"
          },
          {
            "top": 292.0,
            "left": 113.46,
            "width": 72.9699935913086,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 186.43,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 186.44,
            "width": 182.44000244140625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 368.88,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 421.0,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "2,88,05\r6"
          },
          {
            "top": 292.0,
            "left": 473.12,
            "width": 41.70001220703125,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 514.82,
            "width": 36.489990234375,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 551.31,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": "5,576"
          },
          {
            "top": 292.0,
            "left": 613.86,
            "width": 62.54998779296875,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 676.41,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": "2,93,63\r2"
          },
          {
            "top": 292.0,
            "left": 728.52997,
            "width": 0.010009765625,
            "height": 28.0,
            "text": ""
          },
          {
            "top": 292.0,
            "left": 728.54,
            "width": 52.1199951171875,
            "height": 28.0,
            "text": ""
          }
        ],
        [
          {
            "top": 320.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 15.0,
            "text": "Total Deduction In Words (`):  Two Lakh Ninty Three Thousand Six Hundred and Thirty Two Only."
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          },
          {
            "top": 0.0,
            "left": 0.0,
            "width": 0.0,
            "height": 0.0,
            "text": ""
          }
        ]
      ]
    },
    {
      "extraction_method": "lattice",
      "top": 367.0,
      "left": 61.34,
      "width": 719.3200073242188,
      "height": 166.0,
      "right": 780.66003,
      "bottom": 533.0,
      "data": [
        [
          {
            "top": 367.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "CERTIFICATE"
          }
        ],
        [
          {
            "top": 379.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "Certified that I have personally verified the correctness of the details in this schedule and they are found correct."
          }
        ],
        [
          {
            "top": 391.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 403.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 415.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "Dated :10/2/2021"
          }
        ],
        [
          {
            "top": 427.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 439.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 451.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "Education Officer (PRY.)"
          }
        ],
        [
          {
            "top": 463.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "Head Office-Education(Prim),ZP NASHIK"
          }
        ],
        [
          {
            "top": 475.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "For use of Audit Office"
          }
        ],
        [
          {
            "top": 487.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": "Date of Encashmment :"
          }
        ],
        [
          {
            "top": 499.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 511.0,
            "left": 61.34,
            "width": 719.3200073242188,
            "height": 22.0,
            "text": "1.Certified that the name, amounts of individuals deductions & the total shown in column (7) have been checked by reference to the bill, vide. paragraph 224 of\rthe Audit Manual."
          }
        ]
      ]
    },
    {
      "extraction_method": "lattice",
      "top": 54.0,
      "left": 61.340027,
      "width": 719.320068359375,
      "height": 168.0,
      "right": 780.6601,
      "bottom": 222.0,
      "data": [
        [
          {
            "top": 54.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "2.Certified that the rates of pay as shown in column(3) have been verified with the amounts actually drawn in the bill."
          }
        ],
        [
          {
            "top": 66.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 78.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 90.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "Dated :10/2/2021"
          }
        ],
        [
          {
            "top": 102.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "Initials of the Auditor"
          }
        ],
        [
          {
            "top": 114.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 126.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "Portion for Treasury Office"
          }
        ],
        [
          {
            "top": 138.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "Treasury Voucher No. and Date"
          }
        ],
        [
          {
            "top": 150.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "Challan no. and Date"
          }
        ],
        [
          {
            "top": 162.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "Treasury Officer / Pay & Accounts Officer"
          }
        ],
        [
          {
            "top": 174.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 186.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": ""
          }
        ],
        [
          {
            "top": 198.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "VERIFICATION TIME :10-02-2021 12:32:14.434"
          }
        ],
        [
          {
            "top": 210.0,
            "left": 61.340027,
            "width": 719.320068359375,
            "height": 12.0,
            "text": "*******End of Report*******"
          }
        ]
      ]
    }
    ]';
    $dataarry = json_decode($str);
    $insert = [];
    $dont_insert = [];
    $first_data = count($dataarry);
    // die();
    for($k=1;$k < $first_data;$k++){
      if(isset($dataarry[$k]->data)){
        $data_array = $dataarry[$k]->data;
        $dataarry_count = count($dataarry[$k]->data);
        for($i=1;$i < $dataarry_count;$i++ ){
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
