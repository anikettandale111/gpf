@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.ms_reports')}} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
        @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box ">
              <form class="form-group report_validate" action="{{url('employeereports')}}" method="post">
                @csrf
                <div class="col-sm-5">
                  <label>{{trans  ('language.th_providing_b_n_n_no')}}</label>
                  <input class="allow-numbers form-control" type="text" name="employee_gpf_num" id="employee_gpf_num">
                </div>
                <div class="col-sm-5">
                  <label>{{trans  ('language.report_type')}}</label>
                  <select class="form-control" name="view_report_type" id="view_report_type">
                    <option value="" selected disabled></option>
                    <option value="1">{{trans('language.report_emp_namuna_88')}}</option>
                    <option value="2">{{trans('language.report_emp_namuna_79')}}</option>
                    <option value="3">{{trans('language.report_emp_namuna_231')}}</option>
                  </select>
                </div>
                <div class="col-sm-2" style="margin-top:25px;">
                  <button type="submit" class="btn btn-success" >{{trans('language.btn_view_report')}}</button>
                  <button type="button" class="btn btn-secondary report_clear" >{{trans('language.btn_cancel')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/employeereports.js')}}"></script>
@endpush
