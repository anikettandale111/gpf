<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('asset/images/favicon.ico') }}" type="image/ico" />
  <!-- Bootstrap -->
  <title>{{ config('app.name') }} </title>
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
  .amounttext{
    text-align: right;
  }
  .x_title {
    border-bottom: 2px solid #101011;
    margin-bottom: 10px;
  }
  </style>
</head>
<body class="nav-md" style="margin-left:20%;margin-right:20%;">
  <div class="col-md-12 col-sm-12 " >
    <div class="x_panel">
      <div class="x_content">
        <div class="row" style="text-align:center;">
          <div class="col-md-4 mt-5">
            <label> वित्त विभाग </label>
          </div>
          <div class="col-md-4 ">
            <img src="{{asset('asset/images/zp-nashik-bharti.jpg')}}" width="120">
          </div>
          <div class="col-md-4 mt-5" >
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
          </div>
        </div>
        <div class="row" style="text-align:center;">
          <div class="col-md-6">
            <label> इमेल : cafozpnashik@gmail.com </label>
          </div>
          <div class="col-md-6">
            <label> टेलीफोन : ०२५३-२५९०९०८ </label>
          </div>
        </div>
        <hr>
        <div class="col-sm-12">
          <div class="card-box">
            संदर्भ -1. {{$viewapplication->user_name}} यांचा अर्ज दिनांक -: {{digitChange($viewapplication->applicantion_date)}}<br>
            2. ग.वि.अ.पंचायत समिती यांचे पञ क्र./पंसबा/आस्था-क/{{$viewapplication->gat_vikas_adhikari_no}}<br>
            3. ग्रा.वि.वि.शासन आदेश क्र/झेडपी-5/2000/प्रक्र.{{$viewapplication->zp_adhikari_no}}<br>
            4. महाराष्ट्र सर्वसाधारण भविष्य निर्वाह निधी क्रमांक 1998 चे नियम क्र.25,12(4)(1)25-अ,26,27,29,<br>
            <hr>
            <span class="pull-right">जा.क्र/जिप/अर्थ/भनिनि/{{digitChange($viewapplication->employee_gpf_num)}}/{{digitChange($viewapplication->form_id)}}/2020<br>
              अर्थ विभाग जिल्हा परिषद,नाशिक<br>
              दिनांक {{digitChange($viewapplication->applicantion_date)}}</span>
              <br>
              <br>
              <br>
              कार्यालयीन आदेश <br>
              <br>
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;जिल्हा परिषद नाशिक अंर्तगत कार्यरत असलेल्या पुढील कर्मचाऱ्याचे भविष्य निर्वाह निधी लेखे तपशिलात दिल्या नुसार अंतिम करण्यात येत आहे.</p>
              <hr> <br>
              <div class="row">
                <div class="col-md-3">
                  भ.नि.नि.लेखा क्रमांक             <br>
                  कर्मचाऱ्याचे नाव                  <br>
                  लेखे अंतिम करण्याचे प्रयोजन        <br>
                  लेख्यातील शिल्लक रक्कम रु        <br>
                  7 व्या वेतन शिल्लक रक्कम रु.     <br>
                  एकुण शिल्लक रक्कम रु.          <br>
                </div>
                <div class="col-md-1">
                  -:<br>
                  -:<br>
                  -:<br>
                  -:<br>
                  -:<br>
                  -:<br>
                </div>
                <div class="col-md-8">
                  {{digitChange($viewapplication->employee_gpf_num)}}<br>
                  {{$viewapplication->user_name}} हुद्या {{$viewapplication->user_designation}}<br>
                  {{$viewapplication->antim_pryojan}} दि.   /   /2020<br>
                  {{digitChange($viewapplication->closing_balance)}} /-<br>
                  {{('0.00')}} /-<br>
                  {{digitChange($viewapplication->closing_balance)}} /- <br>
                </div>
              </div>
              <hr> <br>
              <p class="text-align:justify"> &nbsp;&nbsp;&nbsp;&nbsp; उपरोक्त तपशिलानुसार शिल्लक रक्कम रुपये {{digitChange($viewapplication->closing_balance)}}/-अक्षरी रुपये- {{convertToIndianCurrency($viewapplication->closing_balance)}} माञ अंतिम प्रदानासाठी मंजुर करण्यात येत आहे. सदर रक्कम <u><b> {{$viewapplication->user_name}}  हुद्या  {{$viewapplication->user_designation}} </b></u>(स्वत) यांचे नावे मंजूर करण्यात येत आहे. सदरखर्च पुढील लेखाशिर्षातुन मंजुर करण्यात येत आहे. </p><br>
              <p>सहावा  वेतन आयोग फरक हप्ते भ.नि.नि.खात्यात व्याजासह जमा करणेत येवुन अंतिम रक्कम मंजुर करण्यात येत आहे. </p> <br>
              Deposit & Advances <br>
              Interest Deposit <br>
              <div class="row">
                <div class="col-md-3">
                  8336-Civil Deposit <br>
                  G.P.F.Emp. <br>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                  उप मुख्य लेखा व वित्त अधिकारी <br>
                  जिल्हा परिषद,नाशिक <br>
                </div>
              </div>
              <br>
              <br>
              प्रतिलिपी:-
              1. गट विकास अधिकारी /गट शिक्षणाधिकारी पंचायत समिती {{$viewapplication->user_taluka_name}} जिल्हा नाशिक. <br>
              2/- सदरचे देयक तयार करुन या कार्यालयाकडे सादर करु नये. <br>
              2. {{$viewapplication->user_name}} हुद्या {{$viewapplication->user_designation}} मा.ग.वि.अ/ग.शि.अ.पंचायत समिती {{$viewapplication->user_taluka_name}} यांचे मार्फत <br>
              3. कार्यालयीन नस्ती. <br>
              4. हुद्या-प्रा.शिक्षिका <br>
              <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                  उप मुख्य लेखा व वित्त अधिकारी <br>
                  जिल्हा परिषद,नाशिक <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
