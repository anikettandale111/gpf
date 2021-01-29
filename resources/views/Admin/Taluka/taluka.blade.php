@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{trans('language.h_taluka_filling_taluka_head_quarters')}}</h2>
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
                        <div class="col-sm-7">
                            <div class="card-box table-responsive">

                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{trans('language.th_taluka_no')}} </th>
                                            <th>{{trans('language.th_districts_name')}}</th>
                                            <th>{{trans('language.th_taluka_name_en')}}</th>
                                            <th>{{trans('language.th_taluka_name_mar')}}</th>
                                            <th>{{trans('language.btn_action')}} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($taluka))
                                        @foreach($taluka as $taluka)
                                        <tr id="{{$taluka->tid}}">
                                            <td>{{$loop->index+1}}</td>
                                            <td >{{$taluka->district_name}}</td>
                                            <td id="taluka_name_en_{{$taluka->tid}}">{{$taluka->taluka_name_en}}</td>
                                            <td id="taluka_name_mar_{{$taluka->tid}}">{{$taluka->taluka_name_mar}}</td>
                                            <td>
                                            <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$taluka->tid}}','{{$taluka->did}}')"></i>
                                            <i class="fa fa-trash icon-trash" data-id="{{$taluka->tid}}" onclick="deleteConfirmation('{{$taluka->tid}}')"></i></tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-5 mt-7">
                        <div class="modal-body">
                                <form class="form-horizontal form-label-left taluka_vali" action="{{route('taluka.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                    <div class="item form-group">
                                    <input type="hidden" class="form-control" name="taluka_id" id="taluka_id" value="0">

                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name"> {{trans('language.th_districts_name')}} <span class="required"> :- </span>
                                        </label>
                                        <div class="col-md-6 col-lg-8">
                                            <select type="text" id="district_id" name="district_id" required="required" class="form-control">
                                             @foreach($district as $district)
                                                <option value="{{$district->dsitrict_id}}">{{$district->district_name_mar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name"> {{trans('language.th_taluka_name_en')}} <span class="required"> :- </span>
                                        </label>
                                        <div class="col-md-6 col-lg-8 ">
                                            <input type="text" id="taluka_name_en" name="taluka_name_en" required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name"> {{trans('language.th_taluka_name_mar')}} <span class="required"> :- </span>
                                        </label>
                                        <div class="col-md-6 col-lg-8">
                                            <input type="text" id="taluka_name_mar" name="taluka_name_mar" required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-7">
                                            <button type="submit" class="btn btn-success taluka_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                                            <button type="button" class="btn btn-primary taluka_clear" data-dismiss="modal" aria-label="Close">
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

<script type="text/javascript" src="{{URL('js/taluka-master.js')}}"></script>
@endpush
