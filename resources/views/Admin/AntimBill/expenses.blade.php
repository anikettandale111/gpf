@extends('Section.app')

@section('content')

<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>बीलातील खर्च माहिती </h2>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="x_content">
          <form class="form-horizontal" id="antim_bill_expensess" method="POST" >
            @csrf
            <div class="row">
              <div class="col-md-4">
                <label class="col-form-label"> बिल नं.<span class="required"></span></label>
                <select class="form-control" class='optional' name="bill_no" id="bill_no">
                  @if(count($billDetails))
                  <option value="" selected disabled>बिल क्रमांक निवडा</option>
                    @foreach($billDetails AS $billRow)
                      <option value="{{$billRow->id}}">{{$billRow->bill_no}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <input type="hidden" name="bill_number" id="bill_number" >
              <div class="col-md-4">
                <label class="col-form-label"> बिल दिनांक <span class="required"></span></label>
                <input class="form-control" class='date' name="bill_date" id="bill_date" readonly>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> रक्कम <span class="required"></span></label>
                <input class="form-control" class='date' name="amount" id="amount" readonly>
              </div>
              <!-- <div class="col-md-4">
                <label class="col-form-label"> Select Option </label><br>
                <div class="col-md-6">
                  <input type="radio" class="check" name="bill_check" id="bill_check_one" value="1">
                  <label for="vehicle1"> बिल बंद करणे </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" class="check" name="bill_check" id="bill_check_two" value="0">
                  <label for="vehicle1"> धनादेश तपशील </label>
                </div>
                <span class="required"></span>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> धनादेश दिनांक <span class="required"></span></label>
                <input class="form-control" name="check_date" id="check_date" readonly>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> धनादेश क्रमांक <span class="required"></span></label>
                <input class="form-control"  name="check_no" id="check_no" readonly>
              </div> -->
              <div class="col-md-4">
                <label for="">{{trans('language.fr_common_gpf_no')}}</label>
                <input class="form-control make_empty"  name="employee_gpf_num" id="employee_gpf_num" >
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.fr_common_user_name')}}</label>
                <input class="form-control make_empty"  name="user_name" id="user_name" readonly>
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.fr_common_user_designation')}}</label>
                <input class="form-control make_empty"  name="user_designation" id="user_designation" readonly>
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_registration_taluka')}}</label>
                <input class="form-control make_empty"  name="user_taluka_name" id="user_taluka_name" readonly>
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_registration_department')}}</label>
                <input class="form-control make_empty"  name="user_department" id="user_department" readonly>
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_shillak_rakkam')}}</label>
                <input class="form-control make_empty"  name="shillak_rakkam" id="shillak_rakkam" readonly>
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_loan_agrim_niyam')}}</label>
                <input class="form-control make_empty"  name="loan_agrim_niyam" id="loan_agrim_niyam" placeholder="0" >
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_required_rakkam')}}</label>
                <input class="form-control make_empty"  name="required_rakkam" id="required_rakkam" placeholder="0" >
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_loan_instlment_numbers')}}</label>
                <input class="form-control make_empty" type="number" name="if_installment_no" id="if_installment_no" min="0" max="120" value="0">
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_bank_name')}}</label>
                <input class="form-control make_empty"  name="bank_name" id="bank_name" placeholder="Bank Name" >
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_bank_ifsc_name')}}</label>
                <input class="form-control make_empty"  name="bank_ifsc_name" id="bank_ifsc_name" value="0">
              </div>
              <div class="col-md-4">
                <label for="">{{trans('language.th_user_bank_acc_number')}}</label>
                <input class="form-control make_empty"  name="bank_acc_number" id="bank_acc_number" value="0">
              </div>
            </div>
              <div class="clearfix"></div>
              <hr>
              <div class="col-md-4">
                <button type="submit" class="btn btn-success" style="width:100%"> <i class="fa fa-floppy-o"></i> Save </button>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary cancel_submit" style="width:100%">
                  <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
                </button>
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
                  <th>{{trans('language.btn_action')}}</th>
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
<script type="text/javascript" src="{{URL('js/antim_bill_expenses.js')}}"></script>
@endpush
