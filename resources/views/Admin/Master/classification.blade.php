@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>बँकेत नाव  </h2>
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
                                          <th> क्रं </th>
                                          <th>वर्गीकरण </th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        @if(count($classification))
                                            @foreach($classification as $master)
                                              <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td> {{$master->classification}}</td>
                                                <td>
                                                    <a href="{{url('classification_Edit',[$master->id])}}">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target=""><i class="fa fa-edit"></i> </button></a>
                                                    <a href="{{url('classification_Delete',$master->id)}}">
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
                                <h5 class="modal-title" id="exampleModalLabel">बँकेत नाव </h5>
                            </div>
                            <div class="modal-body">
                                <form   class="form-horizontal form-label-left validatedForm" action="{{url('/classification_Insert_Data')}}"method="POST"  enctype="multipart/form-data" novalidate>
                                   {{csrf_field()}}
                                     <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">वर्गीकरण  <span class="required"></span></label>
                                          <div class="col-md-6 col-sm-6">
                                              <input class="form-control" name="classification" class='classification'>
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
<script>
$('.validatedForm').validate({
    rules:{
        classification:"required",

    },
    messages:{
        classification:"Please Enter The Classification Name",

    }
});
</script>
@endsection
