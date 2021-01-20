@extends('Section.app')

@section('content')
<div class="">        
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>लेखाक्रमांक प्रदान करणे</h2>
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
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{ __('वर्गीकरण ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="">--Select--</option>
                                    @foreach($classification as $k => $v)
                                        <option value="{{$v->id}}">{{$v->classification}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('भ.नि .नि क्रमांक ') }}</label>

                            <div class="col-md-2">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="col-md-4">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{ __('तालुका  संकेतांक  ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="taluka">
                                    <option value="">--Select--</option>
                                    @foreach($taluka as $k => $v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{ __('विभाग संकेतांक') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="">--Select--</option>
                                    @foreach($department as $k => $v)
                                        <option value="{{$v->id}}">{{$v->department_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('नाव ') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('पदनाम ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="">--Select--</option>
                                    @foreach($designation as $k => $v)
                                        <option value="{{$v->id}}">{{$v->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('खाते क्र ') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ग .वि .अ/ ग .शि. अ .पं.स तालुका यांचे पत्र क्रं') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>लेखाक्रमांक प्रदान करणे</h2>
                        <div class="clearfix"></div>
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
                                                  <th>  क्र </th>
                                                  <th> वर्गीकरण </th>
                                                  <th>भ.नि .नि क्रमांक  </th>
                                                  <th>तालुका संकेतांक</th>
                                                  <th>विभाग संकेतांक  </th>
                                                  <th>नाव</th>
                                                  <th>पदनाम</th>
                                                  <th>खाते क्र</th>
                                                  <th>ग .वि .अ/ ग .शि. अ .पं.स तालुका यांचे पत्र क्रं</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                           <tbody>
                                             <tr>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                             </tr>
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
  $('')
});
</script>
@endsection