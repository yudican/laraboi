<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: [`{{ asset('assets/css/fonts.min.css') }}`]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}" />
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            {{-- @livewire('navigation-dropdown') --}}

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}
            <div class="logo-header" data-background-color="blue">

                <a href="index.html" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    {{-- <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div> --}}
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        {{-- <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                aria-labelledby="messageDropdown">
                                <li>
                                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                                        Messages
                                        <a href="#" class="small">Mark all as read</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jimmy Denis</span>
                                                    <span class="block">
                                                        How are you ?
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all messages<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                            </a>
                            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                <div class="quick-actions-header">
                                    <span class="title mb-1">Quick Actions</span>
                                    <span class="subtitle op-8">Shortcuts</span>
                                </div>
                                <div class="quick-actions-scroll scrollbar-outer">
                                    <div class="quick-actions-items">
                                        <div class="row m-0">
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file-1"></i>
                                                    <span class="text">Generated Report</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-database"></i>
                                                    <span class="text">Create New Database</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-pen"></i>
                                                    <span class="text">Create New Post</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-interface-1"></i>
                                                    <span class="text">Create New Task</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-list"></i>
                                                    <span class="text">Completed Tasks</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file"></i>
                                                    <span class="text">Create New Invoice</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">

                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                            class="avatar-img rounded-circle">
                                    @else

                                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                                            class="avatar-img rounded-circle">

                                    @endif
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                {{-- <img
                                                    src="{{ asset('assets/img/profile.jpg') }}" alt="image profile"
                                                    class="avatar-img rounded"> --}}
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                    <img src="{{ Auth::user()->profile_photo_url }}"
                                                        alt="{{ Auth::user()->name }}" class="avatar-img rounded">
                                                @else

                                                    <img src="{{ asset('assets/img/profile.jpg') }}"
                                                        alt="{{ Auth::user()->name }}" class="avatar-img rounded">

                                                @endif
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                {{-- <p class="text-muted">
                                                    {{ Auth::user()->email }}
                                                </p> --}}
                                                <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View
                                                    Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                                        {{-- <a class="dropdown-item" href="#">My
                                            Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Logout</a> --}}
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                    class="avatar-img rounded-circle">
                            @else

                                <img src="{{ asset('assets/img/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                                    class="avatar-img rounded-circle">

                            @endif
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ Auth::user()->name }}
                                    <span class="user-level">Administrator</span>
                                </span>
                            </a>

                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        {{-- <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li> --}}
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Master</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    {{-- <li>
                                        <a href="{{ route('section') }}">
                                            <span class="sub-item">Section</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#landing">
                                <i class="fas fa-layer-group"></i>
                                <p>Landing</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="landing">
                                <ul class="nav nav-collapse">
                                    {{-- <li>
                                        <a href="{{ route('banner') }}">
                                            <span class="sub-item">Section Banner</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#setting">
                                <i class="fas fa-layer-group"></i>
                                <p>Pengaturan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="setting">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('profile.show') }}">
                                            <span class="sub-item">Edit Profile</span>
                                        </a>
                                    </li>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <li>
                                            <a href="{{ route('api-tokens.index') }}">
                                                <span class="sub-item">API Tokens</span>
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Team Management -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())

                                        <!-- Team Settings -->
                                        <li>
                                            <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                <span class="sub-item">Team Settings</span>
                                            </a>
                                        </li>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <li>
                                                <a href="{{ route('teams.create') }}">
                                                    <span class="sub-item">Create New Team</span>
                                                </a>
                                            <li>
                                            @endcan

                                            {{-- @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" />
                                            @endforeach --}}

                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#user">
                                <i class="fas fa-layer-group"></i>
                                <p>User & Permissions</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="user">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('role') }}">
                                            <span class="sub-item">Role</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('permission') }}">
                                            <span class="sub-item">Permission</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Widgets</p>
                                <span class="badge badge-success">4</span>
                            </a>
                        </li> --}}

                        {{-- <li class="mx-4 mt-2">
                            <a href="http://themekita.com/atlantis-bootstrap-dashboard.html"
                                class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i
                                        class="fa fa-heart"></i> </span>Buy Pro</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="main-panel">
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>


    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
    @stack('scripts')

</body>

</html>
