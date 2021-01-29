$(document).on('click', function(){

    $('.bank_vali').validate({

        rules:{
        bank_name_en:"required",
        bank_name_mar:"required",

},
        messages: {
         bank_name_en:"Please Enter The bank Name",
         bank_name_mar:"Please Enter The bank Marathi",


        },

        submitHandler: function(form) {
            form.submit();

          }

     });
     $('.bank_clear').click(function(){
        $('#bank_id').val(0);
        $('#bank_name_en').val('');
        $('#bank_name_mar').val('');

     })

});
function geteditdata(id) {
    var banknameen = $('#bank_name_en_' + id).text();
    var banknamemar = $('#bank_name_mar_' + id).text();
    $('#bank_id').val(id);
    $('#bank_name_en').val(banknameen);
    $('#bank_name_mar').val(banknamemar);


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

            $.ajaxSetup({
                headers:
                    {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });
            $.ajax({
              url: "bank/destroy",
              type: 'POST',
              data: {id:id, "_method": 'DELETE'},
              dataType: 'JSON',
              success: function (data) {
              swal("Success", "Role deleted successfully :)", "success");
              location.reload();
            }});
        } else {
                e.dismiss;
        }
        }, function(dismiss) {
            return false;
    });
}
function deleteid(id){

}
