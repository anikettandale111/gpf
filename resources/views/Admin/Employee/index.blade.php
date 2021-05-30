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
              <form class="form-group balance_update" method="post">
                @csrf
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_gpf_no')}}</label>
                  <input type="text" class="form-control clearfield" name="employee_gpf_num" id="employee_gpf_num" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_name')}}</label>
                  <input type="text" class="form-control clearfield" name="user_name" id="user_name" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_joining_date')}}</label>
                  <input type="text" class="form-control clearfield" name="user_joining_date" id="user_joining_date" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_providing_date_of_retirement')}}</label>
                  <input type="text" class="form-control clearfield" name="user_retirement_date" id="user_retirement_date" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_providing_bank')}}</label>
                  <input type="text" class="form-control clearfield" name="user_providing_bank" id="user_providing_bank" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_providing_account_no')}}</label>
                  <input type="text" class="form-control clearfield" name="user_bank_account_no" id="user_bank_account_no" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_providing_i_f_s_c_code')}}</label>
                  <input type="text" class="form-control clearfield" name="user_bank_ifsc" id="user_bank_ifsc" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_providing_branch')}}</label>
                  <input type="text" class="form-control clearfield" name="user_bank_branch" id="user_bank_branch" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_designation')}}</label>
                  <input type="text" class="form-control clearfield" name="user_designation" id="user_designation" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_registration_taluka')}}</label>
                  <input type="text" class="form-control clearfield" name="user_taluka_name" id="user_taluka_name" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_registration_department')}}</label>
                  <input type="text" class="form-control clearfield" name="user_department" id="user_department" readonly>
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_shillak_rakkam')}} {{date('Y')-2}}</label>
                  <input type="text" class="form-control clearfield allow-numbers" name="shillak_rakkam_two" id="shillak_rakkam_two" data-curdate="{{date('Y')-2}}">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_shillak_rakkam')}} {{date('Y')-1}}</label>
                  <input type="text" class="form-control clearfield allow-numbers" name="shillak_rakkam_one" id="shillak_rakkam_one" data-curdate="{{date('Y')-1}}">
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
