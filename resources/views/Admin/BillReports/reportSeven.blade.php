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
  label
  {
    font-size:24px;
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
    /* thead,tbody{
      position:relative;
      display:block;
    } */
  }
  </style>
</head>
@php
use App\BillExpenses;
@endphp
<body>
  <div style="text-align:center">
    <h2> <b>जिल्हा परिषद नाशिक </b> </h2>

    <label>भ नि.नि कर्मचाऱ्यांना पारित केलेल्या रक्कमांचा अंतिम तपशील अहवाल क्रमांक - ७ </label><br><label> बिल क्रमांक -  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{digitChange($billDetails->bill_no)}} @endif</label>
  </div>
  <hr>
  <table class="table" width="100%">
    @php
    $alltotal = 0;
    $rowcount=1;
    $billExpensesReport;
    @endphp
      <thead>
      <tr>
        <th>अनु.क्र</th>
        <th>अंतिम केल्याची दिनांक</th>
        <th>कर्मचारी भ.नि.नि.क्रं/नाव//हुद्दा</th>
        <th>अग्रीमाचे प्रयोजन</th>
        <th> मंजूररक्कम रक्कम</th>
        <th> एकूण रक्कम</th>
      </tr>
      </thead>
    <tbody>
      @if(count($billExpenses))
        @foreach($billExpenses AS $key => $tal_row)
        <tr>
          <td>{{ digitChange($key+1) }}</td>
          <td>{{ digitChange(date('d-m-Y',strtotime($billDetails->check_date)))}}</td>
          <td>{{digitChange($tal_row->gpf_no) }}<br>{{ $tal_row->user_name }}<br>{{ $tal_row->user_department}}</td>
          <td>{{$tal_row->loan_agrim_pryojan}}</td>
          <td>{{digitChange(amount_inr_format($tal_row->required_rakkam))}}</td>
          <td>{{digitChange(amount_inr_format($tal_row->required_rakkam))}}</td>
          @php $alltotal += $tal_row->required_rakkam; @endphp
        </tr>
        @endforeach
        <tr>
          <td colspan="4">एकूण </td>
          <td>{{digitChange(amount_inr_format($alltotal))}}</td>
          <td>{{digitChange(amount_inr_format($alltotal))}}</td>
        </tr>
      @endif
      </tbody>
    </table>
  </body>
  </html>
