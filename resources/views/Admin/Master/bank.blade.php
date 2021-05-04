@extends('Section.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('language.h_bank')}} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
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
                        <div class="col-sm-7 mt-7">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{trans('language.th_bank_no')}} </th>
                                            <th>{{trans('language.th_bank_name_en')}}</th>
                                            <th>{{trans('language.th_bank_name_mar')}}</th>
                                            <th>{{trans('language.btn_action')}} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($bank))
                                        @foreach($bank as $bank)
                                        <tr id="{{$bank->id}}">
                                            <td>{{$loop->index+1}}</td>

                                            <td id="bank_name_en_{{$bank->id}}">{{$bank->bank_name_en}}</td>
                                            <td id="bank_name_mar_{{$bank->id}}">{{$bank->bank_name_mar}}</td>
                                            <td>
                                                <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$bank->id}}')"></i>
                                                <i class="fa fa-trash icon-trash" data-id="{{$bank->id}}" onclick="deleteConfirmation('{{$bank->id}}')"></i>
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
                                <form class="form-horizontal form-label-left bank_vali" action="{{route('bank.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3  col-lg-5 label-align">{{trans('language.th_bank_name_en')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6">
                                        <input type="hidden" class="form-control" name="bank_id" id="bank_id" value="0">

                                            <input class="form-control" name="bank_name_en" id="bank_name_en" class='classification'>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3  col-lg-5 label-align">{{trans('language.th_bank_name_mar')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="hidden" class="form-control" name="bank_id" id="bank_id" value="0">

                                            <input class="form-control" name="bank_name_mar" id="bank_name_mar" class='classification'>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-6">
                                            <button type="submit" class="btn btn-success bank_submit"> <i class="fa fa-floppy-o"></i> {{trans('language.btn_save')}}  </button>
                                            <button type="button" class="btn btn-primary bank_clear" data-dismiss="modal" aria-label="Close">
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
<script type="text/javascript" src="{{URL('js/bank-master.js')}}"></script>
@endpush
