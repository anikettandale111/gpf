<html lang="en">
<head>
  <link href=" {{ URL('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href=" {{ URL('css/main.css') }}" rel="stylesheet">
  <link href="{{URL('asset/build/css/custom.min.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <style>
  table, td, th {
    border: 1px solid #ddd;
    text-align: left;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    padding: 15px;
  }
  p,b,span,label{
    font-size: 18px;
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
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-12" style="text-align: center;">
            <h2>
              <b>जिल्हा परिषद नाशिक </b>
            </h2>
            <h2>
              <b>भविष्य निर्वाह निधी वार्षिक जमा (चलननिहाय) ({{digitChange(session()->get('financial_year'))}})</b>
            </h2>
          </div>
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <label> खाते क्रमांक :- {{$rqo_result->inital_letter}}{{digitChange($rqo_result->gpf_no)}} </label>
              </div>
              <div class="col-md-6" style="text-align: center;">
                <label> कर्मचाऱ्याचे नाव :- {{$rqo_result->employee_name}}</label>
              </div>
            </div>
          </div>
        </div>
      </div>
        @php
          $monthly_contrubition=0;
          $loan_installment=0;
          $monthly_other=0;
        @endphp
      <div class="col-sm-12">
        <div class="card-box ">
          <div class="row">
            <table style="width:100%">
              <thead>
              <tr>
                <th>अनु.क्र</th>
                <th>चलन क्र</th>
                <th>महिना</th>
                <th>विभाग, तालुका</th>
                <th>वर्गणी</th>
                <th>परतावे</th>
                <th>इतर</th>
                <th>एकूण</th>
              </tr>
              </thead>
              <tbody>
                @if(count($chalanQuery))
                  @foreach($chalanQuery AS $key => $value)
                <tr>
                  <th>{{$key+1}}</th>
                  <th>{{$value->month_name}} {{$value->challan_number}}</th>
                  <th>{{$value->month_name}}</th>
                  <th>{{$value->month_name}}</th>
                  <th>{{$value->monthly_contrubition}}</th>
                  <th>{{$value->loan_installment}}</th>
                  <th>{{$value->monthly_other}}</th>
                  @php
                    $monthly_contrubition += $value->monthly_contrubition;
                    $loan_installment += $value->loan_installment;
                    $monthly_other += $value->monthly_other;
                    $total = $value->monthly_contrubition + $value->loan_installment + $value->monthly_other
                  @endphp
                  <th>{{$total}}</th>
                </tr>
                  @endforeach
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>{{$monthly_contrubition}}</th>
                    <th>{{$loan_installment}}</th>
                    <th>{{$monthly_other}}</th>
                    <th>{{$monthly_contrubition+$loan_installment+$monthly_other}}</th>
                  </tr>
                @endif
              </tbody>
            </tabel>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
