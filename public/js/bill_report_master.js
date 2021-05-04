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
  var doc = new jsPDF();
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
      $("#iframe").get(0).contentWindow.print();

      // printDiv(results.html,'ReportTitle');
          // var body = results.html;
          // var newWin = document.getElementById('iframe').contentWindow;
          // newWin.document.write(body);
          // newWin.document.close(); //important!
          // newWin.focus(); //IE fix
          // newWin.print();

      // $('.report_div').empty();
      // $('.report_div').append(results.html);
    }
  });
}
function printDivOne(){
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
function saveDiv(divId, title) {
  doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
  doc.save('div.pdf');
}
function printDiv(htmlContent,title) {
  console.log(htmlContent);
  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
  // mywindow.document.write(`<html><head><title>${title}</title>`);
  // mywindow.document.write('</head><body >');
  mywindow.document.write(''+htmlContent+'');
  // mywindow.document.write('</body></html>');
  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/
  mywindow.print();
  mywindow.close();
  return true;
}
