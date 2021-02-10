@extends('Section.app')

@section('content')

<div class="">
    <div class="clearfix"></div>
      <div class="row">
           <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                 <div class="x_title">
                          <h2>नामनिर्दशन नोंद ( वर्ग / जिल्हाबदली) </h2>
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
                        <form   class="validatedForm"action="  {{url('nomination_insert_data')}}"method="POST"  enctype="multipart/form-data"  id="cform"novalidate>
                                            {{csrf_field()}}
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> भ. नि .नि. क्रमांक <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='optional'  id="p_no"name="p_no" data-validate-length-range="5,15" type="text" />

                                        @error('p_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                  </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">तालुका संकेतांक<span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                     <select class="form-control" name="taluka" id="taluka" class='email' readonly>
                                      <option value="">-- निवडा तालुका --</option>
                                    @foreach ($taluka as $temp)
                                    <option value="{{$temp->name}}">{{$temp->name}}</option>
                                    @endforeach
                                    </select>

                                   </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">विभाग संकेतांक <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">

                                    <select class="form-control" id="department" name="department" class='email'>
                                         <option value="">-- निवडा विभाग --</option>

                               @foreach ($department as $temp)
                                    <option value="{{$temp->department}}">{{$temp->department}}</option>
                                    @endforeach
                               </select>

                               </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> नाव   <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" class='number' id="name" name="name" data-validate-minmax="10,100" required='required'></div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">पदनाम <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">


                                    <select class="form-control" name="designation" id="designation" class='designation'>
                                         <option value="">-- निवडा पदनाम --</option>
                                    @foreach ($designation as $temp)
                                    <option value="{{$temp->designation}}">{{$temp->designation}}</option>
                                    @endforeach
                                    </select>

                                   </div>
                              </div>
                               <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">अर्जदाराचा अर्ज दि  <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="application_date" required='required'>
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> ग .वि .अ/ ग .शि. अ .पं.स तालुका यांचे पत्र क्रं <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='optional' id="letter_no" name="letter_no" data-validate-length-range="5,15" type="text" />
                                  </div>
                              </div>
                               <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> मा .मु का .अ/ जि प यांचे आदेश क्रं  <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="text" name="order_no" required='required'>
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> विभाग /पंचायत  समिती  कार्यमुक्त  क्रं<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                   <input class="form-control" class='date' type="textarea" name="dismissal_no" required='required'>
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> बदलीचे / पदोन्नची  कार्यालय  <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="text" name="office_transfer" required='required'>
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> च्या  नावे  धनाकर्ष   <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="text" name="money_name" required='required'>
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> बदलीच्या कार्यालयाकडील भ. नि . नि . क्रं  <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="text" name="replacement_p_no" required='required'>
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> प्रत १  <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                 <textarea  class="form-control" class='date' type="text" name="carbin_copy_a" required='required'></textarea>

                                   @error('carbin_copy_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> प्रत २<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                 <textarea  class="form-control" class='date' type="text" name="carbin_copy_b" required='required'></textarea>
                                  @error('carbin_copy_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> प्रत ३ <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                 <textarea  class="form-control" class='date' type="text" name="carbin_copy_c" required='required'></textarea>
                                  @error('carbin_copy_c')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"> अंतिमाचे प्रयोजन <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">

                                        <input type="text" name="last_purpose" class="form-control @error('last_purpose') is-invalid @enderror" id="last_purpose" value="{{ old('last_purpose') }}" required autocomplete="last_purpose" autofocus>


                                     @error('last_purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror

                                </div>
                              </div>
                              <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">वर्ग / जिल्हाबदली  दि  <span class="required"></span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='date' type="date" name="district_transfer_date" required='required'>
                                  </div>
                              </div>
                               <div class="ln_solid"></div>
                               <div class="item form-group">
                                  <div class="col-form-label col-md-9 col-sm-3  label-align">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save </button>

                                  </div>
                              </div>
                       </form>
                    </div>
                  <div class="x_content">
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="card-box table-responsive">
                                 <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                      <thead>
                                        <tr>
                                        <th> क्रं </th>
                                          <th>भ.नि .नि क्रमांक </th>
                                          <th>तालुका  संकेतांक </th>
                                          <th>विभाग संकेतांक</th>
                                          <th>नाव </th>
                                          <th>पदनाम </th>
                                          <th>अर्जदाराचा अर्ज दि . </th>
                                          <th>ग .वि .अ/ ग .शि. अ .पं.स तालुका  यांचे  पत्र  क्रं</th>
                                          <th>मा .मु का .अ/ जि प यांचे आदेश क्रं</th>
                                          <th>विभाग /पंचायत  समिती  कार्यमुक्त  क्रं</th>
                                          <th>बदलीचे / पदोन्नची  कार्यालय </th>
                                          <th>च्या  नावे  धनाकर्ष </th>
                                          <th>बदलीच्या कार्यालयाकडील भ.नि .नि.क्रं </th>
                                          <th>प्रत १ </th>
                                          <th>प्रत  २ </th>
                                          <th>प्रत  ३ </th>
                                          <th>अंतिमाचे प्रयोजन </th>
                                          <th>वर्ग / जिल्हाबदली  दि </th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                     <tbody>
                                        @if(count($nomination))
                                            @foreach($nomination as $temp)
                                            <tr id="{{$temp->id}}">
                                               <td>{{$loop->index+1}}</td>
                                               <td>{{$temp->p_no}}</td>
                                               <td>{{$temp->taluka}}</td>
                                               <td>{{$temp->department}}</td>
                                               <td>{{$temp->name}}</td>
                                               <td>{{$temp->designation}}</td>
                                               <td>{{$temp->application_date}}</td>
                                               <td>{{$temp->letter_no}}</td>
                                               <td>{{$temp->order_no}}</td>
                                               <td>{{$temp->dismissal_no}}</td>
                                               <td>{{$temp->office_transfer}}</td>
                                               <td>{{$temp->money_name}}</td>
                                               <td>{{$temp->replacement_p_no}}</td>
                                               <td>{{$temp->carbin_copy_a}}</td>
                                               <td>{{$temp->carbin_copy_b}}</td>
                                               <td>{{$temp->carbin_copy_c}}</td>
                                               <td>{{$temp->last_purpose}}</td>
                                               <td>{{$temp->district_transfer_date}}</td>
                                               <td>
                                                    <button class="btn btn-danger btn-flat btn-sm remove-user"
                                                   data-id="{{ $temp->id }}" data-action="{{ url('nomination_Delete',$temp->id) }}" onclick="deleteConfirmation('{{$temp->id}}')"> <i class="fa fa-trash"></i>
                                                 </button>

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
              </div>
         </div>
     </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.validatedForm').validate({
        rules : {
            classification: {
                  required: true,
            },
            p_no: {
                required: true,
                digits: "required",
            },
            taluka:"required",
            department:"required",
            name:"required",
            designation:"required",
            date_of_birthday:"required",
            date_birth:"required",
            application_date:"required",
            dismissal_no:"required",
            office_transfer:"required",
            letter_no:"required",
            order_no:"required",
            money_name: "required",
            replacement_p_no:"required",
            carbin_copy_a:"required",
            carbin_copy_b:"required",
            carbin_copy_c:"required",
            last_purpose:"required",
            district_transfer_date:"required",
        },
        messages: {
            classification:"Plese Select Classification",
             p_no: {
             required: "Please Enter gpf Number",
            },
             taluka: " Please Select Taluka",
             department: " Please Select Department",
             name:" Please Enter The Name",
             designation: " Please Select designation",
             date_of_birthday:"Please Enter Birthday Date",
             date_birth:" Please Enter Resume Date",
             application_date:" Please Enter Application  Date",
             dismissal_no:" Please Enter Department / Panchayat Samiti Dismissal No.",
             letter_no:"Please Enter C .v .a / c .shi. Letter no. Of PNS taluka ",
             office_transfer:"Please Enter The Office of Transfer / Promotion",
             order_no:"Please Enter Order No ",
             money_name:" Please Enter Money in the name of",
             replacement_p_no:" Please Enter B. from the transfer office. Ni. Ni. No.",
             carbin_copy_a:" Please Enter Copy 1 ",
             carbin_copy_b:" Please Enter Copy 2",
             carbin_copy_c:" Please Enter Copy 3",
             last_purpose:"Please Enter The Ultimate Purpose",
              district_transfer_date:"Please Enter Class / district transfer Date",

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
                    url: "{{url('/nomination_Delete')}}/" + id,
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
  $('#p_no').on('change', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).val();


 $.ajax({
            url: "{{url('nomination_rerd')}}" ,
            type: 'post',
            data: {_token: CSRF_TOKEN,'id':id},
            success: function(data)
            {
              var obj = $.parseJSON(data);
              if(obj.userdata){
                  $('#taluka').val(obj.userdata[0].taluka);
                  $('#department').val(obj.userdata[0].department);
                  $('#designation').val(obj.userdata[0].designation);
                  $('#letter_no').val(obj.userdata[0].c_v_letter);
                  $('#name').val(obj.userdata[0].name);
              }else{
                 alert("This number is not exist");
                $("#cform")[0].reset();

                return false;
              }
            }
        });

});



</script>
   @endsection
