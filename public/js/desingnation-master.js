$(document).on('click', function(){

    $('.designation_vali').validate({

        rules:{
            designation_name_en:"required",
            designation_name_mar:"required",

},
        messages: {
         designation_name_en:"Please Enter The taluka Name",
         designation_name_mar:"Please Enter The taluka Marathi",


        },

        submitHandler: function(form) {
            form.submit();

          }

     });
     $('.designation_clear').click(function(){
        $('#designation_id').val(0);
        $('#designation_name_en').val('');
        $('#designation_name_mar').val('');

     })

});
function geteditdata(id) {
    var designationnameen = $('#designation_name_en_' + id).text();
    var designationnamemar = $('#designation_name_mar_' + id).text();
    $('#designation_id').val(id);
    $('#designation_name_en').val(designationnameen);
    $('#designation_name_mar').val(designationnamemar);


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
                route: 'designation.destroy/',
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
