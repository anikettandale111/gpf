@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
          <h2>{{trans('language.h_providing_account_numbe')}} </h2>
        <div class="x_title"></div>
        <div class="x_content">
          @if(count($ganarate_view))
          @foreach($ganarate_view as $temp)
          <div class="row">
            <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_classification')}} :</label></div>
              <div class="col-sm-6"><span>{{$temp->classification_name_mar}}</span></div>
            </div>
            <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="new_application_gpf_no">{{trans('language.th_providing_application_number')}}</div>
                <div class="col-sm-6"><span> {{$temp->app_no}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label> {{trans('language.th_providing_employee_seva_number')}}  :</label></div>
                <div class="col-sm-6"><span>{{$temp->employee_id}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_taluka')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->taluka_name_mar}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_department')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->department_name_mar}}</span></div>
              </div>

              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_name')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->employee_name}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_designation')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->designation_name_mar}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_date_of_birth')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->date_of_birth}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_joining_date')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->joining_date}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_providing_date_of_retirement')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->retirement_date}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label>{{trans('language.th_providing_bank')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->bank_name_mar}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label> {{trans('language.th_providing_branch')}}  :</label></div>
                <div class="col-sm-6"><span>{{$temp->branch_location}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label>{{trans('language.th_providing_i_f_s_c_code')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->ifsc_code}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="taluka">{{trans('language.th_providing_account_no')}} :</label></div>
                <div class="col-sm-6"><span>{{$temp->bank_account_no}}</span></div>
              </div>
              <div class="form-group col-md-4">
                <div class="col-sm-6"><label for="name">{{trans('language.th_opening_balance')}} :</label></div>
                <div class="col-sm-6"><span>{{amount_inr_format(doubleval($temp->opening_balance))}}/-</span></div>
              </div>
              <!-- <div class="form-group col-md-4">
              <div class="col-sm-6"><label for="name">{{trans('language.th_providing_letter_no')}} :</label></div>
              <div class="col-sm-6"><span>{{$temp->app_no}}</span></div>
            </div>
            <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_whether_to_a_n')}}</label><br></div>
            <div class="col-sm-6"><span>{{$temp->app_no}}</span></div>
          </div> -->
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_one')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_one)}}" target="_blank"> View </a></span></div>
          </div>
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_two')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_two)}}" target="_blank"> View </a></span></div>
          </div>
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_three')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_three)}}" target="_blank"> View </a></span></div>
          </div>
          <div class="form-group col-md-4">
            <div class="col-sm-6"><label for="name">{{trans('language.th_providing_attachment_four')}} :</label></div>
            <div class="col-sm-6"><span><a class="btn btn-success" href="{{asset('storage/'.$temp->attachment_four)}}" target="_blank"> View </a></span></div>
          </div>
        </div>
        <hr>
        @if($temp->app_status == 0)
        <div class="form-group col-md-2">
          <span>Status : <button type="button" class="btn btn-warning"> Pending</button></span>
        </div>
        <div class="form-group col-md-4">
          <textarea class="form-control" name="application_remark" id="application_remark" rows="2" cols="80" placeholder="Additional Note "></textarea>
        </div>
        <div class="form-group col-md-4">
          <div class="col-sm-6">
            <button type="button" style="width:100%" class="btn btn-success" name="approve_application" id="approve_application" onclick="approvedButton('{{$temp->id}}')"> Approved </button>
          </div>
          <div class="col-sm-6">
            <button type="button" style="width:100%" class="btn btn-danger" name="reject_application" id="reject_application" onclick="rejectdButton('{{$temp->id}}')"> Reject </button>
          </div>
        </div>
        @elseif($temp->app_status == 1)
        <div class="form-group col-md-4">
          <span>Status : <button type="button" class="btn btn-success">  Approved </button></span>
          <h3>{{$temp->remark}}</h3>
        </div>
        @elseif($temp->app_status == 2)
        <div class="form-group col-md-4">
          <span>Status : <button type="button" clas s="btn btn-danger">  Rejected </button></span>
          <h3>{{$temp->remark}}</h3>
        </div>
        @endif
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
function approvedButton(appId){
  var add_note = $('#approve_application').val();
  swal({
    title: "Approved ?",
    text: "Are you sure to assign GPF Number ?",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, Approved it!",
    cancelButtonText: "No, Please Hold !",
    reverseButtons: !0
  }).then(function(e) {
    if (e.value === true) {
      $.ajax({
        type: 'POST',
        url: "{{url('/approved_new_gpf_no')}}",
        data: {
          _token: CSRF_TOKEN,
          remark:$('#application_remark').val(),
          appId:appId
        },
        dataType: 'JSON',
        success: function(data) {
          swal(data.status,data.message);
        }
      });
    } else {
      e.dismiss;
    }
  }, function(dismiss) {
    return false;
  })
}
function rejectdButton(appId){
  var add_note = $('#approve_application').val();
  swal({
    title: "Reject ?",
    text: "",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, Reject it!",
    cancelButtonText: "No, Please Hold !",
    reverseButtons: !0
  }).then(function(e) {
    if (e.value === true) {
      $.ajax({
        type: 'POST',
        url: "{{url('/reject_new_gpf_no')}}",
        data: {
          _token: CSRF_TOKEN,
          remark:$('#application_remark').val(),
          appId:appId
        },
        dataType: 'JSON',
        success: function(data) {
          swal(data.status,data.message);
        }
      });
    } else {
      e.dismiss;
    }
  }, function(dismiss) {
    return false;
  })
}
</script>
@endpush
