<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="Sms Bomber | Mr Bomber | Best Sms Bomber | Sms Bomber By Mojibrsm | Bomber.Mojibrsm.xyz | Mojibrsm.xyz"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="https://bomber.mojibrsm.xyz"/>
    <meta property="og:image" content="https://bomber.mojibrsm.xyz/public/logo.png"/>
    <meta property="og:site_name" content="MrBomber"/>
    <meta property="og:description"
          content="Best Sms Bomber For Bangladesh.  Powerful Sms Bomber By Mojib Rsm..!! Sms Bomber | Best Sms Bomber | #Sms_Bomber | Mojibrsm.xyz | bomber.Mojibrsm.xyz | Mojib Rsm"/>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PTRCKWSKGB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "{!! $ga_id !!}");
    </script>
    <title>@yield('title') | {{ $project_name }}</title>
    <link rel="stylesheet" href="/public/public.css">
</head>

<body>
    @yield('content')
    {{-- <div>
        <div class="fab-container" id="share">
            <div class="fab shadow">
                <div class="fab-content">
                    <i class="fa fa-share text-white"></i>
                </div>
            </div>
        </div>
    </div> --}}
    @yield('scripts')
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
</body>

</html>