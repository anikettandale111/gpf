@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        </div>
                    @endif
                    <!-- <form action="http://127.0.0.1:5000/" method="get" enctype="multipart/form-data"> -->
                    <form action="{{url('testpdf')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="test_pdf" id="test_pdf">
                      <button type="submit" name="button">Submit</button>
                    </form>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
