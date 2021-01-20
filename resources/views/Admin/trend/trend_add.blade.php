@extends('Section.app')
@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        @if ($message = Session::get('danger_insert'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('success_insert'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('info_insert'))
        <div class="alert alert-info alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="x_title">
          <h2>चलन   </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form   class="validatedForm" action="{{url('deposit_Insert_Data')}}"method="POST"  enctype="multipart/form-data" novalidate>
            {{csrf_field()}}

            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="col-md-6 col-sm-3 ">
                    <label  for="Year"> वर्ष </label>
                    @php
                    $currently_selected = date('Y'); 
                    $earliest_year = 2020; 
                    $latest_year = date('Y'); 
                    @endphp
                    <select name="year" id="year" class="form-control">
                      <option value="">-- निवडा वर्ष --</option>
                    <?php 
                    foreach ( range( $latest_year, $earliest_year ) as $i ) {
                      echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                    }
                    
                    ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-3 ">
                  <label  for="first-name"> चलन क्रमांक </label>
                  <select type="text" id="Currency_number"  name="Currency_number" required="required" class="form-control ">
                    <option value="">-- निवडा चलन क्रमांक --</option>
                    @foreach ($Month as $temp)
                    <option>{{$temp->name}}</option>
                    @endforeach
                  </select>
                </div>
                
              </div>

              <div class="form-group col-md-6">
                <div class="col-md-6 col-sm-3 ">
                  <label></label>
                  <select type="text" id="trend_no" name="trend_no" required="required" class="form-control " style="margin-top: 7px;">
                     <option value="">-- निवडा  क्रमांक --</option>
                    @for($i=1; $i <= 300; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="form-group col-md-6">
                 <label for="middle-name">तालूका निवडा </label>
                 <select id="Select_taluka" class="form-control" type="text" name="Select_taluka">
                  <option value="">-- निवडा  तालूका --</option>
                  @foreach ($taluka as $temp)
                  <option>{{$temp->name}}</option>
                  @endforeach
                </select>
              </div>
              
            </div>  
            <div class="form-group col-md-6">
              <div class="form-group col-md-6">
                <label for="middle-name">वर्गीकरण </label>
                <select id="middle-name" class="form-control" type="text" name="Classification">
                  <option value="">-- निवडा  वर्गीकरण --</option>
                  @foreach ($classification as $temp)
                  <option>{{$temp->classification}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="middle-name">ऐकून रक्कम  </label>
                <input id="amount" class="form-control" type="number" name="amount">
              </div>

            </div>

            <div class="form-group col-md-6">
              <div class="col-md-6">
                <label for="middle-name">एकूण खलावली </label>

                <input id="middle-name" class="form-control" type="text" name="Total_waste" value="0">

              </div>
              <div class="col-md-6">
                <label for="middle-name">शेरा </label>
                <textarea id="Shera" class="form-control" type="text" name="Shera" cols="5" rows="2"></textarea>
              </div>
            </div>
            <div class="form-group col-md-12">
                <div style="margin-top:49px; float: right;">
                  <button class="btn btn-primary" type="button">Cancel</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>चलन   </h2>

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
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> क्रं </th>
                    <th>चलन क्रमांक </th>
                    <th>क्रमांक </th>
                    <th>चलन दिनांक </th>
                    <th>वर्गीकरण </th>
                    <th>एकूण खलावली</th>

                    <th>तालूका निवडा</th>
                    <th>ऐकून रक्कम  </th>
                    <th>  शेरा</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @if(count($deposits) != 0)
                 @foreach($deposits as $temp)
                  <tr id="{{$temp->id}}">
                  <td>{{$loop->index+1}}</td>
                  <td>{{$temp->Currency_number}} {{$temp->trend_no}}</td>
                  <td>{{$temp->primary_number}}</td>
                  <td>{{date('d-M-Y',strtotime($temp->created_at))}}</td>
                  <td>{{$temp->Classification}}</td>
                  <td>{{$temp->Total_waste}}</td>
                  <td>{{$temp->Select_taluka}}</td>
                  <td>{{$temp->amount}}</td>
                  <td>{{$temp->Shera}}</td>

                  <td>

                       <button class="btn btn-danger btn-flat btn-sm remove-user"data-id="{{ $temp->id }}" data-action="{{ url('deposit_Delete',$temp->id) }}"
                        onclick="deleteConfirmation({{$temp->id}})">
                         <i class="fa fa-trash"></i> </button>
                    

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
<script type="text/javascript">
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;
  document.getElementById('date').value = today;

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
                    url: "{{url('/deposit_Delete')}}/" + id,
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



</script>
<script>
    $(document).ready(function() {
     $('.validatedForm').validate({
        rules : {
            year:"required",
            classification: {
                  required: true,
            },
            gpf_no: {
                required: true,
                digits: "required",
            },
            Select_taluka:"required",
            department:"required",
            Classification:"required",
            designation:"required",
            amount:"required",
            trend_no:{
              required:true,
            },
            Shera:"required",
            Total_waste:"required",
           
        },
        messages: {
             year:"Plese Select Year",
            classification:"Plese Select Classification",
             gpf_no: {
             required: "Please Enter gpf Number",
            }, 
             Select_taluka: " Please Select Taluka",
             department: " Please Select Department",
             Classification:" Please Enter The classificationn",
             designation: " Please Select designation",
             amount:"Please Enter The Amount",
             trend_no:{
              required:"Enter The number",
             }
             Shera:"Please Enter The Shera",
             Total_waste:"Please Enter The Total Waste",
         }
    });
      });

</script>
@endsection
