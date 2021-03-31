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
              <form class="form-group account_closed" action="index.html" method="post">
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_gpf_no')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_name')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_designation')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_user_joining_date')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_registration_taluka')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.th_user_registration_department')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  <label></label>
                  <button type="button" class="btn btn-secondary form_one_show" style="width:100%" name="button">{{trans('language.account_closed_fo_name')}}</button>
                </div>
                <div class="col-sm-6">
                  <label></label>
                  <button type="button" class="btn btn-secondary form_two_show" style="width:100%" name="button">{{trans('language.account_closed_ft_name')}}</button>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_relation')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_applicant_name')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_applicantion_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_gat_vikas_aghikari_no')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_zp_aghikari_no')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_pryojan')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_pay_month')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_pay_year')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_6pay_month')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_6pay_year')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_instllment_month')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_one">
                  <label>{{trans('language.account_closed_fo_antim_instllment_year')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-3 form_one">
                  <button type="button" class="btn btn-success" name="button">{{trans('language.btn_save')}}</button>
                  <button type="button" class="btn btn-secondary" name="button">{{trans('language.btn_cancel')}}</button>
                </div>
                <div class="col-sm-3 form_two">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_two">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_two">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_two">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_two">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
                </div>
                <div class="col-sm-3 form_two">
                  <label>{{trans('language.fr_common_app_date')}}</label>
                    <input type="text" class="form-control" name="" value="">
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
