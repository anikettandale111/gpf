@extends('Section.app')
<style media="screen">
.form_two{
  display: none;
}
.form_one{
  display: none;
}
</style>
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.menu_form_namnirdeshan')}} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('accountclosed/create')}}" type="button" class="btn btn-success pull-right" >Create New</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box ">
              <table id="datatable" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>{{trans('language.th_reasons_no')}}</th>
                    <th>{{trans('language.account_closed_form_type')}}</th>
                    <th>{{trans('language.account_closed_fo_applicant_name')}}</th>
                    <th>{{trans('language.account_closed_fo_applicantion_date')}}</th>
                    <th>{{trans('language.account_closed_fo_antim_pryojan')}}</th>
                    <th>{{trans('language.th_providing_status')}}</th>
                    <th>{{trans('language.btn_action')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($receivedForms))
                    @foreach($receivedForms AS $key => $row)
                      <tr>
                        <td>{{($key+1)}}</td>
                        <td>{{($row->form_type==1)?'खाते बंद':'वर्ग/जिल्हा बदली'}}</td>
                        <td>{{$row->applicant_name}}</td>
                        <td>{{$row->applicantion_date}}</td>
                        <td>{{$row->antim_pryojan}}</td>
                        <td>
                            <button type="button" class="btn btn-{{($row->form_status==0)?'warning':(($row->form_status==1)?'success':'danger')}}" name="button">{{($row->form_status==0)?'Pending':(($row->form_status==1)?'Approved':'Rejected')}}</button>
                        </td>
                        <td> <a href="{{url('accountclosed/'.$row->form_id)}}" type="button" class="btn btn-info" name="button">View</a> </td>
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
@endsection
@push('custom-scripts')
@endpush
