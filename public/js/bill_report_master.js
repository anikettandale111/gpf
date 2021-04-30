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
});
var $iframe = $('#iframe');
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
      $iframe.ready(function() {
          $iframe.contents().find("body").empty();
          $iframe.contents().find("body").append(results.html);
      });
          var body = results.html;
          var newWin = document.getElementById('iframe').contentWindow;
          newWin.document.write(body);
          newWin.document.close(); //important!
          newWin.focus(); //IE fix
          newWin.print();

      // $('.report_div').empty();
      // $('.report_div').append(results.html);
    }
  });
}
function printDiv(){
  // setTimeout(() => {
  //   window.frames["iframe"].focus();
  //   window.frames["iframe"].print();
  // }, 500);
  window.onload = function() {
      var body = 'dddddd';
      var newWin = document.getElementById('printf').contentWindow;
      newWin.document.write(body);
      newWin.document.close(); //important!
      newWin.focus(); //IE fix
      newWin.print();
  }
}
