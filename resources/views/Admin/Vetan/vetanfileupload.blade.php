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
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function() {
    $('.loader').css('display','none');
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
  });
  function fileSubmit(){
    $('.loader').css('display','block');
    var formData = new FormData();
    formData.append('usersFile', $('#test_excel')[0].files[0]);
    formData.append('vetan_aayog', $('#vetan_aayog').val());
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
        $('.loader').css('display','none');
        $('#test_excel').val('');
        $('#vetan_aayog').val('');

      }
    });
  }
  </script>
  @endsection
