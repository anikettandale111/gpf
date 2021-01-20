@extends('Section.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{trans('language.ms_reasons')}} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
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
            <div class="card-box ">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{trans('language.th_reasons_no')}}  </th>
                    <th>{{trans('language.th_reasons_name_en')}}  </th>
                    <th>{{trans('language.th_reasons_name_mar')}}  </th>
                    <th>{{trans('language.th_reasons_description_en')}}  </th>
                    <th>{{trans('language.th_reasons_description_mar')}}  </th>
                    <th>{{trans('language.th_reasons_action')}}  </th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($reasons))
                  <?php $i=1;?>
                  @foreach($reasons as $temp)
                  <tr>
                    <td >{{$i++}}</td>
                    <td class="reason_name_en_{{$temp->cr_id}}">{{$temp->reason_name_en}}</td>
                    <td class="reason_name_mar_{{$temp->cr_id}}">{{$temp->reason_name_mar}}</td>
                    <td class="reason_description_en_{{$temp->cr_id}}">{{$temp->reason_description_en}}</td>
                    <td class="reason_description_mar_{{$temp->cr_id}}">{{$temp->reason_description_mar}}</td>
                    <td>
                      <button type="button" class="btn btn-info" onclick="editReasons('{{$temp->cr_id}}')"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" onclick="deleteReasons('{{$temp->cr_id}}')"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          </div>
          <div class="form-group">
            <h2>{{trans('language.form_reasons')}}</h2>
            <form class="form-group" >
              {{csrf_field()}}
              <input type="hidden" name="cr_id" id="cr_id" value="0">
              <label>{{trans  ('language.th_reasons_name_en')}}</label>
              <input class="form-control" type="text" name="reason_name_en" id="reason_name_en">
              <br>
              <label>{{trans('language.th_reasons_name_mar')}}</label>
              <input class="form-control" type="text" name="reason_name_mar" id="reason_name_mar">
              <br>
              <label>{{trans  ('language.th_reasons_description_en')}}</label>
              <input class="form-control" type="text" name="reason_description_en" id="reason_description_en">
              <br>
              <label>{{trans('language.th_reasons_description_mar')}}</label>
              <input class="form-control" type="text" name="reason_description_mar" id="reason_description_mar">
              <br>
              <button type="button" class="btn btn-success" onclick="saveReasons()">{{trans('language.btn_save')}}</button>
              <button type="button" class="btn btn-secondary" onclick="clearReasons();">{{trans('language.btn_cancel')}}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function saveReasons(){
  if($('#reason_name_en').val()){
    if($('#cr_id').val() == 0){
      $.post("commonreasons",{"_token": "{{ csrf_token() }}",reason_name_mar:$('#reason_name_mar').val(),reason_name_en:$('#reason_name_en').val(),reason_description_en:$('#reason_description_en').val(),reason_description_mar:$('#reason_description_mar').val()}, function( data ) {
        location.reload();
      });
    }else {
      $.post("commonreasons/PUT",{"_token": "{{ csrf_token() }}","_method":"PUT",'cr_id':$('#cr_id').val(),reason_name_mar:$('#reason_name_mar').val(),reason_name_en:$('#reason_name_en').val(),reason_description_en:$('#reason_description_en').val(),reason_description_mar:$('#reason_description_mar').val()}, function( data ) {
        location.reload();
      });
    }
  }
}
function clearReasons(){
  $('#cr_id').val(0);
  $('#reason_name_en').val('');
  $('#reason_name_mar').val('');
}
function editReasons(rowid){
  $('#cr_id').val(rowid);
  $('#reason_name_en').val($('.reason_name_en_'+rowid).text());
  $('#reason_name_mar').val($('.reason_name_mar_'+rowid).text());
  $('#reason_description_en').val($('.reason_description_en_'+rowid).text());
  $('#reason_description_mar').val($('.reason_description_mar_'+rowid).text());
}
function deleteReasons(rowid){
  if(confirm('Are you sure to delete this ?')){
    $.post("commonreasons/destroy",{"_token": "{{ csrf_token() }}","_method":"DELETE",'cr_id':rowid}, function( data ) {
      location.reload();
    });
  }
}
</script>
@endsection
