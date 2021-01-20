@extends('Section.app')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
         <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                    <div class="x_title">
                          <h2>खाते बंद करणे </h2>
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
                        <form  class="validatedForm" action="{{url('/account_Insert_Data')}}"       method="POST"  enctype="multipart/form-data" id="cform"  novalidate>
                              {{csrf_field()}}
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align"> भ. नि .नि. क्रमांक <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional ' id="gpf_no" name="gpf_no" data-validate-length-range="5,15" type="text" />
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
                              <label class="col-form-label col-md-3 col-sm-3  label-align">व्याज देय महिना   <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="month_interest_payable"  id="month_interest_payable"class='month_interest_payable'>
                                      <option value="">-- निवडा महिना --</option>

                                    @foreach ($Month as $temp)
                                    <option value="{{$temp->name}}">{{$temp->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">अंतिम देय  वर्ष   <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                  @php
                                      $currently_selected = date('Y'); 
                                      $earliest_year = 2020; 
                                      $latest_year = date('Y'); 
                                      @endphp
                                      <select name="last_due_year" class="form-control year">
                                        <option value="">-- निवडा वर्ष --</option>
                                        <?php 
                                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                            }
                                            
                                        ?>
                                     </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">७ पाय  व्याज महिना    <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="feet_interest_payable_month"  id="feet_interest_payable_month"class='feet_interest_payable_month'>
                                            <option value="">-- निवडा महिना --</option>
                                    @foreach ($Month as $temp)
                                    <option value="{{$temp->name}}">{{$temp->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">७ पाय व्याज देय वर्ष <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                  @php
                                      $currently_selected = date('Y'); 
                                      $earliest_year = 2020; 
                                      $latest_year = date('Y'); 
                                      @endphp
                                      <select name="feet_interest_payable_year" class="form-control year">
                                              <option value="">-- निवडा वर्ष --</option>
                                        <?php 
                                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                            }
                                            
                                        ?>
                                     </select>
                                </div>
                            </div>
                             <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">अंतिम  वर्गणी  महिना<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="last_subscription_month" id="last_subscription_month"class='last_subscription_month'>
                                            <option value="">-- निवडा महिना --</option>
                                    @foreach ($Month as $temp)
                                    <option value="{{$temp->name}}">{{$temp->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="field item form-group">
                              <label class="col-form-label col-md-3 col-sm-3  label-align">अंतिम वर्गणी वर्ष   <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                  @php
                                      $currently_selected = date('Y'); 
                                      $earliest_year = 2020; 
                                      $latest_year = date('Y'); 
                                      @endphp
                                      <select name="last_subscription_year" class="form-control year">
                                        <option value="">-- निवडा वर्ष --</option>
                                        <?php 
                                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                            }
                                            
                                        ?>
                                     </select>
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
                                            <th>व्याज देय महिना  </th>
                                            <th>अंतिम देय  वर्ष </th>
                                            <th> ७ पाय  व्याज महिना  </th>
                                            <th>  ७ पाय व्याज देय वर्ष  </th>
                                            <th>अंतिम  वर्गणी  महिना </th>
                                            <th>अंतिम वर्गणी वर्ष   </th>
                                         
                                            <th>Action</th>
                                          </tr>
                                         </thead>
                                         <tbody>
                                            @if(count($Accounts))
                                             @foreach($Accounts as $temp)
                                             <tr  id="{{$temp->id}}">
                                               <td>{{$loop->index+1}}</td>
                                               <td>{{$temp->gpf_no}}</td>
                                               <td>{{$temp->taluka}}</td>
                                               <td>{{$temp->department}}</td>
                                               <td>{{$temp->name}}</td>
                                               <td>{{$temp->designation}}</td>
                                               <td>{{$temp->month_interest_payable}}</td>
                                               <td>{{$temp->last_due_year}}</td>
                                               <td>{{$temp->feet_interest_payable_month}}</td>
                                               <td>{{$temp->feet_interest_payable_year}}</td>
                                               <td>{{$temp->last_subscription_month}}</td>
                                               <td>{{$temp->last_subscription_year}}</td>
                                               </td>
                                               <td>
                                                 <!--  <a href="{{url('temp_Edit',[$temp->id])}}"> 
                                                  <button type="button" class="btn btn-info" data-toggle="modal"
                                                  data-target=""><i class="fa fa-edit"></i> </button></a>
                                               -->
                                                  <button class="btn btn-danger btn-flat btn-sm remove-user"
                                                   data-id="{{ $temp->id }}" data-action="{{ url('account_Delete',$temp->id) }}" onclick="deleteConfirmation({{$temp->id}})"> <i class="fa fa-trash"></i> 
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
                    url: "{{url('/account_Delete')}}/" + id,
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
            url: "{{url('account_new')}}" ,
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
             
              }else{
                  alert("This number is not exist");
                $("#cform")[0].reset();
             
                return false;
          
              }
            }
        });
 
});
     $('.validatedForm').validate({
        rules : {
            vetan:"required",
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
            month_interest_payable:"required",
            last_due_year:"required",
            feet_interest_payable_month:"required",
            feet_interest_payable_year:"required",
            last_subscription_month:"required",
            last_subscription_year:"required",
            
        },
        messages: {
             vetan:"Plese Select vetan",
            classification:"Plese Select Classification",
             gpf_no: {
             required: "Please Enter gpf Number",
            }, 
             taluka: " Please Select Taluka",
             department: " Please Select Department",
             name:" Please Enter The Name",
             designation: " Please Select designation",
             month_interest_payable: " Please Select Month of interest payable",
             last_due_year: " Please Select Last due year",
             feet_interest_payable_month: " Please Select 7 feet interest month",
             feet_interest_payable_year: " Please Select 7 feet interest payable year",
             last_subscription_month: " Please Select Last subscription month",
             last_subscription_year: " Please Select Last subscription year",
            
         }
    });

</script>

 @endsection