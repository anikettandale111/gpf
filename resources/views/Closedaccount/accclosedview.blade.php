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
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.menu_form_namnirdeshan')}} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('accountclosed/create')}}" type="button" class="btn btn-success pull-right" >Create New</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box ">
              @if(count($viewapplication))
              @foreach($viewapplication AS $key => $row)
              <div class="col-sm-3">
                <label>{{trans('language.fr_common_gpf_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->employee_gpf_num}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_common_user_name')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->user_name}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_common_user_designation')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->user_designation}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_common_user_joining_date')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->user_joining_date}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.th_user_registration_taluka')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->user_taluka_name}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.th_user_registration_department')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->user_department}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_relation')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->applicant_relation}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_applicant_name')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->applicant_name}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_applicantion_date')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->applicantion_date}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_gat_vikas_adhikari_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->gat_vikas_adhikari_no}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_zp_adhikari_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->zp_adhikari_no}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_pryojan')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_pryojan}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_pay_month')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_pay_month}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_pay_year')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_pay_year}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_6pay_month')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_6pay_month}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_6pay_year')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_6pay_year}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_instllment_month')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_instllment_month}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_instllment_year')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_instllment_year}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_gat_vikas_adhikari_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->gat_vikas_adhikari_no}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_zp_adhikari_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->zp_adhikari_no}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_to_vibhag_samiti_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->vibhag_samiti_no}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_to_transfer_prmotion_office')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->transfer_prmotion_office}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_to_transfer_office_gpf_no')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->transfer_office_gpf_no}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_to_application_copy_kramanak_one')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->application_copy_kramanak_one}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_to_application_copy_kramanak_two')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->application_copy_kramanak_two}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.fr_to_application_copy_kramanak_three')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->application_copy_kramanak_three}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_fo_antim_pryojan')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->antim_pryojan}}">
              </div>
              <div class="col-sm-3">
                <label>{{trans('language.account_closed_ft_transfer')}}</label>
                <input type="text" class="form-control" readonly value="{{$row->account_closed_ft_transfer}}">
              </div>
              @endforeach
              @else
              <span><h4>Invalid Application ID</h4></span>
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
@endsection
@push('custom-scripts')
@endpush
