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
            <div class="row">
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="application_form_number" class="col-form-label">
                  {{trans('language.fr_common_application_form_number')}}
                </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->app_form_id}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="gpf_no" class="col-form-label ">{{trans('language.fr_common_gpf_no')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->gpf_no}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_name" class="col-form-label ">{{trans('language.fr_common_user_name')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->user_name}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_empid" class="col-form-label ">{{trans('language.fr_common_user_empid')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->user_empid}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_designation" class="col-form-label ">{{trans('language.fr_common_user_designation')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->designation_name}}  </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_bank" class="col-form-label ">{{trans('language.fr_common_user_bank')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->bank_name}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_bank_account_no" class="col-form-label ">{{trans('language.fr_common_user_bank_account_no')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->bank_account_no}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_bank_location" class="col-form-label ">{{trans('language.fr_common_user_bank_location')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->bank_branch}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_bank_ifsc" class="col-form-label ">{{trans('language.fr_common_user_bank_ifsc')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->bank_ifsc}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_total_amount" class="col-form-label ">{{trans('language.fr_common_user_total_amount')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->total_amount}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_withdrawn_amount" class="col-form-label ">{{trans('language.fr_common_user_withdrawn_amount')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->required_amount}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_type_of_request" class="col-form-label ">{{trans('language.fr_common_user_type_of_request')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->application_type}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_reason_withdrawn" class="col-form-label ">{{trans('language.fr_common_user_reason_withdrawn')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->application_reason}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_proof" class="col-form-label ">{{trans('language.fr_common_user_proof')}} </label>
                </div>
                <div class="col-sm-6">
                  <a href="{{asset('public/'.$applicationsData->reason_proof)}}"><label class="col-form-label"> View Document </label></a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_joining_date" class="col-form-label ">{{trans('language.fr_common_user_joining_date')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->user_joining_date}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_retirment_date" class="col-form-label ">{{trans('language.fr_common_user_retirment_date')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->retritment_date}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_total_work" class="col-form-label ">{{trans('language.fr_common_user_total_work')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->total_service_period}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_qualify_criteria" class="col-form-label ">{{trans('language.fr_common_user_qualify_criteria')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->qualify_status}} </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col-sm-6">
                <label for="user_account_stmt" class="col-form-label ">{{trans('language.fr_common_user_account_stmt')}} </label>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label"> {{$applicationsData->user_account_stmt}} </label>
                </div>
              </div>
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
