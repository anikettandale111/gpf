@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{trans('language.fr_common_application_form')}}</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <a href="{{url('listcommonforms')}}" class="btn btn-primary">{{trans('language.fr_common_application_list')}}</a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form method="POST" class="validatedForm" action="{{ url('commonforms') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-4">
                <label for="application_form_number" class="col-form-label ">{{trans('language.fr_common_application_form_number')}} </label>
                <input id="application_form_number" type="text " class="form-control" name="application_form_number" readonly>
              </div>
              <div class="col-md-4">
                <label for="gpf_no" class="col-form-label ">{{trans('language.fr_common_gpf_no')}} </label>
                <input id="gpf_no" type="text " class="form-control allow-numbers" name="gpf_no" required >
              </div>
              <div class="col-md-4">
                <label for="user_name" class="col-form-label ">{{trans('language.fr_common_user_name')}} </label>
                <input id="user_name" type="text " class="form-control" name="user_name" required  readonly>
                <input id="user_id" name="user_id" type="hidden">
              </div>
              <div class="col-md-4">
                <label for="user_empid" class="col-form-label ">{{trans('language.fr_common_user_empid')}} </label>
                <input id="user_empid" type="text " class="form-control" name="user_empid" required  readonly>
              </div>
              <div class="col-md-4">
                <label for="user_designation" class="col-form-label ">{{trans('language.fr_common_user_designation')}} </label>
                <input id="user_designation" type="text " class="form-control" name="user_designation" required  readonly>
                <input id="user_designation_id" name="user_designation_id" type="hidden">
                <input id="user_department_id" name="user_department_id" type="hidden">
              </div>
              <div class="col-md-4">
                <label for="user_bank" class="col-form-label ">{{trans('language.fr_common_user_bank')}} </label>
                <input id="user_bank" type="text " class="form-control" name="user_bank" required  readonly >
                <input id="user_bank_id" name="user_bank_id" type="hidden">
              </div>
              <div class="col-md-4">
                <label for="user_bank_account_no" class="col-form-label ">{{trans('language.fr_common_user_bank_account_no')}} </label>
                <input id="user_bank_account_no" type="text " class="form-control allow-numbers" name="user_bank_account_no" required  readonly>
              </div>
              <div class="col-md-4">
                <label for="user_bank_location" class="col-form-label ">{{trans('language.fr_common_user_bank_location')}} </label>
                <input id="user_bank_location" type="text " class="form-control" name="user_bank_location" required  readonly>
              </div>
              <div class="col-md-4">
                <label for="user_bank_ifsc" class="col-form-label ">{{trans('language.fr_common_user_bank_ifsc')}} </label>
                <input id="user_bank_ifsc" type="text " class="form-control" name="user_bank_ifsc" required  readonly>
              </div>
              <div class="col-md-4">
                <label for="user_type_of_request" class="col-form-label ">{{trans('language.fr_common_user_type_of_request')}} </label>
                <select id="user_type_of_request" type="text " class="form-control" name="user_type_of_request" >
                  <option selected disabled readonly>{{trans('language.common_form_type_option_zero')}}</option>
                  <option value="Refund">{{trans('language.common_form_type_option_one')}}</option>
                  <option value="Non_Refundable">{{trans('language.common_form_type_option_two')}}</option>
                  <option value="Advance_Refund">{{trans('language.common_form_type_option_three')}}</option>
                  <option value="Deposit_Attached">{{trans('language.common_form_type_option_four')}}</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="user_total_amount" class="col-form-label ">{{trans('language.fr_common_user_total_amount')}} </label>
                <input id="user_total_amount" type="text " class="form-control allow-numbers" name="user_total_amount" required  readonly>
              </div>
              <div class="col-md-4">
                <label for="user_reason_withdrawn" class="col-form-label ">
                  {{trans('language.fr_common_user_reason_withdrawn')}} </label>
                <select id="user_reason_withdrawn" class="form-control" name="user_reason_withdrawn" required onchange="calculateAmount(this.value)">
                  <option value="" selected disabled></option>
                  @if(count($reasons))
                    @foreach($reasons AS $res_row)
                      <option value="{{$res_row->cr_id}}_{{$res_row->withdrawn_percent}}"> {{$res_row->reason_name_mar}} </option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="col-md-4">
                <label for="user_withdrawn_amount" class="col-form-label ">{{trans('language.fr_common_user_withdrawn_amount')}} </label>
                <input id="user_withdrawn_amount" type="text " class="form-control allow-numbers" name="user_withdrawn_amount" required >
              </div>
              <div class="col-md-4">
                <label for="user_proof" class="col-form-label ">{{trans('language.fr_common_user_proof')}} </label>
                <input id="user_proof" type="file" class="form-control" name="user_proof" required >
              </div>
              <div class="col-md-4">
                <label for="user_joining_date" class="col-form-label ">{{trans('language.fr_common_user_joining_date')}} </label>
                <input id="user_joining_date" type="date" class="form-control datepicker" name="user_joining_date" readonly>
              </div>
              <div class="col-md-4">
                <label for="user_retirment_date" class="col-form-label ">{{trans('language.fr_common_user_retirment_date')}} </label>
                <input id="user_retirment_date" type="date" class="form-control datepicker" name="user_retirment_date" required >
              </div>
              <div class="col-md-4">
                <label for="user_total_work" class="col-form-label ">{{trans('language.fr_common_user_total_work')}} </label>
                <input id="user_total_work" type="text " class="form-control" name="user_total_work" required  readonly>
              </div>
              <div class="col-md-4">
                <label for="user_qualify_criteria" class="col-form-label ">{{trans('language.fr_common_user_qualify_criteria')}} </label>
                <select id="user_qualify_criteria" class="form-control" name="user_qualify_criteria" required >
                  <option selected disabled>{{trans('language.common_form_qualify_option_zero')}}</option>
                  <option value="1">{{trans('language.common_form_qualify_option_one')}}</option>
                  <option value="0">{{trans('language.common_form_qualify_option_two')}}</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="user_account_stmt" class="col-form-label ">{{trans('language.fr_common_user_account_stmt')}} </label>
                <input id="user_account_stmt" type="file" class="form-control" name="user_account_stmt" >
              </div>
            </div>
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{trans('language.btn_save')}}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/common-forms.js')}}"></script>
@endpush
