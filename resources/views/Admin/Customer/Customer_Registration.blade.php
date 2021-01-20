@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
         <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                    <div class="x_title">
                          <h2>कर्मचाऱ्यांची  मुळ माहिती </h2>
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
                        <form   class="validatedForm" action="{{url('/Custmoer_Insert_Data')}}"       method="POST"  enctype="multipart/form-data" id="cform"  novalidate>
                              {{csrf_field()}}
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align"> भ. नि .नि. क्रमांक <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                   <!--  <input class="form-control" class='optional ' id="gpf_no" name="gpf_no" data-validate-length-range="5,15" type="text" /> -->

                                        <input id="gpf_no" type="text" class="form-control @error('gpf_no') is-invalid @enderror" name="gpf_no" value="{{ old('gpf_no') }}" required autocomplete="gpf_no" autofocus placeholder="Enter The GPF Number">
 
                                      @error('gpf_no')
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
                                    @foreach($department as $k => $v)
                                        <option value="{{$v->department}}">{{$v->department}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align"> नाव   <span class="required"></span></label>
                              <div class="col-md-6 col-sm-6">
                                  <input class="form-control" type="text" id="name" class='number' name="name" data-validate-minmax="10,100" required='required ' readonly></div>
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
                              <label class="col-form-label col-md-3 col-sm-3  label-align">वर्गीकरण  <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="classification" id="classification"class='classification'>
                                       <option value="">-- निवडा वर्गीकरण --</option>
                                    @foreach ($classification as $temp)
                                    <option value="{{$temp->classification}}">{{$temp->classification}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">जन्म  दिनांक  <span class="required"></span></label>
                              <div class="col-md-6 col-sm-6">
                                  <input class="form-control" class='date' type="date" id="date_birth" name="date_birth" required='required'>
                              </div>
                            </div>
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">  रुजू  दिनांक <span class="required"></span></label>
                              <div class="col-md-6 col-sm-6">
                                  <input class="form-control" class='date' type="date"  id="date_dated" name="date_dated" required='required'>
                              </div>
                            </div>
                           <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align"> सेवानिवृती दिनांक <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                  <input class="form-control" class='date' type="date" id="retirement_date" name="retirement_date" required='required'>
                                   @error('retirement_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                               <label class="col-form-label col-md-3 col-sm-3  label-align">बँकेत नाव <span class="required"></span></label>
                               <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="bank_name" class='bank_name'>
                                      <option value="">-- निवडा बँकेत --</option>
                                    @foreach ($master as $temp)
                                    <option>{{$temp->bank_name}}</option>
                                    @endforeach
                                    </select>
                                      @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align"> शाखा  <span class="required"></span></label>
                              <div class="col-md-6 col-sm-6">
                                  <input class="form-control" class='date' type="text" name="branch" required='required'>
                                    @error('branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                            </div>
                            <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align"> आय. एफ.एस.सी.कोड  <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='date' type="text" name="IFSC_code" required='required'>
                                 @error('IFSC_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                            </div>
                            </div>
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align"> खाते क्रमांत  <span class="required"></span></label>
                              <div class="col-md-6 col-sm-6">
                                  <input class="form-control" class='date' type="text"  id="account_no" name="account_no" required='required'>
                                   @error('account_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                            </div>
                             <div class="ln_solid"></div>
                             <div class="item form-group">
                                 <div class="col-md-6 col-sm-6 offset-md-3">
                                      <button type="submit" class="btn btn-success"> <i class="fa fa-floppy-o"></i> Save </button>
                                      
                                  </div>
                             </div>
                        </form>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                             <div class="card-box table-responsive">
                                  <table id="datatable" class="table   
                                       table-striped table-bordered table-responsive" style="width:100%">
                                         <thead>
                                          <tr>
                                          <th> क्रं </th>
                                            <th>भ.नि .नि क्रमांक </th>
                                            <th>तालुका  संकेतांक </th>
                                            <th>विभाग संकेतांक</th>
                                            <th>नाव </th>
                                            <th>पदनाम </th>
                                            <th>वर्गीकरण </th>
                                            <th>जन्म  दिनांक </th>
                                            <th> रुजू  दिनांक </th>
                                            <th>  सेवानिवृती दिनांक </th>
                                            <th>बँकेत नाव</th>
                                            <th>शाखा </th>
                                            <th>आय .एफ .एस.सी .कोड</th>
                                            <th> खाते क्रमांत</th>
                                            <th>Action</th>
                                          </tr>
                                         </thead>
                                         <tbody>
                                            @if(count($customers))
                                             @foreach($customers as $customer)
                                             <tr  id="{{$customer->id}}">
                                               <td>{{$loop->index+1}}</td>
                                               <td>{{$customer->gpf_no}}</td>
                                               <td>{{$customer->taluka}}</td>
                                               <td>{{$customer->department}}</td>
                                               <td>{{$customer->name}}</td>
                                               <td>{{$customer->designation}}</td>
                                               <td>{{$customer->classification}}</td>
                                               <td>{{$customer->date_birth}}</td>
                                               <td>{{$customer->date_dated}}</td>
                                               <td>{{$customer->retirement_date}}</td>
                                               <td>{{$customer->bank_name}}</td>
                                               <td>{{$customer->branch}}</td>
                                               <td>{{$customer->IFSC_code}}</td>
                                               <td>{{$customer->account_no}}
                                               </td>
                                               <td>
                                                  <a href="{{url('Customer_Edit',[$customer->id])}}"> 
                                                  <button type="button" class="btn btn-info" data-toggle="modal"
                                                  data-target=""><i class="fa fa-edit"></i> </button></a>
                                              
                                                  <button class="btn btn-danger btn-flat btn-sm remove-user"
                                                   data-id="{{ $customer->id }}" data-action="{{ url('Customer_Delete',$customer->id) }}" onclick="deleteConfirmation({{$customer->id}})"> <i class="fa fa-trash"></i> 
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
  //jQuery code goes here
  $('.validatedForm').validate({
        rules : {
            classification: {
                  required: true,
            },
            gpf_no: {
                required: true,
                digits: "required",
            },
            taluka:"required",
            department:"required",
            name:"required",
            designation:"required",
            date_of_birthday:"required", 
            date_birth:"required", 
            retirement_date:"required", 
            bank_name:"required",
            branch:"required",
            IFSC_code:"required",
             account_no: 
            {
                required: true,
                digits: "required",
            },
        },
        messages: {
            classification:"Plese Select Classification",
             gpf_no: {
             required: "Please Enter gpf Number",
            }, 
             taluka: " Please Select Taluka",
             department: " Please Select Department",
             name:" Please Enter The Name",
             designation: " Please Select designation",
             date_of_birthday:"Please Enter Birthday Date", 
             date_birth:" Please Enter Resume Date", 
             retirement_date:" Please Enter Retirement  Date", 
             bank_name:" Please Enter The Blank Name",
             branch:"Please Enter The Branch Name",
             IFSC_code:"Please Enter IFSC code",
             account_no: {
                 required: " Please Enter Account Number",
            },
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
                    url: "{{url('/Customer_Delete')}}/" + id,
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
   $('#gpf_no').on('change', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).val();

 $.ajax({
            url: "{{url('Customer_new')}}" ,
            type: 'post',
            data: {_token: CSRF_TOKEN,'id':id},
            success: function(data)
            {  

              var obj = $.parseJSON(data);

              if(obj.userdata){
              $('#taluka').val(obj.userdata[0].taluka);
              $('#department').val(obj.userdata[0].department);
              $('#designation').val(obj.userdata[0].designation);
              $('#date_birth').val(obj.userdata[0].date_of_birthday);
              $('#date_dated').val(obj.userdata[0].date_birth);
              $('#retirement_date').val(obj.userdata[0].date_dated);
              $('#account_no').val(obj.userdata[0].account_no);
              $('#name').val(obj.userdata[0].name);
              $('#classification').val(obj.userdata[0].classification);
              // $('#classification')val(obj.userdata[0].classification);
             
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