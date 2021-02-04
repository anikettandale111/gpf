$(document).on('click', function(){

    $('.classification_vali').validate({

        rules:{
        classification_name_en:"required",
        classification_name_mar:"required",

},
        messages: {
         classification_name_en:"Please Enter The Classification Name",
         classification_name_mar:"Please Enter The Classification Marathi",


        },

        submitHandler: function(form) {
            form.submit();

          }

     });
     $('.classification_clear').click(function(){
        $('#classification_id').val(0);
        $('#classification_name_en').val('');
        $('#classification_name_mar').val('');

     })

});
function geteditdata(id) {
    var classificationnameen = $('#classification_name_en_' + id).text();
    var classificationnamemar = $('#classification_name_mar_' + id).text();
    $('#classification_id').val(id);
    $('#classification_name_en').val(classificationnameen);
    $('#classification_name_mar').val(classificationnamemar);


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
                route: 'classification.destroy/',
                data: {id:id},
                dataType: 'JSON',
                success: function(results) {

                    $('#'+id).remove();
                }
            });
        } else {
                e.dismiss;
        }
        },
        function(dismiss) {
            return false;
    });
}
function deleteid(id){

}
