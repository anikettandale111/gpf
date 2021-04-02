@extends('Section.app')

@section('content')

<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>बील माहिती </h2>
        </div>
        <div class="clearfix"></div>
      <div class="x_content">
          <form class="form-horizontal form-label-left" id="antim_bill_form" method="POST" >
            @csrf
            @if(count($bill))
              @foreach($bill AS $key => $values)
            <div class="row">
              <div class="col-md-4">
                <label class="col-form-label"> बिल नं.<span class="required"></span></label>
                <input class="form-control" value="{{$values->bill_no}}" readonly/>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> बिल दिनांक <span class="required"></span></label>
                <input class="form-control" value="{{$values->bill_date}}" readonly>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> रक्कम <span class="required"></span></label>
                <input class="form-control" value="{{$values->amount}}" readonly>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> Select Option </label><br>
                <div class="col-md-6">
                  <input type="radio" class="check"  value="1" @if($values->bill_check==1) {{('checked')}} @endif>
                  <label for="vehicle1"> बिल बंद करणे </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" class="check"  value="0" @if($values->bill_check==0) {{('checked')}} @endif>
                  <label for="vehicle1"> धनादेश तपशील </label><br>
                </div>
                <span class="required"></span>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> धनादेश दिनांक <span class="required"></span></label>
                <input class="form-control" value="{{$values->check_date}}" readonly>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> धनादेश क्रमांक <span class="required"></span></label>
                <input class="form-control" value="{{$values->check_no}}" readonly>
              </div>
              @endforeach
            @endif
              <div class="ln_solid"></div>
            </div>
          </form>
        </div>
        <div class="clearfix"></div>
        <hr>
        <center> <h5>बीलातील खर्च माहिती</h5> </center>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="viewBillExpensesDetails" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                  <th>{{trans('language.fr_common_app_number')}}</th>
                  <th>{{trans('language.menu_bill')}}</th>
                  <th>{{trans('language.fr_common_gpf_no')}}</th>
                  <th>{{trans('language.fr_common_user_name')}}</th>
                  <th>{{trans('language.th_user_registration_department')}}</th>
                  <th>{{trans('language.th_user_registration_taluka')}}</th>
                  <th>{{trans('language.th_user_loan_pryojan')}}</th>
                  <th>{{trans('language.th_user_loan_instlment_numbers')}}</th>
                  <th>{{trans('language.th_user_required_rakkam')}}</th>
                  <th>{{trans('language.th_providing_status')}}</th>
                </thead>
                <tbody>
                  @if(count($billExpenses))
                    @foreach($billExpenses AS $key => $expens)
                  <tr>
                    <td>{{$key++}}</td>
                    <td>{{$expens->bill_number}}</td>
                    <td>{{$expens->gpf_no}}</td>
                    <td>{{$expens->user_name}}</td>
                    <td>{{$expens->user_department}}</td>
                    <td>{{$expens->user_taluka_name}}</td>
                    <td>{{$expens->loan_agrim_niyam}}</td>
                    <td>{{$expens->if_installment_no}}</td>
                    <td>{{$expens->required_rakkam}}</td>
                    <td>@if($expens->status)
                          <button class="btn btn-success">Approved</button>
                        @else
                          <button class="btn btn-warning">Pending</button>
                        @endif
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
@endsection
@push('custom-scripts')
<script type="text/javascript">
  $('#viewBillExpensesDetails').DataTable();
  $('#viewBillDetails').DataTable();
</script>
@endpush
