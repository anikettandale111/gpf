<html lang="en">
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
      /* display:block; */
    }
  }
  </style>
</head>
<body class="nav-md">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-12" style="text-align: center;">
            <h2>
              <b>जिल्हा परिषद नाशिक </b>
            </h2>
            <h2>
              <b>भविष्य निर्वाह निधी मासिक चलन व खतावणी अहवाल ({{digitChange(session()->get('financial_year'))}})</b>
            </h2>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card-box ">
          <div class="row">
            <table class="table" width="100%">
              <thead>
                <tr>
                  <th>अनु.क्र</th>
                  <th>विभाग/पं.स.</th>
                  <th>महिना / चलन क्र.</th>
                  <th>दिनांक</th>
                  <th>चलन रक्कम</th>
                  <th>वर्गणी खतावणी रक्कम</th>
                  <th>६/७ पे रक्कम</th>
                  <th>महिना</th>
                  <th>एकूण फरक</th>
                </tr>
              </thead>
              <tbody>
                @php $rowcount=1; 
                $totalchallan = 0;
                $totalkatavani = 0 ;
                $totalsixsev = 0;
                $totalrakkam =0;
                @endphp
                @if(count($deposits_two))
                  @foreach($deposits_two AS $key => $row)
                      @php
                         $totalchallan += $row->amount;
                        $totalkatavani += ($row->amount - $row->diff_amount);
                        $totalsixsev += $row->monthly_contrubition;
                        $totalrakkam +=$row->diff_amount;
                      @endphp
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->taluka_name}}</td>
                      <td>{{$row->chalan_no}}</td>
                      <td>{{$row->chalan_date}}</td>
                      <td>{{$row->amount}}</td>
                      <td>{{($row->amount - $row->diff_amount)}}</td>
                      <td>{{$row->monthly_contrubition}}</td>
                      <td>{{$row->month_name}}</td>
                      <td>{{$row->diff_amount}}</td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
              <tfoot>
                  <tr>
                      <th colspan="4" align="right" style="text-align: right;">TOTAL</th>
                      <th>{{$totalchallan}}</th>
                      <th>{{$totalkatavani}}</th>
                      <th>{{$totalsixsev}}</th>
                      <td>&nbsp;</td>
                      <th>{{$totalrakkam}}</th>
                  </tr>
              </tfoot>
            </tabel>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
