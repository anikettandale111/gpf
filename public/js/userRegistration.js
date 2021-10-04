var usertable;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {
  //jQuery code goes here
  $('.validatedForm').validate({
    rules : {
      name:"required",
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      email:"required email",
      password : {
        minlength : 5
      },
      password_confirmation : {
        minlength : 5,
        equalTo : "#password"
      },
      taluka:"required",
      department:"required",
      role:"required",
      designation:"required",
    },
    messages: {
      name: "Enter your Name",
      phone: {
        required: "Please enter phone number",
        digits: "Please enter valid phone number",
        minlength: "Phone number field accept only 10 digits",
        maxlength: "Phone number field accept only 10 digits",
      },
      email: {
        required: "Enter your Email",
        email: "Please enter a valid email address.",
      },
      taluka: "Plese Select Taluka",
      department: "Plese Select Department",
      designation: "Plese Select Designation",
      role: "Plese Select Role",
    },
    submitHandler: function(form) {
        form.submit();
    }
  });
});
usertable = $('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "user_registration",
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex'
    },
    {
      data: 'name',
      name: 'User Name'
    },
    {
      data: 'phone',
      name: 'Phone Number'
    },
    {
      data: 'email',
      name: 'Email-ID'
    },
    {
      data: 'taluka_name',
      name: 'Taluka Name'
    },
    {
      data: 'dept_name',
      name: 'Department'
    },
    {
      data: 'action',
      name: 'Action'
    },
  ]
});
function editRow(id){
  $.ajax({
    type: 'GET',
    url: "user_registration/"+id,
    dataType: 'JSON',
    success: function (results) {
    
      $("#user_id").val(results.id);
      $("#name").val(results.name);
      $("#phone").val(results.phone);
      $("#email").val(results.email);
      $("#taluka").val(results.taluka_id);
      $("#department").val(results.department_id);
      $("#roles").val(results.role_id);
      $("#designation").val(results.designation_id);
    }
  });
}
function deleteConfirmation(id) {
  swal({
    title: "Delete?",
    text: "Please confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
  }).then(function (e) {
    if (e.value === true) {
      $.ajax({
        type: 'DELETE',
        url: "user_registration/destroy",
        data: {_method: 'DELETE',_token: CSRF_TOKEN,id:id},
        dataType: 'JSON',
        success: function (results) {
          swal('success','User Deleted Successfully.');
          usertable.ajax.reload();
        }
      });
    } else {
      e.dismiss;
    }
  }, function (dismiss) {
    return false;
  })
}
