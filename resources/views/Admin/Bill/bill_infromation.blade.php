@extends('Section.app')

@section('content')

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title mt-3">
                    <h2>बिल माहिती </h2>

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
                    <div class="row ">
                        <div class="card-box col-lg-11 ">
                            <form class="form-horizontal form-label-left" id="bill_vali" method="POST" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-5 col-sm-5  label-align"> बिल नं.<span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="bill_no" id="bill_no" data-validate-length-range="5,15" type="number" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-5 col-sm-5   label-align"> बिल दिनांक <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="bill_date" id="bill_date" required='required'>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-5 col-sm-5   label-align"> रक्कम <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="number" name="amount" id="amount" required='required'>

                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-5 col-sm-5 label-align"><span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="radio" checked name="bill_check" id="bill_check" value="1">
                                        <label for="vehicle1"> बिल बंद करणे </label><br>
                                        <input type="radio" checked  name="bill_check" id="bill_check" value="0">
                                        <label for="vehicle1"> धनादेश तपशील </label><br>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-5 col-sm-5   label-align"> धनादेश दिनांक <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="check_date" id="check_date" required='required'>

                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-5 col-sm-5   label-align"> धनादेश क्रमांक <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="text" name="check_no" id="check_no" required='required'>

                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-9">
                                        <button type="button" class="btn btn-success bill_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                                        <button type="button" class="btn btn-primary cancel_submit" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="myTable" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th> क्रं </th>
                                            <th>बिल नं</th>
                                            <th>बिल दिनांक </th>
                                            <th>रक्कम </th>
                                            <th>बिल धनादेश</th>
                                            <th> धनादेश दिनांक</th>
                                            <th> धनादेश क्रमांक </th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('bill_information')}}",
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'bill_no',
                    name: 'bill_no'
                },
                {
                    data: 'bill_date',
                    name: 'bill_date'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'bill_check',
                    name: 'bill_check'
                },
                {
                    data: 'check_date',
                    name: 'check_date'
                },
                {
                    data: 'check_no',
                    name: 'check_no'
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false
                }
            ]
        });
    });
    $('#bill_vali').validate({
        rules: {
            bill_no: "required",
            bill_date:"required",
            amount: "required",
            bill_check: "required",
            check_date: "required",
            check_no: "required"
        },
        messages: {
            bill_no:"Please Enter The Bill No",
            bill_date:"Please Enter The Bill Date",
            amount: "Please Enter The Amount",
            bill_check:"Please Enter The Bill Check",
            check_date:"Please Enter The Check Date",
            check_no:"Please Enter The Check No"
        }
    });
    $('.cancel_submit').click(function() {
        $('#bill_no').val('');
        $('#bill_date').val('');
        $('#amount').val('');
        $('#bill_check').val('');
        $('#check_date').val('');
        $('#check_no').val('');
    });
    $('.bill_submit').click(function() {
        var billno = $('#bill_no').val();
        var billdate = $('#bill_date').val();
        var amount = $('#amount').val();
        var billcheck = $('input[type="radio"]:checked').val();
        var checkdate = $('#check_date').val();
        var checksno = $('#check_no').val();



        $.ajax({
            url: "{{url('bill_insert')}}",
            type: 'POST',
            data: {
                bill_no: billno,
                bill_date: billdate,
                amount: amount,
                bill_check: billcheck,
                check_date: checkdate,
                check_no: checksno

            },
            success: function(response) {
                console.log(response);

                if (response.success) {
                    alert(response.message) //Message come from controller
                    location.reload();
                } else {
                    alert("Error")
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
</script>
@endsection
