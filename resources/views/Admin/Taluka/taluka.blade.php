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
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="dataTables_wrapper container-fluid dt-bootstrap no-footer" style="text-align: end;">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Add
                                    </button>
                                </p>
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
                                        @foreach($taluka as $temp)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$temp->district_name}}</td>
                                            <td>{{$temp->taluka_name_en}}</td>
                                            <td>{{$temp->taluka_name_mar}}</td>
                                            <td>
                                                <a href="{{url('Taluka_Edit',[$temp->id])}}">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=""><i class="fa fa-edit"></i> </button></a>
                                                <a href="{{url('Talukat_Delete',$temp->id)}}">
                                                    <button type="button" class="btn btn-danger "><i class="fa fa-trash"></i> </button></a>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{trans('language.h_taluka_filling_taluka_head_quarters')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left" action="{{url('taluka_insert_data')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> {{trans('language.th_districts_name')}} <span class="required"> :- </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select type="text" id="district_id" name="district_id" required="required" class="form-control ">
                                                <option value="nashik">nashik</option>
                                                <option value="nashik">nashik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> {{trans('language.th_taluka_name_en')}} <span class="required"> :- </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="taluka_name_en" name="taluka_name_en" required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> {{trans('language.th_taluka_name_mar')}} <span class="required"> :- </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="taluka_name_mar" name="taluka_name_mar" required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save </button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
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
