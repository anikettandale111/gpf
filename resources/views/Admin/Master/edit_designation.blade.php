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
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                                    <form class="form-horizontal form-label-left" action="{{url('/Update_designation')}}"
                 method="post"  enctype="multipart/form-data" >
                    <input type="hidden" value="{{$designation->id}}" name="id">

                    {{csrf_field()}}


                                            <div class="field item form-group">
                                              <label class="col-form-label col-md-3 col-sm-3  label-align">पदनाम <span class="required"></span></label>
                                                <div class="col-md-6 col-sm-6">
                                                    <input class="form-control" name="designation"  value="{{$designation->designation}}"  class='designation'>

                                                </div>
                                            </div>


                                            <div class="ln_solid"></div>
                                             <div class="item form-group">
                                                <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save </button>
                                                <a href="{{url('designation')}}">
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
                @endsection
