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
          <form method="POST" class="validatedForm" action="{{ url('ganrate_insert_no') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-md-4">
                <label for="taluka" >{{trans('language.th_providing_classification')}} </label>
                <select class="form-control mySelect" name="classification_id">
                  <option value="">{{trans('language.th_providing_select_classification')}}</option>
                  @foreach($classification as $k => $v)
                  <option value="{{$v->id}}" data-letter="{{$v->inital_letter}}">{{$v->classification_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="new_application_gpf_no" >{{trans('language.th_providing_application_number')}}</label>
                <div class="row">
                  <div class="col-sm-2">
                    <input id="inital_letter" type="text" class="form-control app_number" name="inital_letter" readonly>
                  </div>
                  <div class="col-sm-10">
                    <input id="new_application_gpf_no" type="text" class="form-control @error('new_application_gpf_no') is-invalid @enderror" name="new_application_gpf_no" value="{{ old('new_application_gpf_no') }}" placeholder="Enter The GPF Number" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label > {{trans('language.th_providing_employee_seva_number')}} <span class="required"></span></label>
                <input class="form-control" type="text" name="employee_id" id="employee_id" required='required'>
              </div>
              <div class="form-group col-md-4">
                <label for="taluka" >{{trans('language.th_providing_taluka')}}</label>
                <select class="form-control  @error('taluka') is-invalid @enderror" name="taluka_id" value="{{ old('taluka') }}" autocomplete="off" autofocus>
                  <option value="">{{trans('language.th_providing_select_taluka')}}</option>
                  @foreach($taluka as $k => $v)
                  <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="taluka" >{{trans('language.th_providing_department')}}</label>
                <select class="form-control  @error('department') is-invalid @enderror" name="department_id" value="{{ old('department') }}" required autocomplete="off" autofocus>
                  <option value="">{{trans('language.th_providing_select_department')}}</option>
                  @foreach($department as $k => $v)
                  <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_name')}}</label>
                <input type="text" name="employee_name" class="form-control @error('name') is-invalid @enderror" id="employee_name" value="{{ old('name') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label for="taluka" >{{trans('language.th_providing_designation')}}</label>
                <select class="form-control  @error('designation') is-invalid @enderror" name="designation_id" value="{{ old('designation') }}" required autocomplete="off" autofocus>
                  <option value="">{{trans('language.th_providing_select_designation')}}</option>
                  @foreach($designation as $k => $v)
                  <option value="{{$v->id}}">{{$v->designation_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_date_of_birth')}}</label>
                <input type="date" name="date_of_birthday" class="form-control @error('date_of_birthday') is-invalid @enderror" id="date_of_birthday" value="{{ old('date_of_birthday') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_joining_date')}}</label>
                <input type="date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror" id="joining_date" value="{{ old('joining_date') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_date_of_retirement')}}</label>
                <input type="date" name="retirement_date" class="form-control @error('retirement_date') is-invalid @enderror" id="retirement_date" value="{{ old('retirement_date') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label >{{trans('language.th_providing_bank')}} <span class="required"></span></label>
                <select class="form-control" name="bank_id" id="bank_id" >
                  <option value="">{{trans('language.th_providing_select_bank')}}</option>
                  @foreach ($bank as $bank)
                  <option value="{{$bank->id}}">{{$bank->bank_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label > {{trans('language.th_providing_branch')}} <span class="required"></span></label>
                <input class="form-control" type="text" name="branch_location" id="branch_location" required='required'>
              </div>
              <div class="form-group col-md-4">
                <label > {{trans('language.th_providing_i_f_s_c_code')}} <span class="required"></span></label>
                <input class="form-control" type="text" name="IFSC_code" id="IFSC_code" required='required'>
              </div>
              <div class="form-group col-md-4">
                <label for="taluka" >{{trans('language.th_providing_account_no')}}</label>
                <input name="bank_account_no" class="allow-numbers form-control @error('bank_account_no') is-invalid @enderror" id="account_no" value="{{ old('bank_account_no') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_opening_balance')}}</label>
                <input type="text" name="opening_balance" class="allow-numbers form-control @error('opening_balance') is-invalid @enderror" id="opening_balance" value="{{ old('opening_balance') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_letter_no')}}</label>
                <input type="text" name="c_v_letter" class="form-control @error('c_v_letter') is-invalid @enderror" id="c_v_letter" value="{{ old('c_v_letter') }}" required autocomplete="off" autofocus>
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_whether_to_a_n')}}</label><br>
                <input type="radio" name="gpf_no_status" class="@error('yes') is-invalid @enderror" id="yes" value="1" required autocomplete="off" autofocus> {{trans('language.th_providing_gpf_yes_status')}}
                <input type="radio" name="gpf_no_status" class=" @error('yes') is-invalid @enderror" id="no" value="0" required autocomplete="off" autofocus checked> {{trans('language.th_providing_gpf_no_status')}}
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_attachment_one')}}</label>
                <input type="file" name="attachment_one" class="form-control @error('attachment_one') is-invalid @enderror" id="attachment_one" required >
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_attachment_two')}}</label>
                <input type="file" name="attachment_two" class="form-control @error('attachment_two') is-invalid @enderror" id="attachment_two" required >
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_attachment_three')}}</label>
                <input type="file" name="attachment_three" class="form-control @error('attachment_three') is-invalid @enderror" id="attachment_three" required >
              </div>
              <div class="form-group col-md-4">
                <label for="name" >{{trans('language.th_providing_attachment_four')}}</label>
                <input type="file" name="attachment_four" class="form-control @error('attachment_four') is-invalid @enderror" id="attachment_four" required >
              </div>
            </div>

            <div class="col-md-4 mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o"> </i>
                  {{trans('language.btn_save')}}
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="x_panel">
          <div class="x_title">
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
                      @if(count($ganrate))
                      @foreach($ganrate as $temp)
                      <tr id="{{$temp->id}}">
                        <td>{{$loop->index+1}}</td>
                        <!-- <td>{{$temp->classification_name_mar}}</td> -->
                        <td>{{$temp->inital_letter}} {{$temp->app_no}}</td>
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
                        <a href="{{url('genarate_view',$temp->id)}}"
                           class="btn btn-info btn-flat btn-sm view-user"> View

                          </a>
                          <!-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $temp->id }}"
                           data-action="{{ url('ganrate_Delete','$temp->id') }}" onclick="deleteConfirmation('{{$temp->id}}')">
                           <i class="fa fa-trash"></i>
                          </button> -->
                          <!-- <a href="{{url('assigned_gpf_number',$temp->id)}}" target="_blank">
                            <button type="button" class="btn btn-success "><i class="fa fa-eye" aria-hidden="true"></i>
                            </button></a> -->
                            <button>
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
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
      //jQuery code goes here
      $('.validatedForm').validate({
        rules: {
          classification: {
            required: true,
          },

          taluka: "required",
          department: "required",
          name: "required",
          designation: "required",
          account_no: {
            required: true,
            digits: "required",
          },
          date_of_birthday: "required",
          date_birth: "required",
          date_dated: "required",
          c_v_letter: "required",
          yes: "required",
        },
        messages: {
          classification: "Plese Select Classification",

          taluka: "Plese Select Taluka",
          department: "Plese Select Department",
          name: "Plese Enter The Name",
          designation: "Plese Select designation",
          account_no: {
            required: "Please Enter Account Number",
          },
          date_of_birthday: "Please Enter Birthday Date",
          date_birth: "Please Enter Resume Date",
          date_dated: "Please Enter Retirement  Date",
          c_v_letter: "Please Enter C .v .a / c .shi. Letter no. Of PNS taluka ",
          yes: " Want to provide account number?",
        }
      });

    });

    function deleteConfirmation(id) {
      swal({
        title: "Delete?",
        text: "Please confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0

      }).then(function(e) {

        if (e.value === true) {

          $.ajax({
            type: 'POST',
            url: "{{url('/ganrate_Delete')}}/" + id,
            data: {
              _token: CSRF_TOKEN
            },
            dataType: 'JSON',
            success: function(results) {

              $('#' + results.id).remove();
            }
          });

        } else {
          e.dismiss;
        }

      }, function(dismiss) {
        return false;
      })

    }
    $('.mySelect').on('change', function() {
      var value = $(this);
      var option = $('option:selected', this).attr('data-letter');
      $('.app_number').val(option);
      $.ajax({
        type: 'GET',
        url: "{{url('/getLastApplicationNo')}}",
        data: {
          _token: CSRF_TOKEN
        },
        success: function(results) {
          if (results == null || results == '') {
            var new_no = "{{Config::get('custom.gpf_no_prefix_text')}}"+1;
          } else {
            var new_no =  "{{Config::get('custom.gpf_no_prefix_text')}}"+(parseInt(results) + 1);
          }
          $('#new_application_gpf_no').val(new_no);
        }
      });
    });

    </script>
    @endsection
