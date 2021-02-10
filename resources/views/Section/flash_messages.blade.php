@if ($message = Session::get('success'))
<div class="x_panel">
  <div class="x_title">
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="x_panel">
  <div class="x_title">
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="x_panel">
  <div class="x_title">
    <div class="alert alert-warning alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="x_panel">
  <div class="x_title">
    <div class="alert alert-info alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
</div>
@endif

@if ($errors->any())
<div class="x_panel">
  <div class="x_title">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      Check the following errors :(
    </div>
  </div>
</div>
@endif
