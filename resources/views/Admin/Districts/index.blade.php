@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.ms_districts')}} </h2>
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
          <div class="col-sm-8">
            <div class="card-box ">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{trans('language.th_districts_no')}}  </th>
                    <th>{{trans('language.th_districts_name_en')}}  </th>
                    <th>{{trans('language.th_districts_name_mar')}}  </th>
                    <th>{{trans('language.th_districts_action')}}  </th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($districts))
                  <?php $i=1;?>
                  @foreach($districts as $temp)
                  <tr>
                    <td >{{$i++}}</td>
                    <td class="dist_name_en_{{$temp->dsitrict_id}}">{{$temp->district_name_en}}</td>
                    <td class="dist_name_mar_{{$temp->dsitrict_id}}">{{$temp->district_name_mar}}</td>
                    <td>
                      <button type="button" class="btn btn-info" onclick="editDistrict('{{$temp->dsitrict_id}}')"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" onclick="deleteDistrict('{{$temp->dsitrict_id}}')"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <h2>{{trans('language.form_districts')}}</h2>
              <form class="form-group" >
                {{csrf_field()}}
                <input type="hidden" name="district_id" id="district_id" value="0">
                <label>{{trans  ('language.th_districts_name_en')}}</label>
                <input class="form-control" type="text" name="district_name_en" id="district_name_en">
                <br>
                <label>{{trans('language.th_districts_name_mar')}}</label>
                <input class="form-control" type="text" name="district_name_mar" id="district_name_mar">
                <br>
                <button type="button" class="btn btn-success" onclick="saveDistricts()">{{trans('language.btn_save')}}</button>
                <button type="button" class="btn btn-secondary" onclick="clearDistricts();">{{trans('language.btn_cancel')}}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function saveDistricts(){
  if($('#district_name_en').val()){
    if($('#district_id').val() == 0){
      $.post("districts",{"_token": "{{ csrf_token() }}",district_name_mar:$('#district_name_mar').val(),district_name_en:$('#district_name_en').val()}, function( data ) {
        location.reload();
      });
    }else {
      $.post("districts/PUT",{"_token": "{{ csrf_token() }}","_method":"PUT",'district_id':$('#district_id').val(),district_name_mar:$('#district_name_mar').val(),district_name_en:$('#district_name_en').val()}, function( data ) {
        location.reload();
      });
    }
  }
}
function clearDistricts(){
  $('#district_id').val(0);
  $('#district_name_en').val('');
  $('#district_name_mar').val('');
}
function editDistrict(rowid){
  $('#district_id').val(rowid);
  $('#district_name_en').val($('.dist_name_en_'+rowid).text());
  $('#district_name_mar').val($('.dist_name_mar_'+rowid).text());

}
function deleteDistrict(rowid){

  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
  swal({
      title: "Are you sure?",
      // text: "But you will still be able to retrieve this file.",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel please!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm){
      if (isConfirm) {
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: "districts.destroy",
          type: 'POST',
          data: {cat_id:catid, "_method": 'DELETE'},
          dataType: 'JSON',
          success: function (data) {
          swal("Success", "District deleted successfully :)", "success");

        }});
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
  });
}
</script>
@endsection
