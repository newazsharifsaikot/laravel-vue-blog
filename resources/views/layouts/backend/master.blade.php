<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/11d3050a53.js" crossorigin="anonymous"></script>
{{--    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">--}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">
    <!-- Navbar -->
    @include('layouts.backend.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.backend.sidebar')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <admin-master></admin-master>

    </div>
    <!-- /.content-wrapper -->

  @include('layouts.backend.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
