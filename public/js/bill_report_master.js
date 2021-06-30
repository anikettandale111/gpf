var bill_id;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
  $('#get_report').click(function(){
    bill_id = $('#bill_no').val();
    getReport(bill_id);
  });
  var doc = new jsPDF();
  // $('#report_type').change(function(){
  //   if($(this).val() == 1){
  //     $('#export_report').removeClass('hidebtn');
  //   }else{
  //     $('#export_report').addClass('hidebtn');
  //   }
  // });
  $('#export_report').click(function(){
    var reportNo = $('#report_type').val();
    bill_id = $('#bill_no').val();
    if(bill_id == null){
      swal('warning','Please Select Bill Number');
      return false;
    }
    if(reportNo == null){
      swal('warning','Please Select Report Type');
      return false;
    }
    $.ajax({
      type: 'POST',
      url: "downloadreport",
      data: { _token: CSRF_TOKEN,bill_id:bill_id,reportNo:reportNo },
      success: function(results) {
      }
    });
  });
});
var $iframe = $('#iframe');
function getReport(bill_id,reportNo){
  var reportNo = $('#report_type').val();
  if(bill_id == null){
    swal('warning','Please Select Bill Number');
    return false;
  }else if(reportNo == null){
    swal('warning','Please Select Report Type');
    return false;
  }else {
    var siteurl = window.location.origin;
    $('#reportNo').val(reportNo);
    $('.getBillReport').attr('action',siteurl+'/viewreport/'+bill_id+'/'+reportNo);
    $('.getBillReport').submit();
  }
  // $.ajax({
  //   type: 'GET',
  //   url: "billreports/edit",
  //   data: { bill_id:bill_id,reportNo:reportNo },
  //   success: function(results) {
  //     // $iframe.ready(function() {
  //     //     $iframe.contents().find("body").empty();
  //     //     $iframe.contents().find("body").append(results.html);
  //     // });
  //     // $("#iframe").get(0).contentWindow.print();
  //
  //     // printDiv(results.html,'ReportTitle');
  //         // var body = results.html;
  //         // var newWin = document.getElementById('iframe').contentWindow;
  //         // newWin.document.write(body);
  //         // newWin.document.close(); //important!
  //         // newWin.focus(); //IE fix
  //         // newWin.print();
  //
  //     // $('.report_div').empty();
  //     // $('.report_div').append(results.html);
  //   }
  // });
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
