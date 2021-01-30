$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{url('bill_information')}}",
        },
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
                data: 'bill_check',
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
                searchable: false,
                orderable: false
            }
        ]
    });
});
$('#bill_vali').validate({
    rules: {
        bill_no: "required",
        bill_date: "required",
        amount: "required",
        bill_check: "required",
        check_date: "required",
        check_no: "required"
    },
    messages: {
        bill_no: "Please Enter The Bill No",
        bill_date: "Please Enter The Bill Date",
        amount: "Please Enter The Amount",
        bill_check: "Please Enter The Bill Check",
        check_date: "Please Enter The Check Date",
        check_no: "Please Enter The Check No"
    }
});
$('.cancel_submit').click(function() {
    $('#bill_no').val('');
    $('#bill_date').val('');
    $('#amount').val('');
    $('#bill_check').val('');
    $('#check_date').val('');
    $('#check_no').val('');
});
$('.bill_submit').click(function() {
    var billno = $('#bill_no').val();
    var billdate = $('#bill_date').val();
    var amount = $('#amount').val();
    var billcheck = $('input[type="radio"]:checked').val();
    var checkdate = $('#check_date').val();
    var checksno = $('#check_no').val();
    $.ajax({
        url: "{{url('bill_insert')}}",
        type: 'POST',
        data: {
            bill_no: billno,
            bill_date: billdate,
            amount: amount,
            bill_check: billcheck,
            check_date: checkdate,
            check_no: checksno

        },
        success: function(response) {
            console.log(response);

            if (response.success) {
                alert(response.message) //Message come from controller
                location.reload();
            } else {
                alert("Error")
            }
        },
        error: function(error) {
            console.log(error)
        }
    });
});
