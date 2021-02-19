@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.ms_reports')}} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
            <div class="card-box ">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>{{trans('language.fr_common_gpf_no')}}</th>
                    <th>{{trans('language.fr_common_user_name')}}</th>
                    <th>Pay DP</th>
                    <th>Subs</th>
                    <th>Pay/DA Arr</th>
                    <th>Gpf Arr </th>
                    <th>Refund Amount</th>
                    <th>CurInst/Tot.Inst</th>
                    <th>Total</th>
                    <th>Remark</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp
                  @if(count($insert))
                    @foreach($insert AS $row)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row['data_two_1']}}</td>
                        <td>{{if($row['data_two_2'] !== '')$row['data_two_3']}}</td>
                        <td>{{$row['data_two_4']}}</td>
                        <td>{{$row['data_two_5']}}</td>
                        <td>{{$row['data_two_6']}}</td>
                        <td>{{$row['data_two_7']}}</td>
                        <td>{{$row['data_two_8']}}</td>
                        <td>{{$row['data_two_9']}}</td>
                        <td>{{$row['data_two_10']}}</td>
                        <td></td>
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
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/employeereports.js')}}"></script>
@endpush
