@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
          <h2>{{trans('language.h_providing_account_numbe')}} </h2>
        <div class="x_title"></div>
        <div class="x_content">
          @if(count($ganarate_view))
          @foreach($ganarate_view as $temp)
          <div class="row">
            <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_classification')}} :</label></div>
              <div class="col-sm-6"><span>{{$temp->classification_name_mar}}</span></div>
            </div>
            <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="new_application_gpf_no">{{trans('language.th_providing_application_number')}}</div>
                <div class="col-sm-6"><span> {{$temp->app_no}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label> {{trans('language.th_providing_employee_seva_number')}}  :</label></div>
                <div class="col-sm-6"><span>{{$temp->employee_id}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_taluka')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->taluka_name_mar}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_department')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->department_name_mar}}</span></div>
              </div>

              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_name')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->employee_name}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_designation')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->designation_name_mar}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_date_of_birth')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->date_of_birth}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_joining_date')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->joining_date}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_date_of_retirement')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->retirement_date}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label>{{trans('language.th_providing_bank')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->bank_name_mar}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label> {{trans('language.th_providing_branch')}}  :</label></div>
                <div class="col-sm-6"><span>{{$temp->branch_location}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label>{{trans('language.th_providing_i_f_s_c_code')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->ifsc_code}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_account_no')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->bank_account_no}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_opening_balance')}} :</label></div>
                <div class="col-sm-6"><span>{{amount_inr_format($temp->opening_balance)}}/-</span></div>
              </div>
              <!-- <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="name">{{trans('language.th_providing_letter_no')}} :</label></div>
              <div class="col-sm-6"><span>{{$temp->app_no}}</span></div>
            </div>
            <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_whether_to_a_n')}}</label><br></div>
            <div class="col-sm-6"><span>{{$temp->app_no}}</span></div>
          </div> -->
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_one')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_one)}}" target="_blank"> View </a></span></div>
          </div>
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_two')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_two)}}" target="_blank"> View </a></span></div>
          </div>
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_three')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_three)}}" target="_blank"> View </a></span></div>
          </div>
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_four')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_four)}}" target="_blank"> View </a></span></div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection
