@extends('Section.app')
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="skype">
                    <h2>७ वा वेतन आयोग फरक जमा </h2>
                   </div>
                <div class="x_content">
                    <form method="POST" class="validatedForm" action="{{ url('vetan_insert_no') }}" id="cform">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="vetan">{{ __(' वेतन ') }}</label>
                            <select class="form-control" name="vetan" class="form-control ">
                                <option value="">--Select --</option>
                                <option value="वेतन 6"> वेतन 6 </option>
                                <option value="वेतन 7"> वेतन 7</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="b_no">{{ __('भ.नि .नि क्रमांक ') }}</label>
                            <input id="gpf_no" type="text" class="form-control" name="gpf_no" value="{{ old('gpf_no') }}" required autocomplete="gpf_no" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{ __('तालुका  संकेतांक ') }}</label>
                            <select class="form-control" id="taluka" name="taluka">
                                <option value=""> -- निवडा तालूका -- </option>
                                @foreach($taluka as $k => $v)
                                <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{ __('विभाग संकेतांक') }}</label>
                            <select class="form-control" id="department" name="department">
                                <option value=""> -- निवडा विभाग -- </option>
                                @foreach($department as $k => $v)
                                <option value="{{$v->id}}">{{$v->department_name_mar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('नाव ') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{ __('पदनाम ') }}</label>
                            <select id="designation" class="form-control @error('designation') is-invalid @enderror" name="designation">
                                <option value=""> -- निवडा पदनाम -- </option>
                                @foreach($designation as $k => $v)
                                <option value="{{$v->id}}">{{$v->designation_name_mar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{ __('हप्ता क्रमांत  ') }}</label>
                            <input class="form-control" name="hapta_no" class="form-control @error('hapta_no') is-invalid @enderror" id="hapta_no" value="{{ old('hapta_no') }}" required autocomplete="hapta_no" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taluka">{{ __('चलन क्रमांत   ') }}</label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <input id="chalna_no" type="text" class="form-control app_number" name="chalna_no">
                                </div>
                                <div class="col-sm-10">
                                    <input id="chalna_no" type="text" class="form-control " name="chalna_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('हप्त्याचा महिना  ') }}</label>
                            <input type="text" name="month_hapta" class="form-control @error('month_hapta') is-invalid @enderror" id="month_hapta" value="{{ old('month_hapta') }}" required autocomplete="month_hapta" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('चलन रक्कम') }}</label>
                            <input type="text" name="chalna_amount" class="form-control @error('chalna_amount') is-invalid @enderror" id="chalna_amount" value="{{ old('chalna_amount') }}" required autocomplete="chalna_amount" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('खंतावणी') }}</label>
                            <input type="text" name="digging" class="form-control @error('digging') is-invalid @enderror" id="digging" value="{{ old('digging') }}" required autocomplete="digging" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('फरक') }}</label>
                            <input type="text" name="difference" class="form-control @error('difference') is-invalid @enderror" id="difference" value="{{ old('difference') }}" required autocomplete="difference" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('व्याज पासून ') }}</label>
                            <input type="date" name="from_interest_date" class="form-control @error('from_interest_date') is-invalid @enderror" id="from_interest_date" value="{{ old('from_interest_date') }}" required autocomplete="from_interest_date" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('पर्यंत ') }}</label>
                            <input type="date" name="until_date" class="form-control @error('until_date') is-invalid @enderror" id="until_date" value="{{ old('until_date') }}" required autocomplete="until_date" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('फरक रक्कम  ') }}</label>
                            <input type="text" name="difference_amount" class="form-control @error('difference_amount') is-invalid @enderror" id="difference_amount" value="{{ old('difference_amount') }}" required autocomplete="difference_amount" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('फरक व्याज  ') }}</label>
                            <input type="text" name="different_interest" class="form-control @error('different_interest') is-invalid @enderror" id="different_interest" value="{{ old('different_interest') }}" required autocomplete="different_interest" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">{{ __('व्याज आकारणी  ') }}</label>
                            <input type="text" name="charging_interest" class="form-control @error('charging_interest') is-invalid @enderror" id="charging_interest" value="{{ old('charging_interest') }}" required autocomplete="charging_interest" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name"> शेरा </label>
                            <textarea type="text" name="shera" class="form-control @error('shera') is-invalid @enderror" id="shera" value="{{ old('shera') }}" required autocomplete="shera" autofocus></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>७ वा वेतन आयोग फरक जमा </h2>
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
                                    <table id="datatable" class="table
