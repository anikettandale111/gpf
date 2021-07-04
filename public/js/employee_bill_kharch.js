var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var table;
var expensesFileData;
$(document).ready(function() {
  $('.loader').css('display','none');
  $('#employee_bill_kharch_form').validate({
    rules: {
      employee_gpf_num:"required",
    },
    messages: {
      employee_gpf_num:"Please Filed Employee GPF No",
    },
    submitHandler: function(form) {
      billExpensesSubmit();
    }
  });
  $('.file_upload_div').css('display','none');
  $('#bill_no').change(function(){
    var billID=$(this).val();
    var billnumber = $('#bill_no option:selected').text();
    getBillDetails(billID,billnumber);
  });
  $("#employee_gpf_num").keypress(function (e) {
    if($(this).val().length == 5) {
      $(this).val($(this).val().slice(0, 5));
      return false;
    }
    var lg = parseInt($(this).val().length);
    if(lg >= 4){
      setTimeout(function(){
        getDetails();
      },100);
    }
  });
  $('.file_upload').click(function(){
    $('.single_entry_div').removeClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.file_upload_div').css('display','block');
    clearFields();
  });
  $('.single_entry').click(function(){
    $('.file_upload_div').removeClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.file_upload_div').css('display','none');
    $('.single_entry_div').css('display','block');
    clearFields();
  });
  $('#loan_agrim_niyam').on('keypress focusout',function(){
    setTimeout(function(){
        var loanAgrim = $('#loan_agrim_niyam').val().toLowerCase();
        if(loanAgrim == 'final'){
          $('#shillak_rakkam').removeAttr('readonly');
        }else{
          $('#shillak_rakkam').attr('readonly', true);
        }
    },100);
  });
  $('#employee_expenses_file').change(function(){
    // var ext = $("#employee_expenses_file").val().split('.').pop();
    var fileExtension = ['xls', 'csv', 'xlsx'];
        if ($.inArray($("#employee_expenses_file").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            swal("warning","Only formats are allowed : "+fileExtension.join(', '));
            $("#employee_expenses_file").val('');
            return false;
        }
  });
});
function getBillDetails(billID,billnumber){
  $.ajax({
    type: 'GET',
    url: "antimbill/edit",
    data: {_token: CSRF_TOKEN,id:billID},
    success: function(data) {
      $('#bill_row_id').val(data.id);
      $('#bill_date').val(data.bill_date);
      $('#amount').val(data.bill_expenses_total);
      $('#check_date').val(data.check_date);
      $('#check_no').val(data.check_no);
      // $('#bill_check').val(data.bill_check);
      $('input[name="bill_check"]').removeAttr('checked');
      if(parseInt(data.bill_check) === 1)
      $('#bill_check_one').prop('checked', 'checked');
      else
      $('#bill_check_two').prop('checked','checked');
      table.ajax.reload();
      $('#bill_number').val(billnumber);
    }
  });
}
function getDetails(){
  $.ajax({
    type: 'GET',
    url: "getuserdetailsbygpfnotwo",
    data: {_token: CSRF_TOKEN,input_id:$("#employee_gpf_num").val()},
    success: function (results) {
      if((results.empDetails).length){
        var empDetails = results.empDetails;
        $('#user_name').val(empDetails[0].employee_name);
        $('#applicant_name').val(empDetails[0].employee_name);
        $('#user_designation').val(empDetails[0].designation_name);
        $('#user_designation_id').val(empDetails[0].designation_id);
        $('#user_department').val(empDetails[0].department_name);
        $('#user_department_id').val(empDetails[0].department_id);
        $('#user_id').val(empDetails[0].id);
        $('#user_empid').val(empDetails[0].employee_id);
        $('#user_taluka_name').val(empDetails[0].taluka_name);
        $('#user_taluka_id').val(empDetails[0].taluka_id);
        $('.khate_utaraa_dummy').empty();
        var htmldata='';
        if((results.billDetails).length){
        var htmldatatwo_1='';
        var htmldatatwo_2='';
        var htmldatatwo_3='';
        var htmldatatwo_4='';
        var htmldatatwo_5='';
        var htmldatatwo_6='';
        var htmldatatwo_7='';
        var htmldatatwo_8='';
        var htmldatatwo_9='';
        var htmldatatwo_10='';
        var htmldatatwo_11='';
        var htmldatatwo_12='';
        htmldatatwo_1 += '<td><select class="form-control" id="bill_number_id_1" name="bill_number_id_1">';
        htmldatatwo_1 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_2 += '<td><select class="form-control" id="bill_number_id_2" name="bill_number_id_2">';
        htmldatatwo_2 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_3 += '<td><select class="form-control" id="bill_number_id_3" name="bill_number_id_3">';
        htmldatatwo_3 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_4 += '<td><select class="form-control" id="bill_number_id_4" name="bill_number_id_4">';
        htmldatatwo_4 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_5 += '<td><select class="form-control" id="bill_number_id_5" name="bill_number_id_5">';
        htmldatatwo_5 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_6 += '<td><select class="form-control" id="bill_number_id_6" name="bill_number_id_6">';
        htmldatatwo_6 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_7 += '<td><select class="form-control" id="bill_number_id_7" name="bill_number_id_7">';
        htmldatatwo_7 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_8 += '<td><select class="form-control" id="bill_number_id_8" name="bill_number_id_8">';
        htmldatatwo_8 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_9 += '<td><select class="form-control" id="bill_number_id_9" name="bill_number_id_9">';
        htmldatatwo_9 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_10 += '<td><select class="form-control" id="bill_number_id_10" name="bill_number_id_10">';
        htmldatatwo_10 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_11 += '<td><select class="form-control" id="bill_number_id_11" name="bill_number_id_11">';
        htmldatatwo_11 += '<option selected disabled> Select Bill Number </option>';

        htmldatatwo_12 += '<td><select class="form-control" id="bill_number_id_12" name="bill_number_id_12">';
        htmldatatwo_12 += '<option selected disabled> Select Bill Number </option>';


          var billDetails = results.billDetails;
          if(billDetails.length){
            for(var k =0; k < billDetails.length; k++){
              htmldatatwo_1 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_2 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_3 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_4 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_5 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_6 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_7 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_8 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_9 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_10 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_11 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
              htmldatatwo_12 += '<option value="'+billDetails[k].id+'_'+billDetails[k].bill_no+'">'+billDetails[k].bill_no+'</option>';
            }
          }
        }
        htmldatatwo_1 += '</select></td>';
        htmldatatwo_2 += '</select></td>';
        htmldatatwo_3 += '</select></td>';
        htmldatatwo_4 += '</select></td>';
        htmldatatwo_5 += '</select></td>';
        htmldatatwo_6 += '</select></td>';
        htmldatatwo_7 += '</select></td>';
        htmldatatwo_8 += '</select></td>';
        htmldatatwo_9 += '</select></td>';
        htmldatatwo_10 += '</select></td>';
        htmldatatwo_11 += '</select></td>';
        htmldatatwo_12 += '</select></td>';
        htmldata += '<table class="table table-hover table-bordered dataTable no-footer"><thead><tr><td>Month Name</td><td>Month Contribution</td><td>Loan Amount</td><td>Bill Number</td></tr></thead>';
        htmldata += '<tbody><tr><td>एप्रिल </td><td>'+empDetails[0].month_april_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_april_loan+'" class="form-control" name="month_april_loan" id="month_april_loan"></td>'+htmldatatwo_1+'</tr></tbody>';
        htmldata += '<tr><td>मे</td><td>'+empDetails[0].month_may_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_may_loan+'" class="form-control" name="month_may_loan" id="month_may_loan"></td>'+htmldatatwo_2+'</tr></tbody>';
        htmldata += '<tr><td>जून</td><td>'+empDetails[0].month_june_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_june_loan+'" class="form-control" name="month_june_loan" id="month_june_loan"></td>'+htmldatatwo_3+'</tr></tbody>';
        htmldata += '<tr><td>जुलै</td><td>'+empDetails[0].month_july_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_july_loan+'" class="form-control" name="month_july_loan" id="month_july_loan"></td>'+htmldatatwo_4+'</tr></tbody>';
        htmldata += '<tr><td>ऑगस्ट</td><td>'+empDetails[0].month_aug_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_aug_loan+'" class="form-control" name="month_aug_loan" id="month_aug_loan"></td>'+htmldatatwo_5+'</tr></tbody>';
        htmldata += '<tr><td>सप्टेंबर</td><td>'+empDetails[0].month_september_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_september_loan+'" class="form-control" name="month_september_loan" id="month_september_loan"></td>'+htmldatatwo_6+'</tr></tbody>';
        htmldata += '<tr><td>ऑक्टोबर</td><td>'+empDetails[0].month_octomber_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_octomber_loan+'" class="form-control" name="month_octomber_loan" id="month_octomber_loan"></td>'+htmldatatwo_7+'</tr></tbody>';
        htmldata += '<tr><td>नोव्हेंबर</td><td>'+empDetails[0].month_november_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_november_loan+'" class="form-control" name="month_november_loan" id="month_november_loan"></td>'+htmldatatwo_8+'</tr></tbody>';
        htmldata += '<tr><td>डिसेंबर</td><td>'+empDetails[0].month_december_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_december_loan+'" class="form-control" name="month_december_loan" id="month_december_loan"></td>'+htmldatatwo_9+'</tr></tbody>';
        htmldata += '<tr><td>जानेवरी </td><td>'+empDetails[0].month_jan_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_jan_loan+'" class="form-control" name="month_jan_loan" id="month_jan_loan"></td>'+htmldatatwo_10+'</tr></tbody>';
        htmldata += '<tr><td>फेब्रुवारी </td><td>'+empDetails[0].month_feb_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_feb_loan+'" class="form-control" name="month_feb_loan" id="month_feb_loan"></td>'+htmldatatwo_11+'</tr></tbody>';
        htmldata += '<tr><td>मार्च </td><td>'+empDetails[0].month_march_contri+'</td><td><input type="number" min="0" value="'+empDetails[0].month_march_loan+'" class="form-control" name="month_march_loan" id="month_march_loan"></td>'+htmldatatwo_12+'</tr></tbody>';
        htmldata += '</tbody></table>';
        $('.khate_utaraa_dummy').html(htmldata);
      } else {
        swal("WARNING", "Invalid GPF Number OR Does't Exits");
        $("#employee_gpf_num").focus();
        $("#employee_gpf_num").val('');
      }
    }
  });
}

function billExpensesSubmit(){
  var month_april_loan = $('#month_april_loan').val();
  var month_may_loan = $('#month_may_loan').val();
  var month_june_loan = $('#month_june_loan').val();
  var month_july_loan = $('#month_july_loan').val();
  var month_aug_loan = $('#month_aug_loan').val();
  var month_september_loan = $('#month_september_loan').val();
  var month_octomber_loan = $('#month_octomber_loan').val();
  var month_november_loan = $('#month_november_loan').val();
  var month_december_loan = $('#month_december_loan').val();
  var month_jan_loan = $('#month_jan_loan').val();
  var month_feb_loan = $('#month_feb_loan').val();
  var month_march_loan = $('#month_march_loan').val();
  if(parseInt(month_april_loan) > 0){ swal('Error','Select Bill Number For Month of April'); $('#bill_number_id_1').focus(); return false;  }
  if(parseInt(month_may_loan) > 0){ swal('Error','Select Bill Number For Month of May'); $('#bill_number_id_2').focus(); return false;  }
  if(parseInt(month_june_loan) > 0){ swal('Error','Select Bill Number For Month of June'); $('#bill_number_id_3').focus(); return false;  }
  if(parseInt(month_july_loan) > 0){ swal('Error','Select Bill Number For Month of July'); $('#bill_number_id_4').focus(); return false;  }
  if(parseInt(month_aug_loan) > 0){ swal('Error','Select Bill Number For Month of Aug'); $('#bill_number_id_5').focus(); return false;  }
  if(parseInt(month_september_loan) > 0){ swal('Error','Select Bill Number For Month of September'); $('#bill_number_id_6').focus(); return false;  }
  if(parseInt(month_octomber_loan) > 0){ swal('Error','Select Bill Number For Month of Octomber'); $('#bill_number_id_7').focus(); return false;  }
  if(parseInt(month_november_loan) > 0){ swal('Error','Select Bill Number For Month of November'); $('#bill_number_id_8').focus(); return false;  }
  if(parseInt(month_december_loan) > 0){ swal('Error','Select Bill Number For Month of December'); $('#bill_number_id_9').focus(); return false;  }
  if(parseInt(month_jan_loan) > 0){ swal('Error','Select Bill Number For Month of Jan'); $('#bill_number_id_10').focus(); return false;  }
  if(parseInt(month_feb_loan) > 0){ swal('Error','Select Bill Number For Month of Feb'); $('#bill_number_id_11').focus(); return false;  }
  if(parseInt(month_march_loan) > 0){ swal('Error','Select Bill Number For Month of March'); $('#bill_number_id_12').focus(); return false;  }
  $.ajaxSetup({
    headers:
    {'X-CSRF-TOKEN': CSRF_TOKEN}
  });
  $.ajax({
    url: "employeeBillKharch",
    type: "POST",
    data: {
      employee_gpf_num:$("#employee_gpf_num").val(),
      month_april_loan:month_april_loan,
      month_may_loan:month_may_loan,
      month_june_loan:month_june_loan,
      month_july_loan:month_july_loan,
      month_aug_loan:month_aug_loan,
      month_september_loan:month_september_loan,
      month_octomber_loan:month_octomber_loan,
      month_november_loan:month_november_loan,
      month_december_loan:month_december_loan,
      month_jan_loan:month_jan_loan,
      month_feb_loan:month_feb_loan,
      month_march_loan:month_march_loan,
      bill_number_id_april : $('#bill_number_id_1').val(),
      bill_number_id_may : $('#bill_number_id_2').val(),
      bill_number_id_june : $('#bill_number_id_3').val(),
      bill_number_id_july : $('#bill_number_id_4').val(),
      bill_number_id_aug : $('#bill_number_id_5').val(),
      bill_number_id_september : $('#bill_number_id_6').val(),
      bill_number_id_octomber : $('#bill_number_id_7').val(),
      bill_number_id_november : $('#bill_number_id_8').val(),
      bill_number_id_december : $('#bill_number_id_9').val(),
      bill_number_id__jan : $('#bill_number_id_10').val(),
      bill_number_id__feb : $('#bill_number_id_11').val(),
      bill_number_id__march : $('#bill_number_id_12').val(),
    },
    success: function (data) {
      swal(data.status,data.message);
    }
  });
}
table = $('#myTable').DataTable({
  // processing: true,
  serverSide: true,
  ajax: {
    url: 'getBillExpensesDetails',
    type: 'GET',
    data: function ( d ) {
      return $.extend( {}, d, {
        "_token": CSRF_TOKEN,
        'id': $('#bill_no').val(),
      } );
    },
  },
  columns: [{
    data: 'DT_RowIndex',
    name: 'DT_RowIndex'
  },
  {
    data: 'bill_number',
    name: 'bill_id'
  },
  {
    data: 'gpf_no',
    name: 'gpf_no'
  },
  {
    data: 'user_name',
    name: 'user_name'
  },
  {
    data: 'user_department',
    name: 'user_department'
  },
  {
    data: 'user_taluka_name',
    name: 'user_taluka_name'
  },
  {
    data: 'loan_agrim_pryojan',
    name: 'loan_agrim_pryojan'
  },
  {
    data: 'if_installment_no',
    name: 'if_installment_no'
  },
  {
    data: 'required_rakkam',
    name: 'required_rakkam'
  },
  {
    data: 'bill_status',
    name: 'status'
  },
  {
    data: 'action',
    name: 'action'
  }
]
});
function deleteExpenses(rowid){
  swal({
    title: "Delete?",
    text: "Please  and then confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
  }).then(function(e){
    if (e.value === true) {
      $.ajaxSetup({
        headers:
        {'X-CSRF-TOKEN': CSRF_TOKEN}
      });
      $.ajax({
        url: "antimbillexpenses/destroy",
        type: 'POST',
        data: {id:rowid, "_method": 'DELETE'},
        dataType: 'JSON',
        success: function (data) {
          swal(data.status, data.message,data.status);
          table.ajax.reload();
        }});
      } else {
        e.dismiss;
      }
    }, function(dismiss) {
      return false;
    });
  }
function editExpenses(rowid){
  clearFields();
  $.ajax({
    url: "antimbillexpenses/edit",
    type: 'GET',
    data: {_token: CSRF_TOKEN,"id":rowid},
    dataType: 'JSON',
    success: function (data) {
      if(data.status != 'error'){
        $('.file_upload_div').removeClass('btn-secondary');
        $(this).addClass('btn-info');
        $('.file_upload_div').css('display','none');
        $('.single_entry_div').css('display','block');
        $('#row_id').val(data[0].id);
        getBillDetails(data[0].bill_id,data[0].bill_number);
        $('#employee_gpf_num').val(data[0].gpf_no);
        $('#user_name').val(data[0].user_name);
        $('#user_designation').val(data[0].user_designation);
        $('#user_taluka_name').val(data[0].user_taluka_name);
        $('#user_taluka_id').val(data[0].taluka_id);
        $('#user_department').val(data[0].user_department);
        $('#shillak_rakkam').val(data[0].shillak_rakkam);
        $('#loan_agrim_pryojan').val(data[0].loan_agrim_pryojan);
        $('#loan_agrim_niyam').val(data[0].loan_agrim_niyam);
        $('#required_rakkam').val(data[0].required_rakkam);
        $('#if_installment_no').val(data[0].if_installment_no);
        $('#bank_name').val(data[0].bank_name);
        $('#bank_ifsc_name').val(data[0].bank_ifsc_name);
        $('#bank_acc_number').val(data[0].bank_acc_number);
      } else {
        swal('error',data.message);
      }
    }
  });
}
function clearFields(){
  $('#row_id').val(0);
  $('#employee_gpf_num').val('');
  $('#user_name').val('');
  $('#user_designation').val('');
  $('#user_taluka_name').val('');
  $('#user_department').val('');
  $('#shillak_rakkam').val('');
  $('#loan_agrim_niyam').val('');
  $('#loan_agrim_pryojan').val('');
  $('#required_rakkam').val(0);
  $('#if_installment_no').val(0);
  $('#bank_name').val('-');
  $('#bank_ifsc_name').val('-');
  $('#bank_acc_number').val('-');
  $('#user_taluka_id').val('');
}
