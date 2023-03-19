@extends('admin.layouts.public')
@section('title', 'Mr Bomber | Sms Bomber By Mojib Rsm| Mojibrsm.Xyz ')
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
            <a class="text-muted" href="#" style="color: purple;"><i class="fas fa-fire mx-1"></i> {{ $project_name
                }}</a>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand fw-bold" href="{{ route('user.bomber') }}" style="color: aquamarine;"><i
                    class="fas fa-fire mx-1"></i> {{
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.reset.index') }}" id="protect"><i
                            class="fas fa-cog mx-1"></i>Reset Password</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                <i class="fas fa-bell"></i>
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Admin Messages</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($notices as $notice)
                        <div class="card bg-secondary m-2">
                            <p class="card-header text-white">{!! $notice->title !!}</p>
                            <p class="card-body text-white">{!! $notice->content !!}</p>
                        </div>
                        @endforeach

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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
                    <input type="password" name="old_password" placeholder="Old Password">
                </div>
            </div>
            <br>
            <div>
                <div class="grid">
                    <input type="password" name="new_password" placeholder="New Password">
                </div>
            </div>
            <br>
            <div>
                <div class="grid">
                    <input type="password" name="new_password_confirmation" placeholder="Confirm New Password">
                </div>
            </div>
            <br>
            <div class="">
                <div class="grid grid-4 mt-3">
                    {{-- <div class="required-msg text-muted">REQUIRED FIELDS</div> --}}
                    <button class="btn-grid me-auto" type="submit">
                        <span class="back">
                            <i class="fa fa-cog"></i>
                        </span>
                        <span class="front">RESET PASS</span>
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
    document.getElementById('protect').addEventListener('click', function(e){
        Swal.fire({
            icon:'info',
            html:`{!! $settings->protect_notice !!}`
        });
    });

</script>
@endsection