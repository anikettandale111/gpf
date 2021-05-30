@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.chalan_reports')}} </h2>
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
              <form class="form-group report_validate" action="{{url('employeereports')}}" method="post" target="_blank">
                @csrf
                <div class="col-sm-2">
                  <label>{{trans('language.th_providing_select_taluka')}}</label>
                  <select class="form-control" name="taluka_id" id="taluka_id">
                      <option value="" selected disabled>{{trans('language.th_providing_select_taluka')}}</option>
                    @foreach($talukaList AS $taluka)
                      <option value="{{$taluka->id}}">{{$taluka->taluka_name_mar}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-2">
                  <label>{{trans('language.th_providing_select_month')}}</label>
                  <select class="form-control" name="month_id" id="month_id">
                    <option value="" selected disabled>{{trans('language.th_providing_select_month')}}</option>
                    @foreach($monthList AS $month)
                      <option value="{{$month->id}}">{{$month->month_name_mar}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-5">
                  <label>{{trans  ('language.report_type')}}</label>
                  <select class="form-control" name="view_report_type" id="view_report_type">
                    <option value="" selected disabled>{{trans('language.chalan_reports_select')}}</option>
                    <option value="1">{{trans('language.chalan_reports_one')}}</option>
                    <option value="2">{{trans('language.chalan_reports_two')}}</option>
                    <option value="3">{{trans('language.chalan_reports_three')}}</option>
                    <option value="4">{{trans('language.chalan_reports_four')}}</option>
                    <option value="5">{{trans('language.chalan_reports_five')}}</option>
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
