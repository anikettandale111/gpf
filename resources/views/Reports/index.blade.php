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
            <div class="card-box ">
              <form class="form-group report_validate" action="{{url('employeereports')}}" method="post" target="_blank">
                @csrf
                <div class="col-sm-2">
                  <label>प्रकार निवडा</label>
                  <select class="form-control" name="employee_gpf_num_inital" id="employee_gpf_num_inital">
                    @foreach($classification AS $row)
                    <option value="{{$row->inital_letter}}">{{$row->classification_name_mar}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-3">
                  <label>{{trans  ('language.th_providing_b_n_n_no')}}</label>
                  <input class="allow-numbers form-control" type="text" name="employee_gpf_num" id="employee_gpf_num">                
                </div>
                <div class="col-sm-1">
                  <span class="input-group-append" style="margin-top:25px;margin-left:-15px;">
                    <button class="btn bg-white border-bottom-0 border rounded-pill ms-n5" type="button" data-toggle="modal" data-target="#exampleModalsearch">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <div class="col-sm-4">
                  <label>{{trans  ('language.report_type')}}</label>
                  <select class="form-control" name="view_report_type" id="view_report_type">
                    <option value="" selected disabled></option>
                    <option value="1">{{trans('language.gpf_khate_utaran_niyam_231')}}</option>
                    <option value="2">{{trans('language.gpf_khatevahi_namuna_88_niyam_231')}}</option>
                    <option value="3">{{trans('language.gpf_bruhpatrak_naumna_89_niyam_231')}}</option>
                    <option value="4">{{trans('language.gpf_chalan_nihay')}}</option>
                  </select>
                </div>
                <div class="col-sm-2" style="margin-top:25px;">
                  <button type="submit" class="btn btn-success" >{{trans('language.btn_view_report')}}</button>
                  <button type="button" class="btn btn-secondary report_clear" >{{trans('language.btn_cancel')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="exampleModalsearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Enteries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">       
        
        <div class="card-box table-responsive">
          <form class="form-group search" action="{{url('employeereports')}}" method="post" target="_blank">
            @csrf
            <div class="col-sm-8">
              <label>{{trans  ('language.th_providing_b_n_n_no')}}</label>
              <input class="form-control" type="text" name="employee_gpf_num" id="employee_gpf_num">                
            </div>
            <div class="col-sm-2" style="margin-top: 30px;">
              <button type="submit" class="btn btn-success" >{{trans('language.btn_search')}}</button>
            </div>
          </form>
          <div class="gpfdetails col-md-12"></div>
        </div>
       
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/employeereports.js')}}"></script>


@endpush
