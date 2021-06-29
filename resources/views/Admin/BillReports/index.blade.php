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
            <div class="col-md-4 mt-1">
              <form class="getBillReport" method="post" target="_blank">
                @csrf
                <input type="hidden" value="0" id="reportNo" name="reportNo">
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
              <div class="col-md-4 mt-1">
                <label class="col-form-label">अहवाल प्रकार निवडा <span class="required"></span></label>
                <select class="form-control" class='optional' name="report_type" id="report_type">
                  <option value="" selected disabled>अहवाल प्रकार </option>
                  <option value="1" > Report 75 </option>
                  <option value="2" > Report 188 </option>
                  <option value="3" > Computer Slip </option>
                  <option value="4" > Order </option>
                  <option value="5" > MTR-52 </option>
                  <option value="6" > Report-7 </option>
                  <option value="7" > Report-87 </option>
                </select>
              </form>
            </div>
            <div class="col-md-4 mt-5">
              <button class="btn btn-secondary" style="width:100%" id="get_report" > View Report </button >
              </div>
              <hr>
              <!-- <div class="row report_div">
                <iframe name="iframe" id="iframe" width="100%" height="600px"></iframe>
              </div> -->
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
