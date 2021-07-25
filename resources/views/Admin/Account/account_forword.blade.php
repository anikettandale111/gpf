@extends('Section.app')
<style media="screen">
.hidethis{
  display: none;
}
</style>
@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="validatedForm" action="{{url('/accforword')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group row">
              <div class="col-md-3">
                <label>{{trans('language.th_Closing_b_n_n_no')}} <span class="required"></span></label>
                <input class="form-control allow-numbers" id="employee_gpf_num" name="employee_gpf_num" type="text" />
              </div>
              <div class="col-md-3 hidethis showthis">
                <label>{{trans('language.fr_common_user_name')}}</label>
                <input type="text" class="form-control clearfield" name="user_name" id="user_name">
              </div>
              <div class="col-md-3 hidethis showthis">
                <label>{{trans('language.fr_common_user_joining_date')}}</label>
                <input type="text" class="form-control clearfield" name="user_joining_date" id="user_joining_date" readonly>
              </div>
              <div class="col-md-3 hidethis showthis">
                <label>{{trans('language.th_providing_date_of_retirement')}}</label>
                <input type="text" class="form-control clearfield" name="user_retirement_date" id="user_retirement_date" readonly>
              </div>
            </div>
            <div class="col-md-4 ">
              <button type="button" class="btn btn-success"> <i class="fa fa-floppy-o"></i> {{trans('language.btn_save')}} </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/account-forword.js')}}"></script>
@endpush
