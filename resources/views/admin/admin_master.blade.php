<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>School Management System</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('backend/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <!-- Apex css -->
    <link href="{{ asset('backend/assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('backend/assets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
    <!-- End css -->

</head>

<body class="vertical-layout">
    <!-- Start Infobar Setting Sidebar -->
    @include('admin.body.setting')
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        @include('admin.body.sidebar')
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            @include('admin.body.topbar')
            <!-- End Topbar -->
            <!-- Start Breadcrumbbar -->
            @yield('admin')
            <!-- End Contentbar -->
            <!-- Start Footerbar -->
            @include('admin.body.footer')
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/detect.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vertical-menu.js') }}"></script>
    <!-- Switchery js -->
    <script src="{{ asset('backend/assets/plugins/switchery/switchery.min.js') }}"></script>
    <!-- Apex js -->
    <script src="{{ asset('backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('backend/assets/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('backend/assets/js/custom/custom-dashboard-school.js') }}"></script>
    <!-- Core js -->
    <script src="{{ asset('backend/assets/js/core.js') }}"></script>
    <!-- End js -->
    @yield('script')
</body>

</html>
