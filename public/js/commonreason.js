var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var table = '';
$(document).ready(function(){
  $('.formcommonreason').validate({
    rules:{
      reason_name_en:"required",
      reason_name_mar:"required",
      reason_description_en:"required",
      reason_description_mar:"required",
      reason_withdrawn_percent:"required",
      reason_status:"required",
    },
    messages: {
      reason_name_en:"Please Enter Reason In English",
      reason_name_mar:"Please Enter Reason In Marathi",
      reason_description_en:"Please Enter Reason Description In English",
      reason_description_mar:"Please Enter Reason Description In Marathi",
      reason_withdrawn_percent:"Please Enter Amount Withdrawn Percent",
      reason_status:"Please Select Status",
    },
    submitHandler: function(form) {
      saveReasons();
    }
  });
});
table = $('#commonReason').DataTable({
  // processing: true,
  serverSide: true,
  ajax: "commonreasons",
  columns: [{
    data: 'DT_RowIndex',
    name: 'DT_RowIndex'
  },
  {
    data: 'reason_name_mar',
    name: 'Reason Name'
  },
  {
    data: 'reason_description_mar',
    name: 'Reason Description'
  },
  {
    data: 'withdrawn_percent',
    name: 'Withdrawn Percentage'
  },
  {
    data: 'reason_status',
    name: 'Status'
  },
  {
    data: 'action',
    name: 'Action'
  }
]
});
function saveReasons(){
  if($('#reason_name_en').val()){
    if($('#cr_id').val() == 0){
      $.post("commonreasons",{"_token": CSRF_TOKEN,
      reason_name_mar:$('#reason_name_mar').val(),
      reason_name_en:$('#reason_name_en').val(),
      reason_description_en:$('#reason_description_en').val(),
      reason_description_mar:$('#reason_description_mar').val(),
      reason_withdrawn_percent:$('#reason_withdrawn_percent').val()
    }, function( data ) {
      swal(data.status,data.message);
      clearReasons();
      table.ajax.reload();
    });
  }else {
    $.post("commonreasons/PUT",{"_token": CSRF_TOKEN,
    "_method":"PUT",
    cr_id:$('#cr_id').val(),
    reason_name_mar:$('#reason_name_mar').val(),
    reason_name_en:$('#reason_name_en').val(),
    reason_description_en:$('#reason_description_en').val(),
    reason_description_mar:$('#reason_description_mar').val(),
    reason_withdrawn_percent:$('#reason_withdrawn_percent').val()
  }, function( data ) {
    swal(data.status,data.message);
    clearReasons();
    table.ajax.reload();
  });
}
}
}
function clearReasons(){
  $('#cr_id').val(0);
  $('#reason_name_mar').val('');
  $('#reason_name_en').val('');
  $('#reason_description_en').val('');
  $('#reason_description_mar').val('');
  $('#reason_withdrawn_percent').val('');
}
function editReasons(rowid){
  $.ajax({
    url: "commonreasons/edit",
    type: 'GET',
    data: {id:rowid},
    success: function(data){
      $('#cr_id').val(data[0].cr_id);
      $('#reason_name_en').val(data[0].reason_name_en);
      $('#reason_name_mar').val(data[0].reason_name_mar);
      $('#reason_description_en').val(data[0].reason_description_en);
      $('#reason_description_mar').val(data[0].reason_description_mar);
      $('#reason_withdrawn_percent').val(data[0].withdrawn_percent);
    }
  });
}
function deleteReasons(rowid){
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
      var id = rowid;
      $.ajaxSetup({
        headers:
        {'X-CSRF-TOKEN': CSRF_TOKEN}
      });
      $.ajax({
        url: "commonreasons/destroy",
        type: 'POST',
        data: {cr_id:id, "_method": 'DELETE'},
        dataType: 'JSON',
        success: function (data) {
          swal("Success", "Common Reason deleted successfully", "success");
          clearReasons();
          table.ajax.reload();
        }
      });
    } else {
      e.dismiss;
    }
  }, function(dismiss) {
    return false;
  });
}
