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
      if(results.length){
        $('#user_name').val(results[0].employee_name);
        $('#applicant_name').val(results[0].employee_name);
        $('#user_designation').val(results[0].designation_name);
        $('#user_designation_id').val(results[0].designation_id);
        $('#user_department').val(results[0].department_name);
        $('#user_department_id').val(results[0].department_id);
        $('#user_id').val(results[0].id);
        $('#user_empid').val(results[0].employee_id);
        $('#user_taluka_name').val(results[0].taluka_name);
        $('#user_taluka_id').val(results[0].taluka_id);
        $('.khate_utaraa_dummy').empty();
        var htmldata='';
        htmldata += '<table class="table table-hover table-bordered dataTable no-footer"><thead><tr><td>Month Name</td><td>Month Contribution</td><td>Month Expenses</td></tr></thead>';
        htmldata += '<tbody><tr><td>एप्रिल </td><td>'+results[0].month_april_contri+'</td><td><input type="number" min="0" value="'+results[0].month_april_loan+'" class="form-control" name="month_april_loan" id="month_april_loan"></td></tr></tbody>';
        htmldata += '<tr><td>मे</td><td>'+results[0].month_may_contri+'</td><td><input type="number" min="0" value="'+results[0].month_may_loan+'" class="form-control" name="month_may_loan" id="month_may_loan"></td></tr></tbody>';
        htmldata += '<tr><td>जून</td><td>'+results[0].month_june_contri+'</td><td><input type="number" min="0" value="'+results[0].month_june_loan+'" class="form-control" name="month_june_loan" id="month_june_loan"></td></tr></tbody>';
        htmldata += '<tr><td>जुलै</td><td>'+results[0].month_july_contri+'</td><td><input type="number" min="0" value="'+results[0].month_july_loan+'" class="form-control" name="month_july_loan" id="month_july_loan"></td></tr></tbody>';
        htmldata += '<tr><td>ऑगस्ट</td><td>'+results[0].month_aug_contri+'</td><td><input type="number" min="0" value="'+results[0].month_aug_loan+'" class="form-control" name="month_aug_loan" id="month_aug_loan"></td></tr></tbody>';
        htmldata += '<tr><td>सप्टेंबर</td><td>'+results[0].month_september_contri+'</td><td><input type="number" min="0" value="'+results[0].month_september_loan+'" class="form-control" name="month_september_loan" id="month_september_loan"></td></tr></tbody>';
        htmldata += '<tr><td>ऑक्टोबर</td><td>'+results[0].month_octomber_contri+'</td><td><input type="number" min="0" value="'+results[0].month_octomber_loan+'" class="form-control" name="month_octomber_loan" id="month_octomber_loan"></td></tr></tbody>';
        htmldata += '<tr><td>नोव्हेंबर</td><td>'+results[0].month_november_contri+'</td><td><input type="number" min="0" value="'+results[0].month_november_loan+'" class="form-control" name="month_november_loan" id="month_november_loan"></td></tr></tbody>';
        htmldata += '<tr><td>डिसेंबर</td><td>'+results[0].month_december_contri+'</td><td><input type="number" min="0" value="'+results[0].month_december_loan+'" class="form-control" name="month_december_loan" id="month_december_loan"></td></tr></tbody>';
        htmldata += '<tr><td>जानेवरी </td><td>'+results[0].month_jan_contri+'</td><td><input type="number" min="0" value="'+results[0].month_jan_loan+'" class="form-control" name="month_jan_loan" id="month_jan_loan"></td></tr></tbody>';
        htmldata += '<tr><td>फेब्रुवारी </td><td>'+results[0].month_feb_contri+'</td><td><input type="number" min="0" value="'+results[0].month_feb_loan+'" class="form-control" name="month_feb_loan" id="month_feb_loan"></td></tr></tbody>';
        htmldata += '<tr><td>मार्च </td><td>'+results[0].month_march_contri+'</td><td><input type="number" min="0" value="'+results[0].month_march_loan+'" class="form-control" name="month_march_loan" id="month_march_loan"></td></tr></tbody>';
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
