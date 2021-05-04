@extends('Section.app')
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <h2>{{trans('language.ms_reports')}} </h2>
      <div class="x_title">
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="progress">
              <div class="progress-bar"></div>
            </div>
            <div class="loader" style="display:none"></div>
            <div class="card-box ">
              <div class="form-group">
                <form class="form_users_excel_file" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-sm-3">
                      <label for="">{{trans('language.th_trend_year')}}</label>
                      <select class="form-control getchalan" name="year_id" id="year_id">
                        <option value="{{(date('Y')-1)}}">{{(date('Y')-1)}}</option>
                        <option value="{{date('Y')}}">{{date('Y')}}</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="">{{trans('language.th_trend_no')}}</label>
                      <select class="form-control getchalan" name="month_id" id="month_id">
                        <option value="" selected disabled>{{'Select Option'}}</option>
                        @foreach($month AS $key => $m_row)
                        <option value="{{$m_row->id}}">{{$m_row->month_name_mar}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="">{{trans('language.th_trend_s_no')}}</label>
                      <select class="form-control getchalan" name="chalan_serial_no" id="chalan_serial_no">
                        <option value="" selected disabled>{{'Select Option'}}</option>
                        @for($i=1;$i < 300 ;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="">{{trans('language.th_trend_taluka')}}</label>
                      <select class="form-control getchalan" name="taluka_id" id="taluka_id">
                        <option value="" selected disabled>{{'Select Option'}}</option>
                        @foreach($taluka AS $key => $t_row)
                        <option value="{{$t_row->id}}">{{$t_row->taluka_name_mar}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-sm-3 file-select">
                      <label for="">{{trans('language.th_trend_the_amount_of_hearing')}}</label>
                      <input class="form-control" type="text" readonly name="chalan_amount" id="chalan_amount" >
                    </div>
                    <div class="form-group col-sm-3 file-select">
                      <label for="">{{trans('language.th_trend_total_waste')}}</label>
                      <input class="form-control" type="text" readonly name="chalan_khatavani" id="chalan_khatavani" >
                    </div>
                    <div class="form-group col-sm-3 file-select">
                      <label for="">{{trans('language.th_trend_total_waste')}}</label>
                      <input class="form-control" type="file" name="test_excel" id="test_excel" required>
                    </div>
                    <input type="hidden" class="form-control chalan_id" id="chalan_id" name="chalan_id">
                    <input type="hidden" class="form-control chalan_number" id="chalan_number" name="chalan_number">
                    <input type="hidden" class="form-control chalan_amount" id="chalan_amount" name="chalan_amount">
                    <input type="hidden" class="form-control diffrence_amount" id="diffrence_amount" name="diffrence_amount">
                    <input type="hidden" class="form-control classification_id" id="classification_id" name="classification_id">
                  </div>
                  <div class="form-group col-sm-3">
                    <button class="btn btn-primary" type="submit" name="button">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box table-responsive">
          <table id="file_upload_list" class="table table-striped table-bordered " style="width:100% !important">
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
                <th>थकबाकी</th>
                <th>ऐकून </th>
                <!-- <th>क्रीया </th> -->
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="10" id="rowtotal"> </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/fileupload.js')}}"></script>
@endpush
