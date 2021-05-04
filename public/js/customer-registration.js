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
