<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Disha College - Take exam</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

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

</head>

<body class="layout-fluid">
    <x-alertt-alert />
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
            <div class="mdk-header__content">

                <!-- Navbar -->
                <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                    <div class="container">

                        <!-- Brand -->
                        <a href="{{ route('quiz.exams') }}" class="navbar-brand">
                            <img src="{{ asset('assets/frontend/images/logo/white.svg') }}" class="mr-2"
                                alt="{{ config('app.name') }}" />
                            <span class="d-none d-xs-md-block">Disha College</span>
                        </a>

                        <div class="flex"></div>

                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap">

                            <!-- Notifications dropdown -->
                            {{-- <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
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
                                                        <img src="{{ asset('assets/frontend/images/people/110/woman-5.jpg') }}"
                                                            alt="people" class="avatar-img rounded-circle">
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
                                                        <img src="{{ asset('assets/frontend/images/people/110/woman-5.jpg') }}"
                                                            alt="people" class="avatar-img rounded-circle">
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
                            </li> --}}
                            <!-- // END Notifications dropdown -->
                            <!-- User dropdown -->
                            <li class="nav-item dropdown ml-1 ml-md-3">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                    role="button"><img src="{{ asset('assets/frontend/images/people/50/guy-6.jpg') }}"
                                        alt="Avatar" class="rounded-circle" width="40"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('quiz.profile') }}">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
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
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quiz.exams') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                        <div class="media mb-headings align-items-center">
                            <div class="media-left">
                                <img src="{{ $exam?->course?->image() }}" alt="" width="80"
                                    class="rounded">
                            </div>
                            <div class="media-body">
                                <h1 class="h2">{{ $exam?->course?->name }}</h1>
                                <p class="text-muted">Duration: {{ $exam?->duration }} Min / Max Mark:
                                    {{ $exam?->maximum_mark }} / Passing Mark: {{ $exam?->passing_mark }}</p>
                            </div>
                        </div>
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="mb-0"><strong>{{ $exam->questions->count() }}</strong></h4>
                                    <small class="text-muted-light">TOTAL</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-success mb-0"><strong>{{ $attemptedQuestions }}</strong></h4>
                                    <small class="text-muted-light">ATTEMPTED</small>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-danger mb-0"><strong>5</strong></h4>
                                    <small class="text-muted-light">WRONG</small>
                                </div>
                            </div> --}}
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-primary mb-0">
                                        <strong>{{ $exam->questions->count() - $attemptedQuestions }}</strong>
                                    </h4>
                                    <small class="text-muted-light">LEFT</small>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <h4 class="mb-0"><strong>#{{ $question->id }}</strong></h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title">
                                            {{ $question?->text }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST"
                                action="{{ route('quiz.exam.question.submit', ['exam' => $exam, 'question' => $question]) }}">
                                @csrf
                                <div class="card-body">
                                    @foreach ($question->answers as $answer)
                                        <div class="form-group">
                                            <div class="custom-controls-stacked">
                                                <div class="custom-control custom-radio">
                                                    <input id="radio{{ $loop->iteration }}" type="radio"
                                                        class="custom-control-input" value="{{ $answer?->id }}"
                                                        name="answer" @disabled($questionAnswer)
                                                        @checked($questionAnswer && $questionAnswer?->answer == $answer?->text) required>
                                                    <label for="radio{{ $loop->iteration }}" class="custom-control-label">{{ $answer?->text }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($questionAnswer)
                                    <input type="hidden" name="answer" value="{{ $answer?->id }}">
                                @endif

                                <div class="card-footer">
                                    @if ($question->isNot($exam->questions->last()))
                                        <a href="{{ route('quiz.exam.question.show', ['exam' => $exam, 'question' => $question]) }}"
                                            class="btn btn-white">Skip</a>
                                        <button type="submit" class="btn btn-success float-right">Submit <i
                                                class="material-icons btn__icon--right">send</i></button>
                                    @else
                                        <a href="{{ route('quiz.exam.question.previous', ['exam' => $exam, 'question' => $question]) }}"
                                            class="btn btn-white">Previous</a>
                                        <button type="submit" class="btn btn-success float-right">Finish <i
                                                class="material-icons btn__icon--right">send</i></button>
                                        {{-- <a href="{{ route('quiz.exam.finish', $exam) }}"
                                        class="btn btn-success float-right">Finish <i
                                            class="material-icons btn__icon--right">send</i></a> --}}
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                {{-- <div class="mdk-drawer js-mdk-drawer" data-align="end">
                    <div class="mdk-drawer__content ">
                        <div class="sidebar sidebar-right sidebar-light bg-white o-hidden" data-perfect-scrollbar>
                            <div class="sidebar-p-y">
                                <div class="sidebar-heading">Time left</div>
                                <div class="countdown sidebar-p-x" data-value="4" data-unit="hour"></div>

                                <div class="sidebar-heading">Pending</div>
                                <ul class="list-group list-group-fit">
                                    <li class="list-group-item active">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#9</span>
                                                </span>
                                                <span class="media-body">
                                                    Github command to deploy comits?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#10</span>
                                                </span>
                                                <span class="media-body">
                                                    What's the difference between private and public repos?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#11</span>
                                                </span>
                                                <span class="media-body">
                                                    What is the purpose of a branch?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}

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


    <!-- Required by countdown -->
    <script src="{{ asset('assets/frontend/vendor/moment.min.js') }}"></script>
    <!-- Easy Countdown -->
    <script src="{{ asset('assets/frontend/vendor/jquery.countdown.min.js') }}"></script>

    <!-- Init -->
    <script src="{{ asset('assets/frontend/js/countdown.js') }}"></script>

</body>

</html>
