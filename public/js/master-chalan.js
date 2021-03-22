var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
var today = year + "-" + month + "-" + day;

$(document).ready(function(){
  // var fullDate = new Date();
  // var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
  // var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
  // $("#chalan_date").attr('min', currentDate);
  // $("#chalan_date").attr('max', currentDate);

  var dtToday = new Date();

   var month = dtToday.getMonth() + 1;
   var day = dtToday.getDate();
   var year = dtToday.getFullYear();
   if(month < 10)
       month = '0' + month.toString();
   if(day < 10)
       day = '0' + day.toString();
       var from_year = $('#sess_from_year').val();
       var to_year = $('#sess_to_year').val();
       var minDate = from_year+'-04-01';
       var maxDate = to_year + '-' + month + '-' + day;
     $('#chalan_date').attr('min', minDate);
     $('#chalan_date').attr('max', maxDate);

})
function deleteConfirmation(id) {
  swal({
    title: "Delete?",
    text: "Please and then confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
  }).then(function (e) {
    if (e.value === true) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type: 'POST',
        url: "deposit_delete/" + id,
        data: {_token: CSRF_TOKEN},
        dataType: 'JSON',
        success: function (results) {
          $('#'+results.id).remove();
        }
      });
    } else {
      e.dismiss;
    }
  }, function (dismiss) {
    return false;
  })
}
$(document).ready(function() {
  var table = $('#chalanTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "chalan",
      columns: [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex'
      },
      {
        data: 'month_name_mar',
        name: 'Month Name'
      },
      {
        data: 'chalan_id',
        name: 'Chalan Number'
      },
      {
        data: 'crateddate',
        name: 'Created Date'
      },
      {
        data: 'taluka_name',
        name: 'Taluka Name'
      },
      {
        data: 'classification_name_mar',
        name: 'Check Number'
      },
      {
        data: 'amount',
        name: 'Amount'
      },
      // {
      //   data: 'total_waste',
      //   name: 'Total Waste'
      // },
      {
        data: 'remark',
        name: 'Remark'
      },
      // {
      //   data: 'action',
      //   name: 'Action'
      // }
    ]
  });
  $('.validatedForm').validate({
    rules : {
      year:"required",
      taluka:"required",
      department:"required",
      classification:"required",
      designation:"required",
      amount:"required",
      app_no:{
        required:true,
      },
      shera:"required",
      total_waste:"required",
    },
    messages: {
      year:"Plese Select Year",
      taluka: " Please Select Taluka",
      department: " Please Select Department",
      classification:" Please Enter The classificationn",
      designation: " Please Select designation",
      amount:"Please Enter The Amount",
      app_no:{
        required:"Enter The number",
      },
      shera:"Please Enter The Shera",
      total_waste:"Please Enter The Total Waste",
    },
    submitHandler: function(form) {
        form.submit();
    }
  });
});
function dateConversion(datetime){
  return new Date(datetime);
}
