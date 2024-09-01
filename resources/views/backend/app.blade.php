<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutosOnly</title>
    @include('backend.partials.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('backend.partials.preloader')

        <!-- Navbar -->
        @include('backend.partials.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
        <!-- Content Header (Page header) -->
            @include('backend.partials.content_header')
            <!-- /.content-header -->


            <!-- Main content -->
            @yield('dashboad_content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        @include('backend.partials.left_sidebar')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- start footer  -->
    @include('backend.partials.footer')
    <!-- end footer  -->

    @include('backend.partials.script')

</body>

</html>