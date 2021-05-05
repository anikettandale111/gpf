var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var table;
var expensesFileData;
$(document).ready(function() {
  $('.loader').css('display','none');
  $('.antim_bill_expensess').validate({
    rules: {
      bill_no:"required",
      employee_gpf_num:"required",
      user_name:"required",
      user_designation:"required",
      user_department:"required",
      user_taluka_name:"required",
      loan_agrim_niyam:"required",
      loan_agrim_pryojan:"required",
      shillak_rakkam:"required",
      required_rakkam:"required",
      bank_name:"required",
      bank_ifsc_name:"required",
      bank_acc_number:"required",
      if_installment_no:"required",
    },
    messages: {
      bill_no:"Please Filed Bill No",
      employee_gpf_num:"Please Filed Employee GPF No",
      user_name:"Please Filed User Name",
      user_designation:"Please Filed User Designation",
      user_department:"Please Filed User Department",
      user_taluka_name:"Please Filed User Taluka Name",
      loan_agrim_niyam:"Please Filed Loan Agrim Niyam",
      loan_agrim_pryojan:"Please Filed Loan Agrim Pryojan",
      shillak_rakkam:"Please Filed Shillak Rakkam",
      required_rakkam:"Please Filed Required Rakkam",
      bank_name:"Please Filed Bank Name",
      bank_ifsc_name:"Please Filed Bank IFSC Name",
      bank_acc_number:"Please Filed Bank A/C Number",
      if_installment_no:"Please Filed If_installment_no",
    },
    submitHandler: function(form) {
      billExpensesSubmit();
    }
  });
  $('.file_upload_div').css('display','none');
  $('.single_entry_div').css('display','none');
  $('#bill_no').change(function(){
    var billID=$(this).val();
    var billnumber = $('#bill_no option:selected').text();
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
    $('.single_entry_div').css('display','none');
  });
  $('.single_entry').click(function(){
    $('.file_upload_div').removeClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.file_upload_div').css('display','none');
    $('.single_entry_div').css('display','block');
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
function getDetails(){
  $.ajax({
    type: 'GET',
    url: "getuserdetailsbygpfno",
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
        $('#user_joining_date').val(results[0].joining_date);
        $('#user_retirment_date').val(results[0].retirement_date);
        $('#user_taluka_name').val(results[0].taluka_name);
        $('#bank_acc_number').val(results[0].bank_account_no);
        $('#bank_name').val(results[0].bank_name);
        $('#bank_ifsc_name').val(results[0].ifsc_code);
        $('#shillak_rakkam').val(results[0].opn_balance);
      } else {
        swal("WARNING", "Invalid GPF Number OR Does't Exits");
        $("#employee_gpf_num").focus();
        $("#employee_gpf_num").val('');
      }
    }
  });
}

function billExpensesSubmit(){
  $('.loader').css('display','block');
  var formData = new FormData();
  formData.append('employee_expenses_file', $('#employee_expenses_file')[0].files[0]);
  formData.append('bill_no', $('#bill_no').val());
  formData.append('bill_number', $('#bill_number').val());
  formData.append('bill_date', $('#bill_date').val());
  formData.append('amount', $('#amount').val());
  formData.append('employee_gpf_num', $('#employee_gpf_num').val());
  formData.append('user_name', $('#user_name').val());
  formData.append('user_designation', $('#user_designation').val());
  formData.append('user_taluka_name', $('#user_taluka_name').val());
  formData.append('user_department', $('#user_department').val());
  formData.append('shillak_rakkam', $('#shillak_rakkam').val());
  formData.append('loan_agrim_niyam', $('#loan_agrim_niyam').val());
  formData.append('loan_agrim_pryojan', $('#loan_agrim_pryojan').val());
  formData.append('required_rakkam', $('#required_rakkam').val());
  formData.append('if_installment_no', $('#if_installment_no').val());
  formData.append('bank_name', $('#bank_name').val());
  formData.append('bank_ifsc_name', $('#bank_ifsc_name').val());
  formData.append('bank_acc_number', $('#bank_acc_number').val());

  $.ajaxSetup({
    headers:
    {'X-CSRF-TOKEN': CSRF_TOKEN}
  });
  $.ajax({
    url: "antimbillexpenses",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (data) {
      swal(data.status,data.message);
      $('.loader').css('display','none');
      $('.make_empty').val();
      table.ajax.reload();

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
    data: 'loan_agrim_niyam',
    name: 'loan_agrim_niyam'
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
