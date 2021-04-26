var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
  $('.account_closed').validate({
    rules : {
      employee_gpf_num:'required',
      user_name:'required',
      user_designation:'required',
      user_joining_date:'required',
      user_taluka_name:'required',
      user_department:'required',
    },
    messages : {
      employee_gpf_num:'Employee GPF Number Required',
      user_name:'Employee Name Required',
      user_designation:'Employee Designation Required',
      user_joining_date:'Employee Joining Required',
      user_taluka_name:'Employee Taluka_ Required',
      user_department:'Employee Department Required',
    },
    submitHandler: function(form) {
      accountClosedForm();
    }
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
    url: "../getuserdetailsbygpfno",
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
        getBalances();
      } else {
        swal("WARNING", "Invalid GPF Number OR Does't Exits");
        $("#employee_gpf_num").focus();
        $("#employee_gpf_num").val('');
        $("#user_name").val('');
        $("#user_designation").val('');
        $("#user_joining_date").val('');
        $("#user_taluka_name").val('');
        $("#user_department").val('');
      }
    }
  });
}
function getBalances(){
  $.ajax({
    type: 'GET',
    url: "../getUserBalances",
    data: {_token: CSRF_TOKEN,input_id:$("#employee_gpf_num").val()},
    success: function (results) {
      var cur_year = new Date().getFullYear();
      var rakkam_two = $('#shillak_rakkam_two').data('curdate');
      var rakkam_one = $('#shillak_rakkam_one').data('curdate');

      // if(rakkam_two == prv_two_year){
      //   $('#shillak_rakkam_two').val();
      // }
      // if(prv_one_year == rakkam_one){
      //   $('#shillak_rakkam_one').val();
      // }
    }
  });
}

function accountClosedForm(){
  $.ajax({
    type: 'POST',
    url: "accountclosed",
    data: $('.account_closed').serialize(),
    success: function (results) {
      swal(results.status,results.message);
    }
  });
}
