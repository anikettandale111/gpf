@extends('Section.app')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Roles Managment </h2>
        @can('role-create')
            <span class="float-right">
                <a class="btn btn-primary" href="{{url('roles/create')}}">New Role</a>
            </span>
        @endcan
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
                    <th># </th>
                    <th>Role Name</th>                   
                    <th>{{trans('language.th_districts_action')}}  </th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($data))
                  <?php $i=1;?>
                  @foreach ($data as $key => $role)
                  <tr>
                    <td >{{$i++}}</td>                    
                    <td class="dist_name_mar_{{$role->id}}">{{ $role->name }}</td>
                    <td>
                        @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                      
                      
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
              {{ $data->appends($_GET)->links() }}
            </div>
          </div>
         
          
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

