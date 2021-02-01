$(document).ready(function() {
    //jQuery code goes here
    $('.validatedForm').validate({
        rules: {
            classification: {
                required: true,
            },
            gpf_no: {
                required: true,
                digits: "required",
            },
            taluka: "required",
            department: "required",
            name: "required",
            designation: "required",
            date_of_birthday: "required",
            date_birth: "required",
            retirement_date: "required",
            bank: "required",
            branch: "required",
            IFSC_code: "required",
            account_no: {
                required: true,
                digits: "required",
            },
        },
        messages: {
            classification: "Plese Select Classification",
            gpf_no: {
                required: "Please Enter gpf Number",
            },
            taluka: " Please Select Taluka",
            department: " Please Select Department",
            name: " Please Enter The Name",
            designation: " Please Select designation",
            date_of_birthday: "Please Enter Birthday Date",
            date_birth: " Please Enter Resume Date",
            retirement_date: " Please Enter Retirement  Date",
            bank: " Please Enter The Blank Name",
            branch: "Please Enter The Branch Name",
            IFSC_code: "Please Enter IFSC code",
            account_no: {
                required: " Please Enter Account Number",
            },
        }
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
                url: "{{url('/customer_delete')}}/" + id,
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: 'JSON',
                success: function(results) {

               $('#' + results.id).remove();

                }


            });

        } else {
            e.dismiss;
        }

    }, function(dismiss) {
        return false;
    })
}
$('#gpf_no').on('change', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).val();

    $.ajax({
        url: "{{url('customer_registration.edit')}}",
        type: 'post',
        data: {
            _token: CSRF_TOKEN,
            'id': id
        },
        success: function(data) {

            var obj = $.parseJSON(data);

            if (obj.userdata) {
                $('#taluka').val(obj.userdata[0].taluka);
                $('#department').val(obj.userdata[0].department);
                $('#designation').val(obj.userdata[0].designation);
                $('#date_birth').val(obj.userdata[0].date_of_birthday);
                $('#date_dated').val(obj.userdata[0].date_birth);
                $('#retirement_date').val(obj.userdata[0].date_dated);
                $('#account_no').val(obj.userdata[0].account_no);
                $('#name').val(obj.userdata[0].name);
                $('#classification').val(obj.userdata[0].classification);

            } else {

                alert("This number is not exist");
                $("#cform")[0].reset();

                return false;
            }
        }
    });

});
