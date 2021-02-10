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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th> {{trans('language.th_providing_no')}} </th>
                                            <th> {{trans('language.th_providing_application_number')}} </th>
                                            <th> {{trans('language.th_providing_name')}} </th>
                                            <th> {{trans('language.th_providing_department')}} </th>
                                            <th> {{trans('language.th_providing_designation')}} </th>
                                            <th> {{trans('language.th_providing_designation')}} </th>
                                            <th> {{trans('language.th_providing_status')}}</th>
                                            <!-- <th> {{trans('language.th_providing_date_of_birth')}} </th>
                                            <th> {{trans('language.th_providing_date_dated')}} </th>
                                            <th> {{trans('language.th_providing_date_of_retirement')}} </th>
                                            <th> {{trans('language.th_providing_letter_no')}} </th>
                                            <th> {{trans('language.th_providing_bank')}} </th>
                                            <th> {{trans('language.th_providing_branch')}} </th>
                                            <th> {{trans('language.th_providing_account_no')}} </th>
                                            <th> {{trans('language.th_providing_i_f_s_c_code')}} </th> -->
                                            <th> {{trans('language.btn_action')}} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($master_employee_view))
                                        @foreach($master_employee_view as $temp)
                                        <tr id="{{$temp->id}}">
                                            <td>{{$loop->index+1}}</td>
                                            <!-- <td>{{$temp->classification_name_mar}}</td> -->
                                            <td>{{$temp->inital_letter}} {{$temp->gpf_no}}</td>
                                            <td>{{$temp->employee_name}}</td>
                                            <td>{{$temp->department_name_mar}}</td>
                                            <td>{{$temp->designation_name_mar}}</td>
                                            <td>{{date('d/m/Y',strtotime($temp->created_at))}}</td>
                                            <td>{{date('d/m/Y',strtotime($temp->created_at))}}</td>
                                            <!-- <td>{{$temp->date_of_birth}}</td>
                                            <td>{{$temp->joining_date}}</td>
                                            <td>{{$temp->retirement_date}}</td>
                                            <td>{{$temp->c_v_letter}}</td>
                                            <td>{{$temp->bank_name_mar}}</td>
                                            <td>{{$temp->branch_location}}</td>
                                            <td>{{$temp->bank_account_no}}</td>
                                            <td>{{$temp->ifsc_code}}</td> -->
                                            <td>

                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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
