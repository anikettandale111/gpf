@extends('Section.app')

@section('content')

<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>{{trans('language.monthly_employee_bill_kharch')}}</h2>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" id="employee_bill_kharch_form" method="POST" >
            @csrf
            <div class="row">
              <div class="col-md-4">
                <label for="">{{trans('language.fr_common_gpf_no')}}</label>
                <input class="form-control make_empty"  name="employee_gpf_num" id="employee_gpf_num" >
                <input type="hidden" class="make_empty" name="user_empid" id="user_empid" value="0">
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.fr_common_user_name')}}</label>
                <input class="form-control make_empty"  name="user_name" id="user_name" readonly>
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.fr_common_user_designation')}}</label>
                <input class="form-control make_empty"  name="user_designation" id="user_designation" readonly>
                <input type="hidden" class="make_empty" name="user_designation_id" id="user_designation_id" value="0">
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_registration_taluka')}}</label>
                <input class="form-control make_empty"  name="user_taluka_name" id="user_taluka_name" readonly>
                <input type="hidden" class="make_empty"  name="user_taluka_id" id="user_taluka_id" value="0">
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_registration_department')}}</label>
                <input class="form-control make_empty"  name="user_department" id="user_department" readonly>
                <input type="hidden" class="make_empty"  name="user_department_id" id="user_department_id" value="0">
              </div>
            </div>
            <div class="row khate_utaraa_dummy">

            </div>
              <div class="col-md-6 offset-12 m-3">
                <button type="submit" class="btn btn-success bill_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                <button type="button" class="btn btn-primary cancel_submit" data-dismiss="modal" aria-label="Close">
                  <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/employee_bill_kharch.js')}}"></script>
@endpush
