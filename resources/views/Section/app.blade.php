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
  <title>{{ config('app.name') }}</title>
  <!-- Bootstrap -->
  <link href=" {{ asset('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('css/main.css') }}" rel="stylesheet">
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
  <link  href="{{asset('asset/css/sweetalert2.min.css')}}" rel="stylesheet">
  <script src="{{asset('asset/js/jquery-1.11.1.min.js') }}"></script>
  <script src="{{asset('asset/js/sweetalert2.all.min.js') }}"></script>
  <script src="{{asset('asset/js/jquery.validate.min.js') }}"></script>
  <style type="text/css">
  .error
  {
    color: red;
  }

  .icon-edit {
    color: blue;
    font-size: 25px;
  }

  .icon-trash {
    color: red;
    font-size: 25px;
  }
  </style>
</head>
<body class="nav-md">
  <input type="hidden" name="sess_from_year" id="sess_from_year" value="{{session()->get('from_year')}}">
  <input type="hidden" name="sess_to_year" id="sess_to_year" value="{{session()->get('to_year')}}">
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
                <li>
                  <a href="{{url('home')}}"><i class="fa fa-home"></i> {{trans('language.menu_home')}} </a>
                </li>
                @if(Auth::user()->id == 1 )
                <li><a><i class="fa fa-bug"></i> {{trans('language.menu_master')}} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('districts')}}">{{trans('language.ms_districts')}}</a></li>
                    <li><a href="{{url('taluka')}}">{{trans('language.ms_taluka')}}</a></li>
                    <li><a href="{{url('department')}}">{{trans('language.ms_department')}}</a></li>
                    <li><a href="{{url('designation')}}">{{trans('language.ms_designations')}}</a></li>
                    <li><a href="{{url('classification')}}">{{trans('language.ms_classification')}}</a></li>
                    <li><a href="{{url('bank')}}">{{trans('language.ms_bank')}}</a></li>
                    <li><a href="#">{{trans('language.ms_staff')}}</a></li>
                    <li><a href="{{url('employee_list')}}">{{trans('language.ms_employee')}}</a></li>
                    <li><a href="{{url('commonreasons')}}">{{trans('language.ms_reason_for_accounts')}}</a></li>
                    <li><a href="{{url('user_registration')}}">{{trans('language.register_users')}}</a></li>
                    <li><a href="{{url('Year')}}">{{trans('language.yearly_intrest_paid_form')}}</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bug"></i> {{trans('language.menu_forms')}} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('ganrate_new_number')}}">{{trans('language.fr_application_form_create_account')}}</a></li>
                    <li><a href="{{url('transfer')}}">{{trans('language.fr_antar_zillha_badli')}}</a></li>
                    <li><a href="{{url('employee')}}">{{trans('language.fr_employee_update')}}</a></li>
                    <!-- <li><a href="{{url('commonforms')}}">{{trans('language.fr_common_application_form')}}</a></li> -->
                    <!-- <li><a href="#">{{trans('language.fr_application_form_amount_withdrawn')}}</a></li> -->
                    <!-- <li><a href="{{url('closed_account')}}">{{trans('language.fr_application_form_account_close')}}</a></li> -->
                  </ul>
                </li>
                <!-- <li><a><i class="fa fa-bug"></i> {{trans('language.menu_forms_received')}} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('listcommonforms')}}">{{trans('language.fr_common_application_form_list')}}</a></li>
                    <li><a href="{{url('testpdf')}}">Test Pdf</a></li>
                  </ul>
                </li> -->
                <!-- <li><a><i class="fa fa-bug"></i> परतावा प्रास्ताव करणे <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li><a href="{{url('application_form')}}">कर्मचाऱ्याने कार्यालय  प्रमुखास अर्ज करणे </a></li>
              </ul>
            </li> -->
            <!-- <li><a href="{{url('nomination_record')}}"><i class="fa fa-clone"></i>नामनिर्दशन नोंद</a></li> -->
            <!-- <li><a href="{{url('vetan')}}"> <i class="fa fa-users"></i>{{trans('language.7_pay_commission_paid')}}</a></li> -->
            @endif
            <li><a><i class="fa fa-bug"></i> {{trans('language.menu_forms')}} <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('ganrate_new_number')}}">{{trans('language.fr_application_form_create_account')}}</a></li>
                <li><a href="{{url('transfer')}}">{{trans('language.fr_antar_zillha_badli')}}</a></li>
                <li><a href="{{url('employee')}}">{{trans('language.fr_employee_update')}}</a></li>

                <!-- <li><a href="{{url('ganrate_new_number')}}">{{trans('language.fr_application_form_create_account')}}</a></li> -->
                <!-- <li><a href="{{url('commonforms')}}">{{trans('language.fr_common_application_form')}}</a></li> -->
                <!-- <li><a href="#">{{trans('language.fr_application_form_amount_withdrawn')}}</a></li> -->
                <!-- <li><a href="{{url('closed_account')}}">{{trans('language.fr_application_form_account_close')}}</a></li> -->
              </ul>
            </li>
            <li><a><i class="fa fa-bug"></i> {{trans('language.menu_forms_received')}} <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('listcommonforms')}}">{{trans('language.fr_common_application_form_list')}}</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-bug"></i> {{trans('language.monthly_bill_expensess')}}  <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('chalan')}}">{{trans('language.monthly_bill_chalan')}}</a></li>
                <!-- <li><a href="{{url('monthly_chalan')}}">{{trans('language.monthly_bill_chalan_khatanvai')}}</a></li> -->
                <li><a href="{{url('subscription')}}">{{trans('language.monthly_bill_chalan_khatanvai')}}</a></li>
                <li><a href="{{url('fileupload')}}">{{trans('language.chalan_files_upload')}} (Excel Format)</a></li>
                <li><a href="{{url('pdffileupload')}}">{{trans('language.chalan_files_upload')}} (PDF Format)</a></li>
                <li><a href="{{url('chalanGhoshwara')}}">{{trans('language.chalan_ghoshwara')}} </a></li>
                <!-- <li><a href="{{url('monthlyEntryApproved')}}">{{trans('language.monthly_entry_approved')}} </a></li> -->
              </ul>
            </li>
            <li><a><i class="fa fa-bug"></i> {{trans('language.bill_expensess_report')}}  <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('employeereports')}}"> {{trans('language.employee_account_stmt')}} </a></li>
                <li><a href="{{url('closedaccountreports')}}"> {{trans('language.retired_employee_account_stmt')}} </a></li>
                <!-- <li><a href="{{url('bill_information')}}"> {{trans('language.bill_expensess_info')}} </a></li> -->
                <!-- <li><a href="{{url('closed_account')}}"> <i class="fa fa-users"></i>खाते बंद करणे  </a></li>
                <li><a href="{{url('monthly_chalan')}}">मासिक चलन खतावणी</a></li> -->
                <li><a href="{{url('employeeBillKharch')}}">{{trans('language.monthly_employee_bill_kharch')}} </a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-bug"></i> {{trans('language.menu_karmchari_namnirdeshan')}}  <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('accountclosed')}}"> {{trans('language.menu_form_namnirdeshan')}} </a></li>
                <li><a href="{{url('employee')}}">{{trans('language.fr_employee_update')}}</a></li>
                <!-- <li><a href="{{url('accountclosed')}}"> {{trans('language.retired_employee_account_stmt')}} </a></li> -->
              </ul>
            </li>
            <li><a><i class="fa fa-bug"></i> {{trans('language.menu_bill')}}  <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('antimbill')}}"> {{trans('language.menu_bill_information')}} </a></li>
                <li><a href="{{url('antimbillexpenses')}}"> {{trans('language.menu_bill_expenses_information')}} </a></li>
                <li><a href="{{url('billreports')}}"> {{trans('language.menu_bill_reports')}} </a></li>
              </ul>
            </li>
            <!-- <li>
              <a href="{{url('employee')}}"><i class="fa fa-home"></i> {{trans('language.form_employee_update')}} </a>
            </li> -->
            @if(Auth::user()->id == 1 )
            <li><a><i class="fa fa-bug"></i> {{trans('language.menu_bill')}}  <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{url('antimbill')}}"> {{trans('language.menu_bill_information')}} </a></li>
                <li><a href="{{url('antimbillexpenses')}}"> {{trans('language.menu_bill_expenses_information')}} </a></li>
                <li><a href="{{url('billreports')}}"> {{trans('language.menu_bill_reports')}} </a></li>
              </ul>
            </li>
            @endif
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
        <li class="dropdown" style="padding-left: 15px;">
          <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{asset ('asset/images/img.jpg ')}}" alt="">{{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-usermenu ">
            <a class="dropdown-item"  href="#"> Profile</a>
            <a class="dropdown-item"  href="{{url('/change_pwd')}}"> Change Password</a>
            <a class="dropdown-item"  href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out pull-right"></i>
            Log Out
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form></a>
          </ul>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#" onclick="changelanguage('{{trans('language.test_language')}}')" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-globe fa-fw"></i> {{(app()->getLocale()== "mar") ? 'English' : 'मराठी'}}
        </a>
      </li>
        <li class="nav-item ">
          <form>
            <select id="yearChage" name="yearChage" class="form-control" onchange="setyear(this.value)">
              <option selected disabled>Change Year</option>
              <option value="2021-2022" {{(session()->get('financial_year') == '2021-2022')?'selected':''}} >2021-2022</option>
              <option value="2020-2021" {{(session()->get('financial_year') == '2020-2021')?'selected':''}} >2020-2021</option>
              <option value="2019-2020" {{(session()->get('financial_year') == '2019-2020')?'selected':''}}>2019-2020</option>
              <option value="2018-2019" {{(session()->get('financial_year') == '2018-2019')?'selected':''}}>2018-2019</option>
            </select>
          </form>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->

<div class="right_col" role="main" >
  @include('Section.flash_messages')
  @yield('content')
</div>

<!-- footer content -->
<footer>
  <div class="footer-copyright text-center py-3">© {{date('Y')}} Copyright:
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
<script type="text/javascript" src="{{asset('asset/scripts/main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/commonfunctions.js')}}"></script>

@stack('custom-scripts')
<script>
$(document).ready(function(){
  $('.dropdown').on('click',function(){
    $('.dropdown').addClass('show');
    $('.dropdown-usermenu').addClass('show');
  })
});
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
function setyear(yearval){
  $.ajax({
    type:'GET',
    url:'/yearchange/'+yearval,
    data:{"_token": "{{ csrf_token() }}"},
    success:function(data){
      location.reload();
    }
  });
}
</script>