table-striped table-bordered table-responsive" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th> क्रं</th>
                                                <th> वेतन </th>
                                                <th>भ.नि .नि क्रमांक </th>
                                                <th>तालुका संकेतांक </th>
                                                <th>विभाग संकेतांक </th>
                                                <th>नाव </th>
                                                <th>पदनाम </th>
                                                <th>हप्ता क्रमांत </th>
                                                <th>चलन क्रमांत </th>
                                                <th>हप्त्याचा महिना </th>
                                                <th>चलन रक्कम </th>
                                                <th>खंतावणी</th>
                                                <th>फरक </th>
                                                <th>व्याज पासून </th>
                                                <th>पर्यंत</th>
                                                <th>फरक रक्कम </th>
                                                <th>फरक व्याज </th>
                                                <th>व्याज आकारणी </th>
                                                <th>शेरा </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($vetan))
                                            @foreach($vetan as $temp)
                                            <tr id="{{$temp->id}}">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$temp->vetan}}</td>
                                                <td>{{$temp->gpf_no}}</td>
                                                <td>{{$temp->taluka_name_mar }}</td>
                                                <td>{{$temp->department_name_mar}}</td>
                                                <td>{{$temp->name}}</td>
                                                <td>{{$temp->designation_name_mar}}</td>
                                                <td>{{$temp->hapta_no}}</td>
                                                <td>{{$temp->chalna_no}}</td>
                                                <td>{{$temp->month_hapta}}</td>
                                                <td>{{$temp->chalna_amount}}</td>
                                                <td>{{$temp->digging}}</td>
                                                <td>{{$temp->difference}}</td>
                                                <td>{{$temp->from_interest_date}}</td>
                                                <td>{{$temp->until_date}}</td>
                                                <td>{{$temp->difference_amount}}</td>
                                                <td>{{$temp->different_interest}}</td>
                                                <td>{{$temp->charging_interest}}</td>
                                                <td>{{$temp->shera}}</td>
                                                <td>
                                                    <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $temp->id }}" data-action="{{ url('vetan_Delete',$temp->id) }}" onclick="deleteConfirmation('{{$temp->id}}')"> <i class="fa fa-trash"></i>
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
        $(document).ready(function() {
            //jQuery code goes here
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
                    shera: "required",
                    hapta_no: "required",
                    chalna_no: "required",
                    month_hapta: "required",
                    chalna_amount: "required",
                    digging: "required",
                    difference: "required",
                    from_interest_date: "required",
                    until_date: "required",
                    difference_amount: "required",
                    different_interest: "required",
                    charging_interest: "required",
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
                    shera: " Please Enter The Shera",
                    hapta_no: "Please Enter In installments",
                    chalna_no: " Please Enter Currency order",
                    month_hapta: " Please Enter The month of the installment",
                    chalna_amount: " Please EnterThe Currency amount",
                    difference: "Please Enter The  difference",
                    digging: "Please Enter The Digging",
                    from_interest_date: "Please Enter Data from interest",
                    until_date: " Please Enter Date up to",
                    difference_amount: " Please Enter The difference amount",
                    different_interest: " Please Enter The Different interest ",
                    charging_interest: " Please Enter  The Charging of interest",
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

            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/vetan_Delete')}}/" + id,
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
                url: "{{url('vetan_new')}}",
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
                        $('#name').val(obj.userdata[0].name);
                        $('#name').val(obj.userdata[0].name);
                    } else {
                        alert("This number is not exist");
                        $("#cform")[0].reset();

                        return false;
                    }
                }
            });

        });
    </script>
    @endsection
