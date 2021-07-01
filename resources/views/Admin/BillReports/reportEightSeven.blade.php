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
    thead,tbody{
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
  <div style="text-align:center">
    <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
    <label>भ नि.नि कर्मचाऱ्यांना  पारित केलेल्या रक्कमांचा तपशील बिल क्रमांक -  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</label>
  </div>
  <hr>
  <table class="table" width="100%">
    @php
    $chalan_total_amount = 0;
    $chalan_expenses_received = 0;
    $diffrence_amount = 0;
    $bill_total_amount = 0;
    $bill_expenses_received = 0;
    $bill_diffrence_amount = 0;
    $rowcount=1;
    $billExpensesReport;
    @endphp
    <thead>
      <tr>
        <th> अनु.क्र </th>
        <th> महिना </th>
        <th>जमा जि.प.नाशिक</th>
        <th>जमा कोषागार,नाशिक</th>
        <th>तफावत</th>
        <th>खर्च जि.प.नाशिक</th>
        <th>खर्च कोषागार नाशिक </th>
        <th>तफावत</th>
      </tr>
    </thead>
    <tbody>
    @if(count($chalanExpenses))
      @foreach($chalanExpenses As $key => $value )
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$value['month_name']}}</td>
          <td>{{$value['chalan_total_amount']}}</td>
          <td>{{$value['chalan_expenses_received']}}</td>
          <td>{{($value['chalan_total_amount'] - $value['chalan_expenses_received'])}}</td>
          <td>{{$value['bill_amount']}}</td>
          <td>{{$value['bill_expenses']}}</td>
          <td>{{($value['bill_amount'] - $value['bill_expenses'])}}</td>
          @php
            $chalan_total_amount += $value['chalan_total_amount'];
            $chalan_expenses_received += $value['chalan_expenses_received'];
            $diffrence_amount += $value['chalan_total_amount'] - $value['chalan_expenses_received'];

            $bill_total_amount += $value['bill_amount'];
            $bill_expenses_received += $value['bill_expenses'];
            $bill_diffrence_amount += $value['bill_amount'] - $value['bill_expenses'];
          @endphp
        </tr>
      @endforeach
      <tr>
          <td colspan="2">
          <td> {{$chalan_total_amount}} </td>
          <td> {{$chalan_expenses_received}} </td>
          <td> {{$diffrence_amount}} </td>
          <td> {{$bill_total_amount}} </td>
          <td> {{$bill_expenses_received}} </td>
          <td> {{$bill_diffrence_amount}} </td>
      </tr>
    @endif
    </tbody>
  </table>
</body>
</html>
