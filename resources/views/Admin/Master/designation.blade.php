@extends('Section.app')
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('language.h_designation')}} </h2>
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
                                            <th>{{trans('language.th_designation_no')}} </th>
                                            <th>{{trans('language.th_designation_name_en')}}</th>
                                            <th>{{trans('language.th_designation_name_mar')}}</th>
                                            <th>{{trans('language.btn_action')}} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($designation))
                                        @foreach($designation as $designation)
                                        <tr id="{{$designation->id}}">
                                            <td >{{$loop->index+1}}</td>
                                            <td id="designation_name_en_{{$designation->id}}" >{{$designation->designation_name_en}}</td>
                                            <td id="designation_name_mar_{{$designation->id}}">{{$designation->designation_name_mar}}</td>
                                            <td>
                                            <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$designation->id}}')"></i>
                                            <i class="fa fa-trash icon-trash" data-id="{{$designation->id}}" onclick="deleteConfirmation('{{$designation->id}}')"></i></tr>
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
                                <form class="form-horizontal form-label-left designation_vali" action="{{route('designation.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                     <div class="field item form-group">
                                        <label class="col-form-label col-md-5 col-sm-4  label-align">{{trans('language.th_designation_name_en')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6">
                                        <input type="hidden" class="form-control" name="designation_id" id="designation_id" value="0">

                                            <input class="form-control" name="designation_name_en" id="designation_name_en" class='designation'>
                                       </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-5 col-sm-4  label-align">{{trans('language.th_designation_name_mar')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="designation_name_mar" id="designation_name_mar" class='designation'>
                                        </div>
                                    </div>
                                 <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-6">
                                            <button type="submit" class="btn btn-success designation_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                                            <button type="button" class="btn btn-primary designation_clear" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
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
<script type="text/javascript" src="{{URL('js/desingnation-master.js')}}"></script>
@endpush
