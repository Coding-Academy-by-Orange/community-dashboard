<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="admin dashboard">
    <meta name="keywords" content="statistics, registration,coding,orange, laravel, learning, OCA">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <link rel="apple-touch-icon" href="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg">
    <link rel="shortcut icon"
          href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/1200px-Orange_logo.svg.png"
          type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/date-1.5.1/sc-2.2.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">
    <link
        href="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/orange-helvetica.min.css" rel="stylesheet"
          integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.2/dist/css/boosted.min.css" rel="stylesheet"
          integrity="sha384-fyenpx19UpfUhZ+SD9o9IdxeIJKE6upKx0B54OcXy1TqnO660Qw9xw6rOASP+eir" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/date-1.5.1/sc-2.2.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/datatables.min.js">
    </script>
    <script src="https://cdn.plot.ly/plotly-2.26.0.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.3.1/dist/js/boosted.min.js"
            integrity="sha384-5/uuaktuMuP89rRLLF12Nmffr7aMWkLWFVq2xzMjqdXlOiMsRRHpbz3oG92Gvj7u" crossorigin="anonymous">
    </script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.js"
            integrity="sha512-3PL7jW3xI1EjF2Hfqwv5u6nKG/BnUbWytnJDhsY/q5CbIB5XzoHNhJvgmFeVD7xgC9DbKDm+gPP9uDAAfLAZUA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body >
@include('layouts.innovation-hub.header')
<!-- END: Header-->
<!-- BEGIN: Content-->
<main>
    @yield('main')
</main>


<footer class="footer bg-dark navbar-dark pt-5">
    <div class="container-xxl footer-terms">
        <div class="d-flex justify-content-around">
            <ul class="navbar-nav gap-2 flex-row align-self-start">
                <li class="footer-heading me-md-3">Follow Us</li>
                <li><a href="#" class="btn btn-icon btn-social btn-twitter btn-inverse"><span
                            class="visually-hidden">Twitter</span></a></li>
                <li><a href="#" class="btn btn-icon btn-social btn-facebook btn-inverse"><span
                            class="visually-hidden">Facebook</span></a></li>
                <li><a href="#" class="btn btn-icon btn-social btn-instagram btn-inverse"><span
                            class="visually-hidden">Instagram</span></a></li>
                <li><a href="#" class="btn btn-icon btn-social btn-youtube btn-inverse"><span
                            class="visually-hidden">YouTube</span></a></li>
            </ul>
            <ul class="navbar-nav gap-md-3">
                <li class="fw-bold">© Orange 2023</li>
                <li><a class="nav-link" href="#">Terms and conditions</a></li>
                <li><a class="nav-link" href="#">Privacy</a></li>
                <li><a class="nav-link" href="#">Accessibility statement</a></li>
                <li><a class="nav-link" href="#">Cookie policy</a></li>
            </ul>
        </div>
    </div>
</footer>

@yield('script')
{{-- sweet alert cdn and use --}}
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

</body>
<!-- END: Body-->

</html>
