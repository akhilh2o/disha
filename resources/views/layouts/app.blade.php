<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Exam
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/pace/pace-theme-flash.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('assets/bower_components/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript">
        var base_url = '{{ config('app.url') }}';
    </script>
</head>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            @include('layouts.partials.menu')
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Exam
                        <small>
                            Exam Token
                        </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">
                                Exam
                            </a></li>
                        <li class="active">
                            Exam Token
                        </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="container">
                <?= date('l, d M Y') ?>, <span class="live-clock">
                    <?= date('H:i:s') ?>
                </span>
                <div class="pull-right hidden-xs">
                    <b>Online Exams</b> v2
                </div>
            </div>
            <!-- /.container -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/pace/pace.min.js') }}"></script>

    <script type="text/javascript">
        function sisawaktu(t) {
                        var time = new Date(t);
                        var n = new Date();
                        var x = setInterval(function() {
                            var now = new Date().getTime();
                            var dis = time.getTime() - now;
                            var h = Math.floor((dis % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
                            var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
                            var s = Math.floor((dis % (1000 * 60)) / (1000));
                            h = ("0" + h).slice(-2);
                            m = ("0" + m).slice(-2);
                            s = ("0" + s).slice(-2);
                            var cd = h + ":" + m + ":" + s;
                            $('.sisawaktu').html(cd);
                        }, 100);
                        setTimeout(function() {
                            waktuHabis();
                        }, (time.getTime() - n.getTime()));
                    }

                    function countdown(t) {
                        var time = new Date(t);
                        var n = new Date();
                        var x = setInterval(function() {
                            var now = new Date().getTime();
                            var dis = time.getTime() - now;
                            var d = Math.floor(dis / (1000 * 60 * 60 * 24));
                            var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
                            var s = Math.floor((dis % (1000 * 60)) / (1000));
                            d = ("0" + d).slice(-2);
                            h = ("0" + h).slice(-2);
                            m = ("0" + m).slice(-2);
                            s = ("0" + s).slice(-2);
                            var cd = d + " Day, " + h + " Hours, " + m + " Minute, " + s + " Second ";
                            $('.countdown').html(cd);

                            setTimeout(function() {
                                location.reload()
                                // countdown($('.countdown').data('time'))
                            }, dis);
                        }, 1000);
                    }

                    function ajaxcsrf() {
                        var csrfname = '<?= csrf_token() ?>';
                        var csrfhash = '<?= csrf_token() ?>';
                        var csrf = {};
                        csrf[csrfname] = csrfhash;
                        $.ajaxSetup({
                            "data": csrf
                        });
                    }

                    $(document).ready(function() {
                        setInterval(function() {
                            var date = new Date();
                            var h = date.getHours(),
                                m = date.getMinutes(),
                                s = date.getSeconds();
                            h = ("0" + h).slice(-2);
                            m = ("0" + m).slice(-2);
                            s = ("0" + s).slice(-2);

                            var time = h + ":" + m + ":" + s;
                            $('.live-clock').html(time);
                        }, 1000);
                    });
    </script>
</body>

</html>
