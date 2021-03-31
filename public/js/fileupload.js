var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

var year = $('.year').val();
var chalan_month = $('#chalan_month').val();
var chalan_number = $('#chalan_number').val();
var chalan_taluka = $('#taluka_id').val();
var fileDataTable;
$(document).ready(function(){
  $('.file-select').css('display','none');
  $('.progress').css('display','none');
  $('.loader').css('display','none');
  $('.getchalan').change(function(){
    var year = $('#year_id').val();
    var chalan_month = $('#month_id').val();
    var chalan_serial_no = $('#chalan_serial_no').val();
    var chalan_taluka = $('#taluka_id').val();
    if(year == null){
      return false;
    }
    if(chalan_month == null){
      return false;
    }
    if(chalan_serial_no == null){
      return false;
    }
    if(chalan_taluka == null){
      return false;
    }
    getChalanDetails(year,chalan_month,chalan_serial_no,chalan_taluka);
  });
  $('.form_users_excel_file').validate({ // initialize the plugin
    rules: {
      year_id:{
        required: true,
      },
      month_id:{
        required: true,
      },
      chalan_number:{
        required: true,
      },
      taluka_id:{
        required: true,
      },
      test_excel:{
        required: true,
      },
    },
    messages:{
      year_id: "Please Select Year",
      month_id: "Please Select Month",
      chalan_number: "Please Select Chalan Number",
      taluka_id: "Please Select Taluka",
      test_excel: "Please Select Excel FIle",
    },
    submitHandler: function()
    {
      importFileSubmit();
    }
  });
});
fileDataTable = $('#file_upload_list').DataTable({
  // footerCallback: function ( row, data, start, end, display ) {
  //   var api = this.api(), data;
  //   // Remove the formatting to get integer data for summation
  //   var intVal = function ( i ) {
  //     return typeof i === 'string' ?
  //     i.replace(/[\$,]/g, '')*1 :
  //     typeof i === 'number' ?
  //     i : 0;
  //   };
  //   // Total over all pages
  //   total = api.column( 6 ).data().reduce( function (a, b) {
  //             return intVal(a) + intVal(b);
  //           }, 0 );
  //   // Total over this page
  //   pageTotal = api.column( 6, { page: 'current'} ).data().reduce( function (a, b) {
  //             return intVal(a) + intVal(b);
  //           }, 0 );
  //   // Update footer
  //   $( api.column( 6 ).footer() ).html(
  //       '$'+pageTotal +' ( $'+ total +' total)'
  //     );
  //   },
  processing: true,
  serverSide: true,
  ajax: {
    url: 'chalanSubscriptionDetails',
    type: 'GET',
    data: function ( d ) {
      return $.extend( {}, d, {
          "_token": CSRF_TOKEN,
          'year': $('#year_id').val(),
          'chalan_month': $('#month_id').val(),
          'chalan_number':$('#chalan_serial_no').val(),
          'chalan_taluka':$('#taluka_id').val(),
      } );
    },
  },
  scrollX: true,
  lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
  pageLength:10,
    aoColumns: [{
    data: 'DT_RowIndex',
    name: 'DT_RowIndex',
    sortable:false,
    },
    {
      data: 'emc_year',
      name: 'Year'
    },
    {
      data: 'challan_number',
      name: 'Challan Number'
    },
    {
      data: 'taluka_name',
      name: 'Taluka'
    },
    {
      data: 'gpf_number',
      name: 'GPF Number'
    },
    {
      data: 'employee_name',
      name: 'Employee Name'
    },
    {
      data: 'monthly_contrubition',
      name: 'Monthly Contribution'
    },
    {
      data: 'loan_installment',
      name: 'Loan Installment'
    },
    {
      data: 'monthly_other',
      name: 'Other'
    },
    {
      data: 'action',
      name: 'Action'
    },
    ]
});
function getChalanDetails(year,chalan_month,chalan_serial_no,chalan_taluka){
  $.ajax({
    url: "chalandetails",
    data: {"_token": CSRF_TOKEN,'year': year,'chalan_month': chalan_month,'chalan_number': chalan_serial_no,'chalan_taluka':chalan_taluka},
    type: 'GET',
    success: function(res) {
      if (res.amt != null) {
        $('#file_upload_list').DataTable().ajax.reload(null, false);
        $('.file-select').css('display','block');
        $('#chalan_id').val(res.amt.chalan_id);
        $('#chalan_number').val(res.amt.challan_number);
        $('#chalan_amount').val(res.amt.amount);
        $('#diffrence_amount').val(res.amt.diff_amount);
        $('#classification_id').val(res.amt.classification);
      } else {
        swal("WARNING", "Invalid Chalan Number OR Does't Exits",'warning');
      }
      return false;
    }
  });
}
function importFileSubmit(){
  var resp_status = '';
    $('.progress').css('display','none');
    $('.loader').css('display','block');
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
    var formData = new FormData();
    formData.append('usersFile', $('#test_excel')[0].files[0]);
    formData.append('year_id', $('#year_id').val());
    formData.append('month_id', $('#month_id').val());
    formData.append('chalan_id', $('#chalan_id').val());
    formData.append('chalan_number', $('#chalan_serial_no').val());
    formData.append('taluka_id', $('#taluka_id').val());
    formData.append('classification_id', $('#classification_id').val());
    $.ajaxSetup({
      headers:
      {'X-CSRF-TOKEN': CSRF_TOKEN}
    });
    $.ajax({
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          if (evt.lengthComputable) {
            var percentComplete = Math.round((evt.loaded / evt.total) * 100);
            $(".progress-bar").width(percentComplete + '%');
            $(".progress-bar").html(percentComplete+'%');
          }
        }, false);
        return xhr;
      },
      url: '../fileupload',
      type : 'POST',
      data : formData,
      processData: false,
      contentType: false,
      beforeSend: function(){
        $(".progress-bar").width('0%');
      },
      error:function(){
      },
      success : function(data) {
        swal(data.status, data.message   +' - '+data.data);
        $('.progress').css('display','none');
        $('.loader').css('display','none');
        var year = $('#year_id').val();
        var chalan_month = $('#month_id').val();
        var chalan_serial_no = $('#chalan_serial_no').val();
        var chalan_taluka = $('#taluka_id').val();
        var resp_status = data.status;
        if(data.status == 'success'){
        }else if(data.status == 'duplicate'){
          var notInsertCount = data.not_inserted;
          var notInsertCount = data.not_inserted_ides;
          var user_duplicate_count = data.user_duplicate;
          var user_duplicate = data.user_duplicate_gpf;
        }
        fileDataTable.ajax.reload();
      }
    });
  }
  function getChalanSubscriptionDetails(year,chalan_month,chalan_number,chalan_taluka){
    $.ajax({
      url: "chalandetails",
      data: {"_token": CSRF_TOKEN,'year': year,'chalan_month': chalan_month,'chalan_number': chalan_number,'chalan_taluka':chalan_taluka},
      type: 'GET',
      success: function(res) {
        if (res.amt != null) {
          if ((res.chalan).length) {
            var i = 1;
            console.log(i);
            $(res.chalan).each(function(key, val) {
              console.log(val);
              str += '<tr><td>' + i + '</td><td>' + val.emc_year + '</td><td>' + (val.month_name + val.challan_number) + '</td><td>' + val.taluka_name + '</td><td>' + val.gpf_number + '</td><td>' + val.employee_name + '</td><td>' + val.monthly_contrubition + '</td><td>' + val.loan_amonut + '</td><td>' + val.pending_amt + '</td><td>' + val.monthly_received + '</td><td>' + val.final_amt_diff + '</td><td>' + val.name + '</td></tr>';
              i++;
            });
          }
          $('.appaend_table').html(str);
        }
      }
    });
  }
