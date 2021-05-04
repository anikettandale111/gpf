@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('language.h_classification')}}  </h2>
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
                        <div class="col-sm-7 mt-7">
                          <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                       <th>{{trans('language.th_classification_no')}} </th>
                                        <th>{{trans('language.th_classification_name_en')}}</th>
                                        <th>{{trans('language.th_classification_name_mar')}}</th>
                                        <th>{{trans('language.btn_action')}} </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        @if(count($classification))
                                            @foreach($classification as $classification)
                                              <tr id="{{$classification->id}}">
                                                <td>{{$loop->index+1}}</td>
                                                <td id="classification_name_en_{{$classification->id}}"> {{$classification->classification_name_en}}</td>
                                                <td id="classification_name_mar_{{$classification->id}}"> {{$classification->classification_name_mar}}</td>
                                                <td>
                                                <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$classification->id}}')"></i>
                                                <i class="fa fa-trash icon-trash" data-id="{{$classification->id}}" onclick="deleteConfirmation('{{$classification->id}}')"></i></tr>

                                                 </td>
                                              </tr>
                                            @endforeach
                                        @endif
                                   </tbody>
                                </table>
                           </div>
                        </div>
                        <div class="col-sm-5 mt-7">
                        <div class="modal-body">
                                <form   class="form-horizontal form-label-left classification_vali" action="{{route('classification.store')}}"method="POST"  enctype="multipart/form-data" novalidate>
                                   {{csrf_field()}}
                                     <div class="field item form-group">
                                        <label class="col-form-label  col-md-3  col-lg-5  label-align">{{trans('language.th_classification_name_en')}}  <span class="required"></span></label>
                                          <div class="col-md-6 col-sm-6">
                                          <input type="hidden" class="form-control" name="classification_id" id="classification_id" value="0">

                                              <input class="form-control" name="classification_name_en" id="classification_name_en" class='classification'>
                                          </div>
                                     </div>

                                     <div class="field item form-group">
                                        <label class="col-form-label  col-md-3  col-lg-5  label-align">{{trans('language.th_classification_name_mar')}}  <span class="required"></span></label>
                                          <div class="col-md-6 col-sm-6">
                                              <input class="form-control" name="classification_name_mar" id="classification_name_mar" class='classification'>
                                          </div>
                                     </div>
                                     <div class="ln_solid"></div>
                                      <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-6">
                                            <button type="submit" class="btn btn-success classification_submit"> <i class="fa fa-floppy-o"></i> {{trans('language.btn_save')}}  </button>
                                            <button type="button" class="btn btn-primary classification_clear" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('language.btn_cancel')}}
                                            </button>
                                        </div>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>

@endsection

@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/classification-master.js')}}"></script>
@endpush
