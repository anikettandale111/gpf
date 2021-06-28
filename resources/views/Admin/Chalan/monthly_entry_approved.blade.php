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
        <form class="form-horizontal form-label-left" method="POST" >
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
                  foreach (range($latest_year, $earliest_year) as $i) {
                    echo '<option value="' . $i . '"' . ($i === $currently_selected ? ' selected="selected"' : '') . '>' . $i . '</option>';
                  }
                  ?>
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
                <label for="middle-name">रकमेतील फरक </label>
                <input id="diffrence_amount" class="form-control" type="text" name="diffrence_amount" readonly>
                <input id="diffrence_amount_duplicate" class="form-control" type="hidden" name="diffrence_amount_duplicate">
              </div>
            </div>
            <div class="col-md-6" style="margin-top:30px;">
              <label for="middle-name"></label>
              <div class="col-md-6">
                <button type="submit" class="btn btn-success submit" style="width:100%;font-size:20px;">Submit</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary" type="button" style="width:100%;font-size:20px;">Cancel</button>
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
                    <th>चलन नंबर </th>
                    <th>तालुका</th>
                    <th>भ.नि.नि.क्रमांक</th>
                    <th>कर्मचारी नाव</th>
                    <th>वर्गणी</th>
                    <th>अग्रिम परतावा</th>
                    <th>इतर</th>
                    <th>ऐकून </th>
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
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/master-monthly-chalan.js')}}"></script>
@endpush
