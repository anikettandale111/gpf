@extends('Section.app')
<style media="screen">
.hidebtn{
  display: none;
}
</style>
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>चलन </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="x_title">
          <div class="clearfix"></div>
          @if ($message = Session::get('danger'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('info'))
          <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
        </div>
        <br />
        <form class="form-horizontal form-label-left monthly_subscription_form" action="{{url('subscription')}}" method="POST" enctype="multipart/form-data" novalidate >
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="col-md-6 col-sm-3 ">
                <label for="Year"> वर्ष </label>
                @php
                $currently_selected = date('Y');
                $earliest_year = session()->get('from_year');
                $latest_year = date('Y');
                @endphp
                <select class="form-control year getchalan" name="selected_year" id="selected_year">
                  <?php
                  // foreach (range($latest_year, $earliest_year) as $i) {
                  //   echo '<option value="' . $i . '"' . ($i === $currently_selected ? ' selected="selected"' : '') . '>' . $i . '</option>';
                  // }
                  ?>
                  <option value="{{Session::get('from_year')}}">{{Session::get('from_year')}}</option>
                  <option value="{{Session::get('to_year')}}">{{Session::get('to_year')}}</option>
                </select>
              </div>
              <div class="col-md-6 col-sm-3 ">
                <label for="first-name"> चलन महिना </label>
                <select type="text" id="chalan_month" name="chalan_month" required="required" class="form-control chalan_no getchalan">
                  <option selected="" value=""> -- निवडा -- </option>
                  @foreach ($month as $temp)
                  <option value="{{$temp->id}}">{{$temp->month_name_mar}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6 col-sm-3 ">
                <label for="first-name"> चलन क्रमांक </label>
                <select type="text" id="chalan_number" name="chalan_number" required="required" class="form-control app_no getchalan" >
                  <option selected="" value=""> -- निवडा -- </option>
                  @for($i=1; $i <= 300; $i++) <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
                <input type="hidden" name="chalan_id" id="chalan_id">
              </div>
              <div class="form-group col-md-6">
                <label for="middle-name">तालूका निवडा </label>
                <select id="taluka_id" class="form-control getchalan taluka" type="text" name="taluka_id">
                  <option selected="" value=""> -- निवडा -- </option>
                  @foreach ($taluka as $temp)
                  <option value="{{$temp->id}}" >{{$temp->taluka_name_mar}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="form-group col-md-6">
                <label for="middle-name">वर्गीकरण </label>
                <select id="classification_id" class="form-control" type="text" name="classification_id" readonly>
                  <option selected="" value=""> -- निवडा -- </option>
                  @foreach ($classification as $temp)
                  <option value="{{$temp->id}}">{{$temp->classification_name_mar}}</option>

                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label>एकूण चलन रक्कम </label>
                <input type="text" name="chalan_amount" name="chalan_amount" class="form-control chalan_amount" readonly>
                <input type="hidden" name="primary_number" class="form-control primary_number" readonly>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="subscribed-rakkam">खतावलेली रक्कम </label>
                <input id="subscribed_rakkam" class="form-control" type="text" name="subscribed_rakkam" readonly>
              </div>
              <div class="col-md-6">
                <label for="middle-name">शिल्लक रक्कम </label>
                <input id="diffrence_amount" class="form-control" type="text" name="diffrence_amount" readonly>
                <input id="diffrence_amount_duplicate" class="form-control" type="hidden" name="diffrence_amount_duplicate">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">भ.नि.नि.क्रमांक </label>
                <input id="gpf_account_id" class="form-control clearaftersubmit" type="text" name="gpf_account_id">
              </div>
              <div class="col-md-6">
                <label for="middle-name">कर्मचारी नाव </label>
                <input id="user_name" class="form-control clearaftersubmit" type="text" name="user_name" readonly>
                <input id="user_id" class="form-control clearaftersubmit" type="hidden" name="user_id">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">कर्मचारी पदनाम </label>
                <input id="user_designation" class="form-control clearaftersubmit" type="text" name="user_designation" readonly>
                <input id="user_designation_id" class="form-control clearaftersubmit" type="hidden" name="user_designation_id">
              </div>
              <div class="col-md-6">
                <label for="middle-name">कर्मचारी विभाग </label>
                <input id="user_department" class="form-control clearaftersubmit" type="text" name="user_department" readonly>
                <input id="user_department_id" class="form-control clearaftersubmit" type="hidden" name="user_department_id">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">वर्गणी </label>
                <input id="deposit_amt" class="form-control deposit add calculation clearaftersubmit" type="number" name="deposit_amt" required>
              </div>
              <div class="col-md-6">
                <label for="middle-name">अग्रिम परतावा </label>
                <input id="refund" class="form-control refund add calculation clearaftersubmit" type="number" name="refund" value="0">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">थकबाकी </label>
                <input id="pending_amt" class="form-control pending_amt add calculation clearaftersubmit" type="number" name="pending_amt" value="0">
              </div>
              <div class="col-md-6">
                <label for="middle-name">एकुण </label>
                <input id="total_monthly_pay" class="form-control clearaftersubmit" type="number " name="total_monthly_pay" readonly>
              </div>
            </div>
            <div class="col-md-6" style="margin-top:30px;">
              <label for="middle-name"></label>
              <div class="col-md-6 saveDiv">
                <button type="submit" class="btn btn-success submit" style="width:100%;font-size:20px;">Submit</button>
              </div>
              <div class="col-md-6 updateDiv hidebtn">
                <button type="button" class="btn btn-success updateSave" style="width:100%;font-size:20px;">Update</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary" type="button clearupdate" style="width:100%;font-size:20px;">Cancel</button>
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
              <table id="datatable_one" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> क्रं </th>
                    <th> वर्ष </th>
                    <th> चलन नंबर </th>
                    <th> तालुका</th>
                    <th> भ.नि.नि.क्रमांक</th>
                    <th> कर्मचारी नाव</th>
                    <th> वर्गणी</th>
                    <th> अग्रिम परतावा</th>
                    <th> इतर</th>
                    <th> ऐकूण </th>
                    <th> तयार केलेलेच नाव </th>
                    <th> क्रिया </th>
                  </tr>
                </thead>
                <tbody>

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
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/master-monthly-chalan.js')}}"></script>
@endpush
