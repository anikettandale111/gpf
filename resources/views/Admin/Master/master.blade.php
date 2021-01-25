@extends('Section.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('language.h_bank')}}   </h2>
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
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="dataTables_wrapper container-fluid dt-bootstrap no-footer" style="text-align: end;">
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  data-placement="right"
                                 title="" data-original-title="Add">Add</button>
                                </p>
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
                                        @if(count($masters))
                                          @foreach($masters as $master)
                                              <tr>
                                              <td>{{$loop->index+1}}</td>

                                               <td>{{$master->bank_name}}</td>
                                               <td>{{$master->bank_name}}</td>
                                             <td>
                                                      <a href="{{url('master_Edit',[$master->id])}}">
                                                      <button type="button" class="btn btn-info" data-toggle="modal"
                                                      data-target=""><i class="fa fa-edit"></i> </button></a>
                                                      <a href="{{url('master_Delete',$master->id)}}">
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
                                <h5 class="modal-title" id="exampleModalLabel">{{trans('language.h_bank')}}  </h5>
                            </div>
                            <div class="modal-body">
                                <form   class="form-horizontal form-label-left validatedForm" action="{{url('/Master_Insert_Data')}}"method="POST"  enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                      <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_bank_name_en')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="bank_name" class='classification'>
                                         </div>
                                      </div>
                                      <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{trans('language.th_bank_name_mar')}} <span class="required"></span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="bank_name" class='classification'>
                                         </div>
                                      </div>
                                      <div class="ln_solid"></div>
                                        <div class="item form-group">
                                          <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> {{trans('language.btn_save')}}
                                            </button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
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
<script>
$('.validatedForm').validate({
    rules:{
        bank_name:"required",

    },
    messages:{
        bank_name:"Please Enter The Bank Name",

    }
});
</script>
 @endsection
