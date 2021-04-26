@extends('Section.app')
@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>{{trans('language.form_employee_update')}}</h2>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box ">
              <form class="form-group account_closed" method="post">
                @csrf
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_gpf_no')}}</label>
                  <input type="text" class="form-control" name="employee_gpf_num" id="employee_gpf_num" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_name')}}</label>
                  <input type="text" class="form-control" name="user_name" id="user_name" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_designation')}}</label>
                  <input type="text" class="form-control" name="user_designation" id="user_designation" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_joining_date')}}</label>
                  <input type="text" class="form-control" name="user_joining_date" id="user_joining_date" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_registration_taluka')}}</label>
                  <input type="text" class="form-control" name="user_taluka_name" id="user_taluka_name" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_registration_department')}}</label>
                  <input type="text" class="form-control" name="user_department" id="user_department" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_shillak_rakkam')}} {{date('Y')-2}}</label>
                  <input type="text" class="form-control" name="shillak_rakkam" id="shillak_rakkam">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_shillak_rakkam')}} {{date('Y')-1}}</label>
                  <input type="text" class="form-control" name="shillak_rakkam" id="shillak_rakkam">
                </div>
                <div class="col-sm-3 mt-3">
                  <button type="submit" class="btn btn-success" style="width:100%" name="button" id="button">Save</button>
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
<script type="text/javascript" src="{{URL('js/employee.js')}}"></script>
@endpush
