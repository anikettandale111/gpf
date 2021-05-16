<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('asset/images/favicon.ico') }}" type="image/ico" />
  <!-- Bootstrap -->
  <title>{{ config('app.name') }} </title>
  <link href=" {{ asset('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('css/main.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/build/css/custom.min.css')}}" rel="stylesheet">
  <style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
    border-color: black;
  }
  th,
  td {
    padding: 8px;
  }
  * {
    color: black;
  }
  h4 {
    font-size: 12px;
  }
  .amounttext{
    text-align: right;
  }
  .x_title {
    border-bottom: 2px solid #101011;
    margin-bottom: 10px;
  }
  </style>
</head>
<!-- <h5> ------------------------------------------------------------------------------------------------------ </h5> -->
@php $next_opn_bal = 0; @endphp
@if(count($rqo_result))
  @foreach($rqo_result AS $rqo)
    @if(isset($rqo->gpf_number) && $rqo->gpf_number > 0)
      @php
        $otherInstall = DB::table('master_vetan_ayog_received AS va')->select('va.instalment','va.DiffAmt','va.Interest')->where(['va.GPFNo' =>$rqo->gpf_number,'va.Year'=>session()->get('to_year'),'va.pay_number'=>6])->get();
        $tcount = count($otherInstall);
        $ins_one = 0;
        $ins_two = 0;
        $ins_thre = 0;
        $ins_four = 0;
        $ins_five = 0;
        $html = '';
        $total_ins_amt = 0;
        $total_ins_interest = 0;
        $withdraw_amt = 0;
        $withdraw_remark = '';
        $withdraw_month = 0;
        $withdraw_key = 0;
      @endphp
      @if(isset($rqo->partava_amt) && $rqo->partava_amt > 0 )
        @php
          $withdraw_amt = $rqo->partava_amt;
          $withdraw_remark = $rqo->withdraw_remark;
          $withdraw_month = $rqo->partava_month;
        @endphp
      @elseif(isset($rqo->na_partava_amt) && $rqo->na_partava_amt > 0 )
        @php
          $withdraw_amt = $rqo->na_partava_amt;
          $withdraw_remark = $rqo->withdraw_remark;
          $withdraw_month = $rqo->na_partava_month;
        @endphp
      @elseif(isset($rqo->antim_adayi_amt) && $rqo->antim_adayi_amt)
        @php
          $withdraw_amt = $rqo->antim_adayi_amt;
          $withdraw_remark = $rqo->withdraw_remark;
          $withdraw_month = $rqo->antim_adayi_month;
        @endphp
      @endif
      @if($tcount)
        @for($j=0;$j < $tcount;$j++)
          @if(isset($otherInstall[$j]->instalment) && $otherInstall[$j]->instalment == 1 )
            @php  $ins_one = (isset($otherInstall[$j]->DiffAmt))?$otherInstall[$j]->DiffAmt:'0' @endphp
          @elseif(isset($otherInstall[$j]->instalment) && $otherInstall[$j]->instalment == 2 )
            @php $ins_two = (isset($otherInstall[$j]->DiffAmt))?$otherInstall[$j]->DiffAmt:'0' @endphp
          @elseif(isset($otherInstall[$j]->instalment) && $otherInstall[$j]->instalment == 3 )
            @php $ins_thre = (isset($otherInstall[$j]->DiffAmt))?$otherInstall[$j]->DiffAmt:'0' @endphp
          @elseif(isset($otherInstall[$j]->instalment) && $otherInstall[$j]->instalment == 4 )
            @php $ins_four = (isset($otherInstall[$j]->DiffAmt))?$otherInstall[$j]->DiffAmt:'0' @endphp
          @elseif(isset($otherInstall[$j]->instalment) && $otherInstall[$j]->instalment == 5 )
            @php $ins_five = (isset($otherInstall[$j]->DiffAmt))?$otherInstall[$j]->DiffAmt:'0' @endphp
          @endif
          @php
            $total_ins_amt += (isset($otherInstall[$j]->DiffAmt))?$otherInstall[$j]->DiffAmt:0;
            $total_ins_interest += (isset($otherInstall[$j]->Interest))?$otherInstall[$j]->Interest:0;
          @endphp
        @endfor
      @endif
      @php
        $opening_balance = $rqo->opening_balance;
        echo $opening_balance;
        $intrest_rate = 8;
        $total_gpf = [];
        $total = $opening_balance;
        $total_one = 0;
        $total_two = 0;
        $total_three = 0;
        $total_four = 0;
        $total_five = 0;
        $total_six = 0;
        $total_intrest = 0;
        $month_array=[];
        $month_array[1]= 'month_jan';
        $month_array[2] = 'month_feb';
        $month_array[3] = 'month_march';
        $month_array[4] = 'month_april';
        $month_array[5] = 'month_may';
        $month_array[6] = 'month_june';
        $month_array[7] = 'month_july';
        $month_array[8] = 'month_aug';
        $month_array[9] = 'month_september';
        $month_array[10] = 'month_octomber';
        $month_array[11] = 'month_november';
        $month_array[12] = 'month_december';
      @endphp
      @if($withdraw_month>0)
        @php $withdraw_key = $month_array[$withdraw_month]; @endphp
      @endif
      @foreach($month_name AS $key => $month)
        @php
          $with_amt = 0;
          if($withdraw_key == $month->trans_month){
            $with_amt = $withdraw_amt;
            $monthly_contrubition = $month->trans_month.'_contri';
            $loan_installment = $month->trans_month.'_loan_emi';
            $monthly_other = $month->trans_month.'_other';
            $monthly_received = $month->trans_month.'_recive';
            $loan_amonut = $month->trans_month.'_loan';
            $six_pay = $month->trans_month.'_six_pay';
            $seven_pay = $month->trans_month.'_seven_pay';
          }
        if($key==0){
          $total += ($rqo->$monthly_contrubition - $rqo->$loan_amonut+$total_ins_amt-$with_amt);
        }else{
          $total += ($rqo->$monthly_contrubition - $rqo->$loan_amonut-$with_amt);
        }
        if($withdraw_key == $month->trans_month){
          $withdraw_remark;
        }
          $total_one += $rqo->$monthly_contrubition;
          $total_two += $rqo->$loan_installment;
          $total_six += $total;
          $total_three += ($rqo->$monthly_contrubition+$rqo->$loan_installment);
          $total_four += $rqo->$loan_amonut+ $with_amt;
          $total_gpf['contribution'][$month->trans_month] = $rqo->$monthly_contrubition;
          $total_gpf['loan_installment'][$month->trans_month] = $rqo->$loan_installment;
          $total_gpf['monthly_other'][$month->trans_month] = $rqo->$monthly_other;
          $total_gpf['monthly_received'][$month->trans_month] = $rqo->$monthly_received;
          $total_gpf['loan_amonut'][$month->trans_month] = $rqo->$loan_amonut;
        @endphp
      @endforeach
      @php
        $total_masik=0;
        $i=0;
        $start_month=0;
        $inital_month=4;
        $total_con = $opening_balance;
        $total_con_two = $opening_balance;
      @endphp
      @if(count($roi_result))
        @foreach($roi_result AS $row)
          @if(isset($roi_result[$i+1]))
            @if($i == 0)
              @php $start_month = ($roi_result[$i+1]->to_month)-1; @endphp
              @if($start_month > 0 && $start_month >= $inital_month)
                @php
                  $percentage = $roi_result[$i]->percent;
                  $month_count=0;
                @endphp
                @for($k=$inital_month; $k <= $start_month;$k++)
                  @php $acc_mm = $month_array[$k];
                    $with_amt=0;
                  @endphp
                    @if($k==$withdraw_month)
                      $with_amt = $withdraw_amt;
                      $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] -$with_amt ;
                      $total_masik += $total_con;
                      $month_count++;
                    @endif
                  @endphp
                @endfor
                @if($start_month < $inital_month)
                  @for($k=$inital_month; $k <= 12;$k++)
                    @php
                      $acc_mm = $month_array[$k];
                      $with_amt=0;
                    @endphp
                      @if($k==$withdraw_month)
                        $with_amt = $withdraw_amt;
                        $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm]-$with_amt  ;
                        $total_masik += $total_con;
                        $month_count++;
                      @endif
                    @endphp
                  @endfor
                  @for($k=1; $k <= $start_month;$k++)
                    @php
                      $acc_mm = $month_array[$k];
                      $with_amt=0;
                      if($k==$withdraw_month)
                        $with_amt = $withdraw_amt;
                        $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] -$with_amt ;
                        $total_masik += $total_con;
                        $month_count++;
                    @endphp
                  @endfor
                @endif
                @if($total_masik > 0 && $percentage > 0)
                  @php $total_intrest = round(((($total_masik+$total_ins_amt) * $percentage)/100) /12); @endphp
                @endif
              @endif
              @else
                @php $end_month = ($roi_result[$i+1]->to_month)-1; @endphp
                @php $start_month = ($roi_result[$i-1]->to_month); @endphp
                @if($start_month > 0 && $end_month > $start_month)
                  @php
                    $percentage = $roi_result[$i]->percent;
                    $month_count=0;
                  @endphp
                @for($k=$start_month; $k <= $end_month;$k++)
                  @php
                    $acc_mm = $month_array[$k];
                    $with_amt=0;
                    if($k==$withdraw_month)
                      $with_amt = $withdraw_amt;
                      $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] -$with_amt;
                      $total_masik += $total_con;
                      $month_count++;
                  @endphp
                @endfor
                @if($start_month > $end_month)
                  @for($k=$start_month; $k <= 12;$k++)
                    @php $acc_mm = $month_array[$k];
                      $with_amt=0;
                      if($k==$withdraw_month)
                        $with_amt = $withdraw_amt;
                        $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm]-$with_amt;
                        $total_masik += $total_con;
                        $month_count++;
                    @endphp
                  @endfor
                  @for($k=1; $k <= $end_month;$k++)
                    @php
                      $acc_mm = $month_array[$k];
                      $with_amt=0;
                      if($k==$withdraw_month)
                      $with_amt = $withdraw_amt;
                      $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm]-$with_amt ;
                      $total_masik += $total_con;
                      $month_count++;
                    @endphp
                  @endfor
                @endif
                  $total_masik
                @if($total_masik > 0 && $percentage > 0)
                  @php
                    $total_intrest = round((($total_masik * $percentage)/100) /12);
                  @endphp
                @endif
              @endif
            @endif
            @else
              @php $percentage = $row->percent;
              $total_masik = 0;
              $month_count=0;
              $total_con_two = $total_con; @endphp
              @for($k=$row->to_month; $k <= 12 ; $k++)
                @php
                  $acc_mm = $month_array[$k];
                  $with_amt=0;
                  if($k==$withdraw_month)
                  $with_amt = $withdraw_amt;
                  $total_con_two += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] ) - $total_gpf['loan_amonut'][$acc_mm]-$with_amt;
                  $total_masik += $total_con_two;
                  $month_count++;
                @endphp
              @endfor
              @if($month_count < 12)
                @php $next_month = 0; $month_count +=1; @endphp
                @for($k=$month_count; $k <= 12 ; $k++)
                  @if($acc_mm == 'month_december' )
                    @php $next_month = 1; @endphp
                  @endif
                  @php
                    $with_amt=0;
                    if($k==$withdraw_month)
                    $with_amt = $withdraw_amt;
                    $acc_mm = $month_array[$next_month];
                    $total_con_two += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] ) - $total_gpf['loan_amonut'][$acc_mm] - $with_amt ;
                    $total_masik += $total_con_two;
                    $month_count++;
                    $next_month++;
                  @endphp
                @endfor
              @endif
              @if($total_masik > 0 && $percentage > 0)
                @php $total_intrest += round((($total_masik * $percentage)/100) /12); @endphp
              @endif
            @endif
            @php  $i++; @endphp
          @endforeach
          @else
            @php  $total_intrest = round(($total*$roi_result[0]->percent)/12); @endphp
        @endif
        @if(count($roi_result))
          @foreach($roi_result AS $rowroi)
            @php getMonthName($rowroi->to_month); @endphp
            @php $rowroi->percent; @endphp
          @endforeach
            @php getMonthName(3) @endphp
        @endif
      @php
        $next_opn_bal = ($rqo->opening_balance+$total_one+$total_two+$total_ins_amt+$total_intrest)-$total_four;
      @endphp
        <!-- {{$next_opn_bal}}/
        {{$rqo->opening_balance}}/{{$total_one}}{{$total_two}}/{{$total_ins_amt}}/{{$total_intrest}}/{{$total_four}}; -->
      @php
        $vetanPaid = DB::table('master_vetan_ayog_received AS va')
                    ->select('va.Year','va.DtFrom','va.instalment','va.DiffAmt','va.TotDiff','va.Interest','va.Mnt','va.INTY1',
                    'va.INTY2','va.LockDate')->where(['va.GPFNo' =>$rqo->gpf_number,'va.Year'=>2021,'va.pay_number'=>7])->get();
        $totalDiff = 0;
        $totalIntrest = 0;
        $totalRecivedDiff = 0;
      @endphp
      @if(count($vetanPaid))
        @foreach($vetanPaid AS $key => $vetanrow)
          @php $totalDiff += $vetanrow->DiffAmt; @endphp
          @php $totalIntrest += $vetanrow->Interest; @endphp
          @php $totalRecivedDiff += $vetanrow->TotDiff; @endphp
        @endforeach
      @endif
    @endif
  @endforeach
