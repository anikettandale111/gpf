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

$('.search').validate({
  rules:{
  employee_gpf_num:"required",
  
},
  messages: {
   employee_gpf_num:"Please Enter Employee Name",
   
  },
  submitHandler: function(form) {
    $.ajax({
        url: "search", 
        type: "POST",             
        data: $(form).serialize(),
        cache: false,             
        processData: false,      
        success: function(data) {
          if(data.success)
          {
            var modal = $("#exampleModalsearch")
            
            
            modal.find(".modal-body .gpfdetails").html(data.html);
          }
        }
    });
    return false;
}
});

