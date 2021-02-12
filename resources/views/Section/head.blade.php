<!DOCTYPE html>
<html lang="en">
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
    <!-- Font Awesome -->
    <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress --><!--
    <link href="{{asset('asset/vendors/nprogress/nprogress.css')}}" rel="stylesheet"> -->
    <!-- iCheck --><!--
    <link href="{{asset('asset/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet"> -->
    <!-- bootstrap-progressbar -->
    <!-- <link href="{{asset('asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet"> -->
    <!-- JQVMap --><!--
    <link href="{{asset('asset/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/> -->
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('asset/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('asset/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style type="text/css">
        .error
        {
            color: red;
        }
    </style>
</head>
