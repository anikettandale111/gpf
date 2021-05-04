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
      <div class="x_content" style="font-size: 15px;text-align: justify;">
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
        <p>विषय -: <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$viewapplication->user_name}}  हुद्या  {{$viewapplication->user_designation}} यांचे भविष्य निर्वाह निधी खात्यावरील रक्कम अंतिमरीत्या मिळणे बाबत. </p>
        <hr>
        <p>कार्यलयीन टिपण्णी </p>

        <p> सविनय सादर, </p>

        <p> १. मा.गट विकास अधिकारी, पंचायत समिती देवळा जिल्हा परिषद नाशिक यांचे कडून योग्य त्या फेरसदर पूर्ततेस्थव पत्र क्र.पंसदे/साप्रवि/आस्था-१/४२९/२०२१ दिनाक ०१/०४/२०२१ अन्यवे विषयात नमूद प्रकरण अंतिम अदाईसाठी इकडील कार्यालयास प्राप्त झाले आहे. </p>
        <p> २. {{$viewapplication->user_name}}  हुद्या  {{$viewapplication->user_designation}}  हे नाशिक जिल्हा परिषद सेवेत असताना दि. {{digitChange($viewapplication->retirment_date)}} रोजी नियम वयोमानाने सेवानिवृत्त झालेले आहेत. जि.प.नाशिक कडिल भ.नि.नि. खाते क्रमांक {{digitChange($viewapplication->employee_gpf_num)}} वर माहे {{$viewapplication->antim_pay_month}} {{digitChange($viewapplication->antim_pay_year)}} अखेर व्याजासह रक्कम {{digitChange($viewapplication->closing_balance)}} /- अक्षरी रक्कम {{convertToIndianCurrency($viewapplication->closing_balance)}} रुपये शिल्लक आहे. सदर खातेची मागील सन २०१४-१५ पासून तपासणी केली असून अवलोकनार्थ सादर. </p>

        <p> ३. तरी आता सदरची अंतिमरीत्या अदा करावयाची रक्कम {{$viewapplication->user_name}}  हुद्या  {{$viewapplication->user_designation}} यांचे नावे मंजूर करण्यास हरकत नाही. असे मत आहे. </p>

        <p> ४. महाराष्ट्र सर्वसाधारण भ.नि.नि.नियम १९९८ च्या नियम क्र. १२(४),२५,२५-अ,२६,२७ व २९ च्या तरतुदीनुसार अंतिमरीत्या प्रदान करणेस हरकत नसून प्रस्ताव मान्य असल्यास प्रारूप आदेश सोबत पताका (अ) स्वाक्षरी होणेस विनंती. </p>
      </div>
    </div>
  </div>
</body>
</html>
