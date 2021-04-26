var bill_id;
$(document).ready(function(){
  $('#report_one').click(function(){
    bill_id = $('#bill_no').val();
    getReport(bill_id,1);
  });
  $('#report_two').click(function(){
    bill_id = $('#bill_no').val();
    getReport(bill_id,2);
  });
  $('#report_three').click(function(){
    bill_id = $('#bill_no').val();
    getReport(bill_id,3);
  });
  $('#report_four').click(function(){
    bill_id = $('#bill_no').val();
    getReport(bill_id,4);
  });
  $('#report_five').click(function(){
    bill_id = $('#bill_no').val();
    getReport(bill_id,5);
  });
  $('#print_report').click(function(){
    var $iframe = $('#iframe');
    $iframe.print();
  });
});
function getReport(bill_id,reportNo){
  if(bill_id == null){
    swal('warning','Please Select Bill Number');
    return false;
  }
  $.ajax({
    type: 'GET',
    url: "billreports/edit",
    data: { bill_id:bill_id,reportNo:reportNo },
    success: function(results) {
      var $iframe = $('#iframe');
      $iframe.ready(function() {
          $iframe.contents().find("body").empty();
          $iframe.contents().find("body").append(results.html);
      });
      // $('.report_div').empty();
      // $('.report_div').append(results.html);
    }
  });
}
