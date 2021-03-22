@extends('Section.app')
@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>वर्षाचे व्याज दर भरणे </h2>
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
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>क्रं </th>
                                            <th>आर्थिक वर्ष पासून </th>
                                            <th>पासून </th>
                                            <th>आर्थिक वर्ष पर्यंत </th>
                                            <th>पर्यंत </th>
                                            <th>व्याज दर </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($Year))
                                        @foreach($Year as $Year)
                                        <tr id="{{$Year->id}}">
                                            <td>{{$loop->index+1}}</td>
                                            <td id="year_{{$Year->id}}">{{$Year->year}}</td>
                                            <td >{{$Year->from_month_text }}</td>
                                            <input type="hidden" id="from_month_{{$Year->id}}" value="{{$Year->from_month}}">
                                            <td id="year_to_{{$Year->id}}">{{$Year->year_to}}</td>

                                            <td >{{$Year->to_month_text}}</td>
                                            <input type="hidden" id="to_month_{{$Year->id}}" value="{{$Year->to_month}}">
                                            <td id="percent_{{$Year->id}}">{{$Year->percent}}</td>
                                            <td>
                                                <i class=" fa fa-edit icon-edit" onclick="geteditdata('{{$Year->id}}')"></i>

                                                <i class="fa fa-trash icon-trash" data-id="{{$Year->id}}" onclick="deleteConfirmation('{{$Year->id}}')"></i>
                                        </tr>

                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left year_vali" action="{{route('Year.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    {{csrf_field()}}
                                    <div class="field item form-group">
                                        <input type="hidden" class="form-control" name="year_id" id="year_id" value="0">

                                        <label class="col-form-label col-md-3 col-lg-3  label-align"> आर्थिक वर्ष पासून  <span class="required"> : </span></label>
                                        <div class="col-md-6 col-lg-8">
                                          @php
                                      $currently_selected = date('Y');
                                      $earliest_year = session()->get('from_year');
                                      $latest_year = date('Y');
                                      @endphp
                                      <select name="year" id="year" class="form-control">
                                        <option value="">-- निवडा वर्ष --</option>
                                        <?php
                                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                            }

                                        ?>
                                     </select>
                                        </div>
                                    </div>

                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">पासून <span class="required">*</span></label>
                                        <div class="col-md-6 col-lg-8">
                                            <select class="form-control" type="time" name="from_month" id="from_month" required='required'>
                                            <option value="">-- select Month --</option>

                                            @foreach ($Month as $month)
                                                <option value="{{$month->id}}">{{$month->month_name_mar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-lg-3  label-align"> आर्थिक वर्ष  पर्यंत <span class="required"> : </span></label>
                                        <div class="col-md-6 col-lg-8">
                                          @php
                                      $currently_selected = date('Y');
                                      $earliest_year = session()->get('from_year');
                                      $latest_year = date('Y');
                                      @endphp
                                      <select name="year_to" id="year_to" class="form-control">
                                        <option value="">-- निवडा वर्ष --</option>
                                        <?php
                                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                              echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                            }

                                        ?>
                                     </select>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align"> पर्यंत <span class="required">*</span></label>
                                        <div class="col-md-6 col-lg-8">
                                            <select class="form-control" type="time" name="to_month" id="to_month" required='required'>
                                            <option value="">-- select Month --</option>

                                            @foreach ($Month as $month)
                                                <option value="{{$month->id}}">{{$month->month_name_mar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align"> व्याज दर <span class="required"> : </span></label>
                                        <div class="col-md-6 col-lg-8">
                                            <input class="form-control" class='optional' id="percent" name="percent" data-validate-length-range="5,15" type="text" />
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-6">
                                            <button type="submit" class="btn btn-success year_submit"> <i class="fa fa-floppy-o"></i> Save </button>
                                            <button type="button" class="btn btn-primary year_clear" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('custom-scripts')

<script type="text/javascript" src="{{URL('js/year-master.js')}}"></script>
@endpush
