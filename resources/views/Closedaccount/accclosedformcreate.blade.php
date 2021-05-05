@extends('Section.app')
<style media="screen">
.form_two{
  display: none;
}
.form_one{
  display: none;
}
</style>
@section('content')

@php $html_month='';$html_year='';$html_designations='';$current_year = date('Y');  @endphp
@foreach($month_data AS $key => $month)
@php $html_month .= '<option value="'.$month->month_id.'-'.$month->month_name.'">'.$month->month_name.'</option>'; @endphp
@endforeach
@foreach($desg_data AS $key => $desg)
@php $html_designations .= '<option value="'.$desg->desg_id.'-'.$desg->designation_name.'">'.$desg->designation_name.'</option>'; @endphp
@endforeach
@for($i=0;$i < 5;$i++)
  @if($i==0)
  @php  $html_year .= '<option value="'.($current_year+1).'">'.($current_year+1).'</option>'; @endphp
  @php  $html_year .= '<option value="'.($current_year).'">'.($current_year).'</option>'; @endphp
  @else
  @php $html_year .= '<option value="'.($current_year-$i).'">'.($current_year-$i).'</option>'; @endphp
  @endif
@endfor
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.menu_form_namnirdeshan')}} </h2>
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
                <div class="clearfix"></div>
                <div class="col-sm-6 mt-3">
                  <button type="button" class="btn btn-secondary form_one_show" style="width:100%" name="button">{{trans('language.account_closed_fo_name')}}</button>
                </div>
                <div class="col-sm-6 mt-3">
                  <button type="button" class="btn btn-secondary form_two_show" style="width:100%" name="button">{{trans('language.account_closed_ft_name')}}</button>
                </div>
                <div class="clearfix"></div>
                <input type="hidden" class="form-control" name="form_type" id="form_type" >
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_relation')}}</label>
                  <select class="form-control form_one_val" name="applicant_relation" id="applicant_relation" >
                    <option value="self">स्वतः</option>
                    <option value="wife">पत्नी</option>
                    <option value="son">मुलगा</option>
                    <option value="daughter">मुलगी</option>
                    <select>
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_applicant_name')}}</label>
                      <input type="text" class="form-control form_one_val" name="applicant_name" id="applicant_name" >
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_applicantion_date')}}</label>
                      <input type="date" class="form-control form_one_val" name="applicantion_date" id="applicantion_date" >
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_gat_vikas_adhikari_no')}}</label>
                      <input type="text" class="form-control form_one_val" name="gat_vikas_adhikari_no" id="gat_vikas_adhikari_no" >
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_zp_adhikari_no')}}</label>
                      <input type="text" class="form-control form_one_val" name="zp_adhikari_no" id="zp_adhikari_no" >
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_pryojan')}}</label>
                      <select class="form-control form_one_val" name="antim_pryojan" id="antim_pryojan" >
                        <option value="retirment">{{trans('language.antim_pryojan_reason_one')}}</option>
                        <option value="promotion">{{trans('language.antim_pryojan_reason_two')}}</option>
                        <option value="transfer">{{trans('language.antim_pryojan_reason_three')}}</option>
                        <option value="dismissed">{{trans('language.antim_pryojan_reason_four')}}</option>
                        <option value="death">{{trans('language.antim_pryojan_reason_five')}}</option>
                      </select>
                    </div>
                      <input type="hidden" class="form-control form_one_val" name="fo_closing_balance" id="fo_closing_balance" value="0">
                    <!-- <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_closing_balance')}}</label>
                    </div> -->
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_retirment_date')}}</label>
                      <input type="date" class="form-control form_one_val" name="fo_retirment_date" id="fo_retirment_date" >
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_pay_month')}}</label>
                      <select class="form-control form_one_val" name="antim_pay_month" id="antim_pay_month">
                        {!! $html_month !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_pay_year')}}</label>
                      <select class="form-control form_one_val" name="antim_pay_year" id="antim_pay_year">
                        {!! $html_year !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_6pay_month')}}</label>
                      <select class="form-control form_one_val" name="antim_6pay_month" id="antim_6pay_month">
                        {!! $html_month !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_6pay_year')}}</label>
                      <select class="form-control form_one_val" name="antim_6pay_year" id="antim_6pay_year">
                        {!! $html_year !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_instllment_month')}}</label>
                      <select class="form-control form_one_val" name="antim_instllment_month" id="antim_instllment_month">
                        {!! $html_month !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_one">
                      <label>{{trans('language.account_closed_fo_antim_instllment_year')}}</label>
                      <select class="form-control form_one_val" name="antim_instllment_year" id="antim_instllment_year">
                        {!! $html_year !!}
                      </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 form_one mt-3">
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" name="button" style="width:100%">{{trans('language.btn_save')}}</button>
                      </div>
                      <div class="col-sm-3">
                        <button type="button" class="btn btn-secondary" name="button" style="width:100%">{{trans('language.btn_cancel')}}</button>
                      </div>
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.account_closed_fo_gat_vikas_adhikari_no')}}</label>
                      <input type="text" class="form-control form_two_val" name="fo_gat_vikas_adhikari_no" id="fo_gat_vikas_adhikari_no" >
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.account_closed_fo_zp_adhikari_no')}}</label>
                      <input type="text" class="form-control form_two_val" name="fo_zp_adhikari_no" id="fo_zp_adhikari_no" >
                    </div>
                      <input type="hidden" class="form-control form_two_val" name="fo_closing_balance" id="fo_closing_balance" value="0">
                    <!-- <div class="col-sm-3 form_two">
                      <label>{{trans('language.account_closed_fo_closing_balance')}}</label>
                    </div> -->
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.account_closed_fo_retirment_date')}}</label>
                      <input type="date" class="form-control form_two_val" name="fo_retirment_date" id="fo_retirment_date" >
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.fr_to_vibhag_samiti_no')}}</label>
                      <input type="text" class="form-control form_two_val" name="vibhag_samiti_no" id="vibhag_samiti_no">
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.fr_to_transfer_prmotion_office')}}</label>
                      <input type="text" class="form-control form_two_val" name="transfer_prmotion_office" id="transfer_prmotion_office">
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.fr_to_transfer_office_gpf_no')}}</label>
                      <input type="text" class="form-control form_two_val" name="transfer_office_gpf_no" id="transfer_office_gpf_no">
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.fr_to_application_copy_kramanak_one')}}</label>
                      <select class="form-control form_two_val" name="application_copy_kramanak_one" id="application_copy_kramanak_one">
                        {!! $html_designations !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.fr_to_application_copy_kramanak_two')}}</label>
                      <select class="form-control form_two_val" name="application_copy_kramanak_two" id="application_copy_kramanak_two">
                        {!! $html_designations !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.fr_to_application_copy_kramanak_three')}}</label>
                      <select class="form-control form_two_val" name="application_copy_kramanak_three" id="application_copy_kramanak_three">
                        {!! $html_designations !!}
                      </select>
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.account_closed_fo_antim_pryojan')}}</label>
                      <select class="form-control form_two_val" name="antim_pryojan" id="antim_pryojan" >
                        <option value="retirment">{{trans('language.antim_pryojan_reason_one')}}</option>
                        <option value="promotion">{{trans('language.antim_pryojan_reason_two')}}</option>
                        <option value="transfer">{{trans('language.antim_pryojan_reason_three')}}</option>
                        <option value="dismissed">{{trans('language.antim_pryojan_reason_four')}}</option>
                        <option value="death">{{trans('language.antim_pryojan_reason_five')}}</option>
                      </select>
                    </div>
                    <div class="col-sm-3 form_two">
                      <label>{{trans('language.account_closed_ft_transfer')}}</label>
                      <input type="text" class="form-control form_two_val" name="account_closed_ft_transfer" id="account_closed_ft_transfer">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 form_two mt-3">
                      <div class="col-sm-3 ">
                        <button type="submit" class="btn btn-success" name="button">{{trans('language.btn_save')}}</button>
                      </div>
                      <div class="col-sm-3 ">
                        <button type="button" class="btn btn-secondary" name="button">{{trans('language.btn_cancel')}}</button>
                      </div>
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
    <script type="text/javascript" src="{{URL('js/accclosedform.js')}}"></script>
    @endpush
