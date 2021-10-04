

@extends('Section.app')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Permissions Management </h2>
        @can('role-create')
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('permissions.create') }}">New Permissions</a>
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
                        <th>#</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($data))
                 
                  @foreach ($data as $key => $permission)
                  <tr>
                    <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }} </td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
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





