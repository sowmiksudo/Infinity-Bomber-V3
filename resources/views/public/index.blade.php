@extends('admin.layouts.public')
@section('title', 'Public Page')
@section('content')

{{-- style="background-color: #99ccff;" --}}

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle">
            <i class="fas fa-bars"></i>
            <a class="text-muted" href="#" style="color: white;"><i class="fas fa-fire mx-1"></i> {{ $project_name
                }}</a>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand fw-bold" href="#" style="color: aquamarine;"><i class="fas fa-fire mx-1"></i> {{
                $project_name }}</a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ $settings->facebook_link }}"><i
                            class="fab fa-facebook mx-1"></i>Facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ $settings->youtube_link }}"><i
                            class="fab fa-youtube mx-1"></i>Youtube</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ $admin_contact }}"><i class="fas fa-headset mx-1"></i>Contact Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="protect"><i class="fas fa-user-shield mx-1"></i>Protect Number</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        {{-- <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="{{ $developer_contact }}">
                <i class="fas fa-code"></i>
            </a>
        </div> --}}
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<form class="my-form" action="" method="POST">
    <div class="container">
        <div class="logo text-center">
            <img src="/public/logo.png" style="margin-left: 25px;" class="rounded img-fluid" alt="{{ $project_name }}"
                width="150px">
        </div>
        {{-- <h4 class="text-center mb-5"><i class="fas fa-fire"></i> {{ $project_name }}</h4> --}}
        @if (Session::get("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! Session::get("success") !!}
        </div>
        @elseif (Session::get('fail'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {!! Session::get("fail") !!}
        </div>
        @endif

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show fw-bold">
            <span>{{ $error }}</span>
        </div>
        @endforeach
        @endif
        @csrf
        <div>
            <div>
                <div class="grid">
                    <input type="number" name="number" placeholder="Number">
                </div>
            </div>
            <br>
            <div>
                <div class="grid grid-2">
                    <input type="number" name="amount" placeholder="Amount">
                    <input type="number" name="threads" placeholder="Threads">
                </div>
            </div>
            <br>
            <div>
                <input name="note" placeholder="Note" />
            </div>
            <div class="">
                <div class="grid grid-4 mt-3">
                    {{-- <div class="required-msg text-muted">REQUIRED FIELDS</div> --}}
                    <button class="btn-grid me-auto" type="submit">
                        <span class="back">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/email-icon.svg" alt="">
                        </span>
                        <span class="front">START BOMBING</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<footer class="bottom mt-5">
    <div class="text-center">
        <small>
            {{ $settings->footer }}
        </small>
    </div>
</footer>

@endsection

@section('scripts')
<script>
    Swal.fire({
        icon: 'info',
        // title: 'Hey!',
        html: `<p>{!! $settings->notice !!}</p>`
    });

    document.getElementById('protect').addEventListener('click', function(e){
        Swal.fire({
            icon:'info',
            html:`{!! $settings->protect_notice !!}`
        });
    });

    share = document.getElementById('share')
    share.addEventListener('click', function(e){
        navigator.share({
            title:`{!! $settings->app_name !!}`,
            text:`{!! $settings->share_text !!}`,
            url: location.href
        })
    });

</script>
@endsection