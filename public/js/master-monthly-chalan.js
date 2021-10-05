var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var emc_row_id;
var prv_contribution;
var prv_installment;
var prv_other;
var prv_total_contri;

$(document).ready(function(){
  $('.monthly_subscription_form').validate({
    rules : {
      chalan_no:"required",
      app_no:"required",
      taluka:"required",
      classification:"required",
      chalan_amount:"required",
      primary_number:"required",
      diffrence_amount:"required",
      account_id:"required",
      user_name:"required",
      user_id:"required",
      user_designation:"required",
      user_designation_id:"required",
      user_department:"required",
      user_department_id:"required",
      deposit_amt:"required",
      refund:"required",
      pending_amt:"required",
      total_monthly_pay:"required",
    },
    messages : {
      chalan_no:"Please select correct value",
      app_no:"Please select correct value",
      taluka:"Please select correct value",
      classification:"Please select correct value",
      chalan_amount:"Please select correct value",
      primary_number:"Please select correct value",
      diffrence_amount:"Please select correct value",
      account_id:"Please select correct value",
      user_name:"Please select correct value",
      user_id:"Please select correct value",
      user_designation:"Please select correct value",
      user_designation_id:"Please select correct value",
      user_department:"Please select correct value",
      user_department_id:"Please select correct value",
      deposit_amt:"Please select correct value",
      refund:"Please select correct value",
      pending_amt:"Please select correct value",
      total_monthly_pay:"Please select correct value",
    },
    submitHandler: function(form) {
      subscriptionSubmit();
    }
  });
  $('#datatable_one').DataTable({
    dom: 'Bfrtip',
    buttons: [
      { extend: 'excel', className: 'btn btn-secondary m-2' },
    ],
  });
})
$('.getchalan').change( function(e) {
  year = $('.year').val();
  chalan_month = $('#chalan_month').val();
  chalan_number = $('#chalan_number').val();
  chalan_taluka = $('#taluka_id').val();
  // $("#wait").css("display", "block");
  if(year == ''){
    return false;
  }
  if(chalan_month == ''){
    return false;
  }
  if(chalan_number == ''){
    return false;
  }
  if(chalan_taluka == ''){
    return false;
  }
  getChalanDetails(year,chalan_month,chalan_number,chalan_taluka);
});
$("#gpf_account_id").keypress(function (e) {
  if($(this).val().length == 5) {
    $(this).val($(this).val().slice(0, 5));
    return false;
  }
  var lg = parseInt($(this).val().length);
  if(lg == 4){
    setTimeout(function(){
      getdetails();
    },100);
  }
});
$('.clearupdate').click(function(){
  $('.saveDiv').addClass('hidebtn');
  $('.updateDiv').removeClass('hidebtn');
  var emc_row_id;
  var prv_contribution;
  var prv_installment;
  var prv_other;
  var prv_total_contri;
});
$('.updateSave').click(function(){
  if(emc_row_id == null){
    swal('Error','Please provide valid value.');
    return false;
  }
  if(prv_contribution == null){
    swal('Error','Please provide valid value.');
    return false;
  }
  if(prv_installment == null){
    swal('Error','Please provide valid value.');
    return false;
  }
  if(prv_other == null){
    swal('Error','Please provide valid value.');
    return false;
  }
  if(prv_total_contri == null){
    swal('Error','Please provide valid value.');
    return false;
  }
  if($('#deposit_amt').val() == null){
    swal('Error','Please provide valid Contribution.');
    $('#deposit_amt').focus();
    return false;
  }
  if($('#refund').val() == null){
    swal('Error','Please provide valid Installment.');
    $('#refund').focus();
    return false;
  }
  if($('#pending_amt').val() == null){
    swal('Error','Please provide Pending Amount.');
    $('#pending_amt').focus();
    return false;
  }
  if($('#total_monthly_pay').val() == null){
    swal('Error','Please provide Total Amount.');
    $('#total_monthly_pay').focus();
    return false;
  }
  var new_contribution = $('#deposit_amt').val();
  var new_installment = $('#refund').val();
  var new_other = $('#pending_amt').val();
  var new_total_contri = $('#total_monthly_pay').val();
  var formData = { emc_row_id:emc_row_id, prv_contribution:prv_contribution,prv_installment:prv_installment, prv_other:prv_other,
    prv_total_contri:prv_total_contri, new_contribution:new_contribution,new_installment:new_installment, new_other:new_other,
    new_total_contri:new_total_contri };
  $.ajax({
    type: 'POST',
    url: "updateMonthlySubscription",
    data: formData,
    success: function (results) {

    }
  })
});
function subscriptionSubmit(){
  $('.submit').hide();
  $.ajax({
    type: 'POST',
    url: "subscription",
    data: $('.monthly_subscription_form').serialize(),
    success: function (results) {
      swal(results.status, results.message);
      year = $('.year').val();
      chalan_month = $('#chalan_month').val();
      chalan_number = $('#chalan_number').val();
      chalan_taluka = $('#taluka_id').val();
      $('.submit').show();
      $('.clearaftersubmit').val(0);
      getChalanDetails(year,chalan_month,chalan_number,chalan_taluka);
    }
  })
}

