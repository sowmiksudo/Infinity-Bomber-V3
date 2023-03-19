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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />

</head>

<body>


    <body id="body-pd">
        
        <header>
        
            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top m-2 rounded shadow-lg">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Brand -->
                    <a class="navbar-brand" href="{{ route('user.bomber') }}">
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

                       
                    </ul>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main style="">
            <div class="">

                @yield('content')


            </div>
        </main>
        <!--Main layout-->




        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js">
        </script>


    </body>

</html>