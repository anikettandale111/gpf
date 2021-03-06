@extends('Section.app')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.h_trend')}}   </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form   class="validatedForm" action="{{url('chalan')}}" method="POST"  enctype="multipart/form-data" novalidate>
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="col-md-6 col-sm-3 ">
                <label  for="Year"> {{trans('language.th_trend_year')}} </label>
                @php
                $currently_selected = date('Y');
                $earliest_year = 2020;
                $latest_year = date('Y');
                @endphp
                <select name="year" id="year" class="form-control">
                  <option value="">-- निवडा वर्ष --</option>
                  <?php
                  foreach ( range( $latest_year, $earliest_year ) as $i ) {
                    echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6 col-sm-3 ">
                <label  for="first-name"> {{trans('language.th_trend_no')}}  </label>
                <select type="text" id="chalan_no"  name="chalan_no" required="required" class="form-control ">
                  <option value="">-- निवडा चलन क्रमांक --</option>
                  @foreach ($month as $month)
                  <option value="{{$month->id}}">{{$month->month_name_mar}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6 col-sm-3 ">
                <label></label>
                <select type="text" id="app_no" name="app_no" required="required" class="form-control " style="margin-top: 7px;">
                  <option value="">-- निवडा  क्रमांक --</option>
                  @for($i=1; $i <= 300; $i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="middle-name">{{trans('language.th_trend_taluka')}}</label>
                <select id="taluka" class="form-control" type="text" name="taluka">
                  <option value="">-- निवडा  तालूका --</option>
                  @foreach ($taluka as $taluka)
                  <option value="{{$taluka->id}}">{{$taluka->taluka_name_mar}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="form-group col-md-6">
                <label for="middle-name">{{trans('language.th_trend_classification')}} </label>
                <select id="middle-name" class="form-control" type="text" name="classification">
                  <option value="">-- निवडा  वर्गीकरण --</option>
                  @foreach ($classification as $classification)
                  <option value="{{$classification->id}}">{{$classification->classification_name_mar}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="middle-name">{{trans('language.th_trend_the_amount_of_hearing')}} </label>
                <input id="amount" class="form-control" type="number" name="amount">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">{{trans('language.th_trend_total_waste')}}</label>
                <input id="middle-name" class="form-control" type="text" name="total_waste" value="0">
              </div>
              <div class="col-md-6">
                <label for="middle-name">{{trans('language.th_trend_shera')}}  </label>
                <textarea id="Shera" class="form-control" type="text" name="shera" cols="5" rows="2"></textarea>
              </div>
            </div>
            <div class="form-group col-md-12">
              <div style="margin-top:49px; float: right;">
                <button class="btn btn-primary" type="button">{{trans('language.btn_cancel')}}</button>
                <button type="submit" class="btn btn-success">{{trans('language.btn_save')}}</button>
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
        <h2>चलन   </h2>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="chalanTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{trans('language.th_trend_s_no')}} </th>
                    <th>{{trans('language.th_trend_no')}}</th>
                    <th>{{trans('language.th_trend_s_no')}} </th>
                    <th>{{trans('language.th_trend_date')}} </th>
                    <th>{{trans('language.th_trend_taluka')}} </th>
                    <th>{{trans('language.th_trend_classification')}}  </th>
                    <th>{{trans('language.th_trend_the_amount_of_hearing')}} </th>
                    <th>{{trans('language.th_trend_total_waste')}}  </th>
                    <th>{{trans('language.th_trend_shera')}}</th>
                    <!-- <th>{{trans('language.btn_action')}}</th> -->
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
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/master-chalan.js')}}"></script>
@endpush
