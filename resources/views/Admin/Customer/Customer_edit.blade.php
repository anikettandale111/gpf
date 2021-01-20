@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>तालुका मुख्यालय संकेताक भरणे </h2>
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
                        <form class="form-horizontal form-label-left" action="{{url('/Update_Customer')}}"
                        method="post"  enctype="multipart/form-data" >
                            <input type="hidden" value="{{$customer->id}}" name="id"> 
                             {{csrf_field()}}


                             
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> भ. नि .नि. क्रमांक <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='optional' name="gpf_no" value="{{$customer->gpf_no}}" data-validate-length-range="5,15" type="text" />
                                  </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">तालुका संकेतांक<span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="taluka" value="{{$customer->taluka}}" class='email'>
                                      <option value="{{$customer->taluka}}">{{$customer->taluka}}</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">विभाग संकेतांक <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name=" department" class='email'>
                                      <option value="{{$customer->department}}"> {{$customer->department}}</option>
                                      </select>
                                   </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align"> नाव   <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                     <input class="form-control" type="text" class='number' value="{{$customer->name}}" name="name" data-validate-minmax="10,100" required='required'>
                                   </div>
                              </div>
                              <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align">पदनाम <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="designation" class='designation'>
                                      <option value="{{$customer->designation}}"> {{$customer->designation}}</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">वर्गीकरण  <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <select class="form-control" name="classification"  value="{{$customer->custmoer_no}}" class='classification'>
                                      <option value="{{$customer->classification}}"> {{$customer->classification}}</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">जन्म  दिनांक  <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='date' type="date"  value="{{$customer->date_birth}}" name="date_birth" required='required'>
                                  </div>
                              </div>
                              <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">  रुजू  दिनांक <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date"  value="{{$customer->date_dated}}" name="date_dated" required='required'>
                                    </div>
                              </div>
                             
                              <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> सेवानिवृती दिनांक <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" value="{{$customer->retirement_date}}"  name="retirement_date" required='required'>
                                    </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">बँकेत नाव <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="bank_name" class='classification'>
                                        <option value="{{$customer->bank_name}}"> {{$customer->bank_name}}</option>
                                        </select>
                                    </div>
                              </div>
                              <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> शाखा  <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="text" value="{{$customer->branch}}"  name="branch" required='required'>
                                    </div>
                              </div>
                              <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> आय. एफ.एस.सी.कोड  <span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="text" value="{{$customer->IFSC_code}}"  name="IFSC_code" required='required'>
                                    </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align"> खाते क्रमांत  <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='date' type="text" value="{{$customer->account_no}}"  name="account_no" required='required'>
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