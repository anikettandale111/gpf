@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="">
                <h2>{{trans('language.h_department')}} </h2>
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
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{trans('language.th_department_no')}} </th>
                                            <th>{{trans('language.th_taluka_name_mar')}}</th>
                                            <th>{{trans('language.th_department_name_en')}}</th>
                                            <th>{{trans('language.th_department_name_mar')}}</th>
                                            <th>{{trans('language.btn_action')}} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($department))
                                        @foreach($department as $department)
                                        <tr id="{{$department->id}}">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$department->taluka_name}}</td>
                                            <td id="department_name_en_{{$department->id}}">{{$department->department_name_en}}</td>
                                            <td id="department_name_mar_{{$department->id}}">{{$department->department_name_mar}}</td>
                                            <td>
                                                <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$department->id}}','{{$department->tid}}')"></i>
                                                <i class="fa fa-trash icon-trash deleteDepartment" data-id="{{$department->id}}">
                                                </i>
                                        </tr>

                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 mt-7">
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left department_vali" action="{{route('department.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                    <div class="field item form-group">
                                        <input type="hidden" id="department_id" name="department_id" value="0">
                                        <label class="col-form-label">{{trans('language.th_taluka_name_mar')}}<span class="required"></span></label>
                                        <div class="col-md-6  col-lg-9">
                                            <select class="form-control" name="taluka_id" id="taluka_id">
                                                <option value="">-- Select Taluka --</option>
                                                @foreach ($taluka as $taluka)
                                                <option value="{{$taluka->id}}">{{$taluka->taluka_name_mar}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="field item form-group">

                                        <label class="col-form-label ">{{trans('language.th_department_name_en')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-lg-9">
                                            <input class="form-control" name="department_name_en" id="department_name_en" class='email'>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label">{{trans('language.th_department_name_mar')}} <span class="required"></span></label>
                                        <div class="col-md-6  col-lg-9">
                                            <input class="form-control" name="department_name_mar" id="department_name_mar" class='email'>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-6">
                                            <button type="submit" class="btn btn-success department_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                                            <button type="button" class="btn btn-primary department_clear" data-dismiss="modal" aria-label="Close">
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

<script type="text/javascript" src="{{URL('js/department-master.js')}}"></script>
<script>
    $(document).on('click', '.deleteDepartment', function() {
    var id = $(this).attr('data-id');
    alert(id);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: "Delete?",
             text: "Please  and then confirm!",
             type: "warning",
             showCancelButton: !0,
             confirmButtonText: "Yes, delete it!",
             cancelButtonText: "No, cancel!",
             reverseButtons: !0
            });
$.ajax({
        url: "department.destroy",
        data: {_token: CSRF_TOKEN,"id":id},
        type: 'post',

        success: function(results) {
       location.reload();
        }
    });
});

</script>

@endpush
