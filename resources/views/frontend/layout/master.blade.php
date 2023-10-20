<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('frontend.layout.inc.style')
    <style>
        .rs-footer {
            background-color: #273c66;
            background-image: url({{ asset('assets/frontend') }}/images/bg/footer-bg.png );
            background-size: cover;
        }

        .rs-newsletter.style1 .newsletter-wrap {
            background: url({{ asset('assets/frontend') }}/images/bg/newsletter-bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 3px;
            padding: 60px 70px;
            position: relative;
        }
    </style>
</head>

<body class="home-style2">

    <!--Full width header Start-->
    @include('frontend.layout.inc.header')
    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- Main content End -->


    <!-- Footer Start -->
    @include('frontend.layout.inc.footer')
    <!-- Footer End -->

    <!-- start scrollUp  -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->

    @include('frontend.layout.inc.script')
</body>

</html>
