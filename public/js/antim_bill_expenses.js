var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var table = '';
$(document).ready(function() {
  $('#antim_bill_expensess').validate({
    rules: {
      bill_no:"required",
      employee_gpf_num:"required",
      user_name:"required",
      user_designation:"required",
      user_department:"required",
      user_taluka_name:"required",
      loan_agrim_niyam:"required",
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
        $('#amount').val(data.amount);
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
    if(lg == 4){
      setTimeout(function(){
        getDetails();
      },100);
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
  $.ajax({
    type: 'POST',
    url: "antimbillexpenses",
    data: $("#antim_bill_expensess").serialize(),
    success: function (data) {
      swal(data.status,data.message);
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
