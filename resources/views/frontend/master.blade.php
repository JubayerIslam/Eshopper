<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('frontend.includes.style')
</head>

<body>
    <!-- Topbar Start -->
    @include('frontend.includes.topbar')
    <!-- Topbar End -->

    <!-- Section Content -->
    @yield('content')


    <!-- Footer Start -->
    @include('frontend.includes.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    @include('frontend.includes.script')
</body>

</html>