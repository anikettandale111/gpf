@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>वापरकर्त्यांची नोंदणी </h2>
                      <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <br />
                        <form class="form-horizontal form-label-left" action="{{url('user_registration_update')}}"
                        method="post"  enctype="multipart/form-data" >
                            <input type="hidden" value="{{$users->id}}" name="id"> 
                             {{csrf_field()}}
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> Name <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='optional' name="name" value="{{$users->name}}" data-validate-length-range="5,15" type="text" />
                                  </div>
                              </div>
                               <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align"> Phone   <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                     <input class="form-control" type="text" class='number' value="{{$users->phone}}" name="phone" data-validate-minmax="10,100" required='required'>
                                   </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">E-Mail Address<span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" name="email" value="{{$users->email}}" class='email'readonly>
                                      
                                  </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Select Taluka <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="taluka_id" class='email'>
                                         @foreach ($taluka as $temp => $n)

                                          @if($users->taluka_id == $n->id)
                                          <option value="{{$n->id}}" selected> {{$n->name}}</option>
                                          @else
                                          <option value="{{$n->id}}"> {{$n->name}}</option>
                                          @endif
                                         @endforeach

                                      
                                      </select>
                                   </div>
                              </div>
                              <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align">Select Department <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="department_id" class='designation'>
                                          @foreach ($department as $temp => $n)

                                          @if($users->department_id == $n->id)
                                          <option value="{{$n->id}}" selected> {{$n->department	}}</option>
                                          @else
                                          <option value="{{$n->id}}"> {{$n->department	}}</option>
                                          @endif
                                         @endforeach
                                      </select>
                                  </div>
                              </div>
                              
                               <div class="ln_solid"></div>
                               <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 offset-md-3">
                                      <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save 
                                      </button>
                                      <a href="{{url('Customer_Registration')}}"> 
                                      <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                      <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
                                      </button></a>
                                 </div>
                              </div>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
