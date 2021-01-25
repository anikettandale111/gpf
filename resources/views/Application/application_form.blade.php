@extends('Section.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>कर्मचाऱ्याने कार्यालय  प्रमुखास अर्ज करणे </h2>
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
                    <form method="POST" class="validatedForm" action="{{ url('ganrate_insert_no') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="b_no" class="col-md-4 col-form-label text-md-right"> खाते  उतारा </label>
                               <div class="col-md-4">
                                <input id="b_no" type="texy " class="form-control @error('b_no') is-invalid @enderror" name="b_no" value="{{ old('b_no') }}" required autocomplete="b_no" autofocus placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="b_no" class="col-md-4 col-form-label text-md-right"> बँक खात्याचे तपशील  </label>
                               <div class="col-md-4">
                                <input id="b_no" type="file" class="form-control @error('b_no') is-invalid @enderror" name="b_no" value="{{ old('b_no') }}" required autocomplete="b_no" autofocus placeholder="">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="b_no" class="col-md-4 col-form-label text-md-right">{{trans('language.th_providing_b_n_n_no')}}</label>
                               <div class="col-md-4">
                                <input id="b_no" type="text" class="form-control @error('b_no') is-invalid @enderror" name="b_no" value="{{ old('b_no') }}" required autocomplete="b_no" autofocus placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="b_no" class="col-md-4 col-form-label text-md-right">कर्मचाऱ्याचा अर्ज  </label>
                               <div class="col-md-4">
                                <input id="b_no" type="text" class="form-control @error('b_no') is-invalid @enderror" name="b_no" value="{{ old('b_no') }}" required autocomplete="b_no" autofocus placeholder="">
                            </div>
                        </div>

                       <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{trans('language.btn_save')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="x_panel">
                    <div class="">
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
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                               <tr>
                                                  <th> {{trans('language.th_providing_no')}} </th>
                                                  <th> {{trans('language.th_providing_classification')}} </th>
                                                  <th> {{trans('language.th_providing_b_n_n_no')}} </th>
                                                  <th> {{trans('language.th_providing_taluka')}} </th>
                                                  <th> {{trans('language.th_providing_department')}} </th>
                                                  <th> {{trans('language.th_providing_name')}} </th>
                                                  <th> {{trans('language.th_providing_designation')}} </th>
                                                  <th> {{trans('language.th_providing_account_no')}} </th>
                                                  <th> {{trans('language.th_providing_date_of_birth')}} </th>
                                                  <th> {{trans('language.th_providing_date_dated')}} </th>
                                                  <th> {{trans('language.th_providing_date_of_retirement')}} </th>
                                                  <th> {{trans('language.th_providing_letter_no')}} </th>
                                                   <th> {{trans('language.btn_action')}} </th>

                                              </tr>
                                          </thead>
                                           <tbody>


                                          </tbody>
                                    </table>
                               </div>
                          </div>
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
            classification: {
                  required: true,
            },
            b_no: {
                required: true,
                digits: "required",
            },
            taluka:"required",
            department:"required",
            name:"required",
            designation:"required",
             account_no:
            {
                required: true,
                digits: "required",
            },
            date_of_birthday:"required",
            date_birth:"required",
            date_dated:"required",
            c_v_letter:"required",
            yes:"required",
        },
        messages: {
              classification:"Plese Select Classification",
              b_no: {
               required: "Please Enter gpf Number",
            },
             taluka: "Plese Select Taluka",
             department: "Plese Select Department",
             name:"Plese Enter The Name",
             designation: "Plese Select designation",
               account_no: {
                 required: "Please Enter Account Number",
            },
              date_of_birthday:"Please Enter Birthday Date",
              date_birth:"Please Enter Resume Date",
              date_dated:"Please Enter Retirement  Date",
              c_v_letter:"Please Enter C .v .a / c .shi. Letter no. Of PNS taluka ",
              yes:" Want to provide account number?",
        }
    });

});

  function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please    and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0

        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/ganrate_Delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                      $('#'+results.id).remove();
                    }

                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

    }
       $('.mySelect').on('change', function() {
  var value = $(this).val();
  if(value == 'शिक्षक')
  {
    gpf = "p";
  }
  else
  {
    gpf = "o";
  }
  $('.gpf_number').val(gpf);
});
</script>


@endsection