$('.calculation').keyup( function(e) {
  // setTimeout(function(){
    $('#diffrence_amount').val(parseInt($('#diffrence_amount_duplicate').val()));
    chalan_amount = parseInt($('.chalan_amount').val());
    deposit = parseInt($('.deposit').val());
    refund = parseInt($('.refund').val());
    pending_amt = parseInt($('.pending_amt').val());
    new_diffrence_amount = parseInt($('#diffrence_amount').val());
    if(deposit >= 0 && refund >= 0 && pending_amt >= 0){
      if(deposit > chalan_amount){
        swal("WARNING", "Deposit Amount not greater than chalan amount");
        return false;
      }
      if(refund > chalan_amount){
        swal("WARNING", "Refund Amount not greater than chalan amount");
        return false;
      }
      if(pending_amt > chalan_amount){
        swal("WARNING", "Pending Amount not greater than chalan amount");
        return false;
      }
      var total = deposit + refund + pending_amt;
      if(total > new_diffrence_amount){
        swal("WARNING", "Total Amount is not greater than chalan amount");
        return false;
      }
      $('#total_monthly_pay').val(total);
      var diff_amt = new_diffrence_amount - total;
      if(parseInt(diff_amt) <= 0){
        $('#diffrence_amount').val(0);
      }else{
        $('#diffrence_amount').val(parseInt(diff_amt));
      }
    }
  // },100);
});

