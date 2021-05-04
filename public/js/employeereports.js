$(document).on('click', function(){
    $('.report_validate').validate({
        rules:{
        employee_gpf_num:"required",
        view_report_type:"required",
      },
        messages: {
         employee_gpf_num:"Please Enter Employee GPF Number",
         view_report_type:"Please Select Report Type",
        },
        submitHandler: function(form) {
            form.submit();
          }
     });
     $('.report_clear').click(function(){
        $('#employee_gpf_num').val('');
        $('#view_report_type').val('');
     })
});
