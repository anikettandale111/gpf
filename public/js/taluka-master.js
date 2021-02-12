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

$(document).on('click','.trash',function(){
    var id =$(this).attr('data-id');
    var v_token = "{{csrf_token()}}";
    var params = {_method: 'DELETE', _token: v_token};


        $.ajax({
          url: "taluka/destroy" ,
          type: 'DELETE',
          data: params,
          success: function (data) {


        }
    });




});

