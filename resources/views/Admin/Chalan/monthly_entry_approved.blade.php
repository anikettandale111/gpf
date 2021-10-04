@extends('Section.app')

@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>चलन </h2>
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
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="monthly_approve_table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{trans('language.th_sr_no')}} </th>
                    <th>{{trans('language.th_trend_no')}}</th>
                    <th>{{trans('language.th_trend_s_no')}} </th>
                    <th>{{trans('language.th_trend_date')}} </th>
                    <th>{{trans('language.th_trend_taluka')}} </th>
                    <th>{{trans('language.th_trend_classification')}}  </th>
                    <th>{{trans('language.th_trend_the_amount_of_hearing')}} </th>
                    <th>{{trans('language.th_trend_total_waste')}}  </th>
                    <th>{{trans('language.th_user_shillak_rakkam')}}  </th>
                    <th>{{trans('language.th_trend_shera')}}</th>
                    <th>Status</th>
                    <th>{{trans('language.btn_action')}}</th>                  
                   
                  </tr>
                </thead>
               
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="sendapproval" action="{{url('chalan/approval')}}" method="POST" enctype="multipart/form-data" id="sendapproval">
        {{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve Challan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">       
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Chalan Details :</label>
            <input type="text" class="form-control" id="challandetails" name="challandetails">
          </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Note:</label>
            <textarea class="form-control" id="message-text" name="remark" id="remark"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="" id="id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-xl" id="exampleModaltable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Challan Enteries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">       
        
        <div class="card-box table-responsive">
        <table id="datatable_one" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th> क्रं </th>
              <th> वर्ष </th>
              <th> चलन नंबर </th>
              <th> तालुका</th>
              <th> भ.नि.नि.क्रमांक</th>
              <th> कर्मचारी नाव</th>
              <th> वर्गणी</th>
              <th> अग्रिम परतावा</th>
              <th> इतर</th>
              <th> ऐकूण </th>
              <th> तयार केलेलेच नाव </th>
              
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
       
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="" id="id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/master-monthly-chalan-approved.js')}}"></script>
<script>
  
  $(document).ready(function() {
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
    var challandetails = button.data('chalan') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(challandetails)
    modal.find('.modal-body #challandetails').val(challandetails)
    
    modal.find('.modal-footer #id').val(recipient)
  })
  $('#exampleModaltable').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
   //Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)      
    var table = $('#datatable_one').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        pageLength: '20',
        ajax: "chalan/getsubscriptions/"+recipient+"?_token="+ $('meta[name="csrf-token"]').attr('content'),
        columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'emc_year',
          name: 'Year'
        },
        {
          data: 'challan_number',
          name: 'Chalan Number'
        },
        {
          data: 'taluka_name',
          name: 'Taluka Name'
        },
        {
          data: 'gpf_number',
          name: 'GPF Number'
        },
        
        {
          data: 'employee_name',
          name: 'Employee Number'
        },
        {
          data: 'monthly_contrubition',
          name: 'Monthly Contrubition'
        },
        {
          data: 'loan_installment',
          name: 'Loan Installment'
        },
        {
          data: 'monthly_other',
          name: 'Other'
        },
        {
          data: 'monthly_received',
          name: 'Total'
        },
        {
          data: 'name',
          name: 'Name'
        }
      ]
    });
  })
  $('#sendapproval').validate({
    rules : {
      challandetails:"required",
      remark:"required",
      id:"required"
      
    },
    messages: {
      challandetails:"Please enter Challan details",
      remark: "Please enter Remark",
     
    },
    submitHandler: function(form) {
        form.submit();
        resetForm();
    }
  });
});

  </script>
@endpush
