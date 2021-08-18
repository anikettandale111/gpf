<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('asset/images/favicon.ico') }}" type="image/ico" />
  <title>{{ config('app.name') }} </title>
  <!-- Bootstrap -->
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

  .x_title {
    border-bottom: 2px solid #101011;
    margin-bottom: 10px;
  }
  </style>
</head>

<body class="nav-md">
  @if(count($rqo_result))
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-2">
            <label> नाशिक जिल्हा</label>
          </div>
          <div class="col-md-2">
            <img src="{{asset('asset/images/zp-nashik-bharti.jpg') }}" width="120"></img>
          </div>
          <div class="col-md-6" style="text-align: center;">
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
            <h2> <b>भविष्य निर्वाह निधी वृहतपत्रक नमुना न ८९ (नियम २३१ )</b></h2>
            <h2> <b>सन ( {{digitChange(session()->get('financial_year'))}})</b> </h2>
          </div>
          <!-- <div class="col-md-2">
            <h2> प्राथ शिक्षक </h2>
          </div> -->
          <div class="col-sm-12">
            <div class="card-box ">

              <table style="width:100%">
                <tr>
                  <th>खाते क्रं/ अं क्रं </th>
                  <th>नाव </th>
                  <th> वर्षांरंभीची शिल्लक</th>
                  <th>एप्रिल </th>
                  <th>मे </th>
                  <th> जून </th>
                  <th> जुलै </th>
                  <th>ऑगस्ट </th>
                  <th>सप्टेंबर </th>
                  <th>ऑक्टोबर</th>
                  <th> नोव्हेंबर</th>
                  <th> डिसेंबर</th>
                  <th> जानेवारी</th>
                  <th>फेब्रुवारी</th>
                  <th>मार्च</th>
                  <th> वर्षातील जमा व खर्च रकमा </th>
                  <th> वर्षाचे व्याज </th>
                  <th> प्रारंभिक शिक्कल व ऐकून जमा व व्याज </th>
                  <th> ऐकून काढलेल्या रकमा </th>
                  <th> अखेरची शिक्कल </th>
                  <th> शेरा </th>
                </tr>
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <td>{{digitChange('1')}}</td>
                    <td>{{digitChange('2')}}</td>
                    <td>{{digitChange('3')}}</td>
                    <td>{{digitChange('4')}}</td>
                    <td>{{digitChange('5')}}</td>
                    <td>{{digitChange('6')}}</td>
                    <td>{{digitChange('7')}}</td>
                    <td>{{digitChange('8')}}</td>
                    <td>{{digitChange('9')}}</td>
                    <td>{{digitChange('10')}}</td>
                    <td>{{digitChange('11')}}</td>
                    <td>{{digitChange('12')}}</td>
                    <td>{{digitChange('13')}}</td>
                    <td>{{digitChange('14')}}</td>
                    <td>{{digitChange('15')}}</td>
                    <td>{{digitChange('16')}}</td>
                    <td>{{digitChange('17')}}</td>
                    <td>{{digitChange('18')}}</td>
                    <td>{{digitChange('19')}}</td>
                    <td>{{digitChange('20')}}</td>
                    <td>{{digitChange('21')}}</td>
                  </tr>
                  @foreach($rqo_result AS $rqo)
                  <tr>
                    <td colspan="21"><center> {{$rqo->department_name}} {{$rqo->taluka_name}}</center></td>
                  </tr>
                  @php $otherInstall = DB::table('master_vetan_ayog_received AS va')->select('va.instalment',
                  'va.DiffAmt','va.Interest','va.Mnt')->where(['va.GPFNo' =>$rqo->gpf_number,'va.Year'=>session()->get('from_year')])->get();
                  $tcount = count($otherInstall);
                  $ins_one = 0;
                  $ins_two = 0;
                  $ins_thre = 0;
                  $ins_four = 0;
                  $ins_five = 0;
                  $html = '';
                  $total_ins_amt_month = 0;
                  $total_ins_amt = 0;
                  $total_ins_interest = 0;
                  @endphp
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
                        $total_ins_amt_month = $otherInstall[$j]->Mnt;
                      @endphp
                      @endfor
                  @endif
                  @php
                    $opening_balance = $rqo->opening_balance+ $total_ins_amt;
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
                    @endphp
                    @foreach($month_name AS $key => $month)
                      @php
                      $monthly_contrubition = $month->trans_month.'_contri';
                      $loan_installment = $month->trans_month.'_loan_emi';
                      $monthly_other = $month->trans_month.'_other';
                      $monthly_received = $month->trans_month.'_recive';
                      $loan_amonut = $month->trans_month.'_loan';
                      $six_pay = $month->trans_month.'_six_pay';
                      $seven_pay = $month->trans_month.'_seven_pay';

                      $total += ($rqo->$monthly_contrubition - $rqo->$loan_amonut);
                        $total_one += $rqo->$monthly_contrubition;
                        $total_two += $rqo->$loan_installment;
                        $total_six += $total;
                        $total_three += ($rqo->$monthly_contrubition+$rqo->$loan_installment);
                        $total_four += $rqo->$loan_amonut;
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
                          @php $percentage = $roi_result[$i]->percent;
                             $month_count=0; @endphp
                            @for($k=$inital_month; $k <= $start_month;$k++)
                            @php $acc_mm = $month_array[$k];
                              $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] ;
                              $total_masik += $total_con;
                              $month_count++;
                              @endphp
                            @endfor
                            @if($start_month < $inital_month)
                              @for($k=$inital_month; $k <= 12;$k++)
                                @php $acc_mm = $month_array[$k];
                                  $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] ;
                                  $total_masik += $total_con;
                                  $month_count++;
                                  @endphp
                              @endfor
                              @for($k=1; $k <= $start_month;$k++)
                                @php $acc_mm = $month_array[$k];
                                  $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] ;
                                  $total_masik += $total_con;
                                  $month_count++;
                                  @endphp
                              @endfor
                            @endif
                            @if($total_masik > 0 && $percentage > 0)
                            @php $total_intrest = round((($total_masik * $percentage)/100) /12); @endphp
                            @endif
                          @endif
                        @else
                          @php $end_month = ($roi_result[$i+1]->to_month)-1; @endphp
                          @php $start_month = ($roi_result[$i-1]->to_month); @endphp
                          @if($start_month > 0 && $end_month > $start_month)
                          @php $percentage = $roi_result[$i]->percent;
                             $month_count=0; @endphp
                            @for($k=$start_month; $k <= $end_month;$k++)
                            @php $acc_mm = $month_array[$k];
                              $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] ;
                              $total_masik += $total_con;
                              $month_count++;
                              @endphp
                            @endfor
                            @if($start_month > $end_month)
                              @for($k=$start_month; $k <= 12;$k++)
                                @php $acc_mm = $month_array[$k];
                                  $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] ;
                                  $total_masik += $total_con;
                                  $month_count++;
                                  @endphp
                              @endfor
                              @for($k=1; $k <= $end_month;$k++)
                                @php $acc_mm = $month_array[$k];
                                  $total_con += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] + $total_gpf['monthly_other'][$acc_mm]) - $total_gpf['loan_amonut'][$acc_mm] ;
                                  $total_masik += $total_con;
                                  $month_count++;
                                  @endphp
                              @endfor
                            @endif

                            @if($total_masik > 0 && $percentage > 0)
                            @php $total_intrest = round((($total_masik * $percentage)/100) /12); @endphp
                            @endif
                          @endif
                        @endif
                        @else
                          @php $percentage = $row->percent;
                          $total_masik = 0;
                          $month_count = 0;
                          $total_con_two = $total_con; @endphp
                          @for($k=$row->to_month; $k <= 12 ; $k++)
                            @php $acc_mm = $month_array[$k];
                              $total_con_two +=($total_gpf['contribution'][$acc_mm]+$total_gpf['loan_installment'][$acc_mm])
                               - $total_gpf['loan_amonut'][$acc_mm];
                              $total_masik += $total_con_two;
                              $month_count++;
                            @endphp
                          @endfor
                          @if($month_count < 12)
                            @php $next_month = 0;@endphp
                            @for($k=$month_count; $k <= 11 ; $k++)
                              @if($acc_mm == 'month_december' )
                                @php $next_month = 1; @endphp
                              @endif
                                @php
                                  $acc_mm = $month_array[$next_month];
                                  $total_con_two += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] ) - $total_gpf['loan_amonut'][$acc_mm];
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

                    <tr >
                      <td>{{$rqo->inital_letter}}{{digitChange($rqo->gpf_number)}}</td>
                      <td>{{$rqo->employee_name}}</td>
                      <td>{{digitChange($opening_balance)}}</td>

                    @foreach($month_name AS $key => $month)
                      @php   $monthly_contrubition = $month->trans_month.'_contri'; @endphp
                      <td class="amounttext">{{digitChange($rqo->$monthly_contrubition)}}</td>
                    @endforeach
                      <td> {{digitChange($total_one)}}</td>
                      <td>{{digitChange($total_intrest)}}</td>
                      <td> {{digitChange($opening_balance)}} + {{digitChange($total_one)}} + {{digitChange($total_intrest)}} = {{digitChange($opening_balance+$total_one+$total_intrest)}}</td>
                      <td>{{digitChange($total_four)}}</td>
                      <td>{{digitChange(($rqo->opening_balance+$total_one+$total_two+$total_ins_amt+$total_ins_interest+$total_intrest)-$total_four)}}</td>
                      <td></td>
                    </tr>
                    <tr>
                    <td colspan="3"></td>
                    @foreach($month_name AS $key => $month)
                      @php   $loan_amonut = $month->trans_month.'_loan'; @endphp
                      <td class="amounttext">{{digitChange($rqo->$loan_amonut)}}</td>
                    @endforeach
                      <td>{{digitChange($total_four)}} </td>
                      <td colspan="6"> </td>
                    </tr>
                    <tr>
                    <td colspan="3"></td>
                    @foreach($month_name AS $key => $month)
                      @php $loan_installment = $month->trans_month.'_loan_emi'; @endphp
                      <td class="amounttext">@if($key == 0) {{digitChange($rqo->$loan_installment)}} @else {{digitChange(0)}} @endif</td>
                    @endforeach
                      <td >{{digitChange($total_two)}} </td>
                      <td colspan="5"> </td>
                    </tr>
                    <tr>
                    <td colspan="3"></td>
                    @foreach($month_name AS $key => $month)
                      <td class="amounttext">@if($key == ($total_ins_amt_month-4)) {{digitChange($total_ins_amt)}} @else {{digitChange(0)}} @endif</td>
                    @endforeach
                      <td >{{digitChange($total_ins_amt)}} </td>
                      <td >{{digitChange($total_ins_interest)}} </td>
                      <td colspan="4"></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</body>

</html>
