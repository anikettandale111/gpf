<!DOCTYPE html>
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
    <!-- Font Awesome -->
    <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress --><!--
    <link href="{{asset('asset/vendors/nprogress/nprogress.css')}}" rel="stylesheet"> -->
    <!-- iCheck --><!--
    <link href="{{asset('asset/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet"> -->
    <!-- bootstrap-progressbar -->
    <!-- <link href="{{asset('asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet"> -->
    <!-- JQVMap --><!--
    <link href="{{asset('asset/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/> -->
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('asset/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('asset/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style type="text/css">
        .error
        {
            color: red;
        }
    </style>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('home')}}" class="site_title"><i class="fa fa-paw"></i> <span>GPF</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('asset/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info mt-3">

                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Home </a>
                      <li><a href="{{url('ganrate_new_number')}}"><i class="fa fa-clone"></i>लेखाक्रमांक प्रदान करणे
                  </a>
                  </li>


                  </li>
                  <li><a href="{{url('Customer_Registration')}}"><i class="fa fa-table"></i> कर्मचाऱ्यांची  मुळ माहिती  </a>

                  </li>
                 <li><a><i class="fa fa-bug"></i> मुख्यालय <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('Master')}}">बँकेत नाव</a></li>
                      <li><a href="{{url('department')}}">विभाग संकेतांक</a></li>
                      <li><a href="{{url('designation')}}">पदनाम</a></li>
                      <li><a href="{{url('classification')}}">वर्गीकरण</a></li>
                      <li><a href="{{url('Taluka')}}"> तालुका  मुख्यालय  संकेताक </a></li>
                       <li><a href="{{url('Year')}}">वर्षाचे व्याज दर  भरणे </a> </li>
                   </ul>
                  </li>
                  <li><a href="{{url('Nomination_record')}}"><i class="fa fa-clone"></i>नामनिर्दशन नोंद
                  </a>
                  </li>

                  <li><a><i class="fa fa-bug"></i> मासिक बदल  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('Trend_add')}}">चलन</a></li>
                      <li><a href="{{url('monthly_chalan')}}">मासिक चलन खतावणी</a></li>
                    </ul>
                  </li>
                  <li><a href="{{url('user_registration')}}"> <i class="fa fa-users"></i>वापरकर्त्यांची नोंदणी</a></li>
                  <li><a href="{{url('vetan')}}"> <i class="fa fa-users"></i>७ वा वेतन आयोग फरक जमा </a></li>
                  <li><a href="{{url('closed_account')}}"> <i class="fa fa-users"></i>खाते बंद करणे  </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item ">
                  <a class="nav-link" href="#" onclick="changelanguage('{{trans('language.test_language')}}')" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-globe fa-fw"></i> {{trans('language.test_language')}}
                </a>
              </li>
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset ('asset/images/img.jpg ')}}" alt="">{{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="{{url('/change_pwd')}}"> Change Password</a>
                    <a class="dropdown-item"  href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out pull-right"></i>
                    Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
        @yield('content')
          </div>

         <!-- footer content -->
   <footer>
          <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="http://cdat.co.in/" target="_blank"> Cdat.co.in</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <!-- <script src="{{asset('asset/vendors/jquery/dist/jquery.min.js') }}"></script> -->
    <!-- Bootstrap -->
  <script src="{{asset('asset/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{asset('asset/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{asset('asset/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <!-- <script src="{{asset('asset/vendors/Chart.js/dist/Chart.min.js') }}"></script> -->
    <!-- gauge.js -->
    <!-- <script src="{{asset('asset/vendors/gauge.js/dist/gauge.min.js') }}"></script> -->
    <!-- bootstrap-progressbar -->
    <script src="{{asset('asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{asset('asset/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{asset('asset/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{asset('asset/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{asset('asset/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{asset('asset/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{asset('asset/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{asset('asset/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('asset/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{asset('asset/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{asset('asset/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
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
    <script src="{{asset('asset/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{asset('asset/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{asset('asset/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{asset('asset/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{asset('asset/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script>
  function changelanguage(lang){
    if(lang == 'English'){
      lang="mar";
    }else{
      lang="en";
    }
    $.ajax({
      type:'GET',
      url:'/languagechange/'+lang,
      data:{"_token": "{{ csrf_token() }}"},
      success:function(data){
        location.reload();
      }
    });
  }
</script>
