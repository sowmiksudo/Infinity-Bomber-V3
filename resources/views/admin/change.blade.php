@extends('admin.layouts.app')

@section('title', 'Change Password');

@section('content')

<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h1 class="text-secondaray text-center">CHANGE PASSWORD</h1>
                    @if (Session::get("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show fw-bold">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="form-outline my-4">
                            <input type="password" id="form4Example1" name="old_pass" class="form-control"  />
                            <label class="form-label" for="form4Example1">Old Pass</label>
                        </div>
                        <div class="form-outline my-4">
                            <input type="password" id="form4Example1" name="new_pass" class="form-control"  />
                            <label class="form-label" for="form4Example1">New Pass</label>
                        </div>
                        <div class="form-outline my-4">
                            <input type="password" id="form4Example1" name="new_pass_conf" class="form-control"  />
                            <label class="form-label" for="form4Example1">Confirm New Password</label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">CHANGE</button>
                    </form>
                    <hr class="my-4">

                    <a href="{{ route('admin.blacklist') }}">
                        <button class="btn btn-lg mb-2 btn-block btn-primary" style="background-color: #dd4b39;"
                            type="submit"></i> BLACKLIST HOME </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection