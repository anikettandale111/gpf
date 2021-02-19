<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('asset/images/favicon.ico') }}" type="image/ico" />
  <title>{{ config('app.name') }} </title>
  <!-- Bootstrap -->
  <link href=" {{ asset('asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('css/main.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/build/css/custom.min.css')}}" rel="stylesheet">
  <style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
    border-color: black;
  }

  th,
  td {
    padding: 8px;
  }

  * {
    color: black;
  }

  h4 {

    font-size: 12px;
  }

  .x_title {
    border-bottom: 2px solid #101011;
    margin-bottom: 10px;
  }
  </style>
</head>

<body class="nav-md">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-2">
            <label> नाशिक </label>
          </div>
          <div class="col-md-2">
            <img src="{{asset('asset/images/zp-nashik-bharti.jpg') }}" width="120"></img>
          </div>
          <div class="col-md-6" style="text-align: center;">
            <h2> <b>जिल्हा परिषद नाशिक </b> </h2>
            <h2> <b>भविष्य निर्वाह निधी वृहतपत्रक नमुना न ८९ (नियम २३१ )</b></h2>
            <h2> <b>सन ( २०१९ - २०२०)</b> </h2>
          </div>
          <div class="col-md-2">
            <h2> प्राथ शिक्षक </h2>
          </div>
          <div class="col-sm-12">
            <div class="card-box ">

              <table style="width:100%">
                <tr>
                  <th>खाते क्रं/ अं क्रं </th>
                  <th>नाव </th>
                  <th> वर्षांरंभीची शिल्लक</th>
                  <th>एप्रिल </th>
                  <th>मे </th>
                  <th> जून </th>
                  <th> जुलै </th>
                  <th>ऑगस्ट </th>
                  <th>सप्टेंबर </th>
                  <th>ऑक्टोबर</th>
                  <th> नोव्हेंबर</th>
                  <th> डिसेंबर</th>
                  <th> जानेवारी</th>
                  <th>फेब्रुवारी</th>
                  <th>मार्च</th>
                  <th> वर्षातील जमा व खर्च रकमा </th>
                  <th> वर्षाचे व्याज </th>
                  <th> प्रारंभिक शिक्कल व ऐकून जमा व व्याज </th>
                  <th> ऐकून काढलेल्या रकमा </th>
                  <th> अखेरची शिक्कल </th>
                  <th> शेरा </th>
                </tr>
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                  </tr>
                  @if($result)
                  <tr>
                    <td>{{digitChange($result[0]->inital_gpf_number)}}</td>
                    <td>{{$emp_name[0]->employee_name}}</td>
                    <td>{{digitChange($emp_name[0]->opening_balance)}}</td>
                    @foreach($result AS $row)
                    <td>{{$row->inital_gpf_number}}</td>
                    @endforeach
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
