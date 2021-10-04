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
function deleteChalan(id) {
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
        url: "chalan/" + id,
        data: {_token: CSRF_TOKEN,"_method":'DELETE'},
        dataType: 'JSON',
        success: function (results) {
          swal(results.status,results.message);
          table.ajax.reload();
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
        resetForm();
    }
  });

  $('#sendapproval').validate({
    rules : {
      challandetails:"required",
      remark:"required",
      id:"required"
      
    },
    messages: {
      challandetails:"Please enter Challan details",
      remark: "Please enter Remark",
     
    },
    submitHandler: function(form) {
        form.submit();
        resetForm();
    }
  });
});
function dateConversion(datetime){
  return new Date(datetime);
}
function editChalan(chid){
  $.ajax({
    type: 'GET',
    url: "chalan/"+chid,
    data: { chid:chid },
    success: function(results) {
      $('#chalan_sr_id').val(results.id);
      $('#chalan_year').val(results.year);
      $('#chalan_date').val(results.chalan_date);
      $('#chalan_serial_no').val(results.chalan_serial_no);
      $('#chalan_month').val(results.chalan_month_id);
      $('#classification_type').val(results.classification);
      $('#chalan_taluka').val(results.taluka);
      $('#chalan_amount').val(results.amount);
      $('#chalan_remark').val(results.remark);
      $('#chalan_year').focus();
    }
  });
}
function resetForm(){
  $('#chalan_sr_id').val(0);
  $('#chalan_year').val('');
  $('#chalan_date').val('');
  $('#chalan_serial_no').val('');
  $('#chalan_month').val('');
  $('#classification_type').val('');
  $('#chalan_taluka').val('');
  $('#chalan_amount').val('');
  $('#chalan_remark').val('');
}
/*function sendapprovalChalan(id)
{*/
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
    var challandetails = button.data('chalan') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(challandetails)
    modal.find('.modal-body #challandetails').val(challandetails)
    
    modal.find('.modal-footer #id').val(recipient)
  })
//}
var table = $('#chalanTable').DataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    buttons: [
      { extend: 'excel', className: 'btn btn-secondary m-2' },
    ],
    pageLength: '20',
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
      data: 'chalan_serial_no',
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
    {
      data: 'distrubuted_amt',
      name: 'Total Waste'
     },
     {
      data: 'diff_amount',
      name: 'Total Remaining'
     },
    {
      data: 'remark',
      name: 'Remark'
    },
    {
      data: 'approved',
      name: 'Status'
    },
    {
      data: 'action',
      name: 'Action'
    }
  ]
});
