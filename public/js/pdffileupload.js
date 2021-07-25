var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var returnrows;
var year = $('.year').val();
var chalan_month = $('#chalan_month').val();
var chalan_number = $('#chalan_number').val();
var chalan_taluka = $('#taluka_id').val();
var fileDataTable;
$(document).ready(function(){
  $('.file-select').css('display','none');
  $('.progress').css('display','none');
  $('.loader').css('display','none');

  $('#test_pdf').change(function(){
    // var ext = $("#test_pdf").val().split('.').pop();
    var fileExtension = ['pdf'];
        if ($.inArray($("#test_pdf").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            swal("warning","Only formats are allowed : "+fileExtension.join(', '));
            $("#test_pdf").val('');
            return false;
    }
  });
  $('#final_approved').click(function(){
    swal({
      title: "Confirm ?",
      text: "Once You Confirmed unable to edit data!",
      type: "warning",
      showCancelButton: !0,
      confirmButtonText: "Yes, Confirm it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: !0
    }).then(function (e) {
      if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': CSRF_TOKEN}
        });
        $.ajax({
          type: 'POST',
          url: "confirmpdfdata",
          data: $('.dummy_entry_form').serialize(),
          success: function (results) {
            swal(results.status,results.message);
          // location.reload();
          }
        });
      } else {
        e.dismiss;
      }
    }, function (dismiss) {
      return false;
    })
  });
  $('.getchalan').change(function(){
    var year = $('#year_id').val();
    var chalan_month = $('#month_id').val();
    var chalan_serial_no = $('#chalan_serial_no').val();
    var chalan_taluka = $('#taluka_id').val();
    if(year == null)  {
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
      test_pdf:{
        required: true,
      },
    },
    messages:{
      year_id: "Please Select Year",
      month_id: "Please Select Month",
      chalan_number: "Please Select Chalan Number",
      taluka_id: "Please Select Taluka",
      test_pdf: "Please Select Excel FIle",
    },
    submitHandler: function()
    {
      importFileSubmit();
    }
  });
});
fileDataTable = $('#pdf_file_upload_list').DataTable({
  footerCallback: function ( row, data, start, end, display ) {
    var api = this.api(), data;
    // Remove the formatting to get integer data for summation
    var intVal = function ( i ) {
      return typeof i === 'string' ?
      i.replace(/[\$,]/g, '')*1 :
      typeof i === 'number' ?
      i : 0;
    };
    // Total over all pages
    total = api.column( 9 ).data().reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );
    // Total over this page
    pageTotal = api.column( 9, { page: 'current'} ).data().reduce( function (a, b) {
              return intVal(a) + intVal(b);
            }, 0 );
    // Update footer
    $('#rowtotal').text(pageTotal);
    $( api.column( 9 ).footer() ).html(
        'Rs.'+pageTotal +' ( Rs.'+ total +' total)'
      );
    },
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
      data: 'empTotal',
      name: 'Total'
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
        $('#pdf_file_upload_list').DataTable().ajax.reload(null, false);
        $('.file-select').css('display','block');
        $('#chalan_id').val(res.amt.chalan_id);
        $('#chalan_number').val(res.amt.challan_number);
        $('#chalan_amount').val(res.amt.amount);
        $('#chalan_khatavani').val(res.amt.diff_amount);
        $('#subscribed_rakkam').val(res.distributed_rakkam);
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
$('.showdummy').addClass('hide');
  var resp_status = '';
    $('.progress').css('display','none');
    $('.loader').css('display','block');
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
    var formData = new FormData();
    formData.append('usersFile', $('#test_pdf')[0].files[0]);
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
      url: '../pdffileupload',
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
        if(data.insertdata){
          var insertdata = data.insertdata;
          var htmldata = '';
          htmldata += '<input type="hidden" name="year_id" id="year_id" value="'+$('#year_id').val()+'">';
          htmldata += '<input type="hidden" name="month_id" id="month_id" value="'+$('#month_id').val()+'">';
          htmldata += '<input type="hidden" name="chalan_id" id="chalan_id" value="'+$('#chalan_id').val()+'">';
          htmldata += '<input type="hidden" name="chalan_serial_no" id="chalan_serial_no" value="'+$('#chalan_serial_no').val()+'">';
          htmldata += '<input type="hidden" name="taluka_id" id="taluka_id" value="'+$('#taluka_id').val()+'">';
          htmldata += '<input type="hidden" name="classification_id" id="classification_id" value="'+$('#classification_id').val()+'">';
          $('#upload_dummy_entry').empty();
          for(var i=0,j=1; i < insertdata.length;i++,j++){
            htmldata += '<tr class="file_dummy_row_'+j+'"><td>'+ j +'</td>';
            htmldata += '<td><input type="text" class="form-control" readonly="readonly" name="dummy_gpf_numbers[]" value="'+insertdata[i].gpf_number+'"></td>';
            htmldata += '<td><input type="text" class="form-control" readonly="readonly" name="dummy_employee_name[]" value="'+insertdata[i].employee_name+'"></td>';
            htmldata += '<td><input type="text" class="form-control" name="dummy_monthly_contrubition[]" value="'+insertdata[i].monthly_contrubition+'"></td>';
            htmldata += '<td><input type="text" class="form-control" name="dummy_monthly_other[]" value="'+insertdata[i].monthly_other+'"></td>';
            htmldata += '<td><input type="text" class="form-control" name="dummy_loan_installment[]" value="'+insertdata[i].loan_installment+'"></td>';
            htmldata += '<td><input type="text" class="form-control" name="dummy_monthly_received[]" value="'+insertdata[i].monthly_received+'"></td>';
            htmldata += '<input type="hidden" class="form-control" name="dummy_file_upload[]" value="'+insertdata[i].file_name+'"></td>';
            htmldata += '<td><button class="btn btn-danger" onclick="deleteDummyRow('+j+')">Remove</td></tr>';
            returnrows = j;
          }
          $('#upload_dummy_entry').html(htmldata);
          $('.showdummy').removeClass('hide');
        }
        swal(data.status, data.message);
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
  function addnewrow(){
    read_rows = returnrows;
    returnrows++;
    var htmldata;
    htmldata += '<tr class="file_dummy_row_'+returnrows+'"><td>'+ returnrows +'</td>';
    htmldata += '<td><input type="text" class="form-control" name="dummy_gpf_numbers[]" ></td>';
    htmldata += '<td><input type="text" class="form-control" name="dummy_employee_name[]" ></td>';
    htmldata += '<td><input type="text" class="form-control" name="dummy_monthly_contrubition[]" ></td>';
    htmldata += '<td><input type="text" class="form-control" name="dummy_monthly_other[]" ></td>';
    htmldata += '<td><input type="text" class="form-control" name="dummy_loan_installment[]" ></td>';
    htmldata += '<td><input type="text" class="form-control" name="dummy_monthly_received[]" ></td>';
    htmldata += '<input type="hidden" class="form-control" name="dummy_file_upload[]" ></td>';
    htmldata += '<td><button class="btn btn-danger" onclick="deleteDummyRow('+returnrows+')">Remove</td></tr>';
    $('#upload_dummy_entry tr:last').after(htmldata);
  }
  function deleteDummyRow(rowid){
    $('.file_dummy_row_'+rowid).remove();
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
