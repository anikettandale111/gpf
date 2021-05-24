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
  </style>
</head>
<body class="nav-md">
  <div class="col-md-12 col-sm-12 " >
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-12" style="text-align:center;">
            <h2> <b>COMPUTER SLIP </b> </h2>
          </div>
          <div class="col-md-12" style="text-align:end;">
            <h2> <b>BILL NO. -:  @if(isset($billDetails->bill_no) && $billDetails->bill_no !== '') {{$billDetails->bill_no}} @endif</b> </h2>
          </div>
          <div class="col-md-12" style="text-align:center;">
            <span style="font-size: 16px;font-weight: bold;">जोडपत्र - ड</span><br>
            <span style="font-size: 16px;font-weight: bold;">को.सं - ३ (सहायक अनुदान देयके)</span><br>
            <span style="font-size: 16px;font-weight: bold;">T.C. 3 (Grant-in-Aid Bill)</span><br>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-9"><br><span>GOVERNMENT OF MAHARASHTRA</span></div>
              <div class="col-md-3">
                <table width="100%">
                  <tr><td colspan="4">FOR  USE OF TREASURY</td></tr>
                  <tr><td></td><td></td><td></td><td></td></tr>
                </table>
              </div>
              <div class="col-md-6">
                <table width="100%">
                  <tr><td>TR CODE</td><td>5</td><td>1</td><td>0</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                  <tr><td>DDO CODE NO.</td><td>0</td><td>3</td><td>2</td><td>6</td><td></td><td></td><td></td><td></td><td></td></tr>
                  <tr><td>Head of acc.code.</td><td>8</td><td>3</td><td>3</td><td>6</td><td>0</td><td>0</td><td>1</td><td>1</td><td>5</td></tr>
                </table>
              </div>
              <div class="col-md-3"></div>
              <div class="col-md-3 mt-2" >
                <table width="100%">
                  <tr><td style="width:40%">Date</td><td style="width:20%"></td><td style="width:20%"></td><td style="width:20%">{{date('Y')}}</td></tr>
                </table>
              </div>
              <div class="col-md-6">
              </div>
              <div class="col-md-3 mt-2"></div>
              <div class="col-md-3 mt-2">
                <table width="100%">
                  <tr><td>CONSOLIDATED FUND</td></tr>
                  <tr><td></td></tr>
                </table>
              </div>
            </div>
          </div>
          <hr style="border: solid black;width:100%"/>
          <div class="row">
            <div class="col-md-12">
              <center><span style="font-size: 16px;font-weight: bold;">HEAD OF ACCOUNT</span></center>
            </div>
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
          </div>
          <hr style="border: solid black;width:100%"/>
          <div class="col-md-12" >
            <div class="col-md-6">
              <table width="100%">
                <tbody>
                  <tr>
                    <td colspan="2">Amount</td>
                    <td colspan="10">Head of Account Code No.</td>
                    <td colspan="2">Object of expnditure Code No.</td>
                  </tr>
                  <tr>
                    <td>Plan</td>
                    <td>Non Plan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr >
                    <td></td>
                    <td></td>
                    <td>8</td>
                    <td>3</td>
                    <td>3</td>
                    <td>6</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>5</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <table width="100%">
                <tbody>
                  <tr>
                    <td colspan="2">Sub Detailed Head</td>
                    <td>Rs.</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Salary</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Wages</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>D.A.Grant</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Pension</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Other exp.</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Repayment of Intrest</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Repayment of Intrest</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Other Payment</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Total</td>
                    <td>{{amount_inr_format($billExpenses)}}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>{{amount_inr_format($billExpenses)}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <hr style="border: solid black;width:100%"/>
          <div class="row mt-3">
            <div class="col-md-12">
              <b><span class="pull-right">Chief Accounts & Finance Officer,<br>Zilla Parishad, Nashik</span></b>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <b><span class="pull-left">Notes</span></b>
              <span class="pull-left">1. The amount againes the item (Total) claim on the left hand side of the from is to be transferred in the coloummn for amount on the computer slip .</span><br>
              <span class="pull-left">2. Strike off whatever not applicable.</span>
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
