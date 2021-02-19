<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('asset/images/favicon.ico') }}" type="image/ico" />
  <title>{{ config('app.name') }} </title>
  <!-- Bootstrap -->
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

  .x_title {
    border-bottom: 2px solid #101011;
    margin-bottom: 10px;
  }
  </style>
</head>

<body class="nav-md">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-2">
            <img src="{{asset('asset/images/zp-nashik-bharti.jpg') }}" width="120"></img>
          </div>
          <div class="col-md-8" style="text-align: center;">
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
            <h2> <b>भविष्य निर्वाह निधी खाते उतारा (नियम २३१ ) </b></h2>
            <h2> <b>सन ({{digitChange(session()->get('year'))}})</b> </h2>
          </div>
          <div class="col-md-2">
            <h2>{{digitChange(date('d/m/Y h:i:s'))}}</h2>
          </div>
          <div class="col-sm-12">
            <div class="card-box ">
              <div class="card-box ">
                <div class="x_title"></div>
                <div class="col-md-2 lg-4">
                  <label> खाते क्रमांक :- {{digitChange($result[0]->inital_gpf_number)}} </label>
                </div>
                <div class="col-md-7" style="text-align: center;">
                  <label> कर्मचाऱ्याचे नाव :- {{$emp_name[0]->employee_name}}</label>
                </div>
                <div class="col-md-3 lg-4" style="text-align:end;">
                  <label>पदनाम :- {{$result[0]->designation_name}}</label>
                </div>
                <div class="col-md-6">
                  <label>तालुका / मुख्यालयाचे नाव :- {{$result[0]->taluka_name}}</label>
                </div>
                <div class="col-md-6 " style="text-align: end;">
                  <label>विभाग /कार्यालयाचे नाव :- {{$result[0]->department_name}}</label>
                </div>
              </div>
              <table style="width:100%">
                <tr>
                  <th>माहे </th>
                  <th>मासिक वर्गणी </th>
                  <th> कर्ज वसुली हप्ता</th>
                  <th>इतर जमा </th>
                  <th>एकूण जमा </th>
                  <th> कर्ज रक्कम</th>
                  <th>शेरा </th>
                </tr>
                <thead>
                </thead>
                <tbody>
                  @php
                  $total_one = 0;
                  $total_two = 0;
                  $total_three = 0;
                  $total_four = 0;
                  $total_five = 0;
                  @endphp
                  @if(count($result))
                  @foreach($result as $row)
                  <tr>
                    <td>{{$row->month_name.'-'.digitChange($row->emc_year)}}</td>
                    <td>{{digitChange($row->monthly_contrubition)}}</td>
                    <td>{{digitChange($row->loan_installment)}}</td>
                    <td>{{digitChange($row->monthly_other)}}</td>
                    <td>{{digitChange($row->monthly_received)}}</td>
                    <td>{{digitChange($row->loan_amonut)}}</td>
                    <td>{{$row->remark}}</td>
                    @php
                    $total_one = $total_one+$row->monthly_contrubition;
                    $total_two = $total_two+$row->loan_installment;
                    $total_three = $total_three+$row->monthly_other;
                    $total_four = $total_four+$row->monthly_received;
                    $total_five = $total_five+$row->loan_amonut;
                    @endphp
                  </tr>
                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>{{digitChange($total_one)}} </th>
                    <th>{{digitChange($total_two)}}</th>
                    <th>{{digitChange($total_three)}}</th>
                    <th>{{digitChange($total_four)}}</th>
                    <th>{{digitChange($total_five)}}</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
              <table style="width:100%">
                <br>
                <tbody>
                  <tr>
                    <th> १ एप्रिल २०१९ - ची सुरवातीचा शिल्लक</th>
                    <th> {{digitChange($emp_name[0]->opening_balance)}}</th>
                    <th> ६ वा वेतन हप्ता </th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                  </tr>
                  <tr>
                    <td>वर्षातील एकूण जमा ( वर्णी व कर्ज हप्ता ) </td>
                    <td>{{digitChange($total_one)}}</td>
                    <td>रक्कम</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>वर्षातील जमा रकमेवर व्याज </td>
                    <td>{{digitChange($total_two)}}</td>
                    <td colspan="3"> ६ वा वेतन हप्ता रक्कम एकूण </td>
                    <td colspan="3">0</td>
                  </tr>
                  <tr>
                    <td>जमा रक्कम </td>
                    <td>{{digitChange($emp_name[0]->opening_balance+$total_one+$total_two)}}</td>
                    <td rowspan="3" colspan="6"></td>
                  </tr>
                  <tr>
                    <td>वर्षातील काढून घेतलेल्या रकमा </td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>

              <div class="col-md-12 mt-3">
                <label> दिनांक ३१ मार्च २०२० - अखेर शिल्लक रक्कम रु . {{digitChange($emp_name[0]->opening_balance+$total_one+$total_two)}} </label>
              </div>
              <div class="col-md-12">
                <label> अक्षरी रु . {{convertToIndianCurrency($emp_name[0]->opening_balance+$total_one+$total_two)}} </label>
              </div>

              <div class="col-md-12 mt-2">
                <h4 class="text-center mt-3" style="border: 1px solid black;padding-block: 8px;"> <b>७ वा वेतन आयोग फरक जमा </b></h4>
                <table style="width:100%">
                  <thead>
                    <tr>
                      <th>हप्ता नं </th>
                      <th> महिना / वर्ष</th>
                      <th> व्याज देय दिनांक</th>
                      <th> रक्कम </th>
                      <th> वर्ष १ व्याज </th>
                      <th> वर्ष २ व्याज </th>
                      <th> एकूण व्याज </th>
                      <th>वार्षिक जमा</th>
                      <th>अनाहरणीय </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                      <td>2313</td>
                    </tr>
                  </tbody>
                </table>
                <br>
              </div>

              <div class="col-md-12 mt-12" style="text-align:end;">
                <br>
                <br>
                <h2>
                  उपमुख्य लेखा वा वित्त अधिकारी</h2>
                  <h2>
                    जिल्हा परिषद नाशिक
                  </h2>
                  <div class="row">
                    <h2>
                      <b> टीप :- </b> वरील हिशोबामध्ये काही तफावत आढळल्यास १५ दिवसांच्या आत नाशिक परिषद वित्त विभागाशी आपल्या खातेप्रमुखामार्त संपर्क साधावा .
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
  </html>
