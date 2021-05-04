@extends('Section.app')
@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>{{trans('language.menu_bill_reports')}}</h2>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-md-2">
              <label class="col-form-label"> बिल नं.<span class="required"></span></label>
              <select class="form-control" class='optional' name="bill_no" id="bill_no">
                <option value="" selected disabled>बिल क्रमांक निवडा</option>
                @if(count($billDetails))
                @foreach($billDetails AS $billRow)
                <option value="{{$billRow->id}}">{{$billRow->bill_no}}</option>
                @endforeach
                @endif
              </select>
            </div>
            <div class="col-md-10 mt-4">
              <div class="col-md-2">
                <button class="btn btn-secondary" style="width:100%" id="report_one"> Report 75 </button >
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary" style="width:100%" id="report_two"> Report 188 </button >
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary" style="width:100%" id="report_three"> Computer Slip </button >
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary" style="width:100%" id="report_four"> Order </button >
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary" style="width:100%" id="report_five"> MTR-52 </button >
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary" style="width:100%" id="print_report" onClick="printDiv()"> Print Report </button >
              </div>
            </div>
          </div>
          <hr>
          <div class="row report_div">
            <iframe name="iframe" id="iframe" width="100%" height="600px"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/bill_report_master.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
<!-- <script type="text/javascript" src="//jasonday.github.io/printThis/printThis.js"></script> -->

@endpush
