@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('language.h_basic_employee_information')}}</h2>
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

                    <form class="validatedForm" action="{{route('customer_registration.store')}}" method="POST" enctype="multipart/form-data" id="cform" novalidate>
                        {{csrf_field()}}
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"> {{trans('language.th_basic_employee_b_n_n_no')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <!--  <input class="form-control" class='optional ' id="gpf_no" name="gpf_no" data-validate-length-range="5,15" type="text" /> -->

                                <input id="gpf_no" type="text" class="form-control @error('gpf_no') is-invalid @enderror" name="gpf_no" value="{{ old('gpf_no') }}" required autocomplete="gpf_no" autofocus placeholder="Enter The GPF Number">

                                @error('gpf_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        </div>
                        <div class="field item form-group
                        ">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_taluka')}}<span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="taluka" id="taluka" class='email' readonly>
                                    <option value="">-- निवडा तालुका --</option>
                                    @foreach ($taluka as $temp)
                                    <option value="{{$temp->id}}">{{$temp->taluka_name_mar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_department')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" id="department" name="department" class='email'>

                                    <option value="">-- निवडा विभाग --</option>
                                    @foreach($department as $k => $v)
                                    <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_name')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" id="name" class='number' name="name" data-validate-minmax="10,100" required='required ' readonly>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_designation')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="designation" id="designation" class='designation'>
                                    <option value="">-- निवडा पदनाम --</option>
                                    @foreach ($designation as $designation)
                                    <option value="{{$designation->id}}">{{$designation->designation_name_mar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_classification')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="classification" id="classification" class='classification'>
                                    <option value="">-- निवडा वर्गीकरण --</option>
                                    @foreach ($classification as $classification)
                                    <option value="{{$classification->id}}">{{$classification->classification_name_mar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_date_of_birth')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="date" id="date_birth" name="date_birth" required='required'>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"> {{trans('language.th_basic_employee_date_dated')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="date" id="date_dated" name="date_dated" required='required'>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_date_of_retirement')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="date" id="retirement_date" name="retirement_date" required='required'>
                                @error('retirement_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_basic_employee_bank')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="bank"  id="bank"class='bank'>
                                    <option value="">-- निवडा बँकेत --</option>
                                    @foreach ($bank as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bank_name_mar}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"> {{trans('language.th_basic_employee_branch')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="text" name="branch"  id="branch"required='required'>

                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"> {{trans('language.th_basic_employee_i_f_s_c_code')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="text" name="IFSC_code" id="IFSC_code" required='required'>

                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"> {{trans('language.th_basic_employee_account_no')}} <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="text" id="account_no" name="account_no" required='required'>
                                @error('account_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> {{trans('language.btn_save')}} </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table
                                       table-striped table-bordered table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th> {{trans('language.th_basic_employee_no')}} </th>
                                            <th>{{trans('language.th_basic_employee_b_n_n_no')}}</th>
                                            <th>{{trans('language.th_basic_employee_taluka')}} </th>
                                            <th>{{trans('language.th_basic_employee_department')}}</th>
                                            <th>{{trans('language.th_basic_employee_name')}} </th>
                                            <th>{{trans('language.th_basic_employee_designation')}} </th>
                                            <th>{{trans('language.th_basic_employee_classification')}} </th>
                                            <th>{{trans('language.th_basic_employee_date_of_birth')}} </th>
                                            <th>{{trans('language.th_basic_employee_date_dated')}} </th>
                                            <th>{{trans('language.th_basic_employee_date_of_retirement')}} </th>
                                            <th>{{trans('language.th_basic_employee_bank')}}</th>
                                            <th>{{trans('language.th_basic_employee_branch')}} </th>
                                            <th>{{trans('language.th_basic_employee_i_f_s_c_code')}} </th>
                                            <th> {{trans('language.th_basic_employee_account_no')}}</th>
                                            <th> {{trans('language.btn_action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($customers))
                                        @foreach($customers as $customer)
                                        <tr id="{{$customer->id}}">
                                            <td>{{$loop->index+1}}</td>
                                            <td id="gpf_no_{{$customer->id}}" >{{$customer->gpf_no}}</td>
                                            <td id="taluka_name_mar_{{$customer->id}}" >{{$customer->taluka_name_mar}}</td>
                                            <td id="department_name_mar_{{$customer->id}}" >{{$customer->department_name_mar}}</td>
                                            <td id="name_{{$customer->id}}" >{{$customer->name}}</td>
                                            <td id="designation_name_mar_{{$customer->id}}" >{{$customer->designation_name_mar}}</td>
                                            <td id="classification_name_mar_{{$customer->id}}" >{{$customer->classification_name_mar}}</td>
                                            <td id="date_birth_{{$customer->id}}" >{{$customer->date_birth}}</td>
                                            <td id="date_dated_{{$customer->id}}" >{{$customer->date_dated}}</td>
                                            <td id="retirement_date_{{$customer->id}}" >{{$customer->retirement_date}}</td>
                                            <td id="bank_name_mar_{{$customer->id}}" >{{$customer->bank_name_mar}}</td>
                                            <td id="branch_{{$customer->id}}" >{{$customer->branch}}</td>
                                            <td id="IFSC_code_{{$customer->id}}" >{{$customer->IFSC_code}}</td>
                                            <td id="account_no_{{$customer->id}}" >{{$customer->account_no}}
                                            </td>
                                            <td>
                                                <!-- <a href="{{url('customer_edit',[$customer->id])}}">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=""><i class="fa fa-edit"></i> </button></a>

                                                <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $customer->id }}" data-action="{{ url('customer_delete', '$customer->id') }}" onclick="deleteConfirmation('{{$customer->id}}')"> <i class="fa fa-trash"></i>
                                                </button> -->

                                                  <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$customer->id}}')"></i>
                                                  <i class="fa fa-trash icon-trash" data-id="{{$customer->id}}" onclick="deleteConfirmation('{{$customer->id}}')"></i></tr>


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
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/customer-registration.js')}}"></script>
<script>
$('#gpf_no').on('change', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).val();
    $.ajax({
        url: "{{url('customer_registration.edit')}}",
        type: 'post',
        data: {
            _token: CSRF_TOKEN,
            'id': id
        },
        success: function(data) {

            var obj = $.parseJSON(data);

            if (obj.userdata) {
                $('#taluka').val(obj.userdata[0].taluka);
                $('#department').val(obj.userdata[0].department);
                $('#designation').val(obj.userdata[0].designation);
                $('#date_birth').val(obj.userdata[0].date_of_birthday);
                $('#date_dated').val(obj.userdata[0].date_birth);
                $('#retirement_date').val(obj.userdata[0].date_dated);
                $('#account_no').val(obj.userdata[0].account_no);
                $('#name').val(obj.userdata[0].name);
                $('#classification').val(obj.userdata[0].classification);

            } else {

                alert("This number is not exist");
                $("#cform")[0].reset();

                return false;
            }
        }
    });

});

</script>
@endpush
