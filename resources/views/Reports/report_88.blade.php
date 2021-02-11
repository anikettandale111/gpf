<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('asset/images/favicon.ico') }}" type="image/ico" />
    <title>GPF </title>
    <!-- Bootstrap -->
    <link href=" {{ asset('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('asset/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/css/sweetalert2.min.css')}}" rel="stylesheet">
    <script src="{{asset('asset/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{asset('asset/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{asset('asset/js/jquery.validate.min.js') }}"></script>


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
                        <h2> <b>सन ( २०१९ - २०२०)</b> </h2>
                    </div>
                    <div class="col-md-2">
                        <h2>१३/०१/२०२१ ११:३८:३६ AM</h2>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-box ">
                            <div class="card-box ">
                                <div class="x_title"></div>
                                <div class="col-md-2 lg-4">
                                    <label> खाते क्रमांक :- ०१०६७४ </label>
                                </div>
                                <div class="col-md-7" style="text-align: center;">
                                    <label> कर्मचाऱ्याचे नाव :- श्री . भास्कर सदाशिव आहेर भास्कर सदाशिव आहेर </label>
                                </div>
                                <div class="col-md-3 lg-4" style="text-align:end;">
                                    <label>पदनाम :- ग्राम विस्तार अधि.</label>
                                </div>
                                <div class="col-md-6">
                                    <label>तालुका / मुख्यालयाचे नाव :-निफाड </label>
                                </div>
                                <div class="col-md-6 " style="text-align: end;">
                                    <label>विभाग /कार्यालयाचे नाव :- ग्रामसेवा (ग्राप)</label>
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
                                    <tr>
                                        <td>Alfreds Futterkiste</td>
                                        <td>Maria Anders</td>
                                        <td>Germany</td>
                                        <td>Germany</td>
                                        <td>Germany</td>
                                        <td>Germany</td>
                                        <td>Germany</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>12000 </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>1200</th>
                                        <th>0</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <table style="width:100%">
                                <br>
                                <tbody>
                                    <tr>
                                        <th> १ एप्रिल २०१९ - ची सुरवातीचा शिल्लक</th>
                                        <th> ९१२३१९</th>
                                        <th> ६ वा वेतन हप्ता </th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                    </tr>
                                    <tr>
                                        <td>वर्षातील एकूण जमा ( वर्णी व कर्ज हप्ता ) </td>
                                        <td>१२००००</td>
                                        <td>रक्कम</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>वर्षातील जमा रकमेवर व्याज </td>
                                        <td>७७७२९</td>
                                        <td colspan="3"> ६ वा वेतन हप्ता रक्कम एकूण </td>
                                        <td colspan="3">0</td>
                                    </tr>
                                    <tr>
                                        <td>जमा रक्कम </td>
                                        <td>१११०३४८</td>
                                        <td rowspan="3" colspan="6"></td>
                                    </tr>
                                    <tr>
                                        <td>वर्षातील काढून घेतलेल्या रकमा </td>
                                        <td>0</td>

                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-md-12 mt-3">
                                <label> दिनांक ३१ मार्च २०२०२ - अखेर शिल्लक रक्कम रु . १११०३४८ </label>
                            </div>
                            <div class="col-md-12">
                                <label> अक्षरी रु . अकरा लाख दहा हजार तीनशे अठ्ठेचाळीस फक्त </label>
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
                                            <td></td>
                                            <td>2313</td>
                                            <td>2313</td>
                                            <td>2313</td>
                                            <td>2313</td>
                                            <td>2313</td>
                                            <td>2313</td>
                                            <td>2313</td>
                                        </tr>
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
<script src="{{asset('asset/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('asset/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{asset('asset/vendors/nprogress/nprogress.js') }}"></script>
<script src="{{asset('asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{asset('asset/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{asset('asset/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<!-- Flot plugins -->
<script src="{{asset('asset/vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{asset('asset/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{asset('asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{asset('asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('asset/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{asset('asset/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('asset/build/js/custom.min.js') }}"></script>
<!-- Datatables -->

</html>
