@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="skype">
          <h2>{{'वेतन आयोग फाइल अपलोड'}} </h2>
        </div>
        <div class="x_content">
          <div class="row">
            <table id="listViewTable" class="table table-striped table-bordered" style="width:100% !important">
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>GPF No</th>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Vetan Ayog</th>
                  <th>Differnace Amount</th>
                  <th>Intrest</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if(count($vetandatalist))
                  @foreach($vetandatalist AS $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->GPFNo}}</td>
                    <td>{{$value->Year}}</td>
                    <td>{{getMonthName($value->Mnt)}}</td>
                    <td>{{$value->pay_number.' वेतन आयोग'}}</td>
                    <td>{{$value->TotDiff}}</td>
                    <td>{{$value->Interest}}</td>
                    <td><button onClick="deleteVetanEntry({{$value->TransId}})" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</button></td>
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
<script>
$(document).ready(function() {
  $('#listViewTable').DataTable();
});
function deleteVetanEntry(Transid){
  swal({
    title: "Delete?",
    text: "Please and then confirm!",
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
        url: "deleteVetan/" + Transid,
        data: {_token: CSRF_TOKEN},
        dataType: 'JSON',
        success: function (results) {
          swal(results.status,results.message);
          fileDataTable.ajax.reload();
        }
      });
    } else {
      e.dismiss;
    }
  }, function (dismiss) {
    return false;
  });
}
</script>
@endsection
