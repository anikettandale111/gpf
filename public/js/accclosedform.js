$(document).on('click', function(){
    $('.report_validate').validate({
        rules:{
        employee_gpf_num:"required",
        retirment_year:"required",
        retirment_month:"required",
        view_report_type:"required",
      },
        messages: {
         employee_gpf_num:"Please Enter Employee GPF Number",
         retirment_year:"Please select Employee Retirment Year",
         retirment_month:"Please select Employee Retirment Month",
         view_report_type:"Please Select Report Type",
        },
        submitHandler: function(form) {
            form.submit();
          }
     });
     $('.report_clear').click(function(){
        $('#employee_gpf_num').val('');
        $('#retirment_year').val('');
        $('#retirment_month').val('');
        $('#view_report_type').val('');
     })
});
$(document).ready(function(){
  $('.form_one_show').click(function(){
    $(this).removeClass('btn-secondary');
    $('.form_two_show').removeClass('btn-info');
    $('.form_two_show').addClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.form_two').css('display','none');
    $('.form_one').css('display','block');
  })
  $('.form_two_show').click(function(){
    $(this).removeClass('btn-secondary');
    $('.form_one_show').removeClass('btn-info');
    $('.form_one_show').addClass('btn-secondary');
    $(this).addClass('btn-info');
    $('.form_two').css('display','block');
    $('.form_one').css('display','none');
  })
})
