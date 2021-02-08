$(document).on('click', function() {

    $('.department_vali').validate({

        rules: {
            department_name_en: "required",
            department_name_mar: "required",
            taluka_id: "required",
        },
        messages: {
            department_name_en: "Please Enter The taluka Name",
            department_name_mar: "Please Enter The taluka Marathi",
            taluka_id: "Please Enter The taluka Marathi",
        },

        submitHandler: function(form) {
            form.submit();

        }
    });
    $('.department_clear').click(function() {
        $('#department_id').val(0);
        $('#department_name_en').val('');
        $('#department_name_mar').val('');
        $('#taluka_id').val('');
    })

});
function geteditdata(id, tid) {
    var departmentnameen = $('#department_name_en_' + id).text();
    var departmentnamemar = $('#department_name_mar_' + id).text();
    $('#department_id').val(id);
    $('#department_name_en').val(departmentnameen);
    $('#department_name_mar').val(departmentnamemar);
    $('#taluka_id').val(tid);
}


