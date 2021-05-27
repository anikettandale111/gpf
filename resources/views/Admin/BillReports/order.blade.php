<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <head>
    <title>{{ config('app.name') }} </title>
    <link href=" {{ URL('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href=" {{ URL('css/main.css') }}" rel="stylesheet">
    <link href="{{URL('asset/build/css/custom.min.css')}}" rel="stylesheet">
    <meta charset="UTF-8">
  </head>
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
  .pull-left , .pull-right{
    font-size: 15px;
    font-weight: bold;
  }
  .pull-left{
    margin-left: 80px;
  }
  .pull-right{
    margin-right: 80px;
  }
  .para{
    text-indent: 50px;
    padding: 15px;
    padding-left: 100px;
    padding-right: 100px;
    font-size: : 16px;
  }
  @media screen,print
  {
    .test {
      background:#0F0;
      width:500px;
      height:200px;
    }
  }
  </style>
</head>
<body class="nav-md" >
  <div class="col-md-12 col-sm-12 " >
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-12" style="text-align:end;">
            <h2> <b>BILL NO. -:  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</b> </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <span style="font-size: 16px;font-weight: bold;">READ – GOV.NOTIFICATION NO.GPF/1088/2161/C.R.553/17</span><br>
            <span style="font-size: 16px;font-weight: bold;">MANTRALAYA MUMBAI – 400032 DATED.15/6/93</span><br>
            <span style="font-size: 16px;font-weight: bold;">AUTHORIZATION SLIP NO </span><br>
            <span style="font-size: 16px;font-weight: bold;">DATE</span><br>
          </div>
          <div class="row">
            <div class="col-md-12">
              <center><h3><b>ORDER</b></h3></center>
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-4">
              <span style="font-size:16px"><b>NASIK ZILLA PARISHAD NASIK</b></span><br>
              <span style="font-size:16px"><b>NO/ZP/FD/GPF/BILL/1/         /20</b></span><br>
              <span style="font-size:16px"><b>NASIK DATE.     /     /20</b></span><br>
            </div>
            <div class="col-md-12">
              <p class="para" style="font-size: 16px;"> SANCTION IS HERBY ACCOURDED FOR TOTAL {{amount_inr_format($billExpenses)}} /-  {{mb_strtoupper(convertToIndianCurrency($billExpenses))}} . TOWARDS GENERAL PROVIDENT FUND ADVANCES / FINAL WITHDRAWALS AND TRANSFERS OF  THE AMOUNT REGARDING Z.P.EMPLOYESS AS PER THE LIST ENCLOSED HERWITH. </p>
            </div>
            <div class="col-md-12">
              <span class="pull-left">ACCOUNT  - DEMAND NO.L – 1</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">HEAD – 8336 – CIVIL DEPOSITS</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">RURAL DEVELOPMENT DEPARTMENT</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">K- DEPOSTTS AND ADVANCES</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">C – DEPOSITS BEARING INTERESTS</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">800 – OTHER DEPOSITS</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">Z.P.EMPLOYEES PROVIDENT FUND</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">NZP/GPF/ADVANCES TO Z.P.EMPLOYEES</span><br>
            </div>
            <div class="col-md-12">
              <span class="pull-left">833600115003</span><br>
            </div>
            <div class="col-md-12" style="margin-top:50px;">
            <div class="col-md-4">
              <span class="pull-left">Chief Accounts & Finance Office
                <br><center>Zilla Parishad, Nashik.</center>
              </span>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
              <span class="pull-left">Copy C.W.C.S. <br>
              Dist. Treasury Officer, Nashik </span>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
