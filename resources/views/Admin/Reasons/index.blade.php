@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.ms_reason_for_accounts')}} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="form-group">
          <!-- <h2>{{trans('language.form_reasons')}}</h2> -->
          <form class="form-group formcommonreason" method="POST">
            <div class="row">
              {{csrf_field()}}
              <input type="hidden" name="cr_id" id="cr_id" value="0">
              <div class="col-sm-4">
                <label>{{trans  ('language.th_reasons_name_en')}}</label>
                <input class="form-control" type="text" name="reason_name_en" id="reason_name_en">
              </div>
              <div class="col-sm-4">
                <label>{{trans('language.th_reasons_name_mar')}}</label>
                <input class="form-control" type="text" name="reason_name_mar" id="reason_name_mar">
              </div>
              <div class="col-sm-4">
                <label>{{trans  ('language.th_reasons_description_en')}}</label>
                <input class="form-control" type="text" name="reason_description_en" id="reason_description_en">
              </div>
              <div class="col-sm-4">
                <label>{{trans('language.th_reasons_description_mar')}}</label>
                <input class="form-control" type="text" name="reason_description_mar" id="reason_description_mar">
              </div>
              <div class="col-sm-2">
                <label>{{trans('language.th_reasons_withdrawn_percent')}}</label>
                <input class="form-control" type="number" min='0' max='100' name="reason_withdrawn_percent" id="reason_withdrawn_percent" value="0">
              </div>
              <div class="col-sm-2">
                <label>{{trans('language.th_reasons_status')}}</label>
                <select class="form-control" name="reason_status" id="reason_status">
                  <option value="" selected disabled>Select Status</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="col-sm-2 mt-4">
                <button type="submit" style="width:100%" class="btn btn-success" >{{trans('language.btn_save')}}</button>
              </div>
              <div class="col-sm-2 mt-4">
                <button type="button" style="width:100%" class="btn btn-secondary" onclick="clearReasons();">{{trans('language.btn_cancel')}}</button>
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box ">
              <table id="commonReason" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{trans('language.th_reasons_no')}}  </th>
                    <th>{{trans('language.th_reasons_name_mar')}}  </th>
                    <th>{{trans('language.th_reasons_description_mar')}}  </th>
                    <th>{{trans('language.th_reasons_description_mar')}}  </th>
                    <th>{{trans('language.th_reasons_status')}}  </th>
                    <th>{{trans('language.th_reasons_action')}}  </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/commonreason.js')}}"></script>
@endpush
