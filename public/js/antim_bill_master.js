var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var table = '';
$(document).ready(function() {
  $('#antim_bill_form').validate({
    rules: {
      bill_no: "required",
      bill_date: "required",
      bill_check: "required",
      check_date: {
        required: function(element){
          return $("#bill_check_three:checked").val() == 3;
        }
      },
      check_no: {
        required: function(element){
          return $("#bill_check_three:checked").val() == 3;
        }
      },
    },
    messages: {
      bill_no: "Please Enter The Bill No",
      bill_date: "Please Enter The Bill Date",
      bill_check: "Please Enter The Bill Check",
      check_date: "Please Enter The Check Date",
      check_no: "Please Enter The Check No"
    },
    submitHandler: function(form) {
      antimBillSubmit();
    }
  });
  $('#bill_no').change(function(){
    var billno = $(this).val();
    $.ajax({
      type: 'POST',
      url: "get_bill_amount",
      data: { _token: CSRF_TOKEN, billno:billno},
      success: function(results) {
        $('#amount').val(results.amount);
      }
    });
  });
  $('.cancel_submit').click(function() {
    $('#bill_no').val('');
    $('#bill_date').val('');
    $('#amount').val('');
    $('#bill_check').val('');
    $('#check_date').val('');
    $('#check_no').val('');
  });
  $.ajax({
    type: 'GET',
    url: "getLastBillNO",
    data: { _token: CSRF_TOKEN },
    success: function(results) {
      if (results == null) {
        var new_no = "{{Config::get('custom.gpf_bill_number')}}";
      } else {
        var new_no = parseInt(results) + 1;
      }
      $('#bill_no').val(new_no);
    }
  });

  $(document).on('click', '.editBill', function() {
    var id = $(this).attr('data-id');
    $.ajax({
      url: "antimbill/edit",
      data: {_token: CSRF_TOKEN,"id":id},
      type: 'GET',
      success: function(data){
        $('#bill_row_id').val(data.id);
        $('#bill_no').val(data.bill_no);
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
      }
    });
  });
  $(document).on('click', '.deleteBill', function() {
    var id = $(this).attr('data-id');
    swal({
      title: "Delete?",
      text: "Please  and then confirm!",
      type: "warning",
      showCancelButton: !0,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: !0
    }).then(function (e) {
      if (e.value === true) {
        $.ajax({
          url: "delete_bill",
          data: {_token: CSRF_TOKEN,"id":id},
          type: 'POST',
          success: function(data){
            swal(data.status,data.message);
            table.ajax.reload();
          }
        });
      }else {
        e.dismiss;
      }
    }, function (dismiss) {
      return false;
    });
  });
});
function antimBillSubmit(){
  $.ajax({
    url: "antimbill",
    data: $('#antim_bill_form').serialize(),
    type: 'POST',
    success: function(data){
      swal(data.status,data.message);
      table.ajax.reload();
    }
  });
}
table = $('#myTable').DataTable({
  // processing: true,
  serverSide: true,
  ajax: "antimbill",
  columns: [{
    data: 'DT_RowIndex',
    name: 'DT_RowIndex'
  },
  {
    data: 'bill_no',
    name: 'bill_no'
  },
  {
    data: 'bill_date',
    name: 'bill_date'
  },
  {
    data: 'amount',
    name: 'amount'
  },
  {
    data: 'bill_status',
    name: 'bill_check'
  },
  {
    data: 'check_date',
    name: 'check_date'
  },
  {
    data: 'check_no',
    name: 'check_no'
  },
  {
    data: 'action',
    name: 'action'
  }
]
});
