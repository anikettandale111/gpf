@if(isset($result))
<div class="card-box table-responsive">
    <table id="datatable_one" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th> क्रं </th>          
          <th> भ.नि.नि.क्रमांक</th>
          <th> कर्मचारी नाव</th>
       </tr>
      </thead>
      <tbody>
            @php $i=1 @endphp
            @foreach($result as $val)
            <tr>
                <td>{{$i}}</td>
                
                <td>{{$val->gpf_no}}</td>
                <td>{{$val->employee_name}}</td>
            </tr>
            @php $i++; @endphp
            @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
@endif