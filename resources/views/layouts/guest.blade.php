<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <link rel="icon" type="image/x-icon" href="{{ asset('image/logo/logo.png') }}">

    <!-- Custom Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&amp;display=swap"
        rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('assets/frontend/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('assets/frontend/css/material-icons.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('assets/frontend/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('assets/frontend/vendor/spinkit.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/frontend/css/app.css') }}" rel="stylesheet">

    <!-- Flatpickr -->
    <link type="text/css" href="{{ asset('assets/frontend/css/flatpickr.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/frontend/css/flatpickr-airbnb.css') }}" rel="stylesheet">

    <!-- Quill Theme -->
    <link type="text/css" href="{{ asset('assets/frontend/css/quill.css') }}" rel="stylesheet">

    <!-- Touchspin -->
    <link type="text/css" href="{{ asset('assets/frontend/css/bootstrap-touchspin.css') }}" rel="stylesheet">

</head>

<body class="fixed-layout ui">
    <x-alertt-alert />
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>

        <!-- <div class="sk-bounce">
                <div class="sk-bounce-dot"></div>
                <div class="sk-bounce-dot"></div>
            </div> -->

        <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
    </div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        <div id="header" class="mdk-header bg-dark js-mdk-header m-0" data-fixed data-effects="waterfall">
            <div class="mdk-header__content">
                <!-- Navbar -->
                <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                    <div class="container">
                        <!-- Brand -->
                        <a href="{{ route('login') }}" class="navbar-brand">
                            <img src="{{ asset('image/logo/white.svg') }}" class="mr-2"
                                alt="{{ config('app.name') }}" />
                            <span class="d-none d-xs-md-block">Disha College</span>
                        </a>
                        <div class="flex"></div>
                    </div>
                </nav>
                <!-- // END Navbar -->

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        @yield('content')
        <!-- // END Header Layout Content -->

    </div>
    <!-- // END Header Layout -->


    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/frontend/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/frontend/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('assets/frontend/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('assets/frontend/vendor/dom-factory.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/material-design-kit.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>

    <!-- Flatpickr -->
    <script src="{{ asset('assets/frontend/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/flatpickr.js') }}"></script>

    @stack('scripts')

</body>

</html>
