@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <h2>{{trans('language.fr_common_application_form')}}
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <a href="{{url('listcommonforms')}}" class="btn btn-primary">{{trans('language.fr_common_application_list')}}
              </a>
            </li>
          </ul>
        </h2>
        <div class="x_title"></div>
        <div class="x_content">
          <div class="clearfix"></div>
          <div class="row">
            <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="application_form_number" class="col-form-label ">{{trans('language.fr_common_application_form_number')}} : </label></div>
              <div class="col-sm-6"><span> {{$applicationsData->app_form_id}} </span></div>
            </div>
            <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="gpf_no" class="col-form-label ">{{trans('language.fr_common_gpf_no')}} : </div>
                <div class="col-sm-6"><span> {{$applicationsData->gpf_no}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_name" class="col-form-label ">{{trans('language.fr_common_user_name')}} :</div> </label>
                <div class="col-sm-6"><span> {{$applicationsData->user_name}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_empid" class="col-form-label ">{{trans('language.fr_common_user_empid')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->user_empid}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_designation" class="col-form-label ">{{trans('language.fr_common_user_designation')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->designation_name}}  </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_bank" class="col-form-label ">{{trans('language.fr_common_user_bank')}} :</div> </label>
                <div class="col-sm-6"><span> {{$applicationsData->bank_name}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_bank_account_no" class="col-form-label ">{{trans('language.fr_common_user_bank_account_no')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->bank_account_no}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_bank_location" class="col-form-label ">{{trans('language.fr_common_user_bank_location')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->bank_branch}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_bank_ifsc" class="col-form-label ">{{trans('language.fr_common_user_bank_ifsc')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->bank_ifsc}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_total_amount" class="col-form-label ">{{trans('language.fr_common_user_total_amount')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->total_amount}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_withdrawn_amount" class="col-form-label ">{{trans('language.fr_common_user_withdrawn_amount')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->required_amount}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_type_of_request" class="col-form-label ">{{trans('language.fr_common_user_type_of_request')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->application_type}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_reason_withdrawn" class="col-form-label ">{{trans('language.fr_common_user_reason_withdrawn')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->application_reason}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_proof" class="col-form-label ">{{trans('language.fr_common_user_proof')}} : </label></div>
                <div class="col-sm-6"><span> <a class="btn btn-success" href="{{asset('storage/'.$applicationsData->reason_proof)}}" target="_blank"> View </a></span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_joining_date" class="col-form-label ">{{trans('language.fr_common_user_joining_date')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->user_joining_date}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_retirment_date" class="col-form-label ">{{trans('language.fr_common_user_retirment_date')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->retritment_date}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_total_work" class="col-form-label ">{{trans('language.fr_common_user_total_work')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->total_service_period}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_qualify_criteria" class="col-form-label ">{{trans('language.fr_common_user_qualify_criteria')}} : </label></div>
                <div class="col-sm-6"><span> {{$applicationsData->qualify_status}} </span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="user_account_stmt" class="col-form-label ">{{trans('language.fr_common_user_account_stmt')}} : </label></div>
                <div class="col-sm-6"><span> <a class="btn btn-success" href="{{asset('storage/'.$applicationsData->user_account_stmt)}}" target="_blank"> View </a></span></div>
              </div>
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
<script type="text/javascript" src="{{URL('js/common-forms.js')}} :"></script>
@endpush