@endif

<body class="nav-md" style="margin-left:20%;margin-right:20%;">
  <div class="col-md-12 col-sm-12 " >
    <div class="x_panel">
      <div class="x_content">
        <div class="row" style="text-align:center;">
          <div class="col-md-4 mt-5">
            <label> वित्त विभाग </label>
          </div>
          <div class="col-md-4 ">
            <img src="{{asset('asset/images/zp-nashik-bharti.jpg')}}" width="120">
          </div>
          <div class="col-md-4 mt-5" >
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
          </div>
        </div>
        <div class="row" style="text-align:center;">
          <div class="col-md-6">
            <label> इमेल : cafozpnashik@gmail.com </label>
          </div>
          <div class="col-md-6">
            <label> टेलीफोन : ०२५३-२५९०९०८ </label>
          </div>
        </div>
        <hr>
        <div class="col-sm-12">
          <div class="card-box">
            संदर्भ -1. {{$viewapplication->user_name}} यांचा अर्ज दिनांक -: {{digitChange($viewapplication->applicantion_date)}}<br>
            2. ग.वि.अ.पंचायत समिती यांचे पञ क्र./पंसबा/आस्था-क/{{$viewapplication->gat_vikas_adhikari_no}}<br>
            3. ग्रा.वि.वि.शासन आदेश क्र/झेडपी-5/2000/प्रक्र.{{$viewapplication->zp_adhikari_no}}<br>
            4. महाराष्ट्र सर्वसाधारण भविष्य निर्वाह निधी क्रमांक 1998 चे नियम क्र.25,12(4)(1)25-अ,26,27,29,<br>
            <hr>
            <span class="pull-right">जा.क्र/जिप/अर्थ/भनिनि/{{digitChange($viewapplication->employee_gpf_num)}}/{{digitChange($viewapplication->form_id)}}/2020<br>
              अर्थ विभाग जिल्हा परिषद,नाशिक<br>
              दिनांक {{digitChange($viewapplication->applicantion_date)}}</span>
              <br>
              <br>
              <br>
              कार्यालयीन आदेश <br>
              <br>
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;जिल्हा परिषद नाशिक अंर्तगत कार्यरत असलेल्या पुढील कर्मचाऱ्याचे भविष्य निर्वाह निधी लेखे तपशिलात दिल्या नुसार अंतिम करण्यात येत आहे.</p>
              <hr> <br>
              <div class="row">
                <div class="col-md-3">
                  भ.नि.नि.लेखा क्रमांक             <br>
                  कर्मचाऱ्याचे नाव                  <br>
                  लेखे अंतिम करण्याचे प्रयोजन        <br>
                  लेख्यातील शिल्लक रक्कम रु        <br>
                  7 व्या वेतन शिल्लक रक्कम रु.     <br>
                  एकुण शिल्लक रक्कम रु.          <br>
                </div>
                <div class="col-md-1">
                  -:<br>
                  -:<br>
                  -:<br>
                  -:<br>
                  -:<br>
                  -:<br>
                </div>
                <div class="col-md-8">
                  {{digitChange($viewapplication->employee_gpf_num)}}<br>
                  {{$viewapplication->user_name}} हुद्या {{$viewapplication->user_designation}}<br>
                  {{$viewapplication->antim_pryojan}} दि.   /   /2020<br>
                  {{digitChange($next_opn_bal)}} /-<br>
                  {{('0.00')}} /-<br>
                  {{digitChange($next_opn_bal)}} /- <br>
                </div>
              </div>
              <hr> <br>
              <p class="text-align:justify"> &nbsp;&nbsp;&nbsp;&nbsp; उपरोक्त तपशिलानुसार शिल्लक रक्कम रुपये {{digitChange($next_opn_bal)}}/-अक्षरी रुपये- {{convertToIndianCurrency($next_opn_bal)}} माञ अंतिम प्रदानासाठी मंजुर करण्यात येत आहे. सदर रक्कम <u><b> {{$viewapplication->user_name}}  हुद्या  {{$viewapplication->user_designation}} </b></u>(स्वत) यांचे नावे मंजूर करण्यात येत आहे. सदरखर्च पुढील लेखाशिर्षातुन मंजुर करण्यात येत आहे. </p><br>
              <p>सहावा  वेतन आयोग फरक हप्ते भ.नि.नि.खात्यात व्याजासह जमा करणेत येवुन अंतिम रक्कम मंजुर करण्यात येत आहे. </p> <br>
              Deposit & Advances <br>
              Interest Deposit <br>
              <div class="row">
                <div class="col-md-3">
                  8336-Civil Deposit <br>
                  G.P.F.Emp. <br>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                  उप मुख्य लेखा व वित्त अधिकारी <br>
                  जिल्हा परिषद,नाशिक <br>
                </div>
              </div>
              <br>
              <br>
              प्रतिलिपी:-
              1. गट विकास अधिकारी /गट शिक्षणाधिकारी पंचायत समिती {{$viewapplication->user_taluka_name}} जिल्हा नाशिक. <br>
              2/- सदरचे देयक तयार करुन या कार्यालयाकडे सादर करु नये. <br>
              2. {{$viewapplication->user_name}} हुद्या {{$viewapplication->user_designation}} मा.ग.वि.अ/ग.शि.अ.पंचायत समिती {{$viewapplication->user_taluka_name}} यांचे मार्फत <br>
              3. कार्यालयीन नस्ती. <br>
              4. हुद्या-प्रा.शिक्षिका <br>
              <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                  उप मुख्य लेखा व वित्त अधिकारी <br>
                  जिल्हा परिषद,नाशिक <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
