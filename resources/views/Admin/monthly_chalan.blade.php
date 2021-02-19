@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>चलन </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-horizontal form-label-left new_form" action="{{url('chalan_insert')}}" method="POST" enctype="multipart/form-data" novalidate id="Trend_add">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="col-md-6 col-sm-3 ">
                <label for="Year"> वर्ष </label>
                @php
                $currently_selected = date('Y');
                $earliest_year = 2020;
                $latest_year = date('Y');
                @endphp
                <select name="year" class="form-control year">
                  <?php
                  foreach (range($latest_year, $earliest_year) as $i) {
                    echo '<option value="' . $i . '"' . ($i === $currently_selected ? ' selected="selected"' : '') . '>' . $i . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6 col-sm-3 ">
                <label for="first-name"> चलन दिनांक </label>
                <select type="text" id="chalan_no" name="chalan_no" required="required" class="form-control chalan_no">
                  <option selected="" value=""> -- Select -- </option>
                  @foreach ($month as $temp)
                  <option value="{{$temp->id}}">{{$temp->month_name_mar}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6 col-sm-3 ">
                <label for="first-name"> चलन क्रमांक </label>
                <select type="text" id="app_no" name="app_no" required="required" class="form-control app_no" >
                  <option selected="" value=""> -- Select -- </option>
                  @for($i=1; $i <= 300; $i++) <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="middle-name">तालूका निवडा </label>
                <select id="taluka" class="form-control taluka" type="text" name="taluka">
                  <option value=""> -- Select -- </option>
                  @foreach ($taluka as $temp)
                  <option value="{{$temp->id}}" >{{$temp->taluka_name_mar}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="form-group col-md-6">
                <label for="middle-name">वर्गीकरण </label>
                <select id="classification" class="form-control" type="text" name="classification">
                  <option value=""> -- Select -- </option>
                  @foreach ($classification as $temp)
                  <option value="{{$temp->id}}">{{$temp->classification_name_mar}}</option>

                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>एकूण चलन रक्कम </label>
                <input type="text" name="chalan_amount" class="form-control chalan_amount" readonly>
                <input type="hidden" name="primary_number" class="form-control primary_number" readonly>
              </div>
            </div>


            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">रकमेतील फरक </label>
                <input id="diffrence_amount" class="form-control" type="text" name="diffrence_amount" readonly>
              </div>
              <div class="col-md-6">
                <label for="middle-name">भ.नि.नि.क्रमांक </label>
                <input id="account_id" class="form-control" type="text" name="account_id">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">कर्मचारी नाव </label>
                <input id="user_name" class="form-control" type="text" name="user_name" readonly>
                <input id="user_id" class="form-control" type="hidden" name="user_id">
              </div>
              <div class="col-md-6">
                <label for="middle-name">कर्मचारी पदनाम </label>
                <input id="user_designation" class="form-control" type="text" name="user_designation" readonly>
                <input id="user_designation_id" class="form-control" type="hidden" name="user_designation_id">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">कर्मचारी विभाग </label>
                <input id="user_department" class="form-control" type="text" name="user_department" readonly>
                <input id="user_department_id" class="form-control" type="hidden" name="user_department_id">
              </div>
              <div class="col-md-6">
                <label for="middle-name">वर्गणी </label>
                <input id="deposit_amt" class="form-control deposit add" type="number" name="deposit_amt" required>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">अग्रिम परतावा </label>
                <input id="refund" class="form-control refund add" type="number" name="refund" value="0">
              </div>
              <div class="col-md-6">
                <label for="middle-name">थकबाकी </label>
                <input id="pending_amt" class="form-control pending_amt add" type="number" name="pending_amt" value="0">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">एकुण </label>
                <input id="total" class="form-control" type="number" name="total" readonly>
              </div>
            </div>

            <div class="form-group col-md-12">
              <div style="float: right;">
                <button class="btn btn-primary" type="button">Cancel</button>
                <button type="submit" class="btn btn-success submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>चलन </h2>
        <div class="clearfix"></div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif


      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> क्रं </th>
                    <th>वर्ष </th>
                    <th>नंबर </th>
                    <th>तालुका</th>
                    <th>वर्गीकरण </th>
                    <th>भ.नि.नि.क्रमांक</th>
                    <th>वर्गणी</th>
                    <th>अग्रिम परतावा</th>
                    <th>थकबाकी</th>
                    <th>ऐकून </th>
                    <th>रकमेतील फरक</th>
                    <th>तयार केलेलेच नाव </th>
                  </tr>
                </thead>
                <tbody class="appaend_table">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{asset('asset/loader.png')}}" width="200" height="200" /><br>Loading..</div>
</div>
<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).on('change', '.app_no', function(e) {
  year = $('.year').val();
  chalan_no = $('#chalan_no').val();
  app_no = $('.app_no').val();
  $("#wait").css("display", "block");
  $.ajax({
    url: "{{url('get_chalan_amount')}}",
    data: {
      "_token": "{{ csrf_token() }}",
      'year': year,
      'chalan_no': chalan_no,
      'app_no': app_no
    },
    type: 'POST',
    success: function(res) {
      if (res.amt != null) {
        $('.chalan_amount').val(res.amt.amount);
        $('.primary_number').val(res.amt.primary_number);
        $('#diffrence_amount').val(res.amt.diff_amount);
        $('#taluka').val(res.amt.taluka);
        $('#classification').val(res.amt.classification);
        $('.submit').show();
        str = '';
        if (res.chalan != '') {
          var i = 1;
          $(res.chalan).each(function(key, val) {
            console.log(val);
            str += '<tr><td>' + i + '</td><td>' + val.year + '</td><td>' + val.primary_number + '</td><td>' + val.taluka + '</td><td>' + val.classification + '</td><td>' + val.gpf_no + '</td><td>' + val.deposit + '</td><td>' + val.partava + '</td><td>' + val.pending_amt + '</td><td>' + val.total + '</td><td>' + val.final_amt_diff + '</td><td>' + val.name + '</td></tr>';
            i++;
          });
        }
        $('.appaend_table').html(str);
      } else {
        $('.chalan_amount').val(0);
        alert("This month not fill the Amount");
        $('.submit').hide();
      }
      $("#wait").css("display", "none");
      return false;
    }
  });
});
$("#account_id").keypress(function (e) {
  if($(this).val().length == 5) {
    $(this).val($(this).val().slice(0, 5));
    return false;
  }
  var lg = parseInt($(this).val().length);
  if(lg == 4){
    setTimeout(function(){
      getdetails();
    },200);
  }
});

$(document).on('keyup', '.add', function(e) {
  deposit = $('.deposit').val();
  refund = $('.refund').val();
  pending_amt = $('.pending_amt').val();

  var total = parseFloat(deposit) + parseFloat(refund) + parseFloat(pending_amt);
  $('#total').val(total);

});
$(document).on('change', '.chalan_no', function(e) {
  //$('.new_form')[0].reset();
  $(this).closest('form').find("input[type=text]").val("");

  $('.app_no').val("");
});
function getdetails(){
  $.ajax({
    type: 'GET',
    url: "getuserdetailsbygpfno",
    data: {_token: CSRF_TOKEN,input_id:$("#account_id").val()},
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
</script>
@endsection
