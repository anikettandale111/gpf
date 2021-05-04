$(document).on('click', function(){

    $('.year_vali').validate({

        rules:{
            year:"required",
            year_to:"required",
        percent:"required",
        from_month:"required",
        to_month:"required"

},
        messages: {
            year:"Please Select  The Year From ",
            year:"Please Select  The Year To ",
         percent:"Please Enter The Percent",
         from_month:"Please Enter The From Month ",
         to_month:"Please Enter The To Month "


        },

        submitHandler: function(form) {
            form.submit();

          }

     });

     $('.year_clear').click(function(){
        $('#year_id').val(0);
        $('#year').val('');
        $('#year_to').val('');
        $('#percent').val('');
        $('#from_month').val('');
        $('#to_month').val('');

     });


});
function geteditdata(id) {

    var year = $('#year_' + id).text();
    var yearto = $('#year_to_' + id).text();
    var percent = $('#percent_' + id).text();
    var frommonth =$('#from_month_' + id).val();
    var tomonth =$('#to_month_' + id).val();

    $('#year_id').val(id);
    $('#year_to').val(yearto);
    $('#year').val(year);
    $('#percent').val(percent);
    $('#from_month').val(frommonth);
    $('#to_month').val(tomonth);



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
                URL: 'Year.destroy/' + id,
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
