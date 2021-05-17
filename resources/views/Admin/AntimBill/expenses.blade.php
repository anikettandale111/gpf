@extends('Section.app')
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@section('content')

<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>{{trans('language.menu_bill_expenses_information')}}</h2>
        </div>
        @if(session()->has('message'))
          <div class="alert-success">
              {{ session()->get('message') }}
          </div>
        @endif
        <div class="clearfix"></div>
        <hr>
        <div class="loader" style="display:none"></div>
        <div class="x_content">
          <form class="antim_bill_expensess" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
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
              <input type="hidden" name="bill_number" id="bill_number" >
              <div class="col-md-4">
                <label class="col-form-label"> बिल दिनांक <span class="required"></span></label>
                <input class="form-control" class='date' name="bill_date" id="bill_date" readonly>
              </div>
              <div class="col-md-4">
                <label class="col-form-label"> रक्कम <span class="required"></span></label>
                <input class="form-control" class='date' name="amount" id="amount" readonly>
              </div>
              <div class="col-md-6 mt-2">
                <label class="btn btn-secondary file_upload" style="width:100%" > File Uplaod </label>
              </div>
              <div class="col-md-6 mt-2">
                <label class="btn btn-secondary single_entry" style="width:100%"> Add Single Entry</label>
              </div>
              <div class="col-md-4 file_upload_div">
                <label for="">{{trans('language.fr_common_gpf_no')}}</label>
                <input type="file" class="form-control"  name="employee_expenses_file" id="employee_expenses_file" >
              </div>

              <!-- <div class="col-md-4 single_entry_div"> -->
                <input type="text" class="form-control make_empty"  name="row_id" id="row_id" value="0">
              <!-- </div> -->
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.fr_common_gpf_no')}}</label>
                <input class="form-control make_empty"  name="employee_gpf_num" id="employee_gpf_num" >
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.fr_common_user_name')}}</label>
                <input class="form-control make_empty"  name="user_name" id="user_name" readonly>
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.fr_common_user_designation')}}</label>
                <input class="form-control make_empty"  name="user_designation" id="user_designation" readonly>
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_registration_taluka')}}</label>
                <input class="form-control make_empty"  name="user_taluka_name" id="user_taluka_name" readonly>
                <input type="hidden" class="make_empty"  name="user_taluka_id" id="user_taluka_id" value="0">
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_registration_department')}}</label>
                <input class="form-control make_empty"  name="user_department" id="user_department" readonly>
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_shillak_rakkam')}}</label>
                <input class="form-control make_empty"  name="shillak_rakkam" id="shillak_rakkam">
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_loan_pryojan')}}</label>
                <input class="form-control make_empty"  name="loan_agrim_pryojan" id="loan_agrim_pryojan" placeholder="रक्कम काढायचे कारण" >
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_loan_agrim_niyam')}}</label>
                <select class="form-control make_empty"  name="loan_agrim_niyam" id="loan_agrim_niyam" >
                  <option value="" selected disabled> Select Rule </option>
                  <option value="Rule-13-(1)(A)">Rule 13 (1) (A)</option>
                  <option value="Rule-13-(1)(B)">Rule 13 (1) (B)</option>
                  <option value="Rule-13-(1)(C)">Rule 13 (1) (C)</option>
                  <option value="Rule-13-(1)(D)">Rule 13 (1) (D)</option>
                  <option value="Rule-13-(1)(E)">Rule 13 (1) (E)</option>
                  <option value="Rule-13-(1)(F)">Rule 13 (1) (F)</option>
                  <option value="Rule-13-(1)(G)">Rule 13 (1) (G)</option>
                  <option value="Rule-13-(1)(H)">Rule 13 (1) (H)</option>
                  <option value="Rule-16-(A)(1)">Rule 16 (A) (1)</option>
                  <option value="Rule-16-(A)(2)">Rule 16 (A) (2)</option>
                  <option value="Rule-16-(A)(3)">Rule 16 (A) (3)</option>
                  <option value="Rule-16-(B)(1)">Rule 16 (B) (1)</option>
                  <option value="Rule-16-(B)(2)">Rule 16 (B) (2)</option>
                  <option value="Rule-16-(B)(3)">Rule 16 (B) (3)</option>
                  <option value="Rule-16-(B)(4)">Rule 16 (B) (4)</option>
                  <option value="Rule-16-(B)(5)">Rule 16 (B) (5)</option>
                  <option value="Rule-16-(B)(6)">Rule 16 (B) (6)</option>
                  <option value="Rule-16(C)">Rule 16 (C)</option>
                  <option value="Rule-16(D)">Rule 16 (D)</option>
                  <option value="Rule-16(E)">Rule 16 (E)</option>
                  <option value="Rule-16(F)">Rule 16 (F)</option>
                  <option value="Rule-16(G)">Rule 16 (G)</option>
                  <option value="Rule-23">Rule 23</option>
                  <option value="Rule-24">Rule 24</option>
                  <option value="Rule-25">Rule 25</option>
                  <option value="Rule-26">Rule 26</option>
                  <option value="Rule-29">Rule 29</option>
                  <option value="Final-Payent">Final Payment</option>
                </select>
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_required_rakkam')}}</label>
                <input class="form-control make_empty"  name="required_rakkam" id="required_rakkam" placeholder="0" >
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_loan_instlment_numbers')}}</label>
                <input class="form-control make_empty" type="number" name="if_installment_no" id="if_installment_no" min="0" max="120" value="0">
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_bank_name')}}</label>
                <input class="form-control make_empty"  name="bank_name" id="bank_name" placeholder="Bank Name" >
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_bank_ifsc_name')}}</label>
                <input class="form-control make_empty"  name="bank_ifsc_name" id="bank_ifsc_name" value="0">
              </div>
              <div class="col-md-4 single_entry_div">
                <label for="">{{trans('language.th_user_bank_acc_number')}}</label>
                <input class="form-control make_empty"  name="bank_acc_number" id="bank_acc_number" value="0">
              </div>
            </div>
              <div class="clearfix"></div>
              <hr>
              <div class="col-md-4">
                <button type="submit" name="button" class="btn btn-success" style="width:100%">
                  <i class="fa fa-floppy-o"></i> Save
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
