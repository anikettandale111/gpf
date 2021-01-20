@extends('Section.app')

@section('content')

  <div class="">
    <div class="clearfix"></div>
       <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Change Password </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>

                  @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                    </div>
                  @endif
              </div>
              <div class="x_content">
                <div class="row">
                  <form class="form-horizontal validatedForm" action="{{url('/submit_change_pwd')}}" method="POST">
                      {{csrf_field()}}
                    <div class="col-sm-4">
                      <div class="card-box table-responsive">
                        <label>New Password</label>
                        <input type="text" name="new_password" class="form-control" id="new_password" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card-box table-responsive">
                        <label>Confirm Password</label>
                        <input type="text" name="confirm_password" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                        <input type="submit" name="sumbit" class="btn btn-primary" value="Submit" style="    margin-top: 26px;">
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
  </div>


<script type="text/javascript">
  $(document).ready(function() {
  //jQuery code goes here
  $('.validatedForm').validate({
      rules : {
        new_password : {
          minlength : 5
        },
        confirm_password : {
          minlength : 5,
          equalTo : "#new_password"
        }
      }
    });
});
</script>
@endsection

