<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student - Dashboard - Fixed layout</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&amp;display=swap"
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

</head>

<body class="fixed-layout">

    <div class="preloader">
        {{-- <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div> --}}

        <div class="sk-bounce">
            <div class="sk-bounce-dot"></div>
            <div class="sk-bounce-dot"></div>
        </div>

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
                        <!-- Toggle sidebar -->
                        <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                            <span class="material-icons">menu</span>
                        </button>

                        <!-- Brand -->
                        <a href="fixed-student-dashboard.html" class="navbar-brand">
                            <img src="assets/images/logo/white.svg" class="mr-2" alt="LearnPlus" />
                            <span class="d-none d-xs-md-block">LearnPlus</span>
                        </a>

                        <!-- Search -->
                        <form class="search-form d-none d-md-flex">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn" type="button"><i
                                    class="material-icons font-size-24pt">search</i></button>
                        </form>
                        <!-- // END Search -->

                        <div class="flex"></div>

                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="fixed-student-forum.html">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fixed-student-help-center.html">Get Help</a>
                            </li>
                        </ul>

                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap">

                            <li class="nav-item d-none d-md-flex">
                                <a href="fixed-student-cart.html" class="nav-link">
                                    <i class="material-icons">shopping_cart</i>
                                </a>
                            </li>

                            <!-- Notifications dropdown -->
                            <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                                <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown"
                                    data-dropdown-disable-document-scroll data-caret="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="badge badge-notifications badge-danger">2</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div data-perfect-scrollbar class="position-relative">
                                        <div class="dropdown-header"><strong>Messages</strong></div>
                                        <div class="list-group list-group-flush mb-0">

                                            <a href="fixed-student-messages.html"
                                                class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">5 minutes ago</small>

                                                    <span class="ml-auto unread-indicator bg-primary"></span>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <img src="assets/images/people/110/woman-5.jpg" alt="people"
                                                            class="avatar-img rounded-circle">
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Michelle</strong>
                                                        <span class="text-black-70">Clients loved the new design.</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="fixed-student-messages.html"
                                                class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">5 minutes ago</small>

                                                    <span class="ml-auto unread-indicator bg-primary"></span>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <img src="assets/images/people/110/woman-5.jpg" alt="people"
                                                            class="avatar-img rounded-circle">
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Michelle</strong>
                                                        <span class="text-black-70">🔥 Superb job..</span>
                                                    </span>
                                                </span>
                                            </a>

                                        </div>

                                        <div class="dropdown-header"><strong>System notifications</strong></div>
                                        <div class="list-group list-group-flush mb-0">

                                            <a href="fixed-student-messages.html"
                                                class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">3 minutes ago</small>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <span class="avatar-title rounded-circle bg-light">
                                                            <i
                                                                class="material-icons font-size-16pt text-danger">account_circle</i>
                                                        </span>
                                                    </span>
                                                    <span class="flex d-flex flex-column">

                                                        <span class="text-black-70">Your profile information has not
                                                            been synced correctly.</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="fixed-student-messages.html"
                                                class="list-group-item list-group-item-action">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">5 hours ago</small>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <span class="avatar-title rounded-circle bg-light">
                                                            <i
                                                                class="material-icons font-size-16pt text-success">group_add</i>
                                                        </span>
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Adrian. D</strong>
                                                        <span class="text-black-70">Wants to join your private
                                                            group.</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="fixed-student-messages.html"
                                                class="list-group-item list-group-item-action">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">1 day ago</small>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <span class="avatar-title rounded-circle bg-light">
                                                            <i
                                                                class="material-icons font-size-16pt text-warning">storage</i>
                                                        </span>
                                                    </span>
                                                    <span class="flex d-flex flex-column">

                                                        <span class="text-black-70">Your deploy was successful.</span>
                                                    </span>
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- // END Notifications dropdown -->
                            <!-- User dropdown -->
                            <li class="nav-item dropdown ml-1 ml-md-3">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img
                                        src="assets/images/people/50/guy-6.jpg" alt="Avatar" class="rounded-circle"
                                        width="40"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="fixed-student-account-edit.html">
                                        <i class="material-icons">edit</i> Edit Account
                                    </a>
                                    <a class="dropdown-item" href="fixed-student-profile.html">
                                        <i class="material-icons">person</i> Public Profile
                                    </a>
                                    <a class="dropdown-item" href="guest-login.html">
                                        <i class="material-icons">lock</i> Logout
                                    </a>
                                </div>
                            </li>
                            <!-- // END User dropdown -->

                        </ul>
                        <!-- // END Menu -->
                    </div>
                </nav>
                <!-- // END Navbar -->

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content d-flex flex-column">

            <div class="page__header">
                <div class="navbar bg-dark navbar-dark navbar-expand-sm d-none2 d-md-flex2">
                    <div class="container">

                        <div class="navbar-collapse collapse" id="navbarsExample03">
                            <ul class="nav navbar-nav">
                                <li class="nav-item dropdown active">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Student</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item active"
                                            href="fixed-student-dashboard.html">Dashboard</a>
                                        <a class="dropdown-item" href="fixed-student-browse-courses.html">Browse
                                            Courses</a>
                                        <a class="dropdown-item" href="fixed-student-view-course.html">View Course</a>
                                        <a class="dropdown-item" href="fixed-student-take-course.html">Take Course</a>
                                        <a class="dropdown-item" href="fixed-student-take-quiz.html">Take a Quiz</a>
                                        <a class="dropdown-item" href="fixed-student-quiz-results.html">Quiz Results</a>
                                        <a class="dropdown-item" href="fixed-student-my-courses.html">My Courses</a>
                                        <a class="dropdown-item" href="fixed-student-billing.html">Billing</a>
                                        <a class="dropdown-item" href="fixed-student-pay.html">Payment</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Instructor</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="fixed-instructor-dashboard.html">Dashboard</a>
                                        <a class="dropdown-item" href="fixed-instructor-courses.html">Course Manager</a>
                                        <a class="dropdown-item" href="fixed-instructor-quizzes.html">Quiz Manager</a>
                                        <a class="dropdown-item" href="fixed-instructor-earnings.html">Earnings</a>
                                        <a class="dropdown-item" href="fixed-instructor-statement.html">Statement</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="fixed-student-account-edit.html">Edit Account</a>
                                        <a class="dropdown-item" href="fixed-student-account-edit-basic.html">Basic
                                            Information</a>
                                        <a class="dropdown-item" href="fixed-student-account-edit-profile.html">Profile
                                            &amp; Privacy</a>
                                        <a class="dropdown-item"
                                            href="fixed-student-account-billing-subscription.html">Subscription</a>
                                        <a class="dropdown-item"
                                            href="fixed-student-account-billing-upgrade.html">Upgrade Account</a>
                                        <a class="dropdown-item"
                                            href="fixed-student-account-billing-payment-information.html">Payment
                                            Information</a>
                                        <a class="dropdown-item" href="fixed-student-billing.html">Payment History</a>
                                        <a class="dropdown-item" href="fixed-student-invoice.html">Student Invoice</a>
                                        <a class="dropdown-item" href="fixed-instructor-invoice.html">Instructor
                                            Invoice</a>
                                        <a class="dropdown-item" href="fixed-instructor-edit-invoice.html">Edit
                                            Invoice</a>
                                        <a class="dropdown-item" href="fixed-student-messages.html">Messages</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="guest-login.html">Login</a>
                                        <a class="dropdown-item" href="guest-signup.html">Signup</a>
                                        <a class="dropdown-item" href="guest-forgot-password.html">Forgot Password</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Community</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="fixed-student-forum.html">Forum</a>
                                        <a class="dropdown-item" href="fixed-student-forum-thread.html">Discussion</a>
                                        <a class="dropdown-item" href="fixed-student-forum-ask.html">Ask Question</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="fixed-student-profile.html">Student Profile -
                                            Courses</a>
                                        <a class="dropdown-item" href="fixed-student-profile-posts.html">Student Profile
                                            - Posts</a>
                                        <a class="dropdown-item" href="fixed-instructor-profile.html">Instructor
                                            Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="fixed-student-help-center.html">Help Center</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Components</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="fixed-ui-avatars.html">Avatars</a>
                                        <a class="dropdown-item" href="fixed-ui-forms.html">Forms</a>
                                        <a class="dropdown-item" href="fixed-ui-loaders.html">Loaders</a>
                                        <a class="dropdown-item" href="fixed-ui-tables.html">Tables</a>
                                        <a class="dropdown-item" href="fixed-ui-cards.html">Cards</a>
                                        <a class="dropdown-item" href="fixed-ui-tabs.html">Tabs</a>
                                        <a class="dropdown-item" href="fixed-ui-icons.html">Icons</a>
                                        <a class="dropdown-item" href="fixed-ui-buttons.html">Buttons</a>
                                        <a class="dropdown-item" href="fixed-ui-alerts.html">Alerts</a>
                                        <a class="dropdown-item" href="fixed-ui-badges.html">Badges</a>
                                        <!-- <a class="dropdown-item" href="fixed-ui-modals.html">- Modals</a> -->
                                        <a class="dropdown-item" href="fixed-ui-progress.html">Progress</a>
                                        <a class="dropdown-item" href="fixed-ui-pagination.html">Pagination</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Plugins</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="fixed-ui-charts.html">Charts</a>
                                        <a class="dropdown-item" href="fixed-ui-drag.html">Drag &amp; Drop</a>
                                        <a class="dropdown-item" href="fixed-ui-calendar.html">Calendar</a>
                                        <a class="dropdown-item" href="fixed-ui-nestable.html">Nestable</a>
                                        <a class="dropdown-item" href="fixed-ui-tree.html">Tree</a>
                                        <a class="dropdown-item" href="fixed-ui-maps-vector.html">Vector Maps</a>
                                        <a class="dropdown-item" href="fixed-ui-sweet-alert.html">Sweet Alert</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layouts</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="student-dashboard.html">Fluid</a>
                                        <a class="dropdown-item active" href="fixed-student-dashboard.html">Fixed</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarsExample03"
                            type="button">
                            <span class="material-icons">menu</span>
                        </button>

                    </div>
                </div>
            </div>

            <div class="page ">

                <div class="container page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="fixed-student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <h1 class="h2">Dashboard</h1>

                    <div class="card border-left-3 border-left-primary card-2by1">
                        <div class="card-body">
                            <div class="media flex-wrap align-items-center">
                                <div class="media-left">
                                    <i class="material-icons text-muted-light">credit_card</i>
                                </div>
                                <div class="media-body" style="min-width: 180px">
                                    Your subscription ends on <strong>25 February 2015</strong>
                                </div>
                                <div class="media-right mt-2 mt-xs-plus-0">
                                    <a class="btn btn-success"
                                        href="fixed-student-account-billing-upgrade.html">Upgrade</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">

                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="h2 mb-0 mr-3 text-primary">116</div>
                                    <div class="flex">
                                        <h4 class="card-title">Angular</h4>
                                        <p class="card-subtitle">Best score</p>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle text-black-70" data-toggle="dropdown">Popular
                                            Topics</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Popular Topics</a>
                                            <a href="#" class="dropdown-item">Web Design</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart" style="height: 319px;">
                                        <canvas id="topicIqChart" class="chart-canvas js-update-chart-line"
                                            data-chart-hide-axes="false" data-chart-points="true"
                                            data-chart-suffix=" points" data-chart-line-border-color="primary"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Courses</h4>
                                            <p class="card-subtitle">Your recent courses</p>
                                        </div>
                                        <div class="media-right">
                                            <a class="btn btn-sm btn-primary" href="fixed-student-my-courses.html">My
                                                courses</a>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-fit mb-0" style="z-index: initial;">

                                    <li class="list-group-item" style="z-index: initial;">
                                        <div class="d-flex align-items-center">
                                            <a href="fixed-student-take-course.html"
                                                class="avatar avatar-4by3 avatar-sm mr-3">
                                                <img src="assets/images/gulp.png" alt="course"
                                                    class="avatar-img rounded">
                                            </a>
                                            <div class="flex">
                                                <a href="fixed-student-take-course.html" class="text-body"><strong>Learn
                                                        Vue.js Fundamentals</strong></a>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">25%</small>
                                                </div>
                                            </div>
                                            <div class="dropdown ml-3">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false"
                                                    data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="fixed-student-take-course.html">Continue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item" style="z-index: initial;">
                                        <div class="d-flex align-items-center">
                                            <a href="fixed-student-take-course.html"
                                                class="avatar avatar-4by3 avatar-sm mr-3">
                                                <img src="assets/images/vuejs.png" alt="course"
                                                    class="avatar-img rounded">
                                            </a>
                                            <div class="flex">
                                                <a href="fixed-student-take-course.html"
                                                    class="text-body"><strong>Angular in Steps</strong></a>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">100%</small>
                                                </div>
                                            </div>
                                            <div class="dropdown ml-3">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false"
                                                    data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="fixed-student-take-course.html">Continue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item" style="z-index: initial;">
                                        <div class="d-flex align-items-center">
                                            <a href="fixed-student-take-course.html"
                                                class="avatar avatar-4by3 avatar-sm mr-3">
                                                <img src="assets/images/nodejs.png" alt="course"
                                                    class="avatar-img rounded">
                                            </a>
                                            <div class="flex">
                                                <a href="fixed-student-take-course.html"
                                                    class="text-body"><strong>Bootstrap Foundations</strong></a>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">80%</small>
                                                </div>
                                            </div>
                                            <div class="dropdown ml-3">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false"
                                                    data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="fixed-student-take-course.html">Continue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Quizzes</h4>
                                            <p class="card-subtitle">Your Performance</p>
                                        </div>
                                        <div class="media-right">
                                            <a class="btn btn-sm btn-primary" href="#">Quiz results</a>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-fit mb-0">

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <a class="text-body"
                                                    href="fixed-student-quiz-results.html"><strong>Title of quiz goes
                                                        here?</strong></a><br>
                                                <div class="d-flex align-items-center">
                                                    <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                    <a href="fixed-student-take-course.html">Basics of HTML</a>
                                                </div>
                                            </div>
                                            <div class="media-right text-center d-flex align-items-center">
                                                <span class="text-black-50 mr-3">Good</span>
                                                <h4 class="mb-0">5.8</h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <a class="text-body"
                                                    href="fixed-student-quiz-results.html"><strong>Directives &amp;
                                                        Routing</strong></a><br>
                                                <div class="d-flex align-items-center">
                                                    <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                    <a href="fixed-student-take-course.html">Angular in Steps</a>
                                                </div>
                                            </div>
                                            <div class="media-right text-center d-flex align-items-center">
                                                <span class="text-black-50 mr-3">Great</span>
                                                <h4 class="mb-0 text-success">9.8</h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <a class="text-body"
                                                    href="fixed-student-quiz-results.html"><strong>Responsive &amp;
                                                        Retina</strong></a><br>
                                                <div class="d-flex align-items-center">
                                                    <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                    <a href="fixed-student-take-course.html">Bootstrap Foundations</a>
                                                </div>
                                            </div>
                                            <div class="media-right text-center d-flex align-items-center">
                                                <span class="text-black-50 mr-3">Failed</span>
                                                <h4 class="mb-0 text-danger">2.8</h4>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5">

                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="h2 mb-0 mr-3 text-primary">432</div>
                                    <div class="flex">
                                        <h4 class="card-title">Experience IQ</h4>
                                        <p class="card-subtitle">4 days streak this week</p>
                                    </div>
                                    <i class="material-icons text-muted ml-2">trending_up</i>
                                </div>
                                <div class="card-body">
                                    <div class="chart" style="height: 154px;">
                                        <canvas id="iqChart" class="chart-canvas js-update-chart-line"
                                            data-chart-points="true" data-chart-suffix="pt"
                                            data-chart-line-border-color="primary"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-2by1">
                                <div class="card-header">
                                    <h4 class="card-title">Rewards</h4>
                                    <p class="card-subtitle">Your latest achievements</p>
                                </div>
                                <div class="card-body text-center">
                                    <div class="btn btn-primary btn-circle"><i class="material-icons">thumb_up</i></div>
                                    <div class="btn btn-danger btn-circle"><i class="material-icons">grade</i></div>
                                    <div class="btn btn-success btn-circle"><i class="material-icons">bubble_chart</i>
                                    </div>
                                    <div class="btn btn-warning btn-circle"><i class="material-icons">keyboard_voice</i>
                                    </div>
                                    <div class="btn btn-info btn-circle"><i class="material-icons">event_available</i>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Forum Activity</h4>
                                            <p class="card-subtitle">Latest forum topics &amp; replies</p>
                                        </div>
                                        <div class="media-right">
                                            <a class="btn btn-sm btn-primary" href="fixed-student-forum.html"> <i
                                                    class="material-icons">keyboard_arrow_right</i></a>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-fit">

                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="assets/images/people/50/guy-1.jpg" alt="" width="20"
                                                            class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <a href="fixed-student-profile.html" class="text-body"><strong>Luci
                                                            Bryant</strong></a>
                                                    <small class="ml-auto text-muted">5 min ago</small>
                                                </div>
                                                <a class="text-black-70" href="fixed-student-forum-thread.html">Am I
                                                    learning the right way?</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="assets/images/people/50/guy-2.jpg" alt="" width="20"
                                                            class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <a href="fixed-student-profile.html"
                                                        class="text-body"><strong>Magnus Goldsmith</strong></a>
                                                    <small class="ml-auto text-muted">7 min ago</small>
                                                </div>
                                                <a class="text-black-70" href="fixed-student-forum-thread.html">Can
                                                    someone help me with the basic Setup?</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="assets/images/people/50/woman-1.jpg" alt="" width="20"
                                                            class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <a href="fixed-student-profile.html"
                                                        class="text-body"><strong>Katelyn Rankin</strong></a>
                                                    <small class="ml-auto text-muted">12 min ago</small>
                                                </div>
                                                <a class="text-black-70" href="fixed-student-forum-thread.html">I think
                                                    this is the right way?</a>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container page__container">
                    <div class="footer">
                        Copyright &copy; 2016 - <a
                            href="http://themeforest.net/item/learnplus-learning-management-application/15287372?ref=mosaicpro">Purchase
                            LearnPlus</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- // END Header Layout Content -->

    </div>
    <!-- // END Header Layout -->

    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content ">
            <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                <div class="sidebar-p-y">
                    <div class="sidebar-heading">APPLICATIONS</div>
                    <ul class="sidebar-menu sm-active-button-bg">
                        <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" href="fixed-student-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i>
                                Student
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-instructor-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>
                                Instructor
                            </a>
                        </li>
                    </ul>
                    <!-- Account menu -->
                    <div class="sidebar-heading">Account</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse"
                                href="#account_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i>
                                Account
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu sm-indent collapse" id="account_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="guest-login.html">
                                        <span class="sidebar-menu-text">Login</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="guest-signup.html">
                                        <span class="sidebar-menu-text">Sign Up</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="guest-forgot-password.html">
                                        <span class="sidebar-menu-text">Forgot Password</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-account-edit.html">
                                        <span class="sidebar-menu-text">Edit Account</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-account-edit-basic.html">
                                        <span class="sidebar-menu-text">Basic Information</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-account-edit-profile.html">
                                        <span class="sidebar-menu-text">Profile &amp; Privacy</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                        href="fixed-student-account-billing-subscription.html">
                                        <span class="sidebar-menu-text">Subscription</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-account-billing-upgrade.html">
                                        <span class="sidebar-menu-text">Upgrade Account</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                        href="fixed-student-account-billing-payment-information.html">
                                        <span class="sidebar-menu-text">Payment Information</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-billing.html">
                                        <span class="sidebar-menu-text">Payment History</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-invoice.html">
                                        <span class="sidebar-menu-text">Student Invoice</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-instructor-invoice.html">
                                        <span class="sidebar-menu-text">Instructor Invoice</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-instructor-edit-invoice.html">
                                        <span class="sidebar-menu-text">Edit Invoice</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#messages_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">comment</i> Messages
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu sm-indent collapse" id="messages_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-messages.html">
                                        <span class="sidebar-menu-text">Conversation</span>
                                        <span
                                            class="sidebar-menu-badge badge badge-primary badge-notifications ml-auto">2</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-messages-2.html">
                                        <span class="sidebar-menu-text">Conversation - 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="sidebar-heading">Student</div>
                    <ul class="sidebar-menu sm-active-button-bg">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-browse-courses.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse
                                Courses
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-view-course.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>
                                View Course
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-take-course.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Take
                                Course
                                <span class="sidebar-menu-badge badge badge-primary ml-auto">PRO</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-take-quiz.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take a Quiz
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-quiz-results.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Quiz
                                Results
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-my-courses.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> My
                                Courses
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#forum_menu">
                                <i
                                    class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i>
                                Community
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu sm-indent collapse" id="forum_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-forum.html">
                                        <span class="sidebar-menu-text">Forum</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-forum-thread.html">
                                        <span class="sidebar-menu-text">Discussion</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-forum-ask.html">
                                        <span class="sidebar-menu-text">Ask Question</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-profile.html">
                                        <span class="sidebar-menu-text">Student Profile - Courses</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-student-profile-posts.html">
                                        <span class="sidebar-menu-text">Student Profile - Posts</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-instructor-profile.html">
                                        <span class="sidebar-menu-text">Instructor Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-help-center.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get
                                Help
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="guest-login.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                            </a>
                        </li>
                    </ul>
                    <!-- Components menu -->
                    <div class="sidebar-heading">Components</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse"
                                href="#components_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
                                Components
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu sm-indent collapse" id="components_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-avatars.html">
                                        <span class="sidebar-menu-text">Avatars</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-forms.html">
                                        <span class="sidebar-menu-text">Forms</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-loaders.html">
                                        <span class="sidebar-menu-text">Loaders</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-tables.html">
                                        <span class="sidebar-menu-text">Tables</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-cards.html">
                                        <span class="sidebar-menu-text">Cards</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-tabs.html">
                                        <span class="sidebar-menu-text">Tabs</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-icons.html">
                                        <span class="sidebar-menu-text">Icons</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-buttons.html">
                                        <span class="sidebar-menu-text">Buttons</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-alerts.html">
                                        <span class="sidebar-menu-text">Alerts</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-badges.html">
                                        <span class="sidebar-menu-text">Badges</span>
                                    </a>
                                </li>
                                <!-- <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="fixed-ui-modals.html">
          <span class="sidebar-menu-text">- Modals</span>
        </a>
      </li> -->
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-progress.html">
                                        <span class="sidebar-menu-text">Progress Bars</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-pagination.html">
                                        <span class="sidebar-menu-text">Pagination</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse"
                                href="#plugins_menu">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">folder</i>
                                Plugins
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu sm-indent collapse" id="plugins_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-charts.html">
                                        <span class="sidebar-menu-text">Charts</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-drag.html">
                                        <span class="sidebar-menu-text">Drag &amp; Drop</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-calendar.html">
                                        <span class="sidebar-menu-text">Calendar</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-nestable.html">
                                        <span class="sidebar-menu-text">Nestable</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-tree.html">
                                        <span class="sidebar-menu-text">Tree</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-maps-vector.html">
                                        <span class="sidebar-menu-text">Vector Maps</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="fixed-ui-sweet-alert.html">
                                        <span class="sidebar-menu-text">Sweet Alert</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- // END Components Menu -->

                    <div class="sidebar-heading">Layout</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i> Fluid
                                Layout
                            </a>
                        </li>
                        <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" href="fixed-student-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i> Fixed
                                Layout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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

    <!-- Highlight.js -->
    <script src="{{ asset('assets/frontend/js/hljs.js') }}"></script>


    <!-- Global Settings -->
    <script src="{{ asset('assets/frontend/js/settings.js') }}"></script>

    <!-- Moment.js -->
    <script src="{{ asset('assets/frontend/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/moment-range.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('assets/frontend/vendor/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/chartjs.js') }}"></script>

    <!-- Student Dashboard Page JS -->
    {{--
    <!-- <script src="{{ asset('assets/frontend/js/chartjs-rounded-bar.js') }}"></script> --> --}}
    <script src="{{ asset('assets/frontend/js/page.student-dashboard.js') }}"></script>

</body>

</html>
