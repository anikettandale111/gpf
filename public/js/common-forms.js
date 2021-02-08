var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {
  //jQuery code goes here
  $('.validatedForm').validate({
    rules : {
      application_form_number:{required: true},
      gpf_no:{required: true},
      user_name:{required: true},
      user_empid:{required: true},
      user_designation:{required: true},
      user_bank:{required: true},
      user_bank_account_no:{required: true},
      user_bank_location:{required: true},
      user_bank_ifsc:{required: true},
      user_total_amount:{required: true},
      user_withdrawn_amount:{required: true},
      user_type_of_request:{required: true},
      user_reason_withdrawn:{required: true},
      user_proof:{required: true},
      user_joining_date:{required: true},
      user_retirment_date:{required: true},
      user_total_work:{required: true},
      user_qualify_criteria:{required: true},
      user_account_stmt:{required: true},
    },
    messages: {
      application_form_number:"application_form_number required",
      gpf_no:"gpf_no required",
      user_name:"user_name required",
      user_empid:"user_empid required",
      user_designation:"user_designation required",
      user_bank:"user_bank required",
      user_bank_account_no:"user_bank_account_no required",
      user_bank_location:"user_bank_location required",
      user_bank_ifsc:"user_bank_ifsc required",
      user_total_amount:"user_total_amount required",
      user_withdrawn_amount:"user_withdrawn_amount required",
      user_type_of_request:"user_type_of_request required",
      user_reason_withdrawn:"user_reason_withdrawn required",
      user_proof:"user_proof required",
      user_joining_date:"user_joining_date required",
      user_retirment_date:"user_retirment_date required",
      user_total_work:"user_total_work required",
      user_qualify_criteria:"user_qualify_criteria required",
      user_account_stmt:"user_account_stmt required",
    }
  });
  $.ajax({
    type: 'GET',
    url: "getLastApplicationNumber",
    data: {_token: CSRF_TOKEN},
    success: function (results) {
      var pad = "0000"
      var str = "" + 1
      var ans = pad.substring(0, pad.length - str.length) + str
      if(results != ''){
        var str = "" + (parseInt(results)+1)
        var ans = pad.substring(0, pad.length - str.length) + str
      }
      $('#application_form_number').val(ans);
    }
  });
  $("#gpf_no").keypress(function (e) {
    if($(this).val().length == 6) {
      $(this).val($(this).val().slice(0, 6));
        return false;
    }
    var lg = parseInt($(this).val().length);
    if(lg == 5){
      setTimeout(function(){
        getdetails();
      },200);
    }
  });
  $('#user_withdrawn_amount').focusout(function(e){
    setTimeout(function(){
      var required = parseInt($('#user_withdrawn_amount').val());
      var saving = parseInt($('#user_total_amount').val());
      if(saving < required){
        $("#user_withdrawn_amount").focus();
        $("#user_withdrawn_amount").val('');
        swal("WARNING", "Required amount is gerater than total amount.");
        return false;
      }
    },300);
  });
  $('#user_retirment_date').change(function(){
    var dt1 = $('#user_retirment_date').val();
    var dt2 = $('#user_joining_date').val();
    $('#user_total_work').val(diff_year_month_day(dt1, dt2));
  });
});
function getdetails(){
  $.ajax({
    type: 'GET',
    url: "getuserdetailsbygpfno",
    data: {_token: CSRF_TOKEN,input_id:$("#gpf_no").val()},
    success: function (results) {
      console.log(results);
      if(results.length){
        $('#user_name').val(results[0].employee_name);
        $('#user_id').val(results[0].id);
        $('#user_bank_id').val(results[0].bank_id);
        $('#user_designation_id').val(results[0].designation_id);
        $('#user_empid').val(results[0].employee_id);
        $('#user_designation').val(results[0].designation_name);
        $('#user_bank').val(results[0].bank_name);
        $('#user_bank_account_no').val(results[0].bank_account_no);
        $('#user_bank_location').val(results[0].branch_location);
        $('#user_bank_ifsc').val(results[0].ifsc_code);
        $('#user_total_amount').val('1000000');
        $('#user_joining_date').val(results[0].joining_date);
        $('#user_retirment_date').val(results[0].retirement_date);
        $('#user_total_work').val(diff_year_month_day(results[0].retirement_date,results[0].joining_date));
      } else {
        swal("WARNING", "Invalid GPF Number OR Does't Exits");
        $("#gpf_no").focus();
      }
    }
  });
}
function diff_year_month_day(dt1, dt2)
 {
   if(dt1 != "" && dt1 != ""){
     var From_date = new Date(dt1);
     var To_date = new Date(dt2);
     var diff_date =  From_date - To_date ;
     var years = Math.floor(diff_date/31536000000);
     var months = Math.floor((diff_date % 31536000000)/2628000000);
     var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
     return years+" year(s) "+months+" month(s) "+days+" and day(s)";
   }
 }
