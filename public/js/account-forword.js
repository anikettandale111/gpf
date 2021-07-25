var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){
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
    url: "../getEmployeeDetails",
    data: {_token: CSRF_TOKEN,input_id:$("#employee_gpf_num").val()},
    success: function (results) {
      if(results.length){
        $('#user_name').val(results[0].employee_name);
        $('#applicant_name').val(results[0].employee_name);
        // $('#user_designation').val(results[0].designation_name);
        $('#user_designation').val(results[0].designation_id);
        // $('#user_department').val(results[0].department_name);
        $('#user_department').val(results[0].department_id);
        $('#user_id').val(results[0].id);
        $('#user_empid').val(results[0].employee_id);
        $('#user_joining_date').val(results[0].joining_date);
        $('#user_retirment_date').val(results[0].retirement_date);
        $('.showthis').removeClass('hidethis');
      } else {
        swal("WARNING", "Invalid GPF Number OR Does't Exits");
        $("#employee_gpf_num").focus();
        $("#employee_gpf_num").val('');
        $('.showthis').addClass('hidethis');
      }
    }
  });
}
