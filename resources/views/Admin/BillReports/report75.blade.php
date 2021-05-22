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
@php
use App\BillExpenses;
@endphp
<body class="nav-md" >
  <div class="col-md-12 col-sm-12 " >
    <div class="x_panel">
      <div class="x_content">
        <div class="row" style="text-align:center;">
          <div class="col-md-12" >
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="text-align:center;">
            <label>भ नि.नि कर्मचाऱ्यांना  पारित केलेल्या रक्कमांचा तपशील बिल क्रमांक -  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif
            <!-- दिनांक -: @if(isset($billDetails->bill_date) && $billDetails->bill_date !== '') {{ date("d-m-Y", strtotime($billDetails->bill_date)) }} @endif </label> -->
          </div>
        </div>
        <hr>
        <div class="col-sm-12">
          <div class="card-box">
            <table>
              <thead>
                <tr>
                  <th>अनु.  क</th>
                  <th>कर्मचारी भ.नि.नि.क्रं/नाव//हुद्दा</th>
                  <th>अग्रीमाचे प्रयोजन</th>
                  <th>परतावा / नापरतावा</th>
                  <th>शिल्लक / मंजूररक्कम रक्कम</th>
                  <th>बँकेची माहिती</th>
                  <th>प्राधिकारी अधिकारी</th>
                </tr>
              </thead>
              @php
              $alltotal = 0;
              $billExpensesReport;
              @endphp
              <tbody>
                @foreach($talukaData AS $tal_row)
                @php
                $billExpensesReport = BillExpenses::where(['bill_id'=>$billid,'taluka_id'=>$tal_row->id])->get();
                $talukatotal = 0;
                @endphp
                @if(count($billExpensesReport))
                <tr>
                  <td colspan="7"><center>म.गट विकास अधिकारी,पंचायत समिती ,{{ $tal_row->taluka_name}}</center></td>
                </tr>
                @foreach($billExpensesReport AS $key => $expenses)
                <tr>
                  <td>{{($key+1)}}</td>
                  <td><b>{{$expenses->gpf_no}}</b><br>{{$expenses->user_name}}<br>{{$expenses->user_designation}}<br>{{$expenses->user_taluka_name}}</td>
                  <td>{{$expenses->loan_agrim_pryojan}}</td>
                  <td>{{$expenses->loan_agrim_niyam}}</td>
                  <td>{{digitChange(amount_inr_format($expenses->shillak_rakkam))}}<hr>
                    <br>{{digitChange(amount_inr_format($expenses->required_rakkam))}}</td>
                    <td>{{$expenses->bank_name}}<br>{{$expenses->bank_ifsc_name}}<br>{{$expenses->bank_acc_number}}  </td>
                    <td>{{('DY .CA & FO')}}</td>
                  </tr>
                  @php $talukatotal = $talukatotal + $expenses->required_rakkam @endphp
                  @php $alltotal = $alltotal + $expenses->required_rakkam @endphp
                  @endforeach
                  <tr>
                    <td colspan="4"></td>
                    <td>ऐकूण - {{digitChange(amount_inr_format($talukatotal))}}</td>
                    <td colspan="2"></td>
                  </tr>
                  @endif
                  @endforeach
                  <tr>
                    <td colspan="1">ऐकूण - रुपये </td>
                    <td colspan="6">{{digitChange(amount_inr_format($alltotal))}}<hr><br>Total {{convertToIndianCurrency($alltotal)}}</td>
                  </tr>
                  <tr>
                    <td colspan="7" style="text-align:right"> मुख्य लेखा व वित्त अधिकारी <br>जिल्हा परिषद, नाशिक </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
