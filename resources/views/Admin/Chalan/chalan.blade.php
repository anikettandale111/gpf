@extends('Section.app')
@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        @if ($message = Session::get('danger_insert'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('success_insert'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('info_insert'))
        <div class="alert alert-info alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="x_title">
          <h2>{{trans('language.h_trend')}}   </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form   class="validatedForm" action="{{url('deposit_insert_data')}}"method="POST"  enctype="multipart/form-data" novalidate>
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
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered">
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
                    <th>{{trans('language.btn_action')}}</th>
                  </tr>
                </thead>
                <tbody>
                 @if(count($deposits) != 0)
                 @foreach($deposits as $temp)
                  <tr id="{{$temp->deposit_id}}">
                  <td>{{$loop->index+1}}</td>
                  <td>{{$temp->month_name_mar}} {{$temp->app_no}}</td>
                  <td>{{$temp->primary_number}}</td>
                  <td>{{date('d-M-Y',strtotime($temp->created_at))}}</td>
                  <td>{{$temp->taluka_name}}</td>
                  <td>{{$temp->classification_name_mar}}</td>
                 <td>{{$temp->amount}}</td>
                  <td>{{$temp->total_waste}}</td>
                  <td>{{$temp->shera}}</td>

                  <td>

                    <button class="btn btn-danger btn-flat btn-sm remove-user" id="" data-id="{{ $temp->deposit_id }}" data-action="{{ url('deposit_delete','$temp->deposit_id') }}"
                    onclick="deleteConfirmation('{{$temp->deposit_id}}')">
                    <i class="fa fa-trash"></i> </button>

               </td>

                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;
  document.getElementById('date').value = today;

 function deleteConfirmation(id) {

        swal({
            title: "Delete?",
            text: "Please    and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0

        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "deposit_delete/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {



                        $('#'+results.id).remove();

                    }


                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })


    }



</script>
<script>
    $(document).ready(function() {
     $('.validatedForm').validate({
        rules : {
            year:"required",
            taluka:"required",
            department:"required",
            classification:"required",
            designation:"required",
            amount:"required",
            app_no:{
              required:true,
            },
            shera:"required",
            total_waste:"required",

        },
        messages: {
             year:"Plese Select Year",
             taluka: " Please Select Taluka",
             department: " Please Select Department",
             classification:" Please Enter The classificationn",
             designation: " Please Select designation",
             amount:"Please Enter The Amount",
             app_no:{
              required:"Enter The number",
             },
             shera:"Please Enter The Shera",
             total_waste:"Please Enter The Total Waste",
         }
    });
      });

</script>
@endsection
