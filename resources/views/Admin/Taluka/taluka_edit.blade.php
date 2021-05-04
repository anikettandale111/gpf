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
						<form class="form-horizontal form-label-left" action="{{url('/Taluka_Update')}}"
						method="post"  enctype="multipart/form-data" >
						    <input type="hidden" value="{{$tedit->id}}" name="id">
							{{csrf_field()}}
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> तालुक्याचे नाव  <span class="required">: </span>
								</label>
								<div class="col-md-6 col-sm-6 ">
								   <input type="text" id="first-name"  name="name" value="{{$tedit->name}}"required="required" class="form-control ">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="item form-group">
							<div class="col-md-6 col-sm-6 offset-md-3">
								<button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save </button>
								<a href="{{url('Taluka')}}">
								<button class="btn btn-primary" type="button"> <i class="fa fa-sign-out" aria-hidden="true"></i> Cancle </button></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
