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
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="skype">
          <h2>{{'वेतन आयोग फाइल अपलोड'}} </h2>
        </div>
        <div class="x_content">
          <div class="loader" style="display:none"></div>
          <form class="seven_pay_excel_file" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-sm-3">
                <label for="">{{trans('language.th_trend_year')}}</label>
                <select class="form-control getchalan" name="year_id" id="year_id">
                  <option value="{{Session::get('from_year')}}">{{Session::get('from_year')}}</option>
                  <option value="{{Session::get('to_year')}}">{{Session::get('to_year')}}</option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label for="">{{trans('language.th_trend_no')}}</label>
                <select class="form-control getchalan" name="month_id" id="month_id">
                  <option value="" selected disabled>{{'Select Option'}}</option>
                  @foreach($month AS $key => $m_row)
                  <option value="{{$m_row->id}}">{{$m_row->month_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label for="">{{trans('language.th_trend_s_no')}}</label>
                <select class="form-control getchalan" name="chalan_serial_no" id="chalan_serial_no">
                  <option value="" selected disabled>{{'Select Option'}}</option>
                  @for($i=1;$i < 300 ;$i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label for="">{{trans('language.th_trend_taluka')}}</label>
                <select class="form-control getchalan" name="taluka_id" id="taluka_id">
                  <option value="" selected disabled>{{'Select Option'}}</option>
                  @foreach($taluka AS $key => $t_row)
                  <option value="{{$t_row->id}}">{{$t_row->taluka_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-3 file-select">
                <label for="">{{trans('language.th_trend_the_amount_of_hearing')}}</label>
                <input class="form-control" type="text" readonly name="chalan_amount" id="chalan_amount" >
              </div>
              <div class="form-group col-sm-3 file-select">
                <label for="subscribed-rakkam">खतावलेली रक्कम </label>
                <input id="subscribed_rakkam" class="form-control" type="text" name="subscribed_rakkam" readonly>
              </div>
              <div class="form-group col-sm-3 file-select">
                <label for="">शिल्लक रक्कम</label>
                <input class="form-control" type="text" readonly name="chalan_khatavani" id="chalan_khatavani" >
              </div>
              <input class="form-control" type="hidden" name="chalan_id" id="chalan_id" >
              <div class="form-group col-sm-3">
                <label for="">{{'वेतन आयोग निवडा'}}</label>
                <select class="form-control" name="vetan_aayog" id="vetan_aayog">
                  <option value="" selected disabled>{{'वेतन आयोग निवडा'}} </option>
                  <option value="6">{{trans('language.6_pay_commission_paid')}} </option>
                  <option value="7">{{trans('language.7_pay_commission_paid')}} </option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label for="">{{trans('language.th_trend_file_selecte')}}</label>
                <input class="form-control" type="file" name="test_excel" id="test_excel" required>
              </div>
            </div>
            <div class="row mt-3">
              <div class="form-group col-sm-3">
                <button class="btn btn-primary" type="submit" name="button">Upload File</button>
              </div>
            </div>
          </form>
        </div>
        <input type="hidden" id="fileid" name="fileid" value="0">
        <div class="x_content">
          <div class="row">
            <table id="fileDataTable" class="table table-striped table-bordered" style="width:100% !important">
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>GPF No</th>
                  <th>Vetan Ayog</th>
                  <th>Differnace Amount</th>
                  <th>Intrest</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var year = $('.year').val();
  var chalan_month = $('#chalan_month').val();
  var chalan_number = $('#chalan_number').val();
  var chalan_taluka = $('#taluka_id').val();
  var fileDataTable;
  $(document).ready(function() {
    $('.loader').css('display','none');
    $('#test_excel').change(function(){
      // var ext = $("#test_excel").val().split('.').pop();
      var fileExtension = ['xls', 'csv', 'xlsx'];
          if ($.inArray($("#test_excel").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
              swal("warning","Only formats are allowed : "+fileExtension.join(', '));
              $("#test_excel").val('');
              return false;
          }
    });
    $('.getchalan').change(function(){
      var year = $('#year_id').val();
      var chalan_month = $('#month_id').val();
      var chalan_serial_no = $('#chalan_serial_no').val();
      var chalan_taluka = $('#taluka_id').val();
      if(year == null)  {
        return false;
      }
      if(chalan_month == null){
        return false;
      }
      if(chalan_serial_no == null){
        return false;
      }
      if(chalan_taluka == null){
        return false;
      }
      getChalanDetails(year,chalan_month,chalan_serial_no,chalan_taluka);
    });
    $('.seven_pay_excel_file').validate({ // initialize the plugin
      rules: {
        vetan_aayog:"required",
        test_excel:"required"
      },
      messages:{
        vetan_aayog: "Please Select Vetan Ayog",
        test_excel: "Please Select File"
      },
      submitHandler: function()
      {
        fileSubmit();
      }
    });
    $('#test_excel').change(function(){
      var fileExtension = ['xls', 'csv', 'xlsx'];
          if ($.inArray($("#test_excel").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
              swal("warning","Only formats are allowed : "+fileExtension.join(', '));
              $("#test_excel").val('');
              return false;
          }
    });
    fileDataTable = $('#fileDataTable').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: [
          { extend: 'excel', className: 'btn btn-secondary m-2' },
        ],
        pageLength: '-1',
        ajax: {
          url: 'getFileData',
          type: 'GET',
          data: function ( d ) {
            return $.extend( {}, d, {
                "_token": CSRF_TOKEN,
                'fileid': $('#fileid').val(),
            } );
          },
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
          data: 'pay_number',
          name: 'Vetan Ayog'
        },
        {
          data: 'DiffAmt',
          name: 'Differance Amount'
        },
        {
          data: 'Interest',
          name: 'Interest'
        },
        {
          data: 'action',
          name: 'Action'
        }
      ]
    });
  });
  function fileSubmit(){
    $('.loader').css('display','block');
    var formData = new FormData();
    formData.append('usersFile', $('#test_excel')[0].files[0]);
    formData.append('vetan_aayog', $('#vetan_aayog').val());
    formData.append('chalan_id', $('#chalan_id').val());
    $.ajaxSetup({
      headers:
      {'X-CSRF-TOKEN': CSRF_TOKEN}
    });
    $.ajax({
      url: 'vetanfileupload',
      type : 'POST',
      data : formData,
      processData: false,
      contentType: false,
      success : function(data) {
        swal(data.status,data.message);
        if(data.status == "success"){
          $('#fileid').val(data.fileid);
          fileDataTable.ajax.reload();
        }
        $('.loader').css('display','none');
        $('#test_excel').val('');
        $('#vetan_aayog').val('');
      }
    });
  }
  function getChalanDetails(year,chalan_month,chalan_serial_no,chalan_taluka){
    $.ajax({
      url: "chalandetails",
      data: {"_token": CSRF_TOKEN,'year': year,'chalan_month': chalan_month,'chalan_number': chalan_serial_no,'chalan_taluka':chalan_taluka},
      type: 'GET',
      success: function(res) {
        if (res.amt != null) {
          $('#file_upload_list').DataTable().ajax.reload(null, false);
          $('.file-select').css('display','block');
          $('#chalan_id').val(res.amt.chalan_id);
          $('#chalan_number').val(res.amt.challan_number);
          $('#chalan_amount').val(res.amt.amount);
          $('#chalan_khatavani').val(res.amt.diff_amount);
          $('#subscribed_rakkam').val(parseInt(res.amt.amount) - parseInt(res.amt.diff_amount));
          $('#diffrence_amount').val(res.amt.diff_amount);
          $('#classification_id').val(res.amt.classification);
        } else {
          swal("WARNING", "Invalid Chalan Number OR Does't Exits",'warning');
        }
        return false;
      }
    });
  }
  </script>
  @endsection
