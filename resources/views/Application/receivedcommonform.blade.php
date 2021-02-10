@extends('Section.app')

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{trans('language.fr_common_application_form_list')}}</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <a href="{{url('commonforms')}}" class="btn btn-primary">{{trans('language.fr_common_new_application')}}</a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>{{trans('language.fr_common_app_number')}}</th>
                <th>{{trans('language.fr_common_application_form_number')}}</th>
                <th>{{trans('language.fr_common_gpf_no')}}</th>
                <th>{{trans('language.fr_common_user_name')}}</th>
                <th>{{trans('language.fr_common_user_designation')}}</th>
                <th>{{trans('language.fr_common_user_type_of_request')}}</th>
                <th>{{trans('language.fr_common_app_date')}}</th>
                <th>{{trans('language.btn_action')}}</th>
              </tr>
            </thead>
            <tbody>
              @if(count($applicationsList))
                @php $i=1; @endphp
                @foreach($applicationsList as $applist)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$applist->application_number}}</td>
                  <td>{{$applist->gpf_no}}</td>
                  <td>{{$applist->user_name}}</td>
                  <td>{{$applist->user_designation}}</td>
                  <td>{{$applist->application_type}}</td>
                  <td>{{date('d-m-Y',strtotime($applist->created_at))}}</td>
                  <td><a href="{{url('viewapplication')}}/{{$applist->app_form_id}}" class="btn btn-info">View</a><button class="btn btn-warning">Update</button></td>
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
  @endsection
  @push('custom-scripts')
  <script type="text/javascript" src="{{URL('js/common-forms.js')}}"></script>
  @endpush
