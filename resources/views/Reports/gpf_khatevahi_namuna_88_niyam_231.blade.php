<html lang="en">
<head>
  <link href=" {{ URL('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{ URL('css/main.css') }}" rel="stylesheet">
  <link href="{{URL('asset/build/css/custom.min.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
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
  .amounttext{
      text-align: right;
  }
  h4 {

    font-size: 12px;
  }
  .x_title {
    border-bottom: 2px solid #101011;
    margin-bottom: 10px;
  }
  @media print {
  p {page-break-after: always;}
 }
  </style>
</head>
<body class="nav-md">
@if(count($rqo_result))
@foreach($rqo_result AS $rqo)
    @if(isset($rqo->gpf_number) && $rqo->gpf_number > 0)
<div class="col-md-12 col-sm-12 "><div class="x_panel"><div class="x_content"><div class="row">      <div class="col-md-2"><img src="{{URL('asset/images/zp-nashik-bharti.jpg') }}" width="120"></img></div><div class="col-md-8" style="text-align: center;"><h2><b>जिल्हा परिषद नाशिक </b></h2><h2> <b>भविष्य निर्वाह निधी खातेवही नमुना नं. ८८ (नियम २३१ ) </b></h2><!-- <h2> <b>सन ({{digitChange(session()->get('year'))}})</b> </h2> --><h2> <b>सन ({{digitChange('2019-2020')}})</b> </h2></div><div class="col-md-2"><h2>{{digitChange(date('d/m/Y h:i:s'))}}</h2></div><div class="col-sm-12"><div class="card-box "><div class="card-box "><div class="x_title"></div><div class="col-md-2 lg-4"> <label> खाते क्रमांक :- {{$rqo->inital_letter}}{{digitChange($rqo->gpf_number)}} </label></div><div class="col-md-7" style="text-align: center;"> <label> कर्मचाऱ्याचे नाव :- {{$rqo->employee_name}}</label></div><div class="col-md-3 lg-4" style="text-align:end;"><label>पदनाम :- {{$rqo->designation_name}}</label></div><div class="col-md-6"><label>तालुका / मुख्यालयाचे नाव :- {{$rqo->taluka_name}}</label></div><div class="col-md-6 " style="text-align: end;"><label>विभाग /कार्यालयाचे नाव :- {{$rqo->department_name}}</label></div></div>@php $otherInstall = DB::table('master_vetan_ayog_received AS va')->select('va.instalment','va.DiffAmt','va.Interest')->where(['va.GPFNo' =>$rqo->gpf_number,'va.Year'=>2019])->get();
                $tcount = count($otherInstall);
                $ins_one = 0;
                $ins_two = 0;
                $ins_thre = 0;
                $ins_four = 0;
                $ins_five = 0;
                $html = '';
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
                    @endphp
                    @endfor
                @endif<table style="width:100%"><tr><th>माहे </th><th>मासिक वर्गणी </th><th> कर्ज वसुली हप्ता</th><th>एकूण जमा </th><th> कर्ज रक्कम</th><th>मासिक जमा </th><th>शेरा </th></tr><thead></thead><tbody>@php
                  $opening_balance = $rqo->opening_balance;
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
                  @foreach($month_name AS $month)
                    @php
                    $monthly_contrubition = $month->trans_month.'_contri';
                    $loan_installment = $month->trans_month.'_loan_emi';
                    $monthly_other = $month->trans_month.'_other';
                    $monthly_received = $month->trans_month.'_recive';
                    $loan_amonut = $month->trans_month.'_loan';
                    $six_pay = $month->trans_month.'_six_pay';
                    $seven_pay = $month->trans_month.'_seven_pay';
                    @endphp<tr><td>{{$month->month_name}}</td><td class="amounttext">{{digitChange($rqo->$monthly_contrubition)}}</td><td class="amounttext">{{digitChange($rqo->$loan_installment)}}</td><td class="amounttext">{{digitChange($rqo->$monthly_contrubition+$rqo->$loan_installment)}}</td><td class="amounttext">{{digitChange($rqo->$loan_amonut)}}</td><td class="amounttext">{{digitChange($total += ($rqo->$monthly_contrubition - $rqo->$loan_amonut))}}</td><td></td></tr>@php
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
                  @endforeach</tbody><tfoot><tr><th></th><th class="amounttext">{{digitChange($total_one)}}</th><th class="amounttext">{{digitChange($total_two)}}</th><th class="amounttext">{{digitChange($total_three)}}</th><th class="amounttext">{{digitChange($total_four)}}</th><th class="amounttext">{{digitChange($total_six)}}</th><th></th></tr></tfoot></table><table style="width:100%"><tbody><tr><th> १ एप्रिल २०१९ - ची सुरवातीचा शिल्लक</th><th class="amounttext"> {{digitChange($rqo->opening_balance)}}</th><th> ६ वा वेतन हप्ता </th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th></tr><tr><td>वर्षातील एकूण जमा ( वर्णी व कर्ज हप्ता ) </td><td class="amounttext">{{digitChange($total_one)}}</td><td>रक्कम</td><td class="amounttext">{{digitChange($ins_one)}}</td><td>{{digitChange($ins_two)}}</td><td class="amounttext">{{digitChange($ins_thre)}}</td><td class="amounttext">{{digitChange($ins_four)}}</td><td class="amounttext">{{digitChange($ins_five)}}</td></tr>@php
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
                        $total_con_two = $total_con; @endphp
                        @for($k=$row->to_month; $k <= 12 ; $k++)
                        @php $acc_mm = $month_array[$k];
                          $total_con_two += ($total_gpf['contribution'][$acc_mm] + $total_gpf['loan_installment'][$acc_mm] ) - $total_gpf['loan_amonut'][$acc_mm];
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
                  @endif<tr><td>वर्षातील जमा रकमेवर व्याज </td><td class="amounttext">{{digitChange($total_intrest)}}</td><td colspan="3"> ६ वा वेतन हप्ता रक्कम एकूण </td><td colspan="3" class="amounttext">{{digitChange($total_ins_amt)}}</td>
                  </tr>
                  <tr><td>जमा रक्कम </td><td class="amounttext">{{digitChange(($rqo->opening_balance+$total_one+$total_two+$total_ins_amt+$total_ins_interest+$total_intrest))}}</td><td colspan="3" class="amounttext">व्याजदर {{getMonthName(4)}} @if(count($roi_result))
                      @foreach($roi_result AS $rowroi)
                      {{getMonthName($rowroi->to_month)}}
                      {{$rowroi->percent}}
                      @endforeach
                      {{getMonthName(3)}}
                      @endif</td><td colspan="3"></td></tr><tr><td>वर्षातील काढून घेतलेल्या रकमा </td><td class="amounttext">{{digitChange($total_four)}}</td></tr></tbody></table><div class="col-md-12 mt-3"><label> दिनांक ३१ मार्च २०२० - अखेर शिल्लक रक्कम रु . {{digitChange(($rqo->opening_balance+$total_one+$total_two+$total_ins_amt+$total_ins_interest+$total_intrest)-$total_four)}} </label></div><div class="col-md-12">  <label> अक्षरी रु .{{convertToIndianCurrency(($rqo->opening_balance+$total_one+$total_two+$total_ins_amt+$total_ins_interest)-$total_four)}} </label></div><div class="col-md-12 mt-2"><h4 class="text-center mt-3" style="border: 1px solid black;padding-block: 8px;"> <b>७ वा वेतन आयोग फरक जमा </b></h4><table style="width:100%"><thead><tr><th>हप्ता नं </th><th> महिना / वर्ष</th><th> व्याज देय दिनांक</th><th> रक्कम </th><th> वर्ष १ व्याज </th><th> वर्ष २ व्याज </th><th> एकूण व्याज </th><th>वार्षिक जमा</th><th>अनाहरणीय </th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table><br></div><div class="col-md-12 mt-12" style="text-align:end;"><br><br><div class="row" style="text-align:center;"><div class="col-md-4 mt-4"><h2> खाते उतारा बनवणाराची सही</h2><h2> </h2></div><div class="col-md-4 mt-4"><h2> खाते उतारा तपासणाराची सही </h2><h2></h2></div><div class="col-md-4 mt-4"><h2> उपमुख्य लेखा वा वित्त अधिकारी</h2><h2> जिल्हा परिषद नाशिक </h2></div></div><div class="row"><h2><b> टीप :- </b> वरील हिशोबामध्ये काही तफावत आढळल्यास १५ दिवसांच्या आत नाशिक परिषद वित्त विभागाशी आपल्या खातेप्रमुखामार्त संपर्क साधावा .</h2></div></div></div></div></div></div></div></div><p>&nbsp;</p>
@endif
@endforeach
@endif
</body></html>
