@extends('Section.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('language.h_providing_account_numbe')}} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>

                </div>
                <div class="x_content">
                    <br />
                    <form method="POST" class="validatedForm" action="{{ url('ganrate_insert_no') }}">
                        @csrf
                         <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_classification')}} </label>

                            <div class="col-md-6">
                                <select class="form-control mySelect" name="classification" class="form-control @error('classification ') is-invalid @enderror" required autocomplete="classification" autofocus id="mySelect">

                                     <option value="">-- निवडा वर्गीकरण --</option>
                                    @foreach($classification as $k => $v)
                                        <option value="{{$v->id}}">{{$v->classification_name_mar}}</option>
                                    @endforeach
                                </select>
                                  @error('classification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="gpf_no" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_b_n_n_no')}}</label>
                           <div class="col-md-2">
                                <input id="bno" type="text" class="form-control gpf_number" name=" ">
                            </div>
                               <div class="col-md-4">
                                <input id="gpf_no" type="text" class="form-control @error('gpf_no') is-invalid @enderror"
                                 name="gpf_no" value="{{ old('gpf_no') }}"
                                  placeholder="Enter The GPF Number" readonly>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_taluka')}}</label>

                            <div class="col-md-6">
                                <select class="form-control  @error('taluka') is-invalid @enderror" name="taluka" value="{{ old('taluka') }}"  autocomplete="taluka" autofocus>
                                   <option value="">-- निवडा तालुका --</option>
                                    @foreach($taluka as $k => $v)
                                        <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                                    @endforeach
                                </select>
                                  @error('taluka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_department')}}</label>

                            <div class="col-md-6">
                                  <select class="form-control  @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>

                                   <option value="">-- निवडा विभाग --</option>
                                    @foreach($department as $k => $v)
                                        <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                                    @endforeach
                                </select>
                                  @error('taluka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_name')}}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_designation')}}</label>

                            <div class="col-md-6">
                                <select class="form-control  @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>
                                 <option value="">-- निवडा पदनाम --</option>
                                    @foreach($designation as $k => $v)
                                        <option value="{{$v->id}}">{{$v->designation_name_mar}}</option>
                                    @endforeach
                                </select>
                                  @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_account_no')}}</label>
                            <div class="col-md-6">
                                <input class="form-control" name="account_no"  class="form-control @error('account_no') is-invalid @enderror" id="account_no" value="{{ old('account_no') }}" required autocomplete="account_no" autofocus>

                                 @error('account_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_date_of_birth')}}</label>

                            <div class="col-md-6">
                                <input type="date" name="date_of_birthday" class="form-control @error('date_of_birthday') is-invalid @enderror" id="date_of_birthday" value="{{ old('date_of_birthday') }}" required autocomplete="date_of_birthday" autofocus>
                                @error('date_of_birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_date_dated')}}</label>

                            <div class="col-md-6">
                                <input type="date" name="date_birth" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth" value="{{ old('date_birth') }}" required autocomplete="date_birth" autofocus>
                                  @error('date_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_date_of_retirement')}}</label>

                            <div class="col-md-6">
                                <input type="date" name="date_dated" class="form-control @error('date_dated') is-invalid @enderror" id="date_dated" value="{{ old('date_dated') }}" required autocomplete="date_dated" autofocus>

                                 @error('date_dated')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_letter_no')}}</label>

                            <div class="col-md-6">
                                <input type="text" name="c_v_letter" class="form-control @error('c_v_letter') is-invalid @enderror" id="c_v_letter" value="{{ old('c_v_letter') }}" required autocomplete="c_v_letter" autofocus>


                                   @error('c_v_letter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror


                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_whether_to_a_n')}}</label>

                            <div class="col-md-6 mt-2">
                                  <input type="radio" name="yes" class="@error('yes') is-invalid @enderror" id="yes" value="1" required autocomplete="yes" autofocus> होय
                                  <input type="radio" name="yes" class=" @error('yes') is-invalid @enderror" id="yes" value="0" required autocomplete="yes" autofocus> नाही

                                  @error('yes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{trans('language.btn_save')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{trans('language.h_providing_account_numbe')}}</h2>
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
                                                  <th> {{trans('language.th_providing_no')}} </th>
                                                  <th> {{trans('language.th_providing_classification')}} </th>
                                                  <th> {{trans('language.th_providing_b_n_n_no')}} </th>
                                                  <th> {{trans('language.th_providing_taluka')}} </th>
                                                  <th> {{trans('language.th_providing_department')}} </th>
                                                  <th> {{trans('language.th_providing_name')}} </th>
                                                  <th> {{trans('language.th_providing_designation')}} </th>
                                                  <th> {{trans('language.th_providing_account_no')}} </th>
                                                  <th> {{trans('language.th_providing_date_of_birth')}} </th>
                                                  <th> {{trans('language.th_providing_date_dated')}} </th>
                                                  <th> {{trans('language.th_providing_date_of_retirement')}} </th>
                                                  <th> {{trans('language.th_providing_letter_no')}} </th>
                                                   <th> {{trans('language.btn_action')}} </th>

                                              </tr>
                                          </thead>
                                           <tbody>
                                              @if(count($ganrate))
                                                @foreach($ganrate as $temp)
                                                <tr id="{{$temp->id}}">
                                                <td>{{$loop->index+1}}</td>
                                                    <td>{{$temp->classification_name_mar}}</td>
                                                    <td>{{$temp->inital_letter}}{{$temp->gpf_no}}</td>
                                                    <td>{{$temp->taluka_name_mar }}</td>
                                                    <td>{{$temp->department_name_mar}}</td>
                                                    <td>{{$temp->name}}</td>
                                                    <td>{{$temp->designation_name_mar}}</td>
                                                    <td>{{$temp->account_no}}</td>
                                                    <td>{{$temp->date_of_birthday}}</td>
                                                    <td>{{$temp->date_birth}}</td>
                                                    <td>{{$temp->date_dated}}</td>
                                                    <td>{{$temp->c_v_letter}}</td>
                                                     <td>
                                                        <button class="btn btn-danger btn-flat btn-sm remove-user"
                                                        data-id="{{ $temp->id }}" data-action="{{ url('ganrate_Delete','$temp->id') }}" onclick="deleteConfirmation('{{$temp->id}}')"> <i class="fa fa-trash"></i>
                                                        </button>
                                                        <a href="{{url('ganrate_reports',$temp->id)}}">
                                                        <button type="button" class="btn btn-success "><i class="fa fa-print" aria-hidden="true"></i> </button></a>
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
            classification: {
                  required: true,
            },

            taluka:"required",
            department:"required",
            name:"required",
            designation:"required",
             account_no:
            {
                required: true,
                digits: "required",
            },
            date_of_birthday:"required",
            date_birth:"required",
            date_dated:"required",
            c_v_letter:"required",
            yes:"required",
        },
        messages: {
              classification:"Plese Select Classification",

             taluka: "Plese Select Taluka",
             department: "Plese Select Department",
             name:"Plese Enter The Name",
             designation: "Plese Select designation",
               account_no: {
                 required: "Please Enter Account Number",
            },
              date_of_birthday:"Please Enter Birthday Date",
              date_birth:"Please Enter Resume Date",
              date_dated:"Please Enter Retirement  Date",
              c_v_letter:"Please Enter C .v .a / c .shi. Letter no. Of PNS taluka ",
              yes:" Want to provide account number?",
        }
    });

});

  function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please    and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0

        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/ganrate_Delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                      $('#'+results.id).remove();
                    }

                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

    }
       $('.mySelect').on('change', function() {
  var value = $(this).val();

  if(value == 'p')
  {
    gpf = "P";
  }
  else
  {
    gpf = "O";
  }
  $('.gpf_number').val(gpf);
});
</script>


@endsection
