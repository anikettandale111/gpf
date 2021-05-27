<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>{{ config('app.name') }} </title>
    <link href=" {{ URL('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href=" {{ URL('css/main.css') }}" rel="stylesheet">

    <meta charset="UTF-8">

  <style>
  body
  {
    background: #fff;
  }
  h2
  {
    font-size:28px;
    font-weight: bold;
    text-align:center;
  }
  p label
  {
    font:24px;
    font-weight: bold;
    text-align:center;
  }
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    border-color: black;
  }
  th, td {
    padding: 8px;
    font-size: 15px;
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
  @media all {
    .page-break { display: none; }
  }
  @media print {
    .pagebreak { page-break-before: always; }
    thead,tbody{
      page-break-inside:avoid;
      /* page-break-after:auto; */
      position:relative;
      display:block;
    }
  }
  </style>
</head>
@php
use App\BillExpenses;
@endphp
<body>
          <p>
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>

            <label>भ नि.नि कर्मचाऱ्यांना  पारित केलेल्या रक्कमांचा तपशील बिल क्रमांक -  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</label>
          </p>

          <hr>

              <table class="table" width="100%">
                @php
                $alltotal = 0;
                $rowcount=1;
                $billExpensesReport;
                @endphp
                @if(count($talukaData))
                <tbody>
                  <tr>
                    <th>अनु.क्र</th>
                    <th>कर्मचारी भ.नि.नि.क्रं/नाव//हुद्दा</th>
                    <th>अग्रीमाचे प्रयोजन</th>
                    <th>परतावा / नापरतावा</th>
                    <th>शिल्लक / मंजूररक्कम रक्कम</th>
                    <th>बँकेची माहिती</th>
                    <th>प्राधिकारी अधिकारी</th>
                  </tr>
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
                    @php $rowcount++; @endphp
                    @if(!($rowcount % 10))
                  </tbody>
                </table>
              <div class="pagebreak"> </div>
              <table class="table" width="100%">
                <tbody>
                  <tr>
                    <th>अनु.क्र</th>
                    <th>कर्मचारी भ.नि.नि.क्रं/नाव//हुद्दा</th>
                    <th>अग्रीमाचे प्रयोजन</th>
                    <th>परतावा / नापरतावा</th>
                    <th>शिल्लक / मंजूररक्कम रक्कम</th>
                    <th>बँकेची माहिती</th>
                    <th>प्राधिकारी अधिकारी</th>
                  </tr>
                  @endif
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
                    <td colspan="7" style="text-align:right;"><br><br><br> मुख्य लेखा व वित्त अधिकारी <br>जिल्हा परिषद, नाशिक </td>
                  </tr>
                </tbody>
                @endif
              </table>
            {{$rowcount}}

  </body>
  </html>
