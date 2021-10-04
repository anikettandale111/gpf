@extends('Section.app')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Roles Add </h2>
          <span class="float-right">
             <a class="btn btn-primary" href="{{ route('roles.index') }}">Roles</a>
         </span>
         
          <div class="clearfix"></div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box ">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br/>
                    @foreach($permission as $value)
                     <div class="custom-control custom-switch custom-control-inline mb-2">
                       
                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'custom-control-input',"id"=>"per".$value->id)) }}
                        <label class="custom-control-label" for="per{{$value->id}}">{{ $value->name }}</label>
                      </div>
                       
                        
                  
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}  
               
              </div>
            </div>
           
            
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection