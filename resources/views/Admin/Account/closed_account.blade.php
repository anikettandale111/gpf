@extends('Section.app')

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
                    <form class="validatedForm" action="{{url('/account_Insert_Data')}}" method="POST" enctype="multipart/form-data" id="cform" novalidate>
                        {{csrf_field()}}
                        <div class="form-group col-md-4">
                            <label>{{trans('language.th_Closing_b_n_n_no')}} <span class="required"></span></label>
                            <input class="form-control" class='optional ' id="gpf_no" name="gpf_no" data-validate-length-range="5,15" type="text" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>{{trans('language.th_closing_taluka')}} <span class="required"></span></label>
                            <select class="form-control" name="taluka" id="taluka" class='email' readonly>
                                <option value="">-- निवडा तालुका --</option>
                                @foreach ($taluka as $temp)
                                <option value="{{$temp->id}}">{{$temp->taluka_name_mar}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label>{{trans('language.th_closing_department')}}<span class="required"></span></label>
                            <select class="form-control" id="department" name="department" class='email'>
                                <option value="">-- निवडा विभाग --</option>
                                @foreach($department as $k => $v)
                                <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label> {{trans('language.th_closing_name')}} <span class="required"></span></label>
                            <input class="form-control" type="text" id="name" class='number' name="name" data-validate-minmax="10,100" required='required ' readonly>
                        </div>

                <div class="form-group col-md-4">
                    <label> {{trans('language.th_closing_designation')}} <span class="required"></span></label>
                    <select class="form-control" name="designation" id="designation" class='designation'>
                        <option value="">-- निवडा पदनाम --</option>
                        @foreach ($designation as $temp)
                        <option value="{{$temp->id}}">{{$temp->designation_name_mar}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label> {{trans('language.th_closing_month_of_interest_payable')}} <span class="required"></span></label>
                    <select class="form-control" name="month_interest_payable" id="month_interest_payable" class='month_interest_payable'>
                        <option value="">-- निवडा महिना --</option>
                        @foreach ($month as $temp)
                        <option value="{{$temp->month_name_mar}}">{{$temp->month_name_mar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>{{trans('language.th_closing_last_due_year')}} <span class="required"></span></label>
                    @php
                    $currently_selected = date('Y');
                    $earliest_year = session()->get('from_year');
                    $latest_year = date('Y');
                    @endphp
                    <select name="last_due_year" class="form-control year">
                        <option value="">-- निवडा वर्ष --</option>
                        @foreach ( range( $latest_year, $earliest_year ) as $i ) {
                        <option value="{{$i}}" "{{($i === $currently_selected)?'selected' : ''}}">{{$i}}</option>';
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>{{trans('language.th_closing_feet_interest_month')}} <span class="required"></span></label>
                    <select class="form-control" name="feet_interest_payable_month" id="feet_interest_payable_month" class='feet_interest_payable_month'>
                        <option value="">-- निवडा महिना --</option>
                        @foreach ($month as $temp)
                        <option value="{{$temp->month_name_mar}}">{{$temp->month_name_mar}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label>{{trans('language.th_closing_feet_interest_payable_year')}}<span class="required"></span></label>
                    @php
                    $currently_selected = date('Y');
                    $earliest_year = session()->get('from_year');
                    $latest_year = date('Y');
                    @endphp
                    <select name="feet_interest_payable_year" class="form-control year">
                        <option value="">-- निवडा वर्ष --</option>
                        @foreach ( range( $latest_year, $earliest_year ) as $i ) {
                        <option value="{{$i}}" "{{($i === $currently_selected)?'selected' : ''}}">{{$i}}</option>';
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label>{{trans('language.th_closing_last_subscription_month')}}<span class="required"></span></label>
                    <select class="form-control" name="last_subscription_month" id="last_subscription_month" class='last_subscription_month'>
                        <option value="">-- निवडा महिना --</option>
                        @foreach ($month as $temp)
                        <option value="{{$temp->month_name_mar}}">{{$temp->month_name_mar}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label>{{trans('language.th_closing_last_subscription_year')}} <span class="required"></span></label>
                    @php
                    $currently_selected = date('Y');
                    $earliest_year = session()->get('from_year');
                    $latest_year = date('Y');
                    @endphp
                    <select name="last_subscription_year" class="form-control year">
                        <option value="">-- निवडा वर्ष --</option>
                        @foreach ( range( $latest_year, $earliest_year ) as $i ) {
                        <option value="{{$i}}" "{{($i === $currently_selected)?'selected' : ''}}">{{$i}}</option>';
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4 mt-3">
                <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> {{trans('language.btn_save')}} </button>

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
                                        <th>{{trans('language.th_closing_no')}}</th>
                                        <th>{{trans('language.th_Closing_b_n_n_no')}}</th>
                                        <th>{{trans('language.th_closing_taluka')}}</th>
                                        <th>{{trans('language.th_closing_department')}}</th>
                                        <th>{{trans('language.th_closing_name')}}</th>
                                        <th>{{trans('language.th_closing_designation')}}</th>
                                        <th>{{trans('language.th_closing_month_of_interest_payable')}}</th>
                                        <th>{{trans('language.th_closing_last_due_year')}}</th>
                                        <th>{{trans('language.th_closing_feet_interest_month')}}</th>
                                        <th>{{trans('language.th_closing_feet_interest_payable_year')}}</th>
                                        <th>{{trans('language.th_closing_last_subscription_month')}}</th>
                                        <th>{{trans('language.th_closing_last_subscription_year')}}</th>
                                        <th>{{trans('language.btn_action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($Accounts))
                                    @foreach($Accounts as $temp)
                                    <tr id="{{$temp->id}}">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$temp->gpf_no}}</td>
                                        <td>{{$temp->taluka_name_mar}}</td>
                                        <td>{{$temp->department_name_mar}}</td>
                                        <td>{{$temp->name}}</td>
                                        <td>{{$temp->designation_name_mar}}</td>
                                        <td>{{$temp->month_interest_payable}}</td>
                                        <td>{{$temp->last_due_year}}</td>
                                        <td>{{$temp->feet_interest_payable_month}}</td>
                                        <td>{{$temp->feet_interest_payable_year}}</td>
                                        <td>{{$temp->last_subscription_month}}</td>
                                        <td>{{$temp->last_subscription_year}}</td>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $temp->id }}" data-action="{{ url('account_Delete',$temp->id) }}" onclick="deleteConfirmation({{$temp->id}})">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
    function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please    and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0

        }).then(function(e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/account_Delete')}}/" + id,
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
    $('#gpf_no').on('change', function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        $.ajax({
            url: "{{url('account_new')}}",
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

                } else {
                    alert("This number is not exist");
                    $("#cform")[0].reset();

                    return false;

                }
            }
        });

    });
    $('.validatedForm').validate({
        rules: {
            vetan: "required",
            classification: {
                required: true,
            },
            gpf_no: {
                required: true,
                digits: "required",
            },
            taluka: "required",
            department: "required",
            name: "required",
            designation: "required",
            month_interest_payable: "required",
            last_due_year: "required",
            feet_interest_payable_month: "required",
            feet_interest_payable_year: "required",
            last_subscription_month: "required",
            last_subscription_year: "required",

        },
        messages: {
            vetan: "Plese Select vetan",
            classification: "Plese Select Classification",
            gpf_no: {
                required: "Please Enter gpf Number",
            },
            taluka: " Please Select Taluka",
            department: " Please Select Department",
            name: " Please Enter The Name",
            designation: " Please Select designation",
            month_interest_payable: " Please Select Month of interest payable",
            last_due_year: " Please Select Last due year",
            feet_interest_payable_month: " Please Select 7 feet interest month",
            feet_interest_payable_year: " Please Select 7 feet interest payable year",
            last_subscription_month: " Please Select Last subscription month",
            last_subscription_year: " Please Select Last subscription year",

        }
    });
</script>

@endsection
