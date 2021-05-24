<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="en">
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
          <div class="col-md-12" style="text-align:center;">
            <h2> <b> MTR 52 - A </b> </h2>
          </div>
          <div class="col-md-12" style="text-align:end;">
            <h2> <b>GPF BILL NO. -:  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</b> </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-9"></div>
            <div class="col-md-3">
              <table width="100%">
                <tr><td colspan="4">FOR  USE OF TREASURY</td></tr>
                <tr><td colspan="2">VR.NO.</td><td colspan="2">DATE</td></tr>
              </table>
            </div>
            <div class="col-md-6">
              <span>GOVERNMENT OF MAHARASHTRA</span>
              <table width="100%">
                <tr><td>TR CODE</td><td>5</td><td>1</td><td>0</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                <tr><td>DDO CODE NO.</td><td>0</td><td>3</td><td>2</td><td>6</td><td></td><td></td><td></td><td></td><td></td></tr>
                <tr><td>Head of acc.code.</td><td>8</td><td>3</td><td>3</td><td>6</td><td>0</td><td>0</td><td>1</td><td>1</td><td>5</td></tr>
              </table>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 mt-2" >
              <table width="100%">
                <tr><td>Bill No.</td><td>@if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</td></tr>
              </table>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="col-md-2">
              <table width="100%" height="20%">
                <tr><td colspan="4">SIMPLE RECIPT</td></tr>
                <tr><td colspan="4"></td></tr>
              </table>
            </div>
            <div class="col-md-4">
              <table width="100%" height="20%">
                <tr><td colspan="4">TOKEN NO</td></tr>
                <tr><td>DATE</td><td colspan="3"></td></tr>
              </table>
            </div>
            <div class="col-md-6">
              <table width="100%" height="20%">
                <tr><td colspan="4">NAME OF TREASURY/SUB TREASURY NASHIK</td></tr>
                <tr><td colspan="4"></td></tr>
              </table>
            </div>
          </div>
        </div>
        <hr style="border: solid black;width:100%"/>
        <div class="row">
          <div class="col-md-6">
            <center><span style="font-size: 16px;font-weight: bold;">HEAD OF ACCOUNT</span></center>
          </div>
          <div class="col-md-6">
            <table width="100%">
              <tr><td colspan="6" style="text-align:center">CONTINGENCY FUND</td></tr>
              <tr><td colspan="6" style="text-align:center">CONSOLIDATED FUND</td></tr>
              <tr><td colspan="6" style="text-align:center"></td></tr>
            </table>
          </div>
          <div class="col-md-6">
            <span class="pull-left"> DEMAND NO SECTOR </span>
          </div>
          <div class="col-md-6">
            <span class="pull-left">RURAL DEVELOPMENT DEPARMENT<br>
              L - 1</span>
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
          </div>
          <hr style="border: solid black;width:100%"/>
          <div class="row" style="margin-left: 30px;margin-right: 30px;">
            <div class="col-md-6">
              <label for=""> RECEIVED THE SUM OF Rs. {{amount_inr_format($billExpenses)}}/- </label><br>
              <p>RS.= {{amount_inr_format($billExpenses)}}/-  {{mb_strtoupper(convertToIndianCurrency($billExpenses))}} ON ACCOUNT OF NZP/GPF ADVANCES SANCTIONED BY C.A.&F.O.Z.P.NASIK UNDER HIS NO.ZPN / GPF/1 /         /20<br></p>
              <p>DATED .       /         / 20</p>
              <br>
              <span style="float:right">
                <b>Chief Accounts & Finance Officer,<br>
                  Zilla Parishad, Nashik.<br>
                </b>
              </span>
              <br>
            </div>
            <div class="col-md-6">
              <table width="100%">
                <tbody style="text-align: center;">
                  <tr>
                    <td colspan="4">Amount</td>
                  </tr>
                  <tr>
                    <td colspan="2">Plan</td>
                    <td colspan="2">Non Plan</td>
                  </tr>
                  <tr>
                    <td>Rs.</td>
                    <td>Rs.</td>
                    <td>Rs.</td>
                    <td>Ps.</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>{{amount_inr_format($billExpenses)}}</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>{{amount_inr_format($billExpenses)}}</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-12 mt-3">
              <span style="float:left">
                <b>Received Payment</b><br>
                <b>Place Nashik</b><br>
                <b>Date -  /  /{{date('Y')}}  </b>
              </span>
              <span style="float:right">
                <b>Chief Accounts & Finance Officer,<br>
                  Zilla Parishad,<br> Nashik. </b>
                </span>
              </div>
            </div>
            <hr style="border: solid black;width:100%"/>
            <div class="row">
              <div class="col-md-12 md-3">
                <b><center>FOR USE IN TREASURY</center></b>
              </div>
              <div class="col-md-12">
                <b>PAY IN CASH _________________________________________________________ /- (Rs.) </b>
              </div>
              <div class="col-md-12 mt-3">
                <span style="float:left">
                  <b>Examined Accountant Date</b><br>
                  <b> ____ /____ /{{date('Y')}}  </b>
                </span>
                <span style="float:right">
                  <b>TREASURY OFFICER / SUB TREASURY OFFICER </b>
                </span>
              </div>
            </div>
            <hr style="border: solid black;width:100%"/>
            <div class="row">
              <div class="col-md-4" style="border:2px solid black;">
                <p>
                  <b>CHEQUE DRAWN NO.<br></b>
                  <b>DATE</b>
                </p>
                <p class="mt-5" style="float:right">
                  <b>A.T.O</b>
                </p>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-4" style="border:2px solid black;">
                <p>
                  <b>CHEQUE DELIEVERED <br></b>
                  <b>DATE</b>
                </p>
                <p class="mt-5" style="float:right" >
                  <b>A.T.O</b>
                </p>
              </div>
              <div class="col-md-12">
                <center><b> STRIKE OFF WHICHEVER IS NOT APPLICABLE </b></center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
