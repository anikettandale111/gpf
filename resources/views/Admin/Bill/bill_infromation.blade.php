@extends('Section.app')

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class=" mt-3">
                    <h2>बिल माहिती </h2>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" id="bill_vali" method="POST" enctype="multipart/form-data" novalidate action="{{url('bill_insert')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <input type="hidden" id="bill_row_id" name="bill_row_id" value="0">
                            <div class="col-md-4">
                                <label class="col-form-label"> बिल नं.<span class="required"></span></label>
                                <input class="form-control" class='optional' name="bill_no" id="bill_no" data-validate-length-range="5,15" type="number" />
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"> बिल दिनांक <span class="required"></span></label>
                                <input class="form-control" class='date' type="date" name="bill_date" id="bill_date" required='required'>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"> रक्कम <span class="required"></span></label>
                                <input class="form-control" class='date' type="number" name="amount" id="amount" required='required'>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"> Select Option <span class="required"></span></label><br>
                                <input type="radio" class="check" name="bill_check" id="bill_check_one" value="1">
                                <label for="vehicle1"> बिल बंद करणे </label> &nbsp;&nbsp;
                                <input type="radio" class="check" name="bill_check" id="bill_check_two" value="0">
                                <label for="vehicle1"> धनादेश तपशील </label><br>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"> धनादेश दिनांक <span class="required"></span></label>
                                <input class="form-control" class='date' type="date" name="check_date" id="check_date" required='required'>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"> धनादेश क्रमांक <span class="required"></span></label>
                                <input class="form-control" class='date' type="text" name="check_no" id="check_no" required='required'>
                            </div>
                            <div class="ln_solid"></div>
                                <div class="col-md-6 offset-12">
                                    <button type="submit" class="btn btn-success bill_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                                    <button type="button" class="btn btn-primary cancel_submit" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="myTable" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <th> क्रं </th>
                                    <th>बिल नं</th>
                                    <th>बिल दिनांक </th>
                                    <th>रक्कम </th>
                                    <th>बिल धनादेश</th>
                                    <th>धनादेश दिनांक</th>
                                    <th>धनादेश क्रमांक </th>
                                    <th>action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/bill-infromation-master.js')}}"></script>
@endpush
