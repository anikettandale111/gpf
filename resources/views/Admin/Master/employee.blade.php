@extends('Section.app')
@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class=" mt-3">
          <h2>{{trans('language.menu_bill_reports')}}</h2>
        </div>
        <div class="x_content">
          <div class="row">
            <table id="employeeTable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <td>Sr.No.</td>
                  <td>GPF No.</td>
                  <td>Employee Name</td>
                  <td>Taluka</td>
                  <td>Designation</td>
                  <td>Department</td>
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

@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{URL('js/employee.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
  getEmployeeDetails();
})
</script>
@endpush
