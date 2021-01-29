$(document).on('click', function(){

    $('.taluka_vali').validate({

        rules:{
         taluka_name_en:"required",
         taluka_name_mar:"required",
         district_id:"required",
},
        messages: {
         taluka_name_en:"Please Enter The taluka Name",
         taluka_name_mar:"Please Enter The taluka Marathi",
         district_id:"Please Enter The taluka Name",

        },

        submitHandler: function(form) {
            form.submit();

          }

     });
     $('.taluka_clear').click(function(){
        $('#taluka_id').val(0);
        $('#taluka_name_en').val('');
        $('#taluka_name_mar').val('');
        $('#district_id').val('');
     })

});
function geteditdata(tid,did) {
    var talukanameen = $('#taluka_name_en_' + tid).text();
    var talukanamemar = $('#taluka_name_mar_' + tid).text();
    $('#taluka_id').val(tid);
    $('#taluka_name_en').val(talukanameen);
    $('#taluka_name_mar').val(talukanamemar);
    $('#district_id').val(did);

}
function deleteConfirmation(id) {
    var id = $('.icon-trash').attr("data-id");
    $.post("taluka/destroy",{"_token": $('meta[name="csrf-token"]').attr('content'),"_method":"DELETE",'cr_id':id}, function( data ) {
        location.reload();
    });
    // $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: 'taluka/destroy',
    //         type: 'DELETE',
    //         data: {id:id},
    //         success: function(results) {

    //             $('#'+id).remove();
    //         }
    //     });

        return false;
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
                url: 'taluka/destroy/',
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
