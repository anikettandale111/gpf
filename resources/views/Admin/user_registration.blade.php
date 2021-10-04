@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{trans('language.h_user_registration')}}</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                <form method="post" class="validatedForm form-group" action="{{url('user_registration')}}">
                  @csrf
                  <input id="user_id" type="hidden" name="user_id" value="0" >
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_name')}}</label>
                    <input id="name" type="text" class="form-control" name="name" required >
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_phone')}}</label>
                    <input id="phone" type="text" class="form-control" name="phone" required >
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_email')}}</label>
                    <input id="email" type="text" class="form-control" name="email" required autocomplete="off">
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_password')}}</label>
                    <input id="password" type="password" class="form-control" name="password" autocomplete="off">
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_confirm_password')}}</label>
                    <input id="password_confirm" type="password" class="form-control" name="password_confirm" autocomplete="off">
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_taluka')}}</label>
                    <select class="form-control" name="taluka" id="taluka">
                      <option value="">--Select--</option>
                      @foreach($taluka as $k => $v)
                      <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.designation')}}</label>
                    <select class="form-control" name="designation" id="designation">
                      <option value="">--Select--</option>
                      @foreach($designation as $k => $v)
                      <option value="{{$k}}">{{$v}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label >{{trans('language.role')}}</label>
                    {!! Form::select('roles[]', $role,[], array('class' => 'form-control','multiple',"id"=>"roles")) !!}
                    
                  </div>
                  <div class="col-sm-4">
                    <label>{{trans('language.th_user_registration_department')}}</label>
                    <select class="form-control" name="department" id="department">
                      <option value="">--Select--</option>
                      @foreach($department as $k => $v)
                      <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="clear-fix"></div>
                  <div class="col-sm-6 mt-3">
                    <button type="submit" class="btn btn-primary createuser" style="width:100%">
                      {{ __('Save') }}
                    </button>
                  </div>
                  <div class="col-sm-6 mt-3">
                    <button type="button" class="btn btn-secondary" style="width:100%">
                      {{ __('Cancel') }}
                    </button>
                  </div>
                </form>
              </div>
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="usersTable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>{{trans('language.th_user_registration_s_no')}} </th>
                              <th>{{trans('language.th_user_registration_name')}} </th>
                              <th>{{trans('language.th_user_registration_phone')}}  </th>
                              <th>{{trans('language.th_user_registration_email')}}</th>
                              <th>{{trans('language.th_user_registration_taluka')}}  </th>
                              <th>{{trans('language.th_user_registration_department')}}</th>
                              <th>{{trans('language.btn_action')}}</th>
                            </tr>
                          </thead>
                          <tbody>
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
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/userRegistration.js')}}"></script>
@endpush
