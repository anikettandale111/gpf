$(document).on('click', function(){

    $('.department_vali').validate({

        rules:{
        department_name_en:"required",
        department_name_mar:"required",

},
        messages: {
         department_name_en:"Please Enter The taluka Name",
         department_name_mar:"Please Enter The taluka Marathi",


        },

        submitHandler: function(form) {
            form.submit();

          }

     });
     $('.department_clear').click(function(){
        $('#department_id').val(0);
        $('#department_name_en').val('');
        $('#department_name_mar').val('');

     })

});
function geteditdata(id) {
    var departmentnameen = $('#department_name_en_' + id).text();
    var departmentnamemar = $('#department_name_mar_' + id).text();
    $('#department_id').val(id);
    $('#department_name_en').val(departmentnameen);
    $('#department_name_mar').val(departmentnamemar);


}
function deleteConfirmation(id) {
    swal({
        title: "Delete?",
        text: "Please  and then confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0


    }).then(function(e)  {
        if (e.value === true) {
            var id = $('.icon-trash').attr("data-id");
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                method:'GET',
                route: 'department.destroy/',
                data: {id:id},
                dataType: 'JSON',
                success: function(results) {

                    $('#'+id).remove();
                }
            });
        } else {
                e.dismiss;
        }
        }, function(dismiss) {
            return false;
    });
}
function deleteid(id){

}
