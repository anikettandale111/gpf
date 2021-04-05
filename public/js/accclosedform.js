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
      applicant_relation:'required',
      applicant_name:'required',
      applicantion_date:'required',
      gat_vikas_adhikari_no:'required',
      zp_adhikari_no:'required',
      antim_pryojan:'required',
      antim_pay_month:'required',
      antim_pay_year:'required',
      antim_6pay_month:'required',
      antim_6pay_year:'required',
      antim_instllment_month:'required',
      antim_instllment_year:'required',

      fo_gat_vikas_adhikari_no:'required',
      fo_zp_adhikari_no:'required',
      vibhag_samiti_no:'required',
      transfer_prmotion_office:'required',
      transfer_office_gpf_no:'required',
      application_copy_kramanak_one:'required',
      application_copy_kramanak_two:'required',
      application_copy_kramanak_three:'required',
      antim_pryojan:'required',
      account_closed_ft_transfer:'required',
    },
    messages : {
      employee_gpf_num:'Employee GPF Number Required',
      user_name:'Employee Name Required',
      user_designation:'Employee Designation Required',
      user_joining_date:'Employee Joining Required',
      user_taluka_name:'Employee Taluka_ Required',
      user_department:'Employee Department Required',
      applicant_relation: 'Applicant Relation',
      applicant_name:'Applicant Name',
      applicantion_date:'Applicantion Date',
      gat_vikas_adhikari_no:'Filed Required',
      zp_adhikari_no:'Filed Required',
      antim_pryojan:'Filed Required',
      antim_pay_month:'Filed Required',
      antim_pay_year:'Filed Required',
      antim_6pay_month:'Filed Required',
      antim_6pay_year:'Filed Required',
      antim_instllment_month:'Filed Required',
      antim_instllment_year:'Filed Required',

      fo_gat_vikas_adhikari_no:'Filed Required',
      fo_zp_adhikari_no:'Filed Required',
      vibhag_samiti_no:'Filed Required',
      transfer_prmotion_office:'Filed Required',
      transfer_office_gpf_no:'Filed Required',
      application_copy_kramanak_one:'Filed Required',
      application_copy_kramanak_two:'Filed Required',
      application_copy_kramanak_three:'Filed Required',
      antim_pryojan:'Filed Required',
      account_closed_ft_transfer:'Filed Required',
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

  $('.form_one_show').click(function(){
    $('.form_two_val').val('');
    $(this).removeClass('btn-secondary');
    $('.form_two_show').removeClass('btn-info');
    $('.form_two_show').addClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.form_two').css('display','none');
    $('.form_one').css('display','block');
    $('#form_type').val('1');
  });
  $('.form_two_show').click(function(){
    $('#form_type').val('2');
    $('.form_one_val').val('');
    $(this).removeClass('btn-secondary');
    $('.form_one_show').removeClass('btn-info');
    $('.form_one_show').addClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.form_two').css('display','block');
    $('.form_one').css('display','none');
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
