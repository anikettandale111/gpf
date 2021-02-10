@extends('Section.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="">
                    <h2>{{trans('language.h_providing_account_numbe')}} </h2>
                </div>
                <div class="x_content">
                @if(count($ganarate_view))
                @foreach($ganarate_view as $temp)

                <div class="row">
                        <div class="form-group col-md-4">
                            <label for="taluka">{{trans('language.th_providing_classification')}} :</label>
                            <td>{{$temp->classification_name_mar}}</td>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="new_application_gpf_no">{{trans('language.th_providing_application_number')}}</label>
<  <td>{{$temp->inital_letter}} {{$temp->app_no}}</td>

                        </div>
                        <div class="form-group col-md-4">
                            <label> {{trans('language.th_providing_employee_seva_number')}} <span class="required"></span></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{trans('language.th_providing_taluka')}}</label>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{trans('language.th_providing_department')}}</label>

                        </div>

                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_name')}}</label>
                         </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{trans('language.th_providing_designation')}}</label>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_date_of_birth')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_joining_date')}}</label>
                         </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_date_of_retirement')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label>{{trans('language.th_providing_bank')}} <span class="required"></span></label>
                         </div>
                        <div class="form-group col-md-4">
                            <label> {{trans('language.th_providing_branch')}} <span class="required"></span></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label> {{trans('language.th_providing_i_f_s_c_code')}} <span class="required"></span></label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{trans('language.th_providing_account_no')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_opening_balance')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_letter_no')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_whether_to_a_n')}}</label><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_attachment_one')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_attachment_two')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_attachment_three')}}</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{trans('language.th_providing_attachment_four')}}</label>
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