function getdetails(){
  var year = $('.year').val();
  var chalan_month = $('#chalan_month').val();
  var chalan_number = $('#chalan_number').val();
  var chalan_taluka = $('#taluka_id').val();
  var classification = $('#classification_id').val();
  $('#total_monthly_pay').val(0);
  $.ajax({
    type: 'GET',
    url: "getuserdetailsbygpfno",
    data: {_token: CSRF_TOKEN,input_id:$("#gpf_account_id").val(),year:year,chalan_month:chalan_month,chalan_number:chalan_number,chalan_taluka:chalan_taluka,classification:classification},
    success: function (results) {
      console.log(results);
      if(results.length){
        $('#user_name').val(results[0].employee_name);
        $('#user_id').val(results[0].id);
        $('#user_bank_id').val(results[0].bank_id);
        $('#user_designation').val(results[0].designation_name);
        $('#user_designation_id').val(results[0].designation_id);
        $('#user_department').val(results[0].department_name);
        $('#user_department_id').val(results[0].department_id);
        $('#user_empid').val(results[0].employee_id);
        $('#user_bank').val(results[0].bank_name);
        $('#user_bank_account_no').val(results[0].bank_account_no);
        $('#user_bank_location').val(results[0].branch_location);
        $('#user_bank_ifsc').val(results[0].ifsc_code);
        $('#user_total_amount').val('1000000');
        $('#user_joining_date').val(results[0].joining_date);
        $('#user_retirment_date').val(results[0].retirement_date);
        $('#user_total_work').val(diff_year_month_day(results[0].retirement_date,results[0].joining_date));
      } else {
        swal("WARNING", "Invalid GPF Number OR Does't Exits");
        $("#gpf_no").focus();
      }
    }
  });
}
function diff_year_month_day(dt1, dt2)
{
  let current_datetime =  new Date(dt1);
  let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate();
  console.log(formatted_date);
  if(dt1 !== null && dt1 !== null){
    var From_date = new Date(dt1);
    var To_date = new Date(dt2);
    var diff_date =  From_date - To_date ;
    var years = Math.floor(diff_date/31536000000);
    var months = Math.floor((diff_date % 31536000000)/2628000000);
    var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
    return years+" year(s) "+months+" month(s) "+days+" and day(s)";
  }
}
function getChalanDetails(year,chalan_month,chalan_number,chalan_taluka){
  $.ajax({
    url: "chalandetails",
    data: {"_token": CSRF_TOKEN,'year': year,'chalan_month': chalan_month,'chalan_number': chalan_number,'chalan_taluka':chalan_taluka},
    type: 'GET',
    success: function(res) {
      if (res.amt != null) {
        if(parseInt(res.amt.diff_amount) <= 0){
          $('.submit').hide();
          swal("WARNING", "Chalan Amount allready distributed",'warning');
          // return false;
        }else{
          $('.submit').show();
        }
        $('#chalan_id').val(res.amt.chalan_id);
        $('.chalan_amount').val(res.amt.amount);
        $('.primary_number').val(res.amt.primary_number);
        $('#diffrence_amount').val(res.amt.diff_amount);
        $('#diffrence_amount_duplicate').val(res.amt.diff_amount);
        $('#taluka_id').val(res.amt.taluka);
        $('#classification_id').val(res.amt.classification);
        $('.appaend_table').empty();
        str = '';
        var str1 ='';
          var i = 1;
          var subscribedRakkam = 0;
          var monthlyContrubition = 0;
          var monthlyOther = 0;
          var totalInstallment = 0;
        if ((res.chalan).length) {
          $(res.chalan).each(function(key, val) {
            var actionHtml;
            if(parseInt(val.is_active) == 0){
              // actionHtml = '<button onclick="editChalanSubscription('+val.emc_id+')" data-original-title="Edit" class="btn btn-primary btn-sm">Edit</button>';
              actionHtml = '<button onclick="deleteChalanSubscription('+val.emc_id+')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</button>';
            }
            subscribedRakkam = parseInt(subscribedRakkam) +  parseInt(val.monthly_received);
            monthlyContrubition = parseInt(monthlyContrubition) + parseInt(val.monthly_contrubition);
            totalInstallment = parseInt(totalInstallment) + parseInt(val.loan_installment);
            monthlyOther = parseInt(monthlyOther) + parseInt(val.monthly_other);
            str += '<tr><td>' + i + '</td><td>' + val.emc_year + '</td><td>' + (val.month_name + val.challan_number) + '</td><td>' + val.taluka_name + '</td><td>' + val.gpf_number + '</td><td>' + val.employee_name + '</td><td>' + val.monthly_contrubition + '</td><td>' + val.loan_installment + '</td><td>' + val.monthly_other + '</td><td>' + (parseInt(val.monthly_contrubition) + parseInt(val.loan_installment) + parseInt(val.monthly_other)) + '</td><td>' + val.name + '</td><td>'+actionHtml+'</td></tr>';
            i++;
          });
          str1 = '<tr><td></td><td></td><td></td><td></td><td></td><td><strong>ऐकूण जमा</strong></td><td><strong>' + monthlyContrubition + '</strong></td><td><strong>' + totalInstallment + '</strong></td><td><strong>' + monthlyOther + '</strong></td><td><strong>' + subscribedRakkam + '</strong></td><td></td><td></td></tr>';

         
        }
        $('#subscribed_rakkam').val(subscribedRakkam);
        //$("#datatable_one tbody").remove();
        $('#datatable_one').DataTable().destroy();
        $('#datatable_one').find('tbody').html(str);
        $('#datatable_one').find('tfoot').html(str1);
        $('#datatable_one').DataTable().draw();
        //$("#datatable_one tbody").html(str);
        //refreshTable();
        
      } else {
        $('#chalan_no').val('');
        $('.app_no').val('');
        $('.chalan_amount').val(0);
        $('#taluka_id').val('');
        $('#diffrence_amount').val(0);
        $('#subscribed_rakkam').val(0);
        $('#diffrence_amount_duplicate').val(0);
        swal("WARNING", "Invalid Chalan Number OR Does't Exits",'warning');
        $('.submit').hide();
        $('.appaend_table').empty();
      }
      return false;
    }
  });
}
function refreshTable() {
  
      dt = $('#datatable_one').dataTable();
      dt.fnDraw();
 
}
function editChalanSubscription(subid){
  $('.saveDiv').addClass('hidebtn');
  $('.updateDiv').removeClass('hidebtn');
  $.ajax({
    type: 'GET',
    url: "getChalanSubscriptionByID",
    data: {_token: CSRF_TOKEN,subid:subid},
    success: function (results) {
      $('#gpf_account_id').val(results.gpf_number);
      $('#gpf_account_id').attr('readonly');
      $('#user_name').val(results.employee_name);
      $('#user_designation').val(results.designation_name);
      $('#user_department').val(results.department_name);
      $('#deposit_amt').val(results.monthly_contrubition);
      $('#refund').val(results.loan_installment);
      $('#pending_amt').val(results.monthly_other);
      $('#total_monthly_pay').val(results.monthly_received);
      emc_row_id = results.emc_id;
      prv_contribution = results.monthly_contrubition;
      prv_installment = results.loan_installment;
      prv_other = results.monthly_other;
      prv_total_contri = results.monthly_received;
    }
  });
}
function deleteChalanSubscription(subid){
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
      $.ajax({
        type: 'GET',
        url: "deleteChalanSubscription",
        data: {_token: CSRF_TOKEN,subid:subid},
        success: function (results) {
          swal(results.status,results.message);
          year = $('.year').val();
          chalan_month = $('#chalan_month').val();
          chalan_number = $('#chalan_number').val();
          chalan_taluka = $('#taluka_id').val();
          $('.submit').show();
          $('.clearaftersubmit').val('');
          getChalanDetails(year,chalan_month,chalan_number,chalan_taluka);
        }
      })
    } else {
      e.dismiss;
    }
  }, function (dismiss) {
    return false;
  })
}
