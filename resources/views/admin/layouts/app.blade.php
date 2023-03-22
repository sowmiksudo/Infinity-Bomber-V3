<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ $project_name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css">
    <style>

        select {
            width: 50% !important;
        }

        .icon-lg {
            font-size: 20px;
            font-weight: 900;
        }

        body {
            background-color: #fbfbfb;
        }

        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
            overflow: scroll;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }
    </style>

</head>

<body>


    {{-- Sidebar --}}

    <body id="body-pd">
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="{{ route('admin.index') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                            aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                        </a>
                        <a href="{{ route('admin.addBombing') }}" target=""
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.addBombing') ? 'active' : '' }}">
                            <i class="fas fa-plus-circle fa-fw me-3"></i><span>New</span>
                        </a>
                        <a href="{{ route('admin.users.index') }}" target=""
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                            <i class="fas fa-address-book fa-fw me-3"></i><span>Users</span>
                        </a>
                        <a href="{{ route('admin.notice.index') }}" target=""
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.notice.index') ? 'active' : '' }}">
                            <i class="fas fa-question-circle fa-fw me-3"></i><span>Notice</span>
                        </a>
                        <a href="{{ route('admin.history') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.history') ? 'active' : '' }}">
                            <i class="fas fa-history fa-fw me-3"></i><span>History</span>
                        </a>
                        <a href="{{ route('admin.bombings') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.bombings') ? 'active' : '' }}">
                            <i class="fas fa-clock fa-fw me-3"></i><span>Running</span>
                        </a>
                        <a href="{{ route('admin.blacklist') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.blacklist') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt fa-fw me-3"></i><span>Blacklist</span>
                        </a>
                        <a href="{{ route('admin.addBlacklist') }}"
                            class="px-5 list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.addBlacklist') ? 'active' : '' }}">
                            <i class="fas fa-plus-square fa-fw me-3"></i><span>New</span>
                        </a>


                        {{-- API Zone --}}

                        <a href="{{ route('api.index') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('api.index') ? 'active' : '' }}">
                            <i class="fas fa-code fa-fw me-3"></i><span>API</span>
                        </a>

                        <a href="{{ route('api.add') }}"
                            class="list-group-item list-group-item-action py-2 ripple px-5 {{ request()->routeIs('api.add') ? 'active' : '' }}">
                            <i class="fas fa-plus fa-fw me-3"></i><span>ADD</span>
                        </a>

                        <a href="{{ route('api.adv') }}"
                            class="list-group-item list-group-item-action py-2 ripple px-5 {{ request()->routeIs('api.adv') ? 'active' : '' }}">
                            <i class="fas fa-user-shield fa-fw me-3"></i><span>JSON</span>
                        </a>
                        
                        
                        <a href="{{ route('admin.settings') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                            <i class="fas fa-cog fa-fw me-3"></i><span>SETTINGS</span>
                        </a>
                               
                        <a href="{{ route('admin.changePass') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('admin.changePass') ? 'active' : '' }}">
                            <i class="fas fa-key fa-fw me-3"></i><span>CHANGE PASS</span>
                        </a>


                        



                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Brand -->
                    <a class="navbar-brand" href="{{ route('admin.index') }}">
                        <h4 class="text-primary mx-2 pt-1"><i class="fas fa-fire mx-2"></i>{{ $project_name }}</h4>
                    </a>

                    <!-- Right links -->
                    <ul class="navbar-nav ms-auto d-flex flex-row">

                        <!-- Icon -->
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="{{ $admin_contact }}" target="_blank">
                                <i class="fas fa-question-circle"></i>
                            </a>
                        </li>

                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                                id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-user-tie pt-1"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('api.index') }}">API Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main style="margin-top: 58px">
            <div class="container pt-4">

                @yield('content')


            </div>
        </main>
        <!--Main layout-->




        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js">
        </script>

    </body>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
</html>