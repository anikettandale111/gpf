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
                   <!--  @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                        </div>
                    @elseif($message = Session::get('false'))
                        <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                        </div>
                    @endif -->
                </div>
                <div class="x_content">
                    <br />
                    <form method="POST" class="validatedForm" action="{{ url('create_register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_name')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_phone')}}</label>

                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_confirm_password')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_taluka')}}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="taluka">
                                    <option value="">--Select--</option>
                                    @foreach($taluka as $k => $v)
                                        <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_user_registration_department')}}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="">--Select--</option>
                                    @foreach($department as $k => $v)
                                        <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="x_panel">
                    <div class="">
                        @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('info'))
                        <div class="alert alert-info alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                               <tr>
                                                  <th>{{trans('language.th_user_registration_s_no')}} </th>
                                                  <th> {{trans('language.th_user_registration_name')}} </th>
                                                  <th>{{trans('language.th_user_registration_phone')}}  </th>
                                                  <th>{{trans('language.th_user_registration_email')}}</th>
                                                  <th>{{trans('language.th_user_registration_taluka')}}  </th>
                                                  <th>{{trans('language.th_user_registration_department')}}</th>
                                                  <th>{{trans('language.th_user_registration_created')}}</th>
                                                  <th>{{trans('language.btn_action')}}</th>
                                              </tr>
                                          </thead>
                                           <tbody>
                                                @if(count($users))
                                                @foreach($users as $temp)
                                                <tr>
                                                <td>{{$loop->index+1}}</td>
                                                    <td>{{$temp->name}}</td>
                                                    <td>{{$temp->phone}}</td>
                                                    <td>{{$temp->email }}</td>
                                                    <td>{{$temp->taluka_name}}</td>
                                                    <td>{{$temp->dept_name}}</td>
                                                    <td>{{$temp->created}}</td>
                                                     <td>
                                                        <a href="{{url('user_registration_Edit',[$temp->id])}}">
                                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target=""><i class="fa fa-edit"></i> </button></a>
                                                        <!-- <a href="{{url('Registration_Delete',$temp->id)}}">
                                                        <button type="button" class="btn btn-danger "><i class="fa fa-trash"></i> </button></a> -->
                                                        @if($temp->isactive == 1)
                                                        <a href="{{url('Registration_Delete',$temp->id)}}/Active">
                                                        <button type="button" class="btn btn-success ">Active </button></a>
                                                        @else
                                                        <a href="{{url('Registration_Delete',$temp->id)}}/inactive">
                                                        <button type="button" class="btn btn-danger">In-Active </button></a>
                                                        @endif

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
<script type="text/javascript">
  $(document).ready(function() {
  //jQuery code goes here
  $('.validatedForm').validate({
      rules : {
        name:"required",
        phone: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
        },
        email:"required email",
        password : {
          minlength : 5
        },
        password_confirmation : {
          minlength : 5,
          equalTo : "#password"
        },
        taluka:"required",
        department:"required",
      },
      messages: {
            name: "Enter your Name",
            phone: {
              required: "Please enter phone number",
              digits: "Please enter valid phone number",
              minlength: "Phone number field accept only 10 digits",
              maxlength: "Phone number field accept only 10 digits",
            },
            email: {
                required: "Enter your Email",
                email: "Please enter a valid email address.",
            },
            taluka: "Plese Select Taluka",
            department: "Plese Select Department",
        }
    });
});
</script>
@endsection
