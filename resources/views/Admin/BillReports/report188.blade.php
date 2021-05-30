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
          <!-- <div class="col-md-12" style="text-align:center;">
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
          </div> -->
          <div class="col-md-12" style="text-align:end;">
            <h2> <b>BILL NO. -:  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</b> </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="text-align:center;">
            <span style="font-size: 16px;font-weight: bold;">188 SLIP</span><br>
            <span style="font-size: 16px;font-weight: bold;">SLIP TO ACCOMPANY CLAIM FOR MONEY DISBURSING</span><br>
            <span style="font-size: 16px;font-weight: bold;">( TO BE RETURN IN ORIGINAL BY THE TREASURY OFFICER )</span><br>
            <div class="row">
              <div class="col-md-6">
                <span class="pull-left"> ADDMIMISTRATIVE DEPARMENT </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">RURAL DEVELOPMENT DEPARMENT</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> DEMAND NO SECTOR </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">L - 1</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> SUB SEVTOR </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left"></span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> MAJOR HEAD </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">K- DEPOSTTS AND ADVANCES</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> MINOR HEAD </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">C – DEPOSITS BEARING INTERESTS</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> SUB HEAD </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">8336 – CIVIL DEPOSITS</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> DETAILED HEAD </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">800 – OTHER DEPOSITS</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> SUBJECT OF </span>
              </div>
              <div class="col-md-6">
                <span class="pull-left">Z.P.EMPLOYEES PROVIDENT FUND</span><br>
              </div>
              <div class="col-md-6">
                <span class="pull-left"> EXPENDITURE </span>
              </div><br>
              <div class="col-md-6">
                <span class="pull-left">NZP/GPF/ADVANCES TO Z.P.EMPLOYEES</span><br>
              </div><br>
              <span class="pull-left">TO BE FILLED IN THE F.D. / B.D.O.</span>
            </div>
          </div>
          <hr style="border: solid black;width:100%"/>
          <div class="row">
            <div class="col-md-6">
              <span class="pull-left">TO, </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left"> TO, </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left">THE TREASURY OFFICER NASIK </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left"> CHIFE ACCOUNTING & FINANCE OFFICER ZILLA PARISHAD NASIK  </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left">PLEASE FURNISHED THE Z.P. VOUCHER NO.  </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left"> RETURNED WITH Z.P. / P.S. </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left">AND DT.OF THE BILL SENT BILL ENCASHMENT </span>
            </div>
            <div class="col-md-6">
              <span class="pull-left"> AND DATE AS NOTED BELOW </span>
            </div>
            <div class="col-md-6" style="margin-top:50px;">
              <span class="pull-left"><b>CHIEF ACCOUNTING & FINANCE OFFICER </b><br><b><center>ZILLA PARISHAD, NASHIK</center></b></span><br>
            </div>
            <div class="col-md-6" style="margin-top:50px;">
              <span class="pull-right"><b>TREASURY OFFICER,</b><br><b><center>NASHIK</center></b></span><br>
            </div>
          </div>
          <hr style="border: solid black;width:100%"/>
          <div class="row">
            <div class="col-md-12">
              <span class="pull-left">Total Rupees. {{amount_inr_format($billExpenses)}}/-   {{convertToIndianCurrency($billExpenses)}} </span>
            </div>
            <div class="col-md-12">
              <span class="pull-left">
                Bill particular gross amount paid _______________________________
              </span>
            </div>
            <div class="col-md-12">
              <span class="pull-left">
                Net amount ______________________________________________
              </span>
            </div>
            <div class="col-md-12">
              <span class="pull-right">
                t.v.no.___________________
              </span>
            </div>
            <div class="col-md-12">
              <span class="pull-right">
                date ____________________
              </span>
            </div>
            <div class="col-md-12">
              <span class="pull-right">
                Signature ________________
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <span class="pull-left">No.</span>
            </div>
            <div class="col-md-12">
              <span class="pull-left">Signature of the Accountant</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
