var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var table = '';
$(document).ready(function(){

  $('.balance_update').validate({
    rules : {
      employee_gpf_num:'required',
      user_name:'required',
      user_designation:'required',
      user_joining_date:'required',
      user_taluka_name:'required',
      user_department:'required',
      shillak_rakkam_two:'required',
      shillak_rakkam_one:'required',
    },
    messages : {
      employee_gpf_num:'Employee GPF Number Required',
      user_name:'Employee Name Required',
      user_designation:'Employee Designation Required',
      user_joining_date:'Employee Joining Required',
      user_taluka_name:'Employee Taluka_ Required',
      user_department:'Employee Department Required',
      shillak_rakkam_two:'Employee Opening Balance Required',
      shillak_rakkam_one:'Employee Opening Balance Required',
    },
    submitHandler: function(form) {
      balanceUpdateForm();
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
    url: "../getEmployeeDetails",
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
      for(var i=0;i < results.length;i++){
        if(results[i].year == rakkam_one){
          $('#shillak_rakkam_one').val(results[i].opn_balance);
        }
        if(results[i].year == rakkam_two){
          $('#shillak_rakkam_two').val(results[i].opn_balance);
        }
      }
    }
  });
}

function balanceUpdateForm(){
  var shillak_rakkam_two = $('#shillak_rakkam_two').val();
  var shillak_rakkam_one = $('#shillak_rakkam_one').val();
  var year_one = $('#shillak_rakkam_one').data('curdate');
  var year_two = $('#shillak_rakkam_two').data('curdate');
  var employee_gpf_num = $('#employee_gpf_num').val();
  $.ajax({
    type: 'POST',
    url: "../updateBalance",
    data: {_token: CSRF_TOKEN,shillak_rakkam_two:shillak_rakkam_two,shillak_rakkam_one:shillak_rakkam_one,year_one:year_one,
      year_two:year_two,employee_gpf_num:employee_gpf_num},
      success: function (results) {
        swal(results.status,results.message);
        $('.clearfield').val('');
      }
    });
  }
  function getEmployeeDetails(){

    table = $('#employeeTable').DataTable({
      // processing: true,
      serverSide: true,
      ajax: "employee_list",
      columns: [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex'
      },
      {
        data: 'gpf_no',
        name: 'GPF No.'
      },
      {
        data: 'employee_name',
        name: 'Employee Name'
      },
      {
        data: 'taluka_name',
        name: 'Taluka Name'
      },
      {
        data: 'designation_name',
        name: 'Designation'
      },
      {
        data: 'department_name',
        name: 'Department'
      }
    ]
  });
}
