
@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>वर्षाचे व्याज दर  भरणे  </h2>
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
                        <form class="form-horizontal form-label-left" action="{{url('/Year_Update')}}"
                        method="post"  enctype="multipart/form-data" >
                            <input type="hidden" value="{{$yedit->id}}" name="id"> 
                            {{csrf_field()}}     
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">  आर्थिक वर्ष   <span class="required"> : </span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="year" class="form-control">
                                    <option value="{{$yedit->year}}">{{$yedit->year}}</option>
                                    <?php
                                    for($i=2020; $i == 2020;  $i++) 
                                        {?>
                                        <option value="<?php echo $i?>"><?php echo $i?>
                                        </option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> व्याज दर  <span class="required"> : </span></label>
                                <div class="col-md-6 col-sm-6">
                                     <input class="form-control" class='optional'  value="{{$yedit->percent}}" name="percent" data-validate-length-range="5,15" type="text" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">पासून <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="from_month">
                                        
                                    <option value="{{$yedit->from_month}}">{{$yedit->from_month}}</option>
                                     
                                       
                                       
                                     @foreach ($Month as $month)
                                              <option>{{$month->name}}</option>
                                              @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> पर्यंत <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" 
                                    type="time" name="to_month" id="to_month" >
                                        <option value="{{$yedit->to_month}}">{{$yedit->to_month}}</option>
                                       @foreach ($Month as $month)
                                              <option>{{$month->name}}</option>
                                              @endforeach
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save </button>
                                    <a href="{{url('Year')}}">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-sign-out" aria-hidden="true"></i> Cancle </button></a>
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