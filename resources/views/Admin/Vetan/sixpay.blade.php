@extends('Section.app')
@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="skype">
          <h2>{{trans('language.6_pay_commission_paid')}} </h2>
        </div>
        <div class="x_content">
          <form method="POST" class="validatedForm" id="sixpayForm">
            @csrf
            <input type="hidden" id="vetan" name="vetan" class="form-control" value="6">
            <div class="form-group col-md-3">
              <label for="employeeGpfNo">{{ __('भ.नि .नि क्रमांक ') }}</label>
              <input id="employeeGpfNo" type="text" class="form-control" name="employeeGpfNo" required autocomplete="employeeGpfNo" autofocus>
            </div>
            <div class="form-group col-md-3">
              <label for="employee_name">{{ __('नाव ') }}</label>
              <input type="text" name="employee_name" class="form-control " id="employee_name" required readonly>
            </div>
            <div class="form-group col-md-3">
              <label for="taluka">{{ __('तालुका  संकेतांक ') }}</label>
              <select class="form-control" id="taluka" name="taluka">
                <option value=""> -- निवडा तालूका -- </option>
                @foreach($taluka as $k => $v)
                <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="employee_department">{{ __('विभाग संकेतांक') }}</label>
              <select class="form-control" id="employee_department" name="employee_department">
                <option value=""> -- निवडा विभाग -- </option>
                @foreach($department as $k => $v)
                <option value="{{$v->department_code}}">{{$v->department_name_mar}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="designation">{{ __('पदनाम ') }}</label>
              <select id="employee_designation" class="form-control " name="employee_designation">
                <option value=""> -- निवडा पदनाम -- </option>
                @foreach($designation as $k => $v)
                <option value="{{$v->id}}">{{$v->designation_name_mar}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="hapta_no">{{ __('हप्ता क्रमांक  ') }}</label>
              <input type="number" min="1" max="10" class="form-control" name="hapta_no" class="form-control " id="hapta_no" required >
            </div>
            <div class="form-group col-md-3">
              <div class="col-md-6">
              <label for="instalmentYear">{{ __('वर्ष') }}</label>
              <select name="instalmentYear" class="form-control getChalanNumbers" id="instalmentYear" required >
                <option value="{{date('Y')}}"> {{date('Y')}} </option>
                <option value="{{date('Y')-1}}" selected> {{date('Y')-1}} </option>
                <option value="{{date('Y')-2}}"> {{date('Y')-2}} </option>
                <option value="{{date('Y')-3}}"> {{date('Y')-3}} </option>
                <option value="{{date('Y')-4}}"> {{date('Y')-4}} </option>
                <option value="{{date('Y')-5}}"> {{date('Y')-5}} </option>
              </select>
              </div>
              <div class="col-md-6">
              <label for="name">{{ __('हप्त्याचा महिना  ') }}</label>
              <select name="instalment_month" class="form-control getChalanNumbers" id="instalment_month" required >
                <option value="" disabled selected> Select Month </option>
                @foreach ($month as $month)
                  <option value="{{$month->id}}">{{$month->month_name_mar}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="form-group col-md-3">
              <div class="col-md-6">
              <label for="chalan_taluka">{{ __('चलन तालुका ') }}</label>
              <select id="chalan_taluka" class="form-control getChalanNumbers" name="chalan_taluka">
                <option value="" disabled selected> Select Chalan Taluka</option>
                @foreach($taluka as $k => $v)
                  <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                @endforeach
              </select>
              </div>
              <div class="col-md-6">
              <label for="chalna_no">{{ __('चलन क्रमांक ') }}</label>
              <select id="chalna_no" class="form-control " name="chalna_no">
                <option value="" disabled selected> Select Chalan </option>
              </select>
            </div>
            </div>
            <div class="form-group col-md-3">
              <label for="name">{{ __('चलन रक्कम') }}</label>
              <input type="number" name="chalan_amount" class="form-control " id="chalan_amount" readonly>
            </div>
            <div class="form-group col-md-3">
              <label for="name">{{ __('खंतावणी') }}</label>
              <input type="number" name="chalan_khatavani" class="form-control " id="chalan_khatavani" readonly>
            </div>
            <div class="form-group col-md-3">
              <label for="name">{{ __('फरक') }}</label>
              <input type="number" name="chalan_shillak" class="form-control " id="chalan_shillak" readonly>
            </div>
            <div class="form-group col-md-3">
              <label for="from_interest_date">{{ __('व्याज पासून ') }}</label>
              <input type="date" name="from_interest_date" class="form-control " id="from_interest_date" required>
            </div>
            <div class="form-group col-md-3">
              <label for="to_intrest_date">{{ __('पर्यंत ') }}</label>
              <input type="date" name="to_intrest_date" class="form-control " id="to_intrest_date" required >
            </div>
            <div class="form-group col-md-3">
              <label for="name">{{ __('फरक रक्कम  ') }}</label>
              <input type="number" name="difference_amount" class="form-control " id="difference_amount" required>
            </div>
            <div class="form-group col-md-3">
              <label for="name">{{ __('फरक व्याज  ') }}</label>
              <input type="number" name="different_interest" class="form-control " id="different_interest" required >
            </div>
            <!-- <div class="form-group col-md-3">
            <label for="name">{{ __('व्याज आकारणी  ') }}</label>
            <input type="text" name="charging_interest" class="form-control " id="charging_interest" required >
          </div> -->
          <div class="form-group col-md-3">
            <label for="name"> शेरा </label>
            <textarea type="text" name="shera" class="form-control " id="shera" ></textarea>
          </div>
          <div class="form-group col-md-6">
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary" style="width:100%">
                {{ __('Save') }}
              </button>
            </div>
            <div class="form-group col-md-6">
              <button type="button" class="btn btn-danger" style="width:100%" onclick="resetForm()">
                {{ __('Cancel') }}
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>{{trans('language.6_pay_commission_paid')}} </h2>
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
              <div class="card-body">
                
                <div class="form-group col-md-3">
                  <label for="employeeGpfNo">{{ __('भ.नि .नि क्रमांक ') }}</label>
                  <input id="employeeGpfNo_search" type="text" class="form-control" name="employeeGpfNo_search"  autocomplete="employeeGpfNo" autofocus>
                </div>
                <div class="form-group col-md-3">
                  <label for="employee_name">{{ __('नाव ') }}</label>
                  <input type="text" name="employee_name_search" class="form-control " id="employee_name_search">
                </div>
                <div class="form-group col-md-3">
                  <label for="taluka">{{ __('तालुका  संकेतांक ') }}</label>
                  <select class="form-control" id="taluka_search" name="taluka_search">
                    <option value=""> -- निवडा तालूका -- </option>
                    @foreach($taluka as $k => $v)
                    <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="employee_department">{{ __('विभाग संकेतांक') }}</label>
                  <select class="form-control" id="employee_department_search" name="employee_department_search">
                    <option value=""> -- निवडा विभाग -- </option>
                    @foreach($department as $k => $v)
                    <option value="{{$v->department_code}}">{{$v->department_name_mar}}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group col-md-3">
                  <div class="col-md-6">
                  <label for="chalan_taluka">{{ __('चलन तालुका ') }}</label>
                  <select id="chalan_taluka_search" class="form-control getChalanNumbers" name="chalan_taluka_search">
                    <option value=""> Select Chalan Taluka</option>
                    @foreach($taluka as $k => $v)
                      <option value="{{$v->id}}">{{$v->taluka_name_mar}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="col-md-6">
                  <label for="chalna_no">{{ __('चलन क्रमांक ') }}</label>
                  <select type="text" id="chalan_serial_no_search" name="chalan_serial_no_search" class="form-control ">
                    <option value="">-- चलन क्रमांक निवडा --</option>
                    @for($i=1; $i <= 300; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                </div>
                
                
            
             
            </div>
              <div class="card-box table-responsive">
                <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">
                  <thead>
                    <tr>
                      <th> क्रं</th>
                      <th>भ.नि .नि क्रमांक </th>
                      <th>नाव </th>
                      <th>हप्ता क्रमांक </th>
                      <th>चलन क्रमांक </th>
                      <th>हप्त्याचा महिना </th>
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
                    {{--@if(count($sixpayentry))
                    @foreach($sixpayentry as $key => $temp)
                    <tr id="{{$temp->TransId}}">
                      <td>{{$key+1}}</td>
                      <td>{{$temp->GPFNo}}</td>
                      <td>{{$temp->employee_name}}</td>
                      <td>{{$temp->Instalment}}</td>
                      <td>{{$temp->ChallanNo}}</td>
                      <td>{{$temp->month_name_mar}}</td>
                      <td>{{date("d-m-Y",strtotime($temp->DtFrom))}}</td>
                      <td>{{date("d-m-Y",strtotime($temp->DtTo))}}</td>
                      <td>{{$temp->DiffAmt}}</td>
                      <td>{{$temp->Interest}}</td>
                      <td>{{$temp->TotDiff}}</td>
                      <td>{{$temp->Rmk}}</td>
                      <td>
                        <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $temp->TransId }}" data-action="{{ url('vetan_Delete',$temp->TransId) }}" onclick="deleteConfirmation('{{$temp->TransId}}')"> <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                    @endforeach
                    @endif --}}
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
@endsection
@push('custom-scripts')
<script type="text/javascript">
$(document).ready(function() {
  //jQuery code goes here
  $('.validatedForm').validate({
    rules: {
      vetan: "required",
      classification: {
        required: true,
      },
      employeeGpfNo: {
        required: true,
        digits: "required",
      },
      taluka: "required",
      employee_department: "required",
      employee_name: "required",
      employee_designation: "required",
      hapta_no: "required",
      chalna_no: "required",
      instalment_month: "required",
      chalan_taluka: "required",
      from_interest_date: "required",
      to_intrest_date: "required",
      difference_amount: "required",
      different_interest: "required",
    },
    messages: {
      vetan: "Select vetan",
      classification: "Select Classification",
      employeeGpfNo: {
        required: "Enter gpf Number",
      },
      taluka: " Select Taluka",
      employee_department: " Select Department",
      employee_name: " Enter The Name",
      employee_designation: " Select designation",
      hapta_no: "Installments Number",
      chalna_no: " Enter Currency order",
      instalment_month: "Installment Month",
      chalan_taluka: "Chalan Taluka",
      from_interest_date: "Enter Data from interest",
      to_intrest_date: " Enter Date up to",
      difference_amount: " Enter The difference amount",
      different_interest: " Enter The Different interest ",
    },
    submitHandler: function(form) {
      submitSixPay();
    }
  });
  $('#employeeGpfNo').on('change', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).val();
    $.ajax({
      url: "getEmployeeDetails",
      type: 'GET',
      data: {_token: CSRF_TOKEN,'input_id': id },
      success: function(results) {
        if(results.length){
          $('#taluka').val(results[0].taluka_id);
          $('#employee_department').val(results[0].department_id);
          $('#employee_designation').val(results[0].designation_id);
          $('#employee_name').val(results[0].employee_name);
        } else {
          swal("WARNING", "Invalid GPF Number OR Does't Exits");
          $("#sixpayForm")[0].reset();
          $('#employeeGpfNo').focus();
          return false;
        }
      }
    });
  });
    $('.getChalanNumbers').change(function(){
      var ch_year = $('#instalmentYear').val();
      var ch_month = $('#instalment_month').val();
      var ch_taluka = $('#chalan_taluka').val();
      if(ch_year == null ) return false;
      if(ch_month == null ) return false;
      if(ch_taluka == null ) return false;
      $.ajax({
        url: "chalanNumbers",
        data: {ch_year:ch_year ,ch_month:ch_month, ch_taluka:ch_taluka},
        type: 'GET',
        success: function(data){
          var chalanHtml='';
          $('#chalna_no').empty();
          chalanHtml += '<option value="" selected disabled>Select Chalan</option>';
          if(data.length){
            for(var i=0;i < data.length;i++){
              chalanHtml += '<option value="'+data[i].id+'">'+data[i].chalan_no+'</option>';
            }
            $('#chalna_no').append(chalanHtml);
          }
        }
      });
    });
  $('#chalna_no').change(function(){
    $.ajax({
      type: 'GET',
      url: "chalan/"+$(this).val(),
      success: function(results) {
        $('#chalan_amount').val(results.amount);
        $('#chalan_khatavani').val(results.diff_amount);
        $('#chalan_shillak').val(results.amount - results.diff_amount);
      }
    })
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
        url: "sixpay/" + id,
        data: {_token: CSRF_TOKEN,"_method":'DELETE'},
        dataType: 'JSON',
        success: function(results) {
          swal(results.status,results.message);
          $('#' + id).remove();
        }
      });
    } else {
      e.dismiss;
    }
  }, function(dismiss) {
    return false;
  })
}
function resetForm(){
  $("#sixpayForm")[0].reset();
}
function submitSixPay(){
  $.ajax({
    url: "sixpay",
    data: $('#sixpayForm').serialize(),
    type: 'POST',
    success: function(data){
      swal(data.status,data.message);
    }
  });
}
var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    buttons: [
      { extend: 'excel', className: 'btn btn-secondary m-2' },
    ],
    pageLength: '20',
    ajax: {
      "url":"sixpay",
      "type": "GET",
      "dataType": "json",
      'data': function(data){
        // Read values
        var employeeGpfNo_search = $('#employeeGpfNo_search').val();
        var employee_name_search = $('#employee_name_search').val();
        var taluka_search = $('#taluka_search').val();
        var employee_department_search = $('#employee_department_search').val();
        var chalan_taluka_search= $('#chalan_taluka_search').val();
        var chalan_serial_no_search= $('#chalan_serial_no_search').val();

        // Append to data
        data.employeeGpfNo_search = employeeGpfNo_search;
        data.employee_name_search = employee_name_search;
        data.taluka_search = taluka_search;
        data.employee_department_search = employee_department_search;
        data.chalan_taluka_search = chalan_taluka_search;
        data.chalan_serial_no_search = chalan_serial_no_search;
        data._token = '{{csrf_token()}}';
      }
    },
    
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex'
    },
    {
      data: 'GPFNo',
      name: 'GPF No'
    },
    {
      data: 'employee_name',
      name: 'Employee Name'
    },
    {
      data: 'Instalment',
      name: 'Instalment'
    },
    {
      data: 'ChallanNo',
      name: 'Challan No'
    },
    {
      data: 'month_name_mar',
      name: 'Month Name'
    },
    {
      data: 'DtFrom',
      name: 'DtFrom'
    },
    {
      data: 'DtTo',
      name: 'DtTo'
     },
     {
      data: 'DiffAmt',
      name: 'Total Remaining'
     },
    {
      data: 'Interest',
      name: 'Interest'
    },
    {
      data: 'TotDiff',
      name: 'Total Differance'
    },
    {
      data: 'Rmk',
      name: 'Remark'
    },
    
    {
      data: 'action',
      name: 'Action'
    }
  ]
});

$('#employeeGpfNo_search').on('keyup', function(){
      table.draw();  
});
$('#employee_name_search').on('keyup', function(){
  table.draw();  
});
$('#taluka_search').on('change', function(){
  table.draw();  
});
$('#employee_department_search').on('change', function(){
  table.draw();  
});
$('#chalan_taluka_search').on('change', function(){
  table.draw();  
});
$('#chalan_serial_no_search').on('change', function(){
  table.draw();  
});

</script>

@endpush

