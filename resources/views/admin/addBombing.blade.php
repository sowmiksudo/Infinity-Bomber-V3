@extends('admin.layouts.app')

@section('title', 'Add new Bombing task')

@section('content')

<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h1 class="text-secondaray text-center">ADD BOMBING</h1>
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
                    <form method="POST" action="">
                        @csrf
                        <input type="hidden" name="fromAdminPanel" value="on">
                        <div class="form-outline my-4">
                            <input type="number" placeholder="01xxxxxxxxx" id="form4Example1" name="number" class="form-control" required min="1000000000" max="99999999999" />
                            <label class="form-label" for="form4Example1">Mobile Number</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="number" placeholder="Max 5" id="form4Example1" name="threads" class="form-control" required/>
                            <label class="form-label" for="form4Example1">Threads</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="number" id="form4Example1" name="amount" class="form-control"  placeholder="999" />
                            <label class="form-label" for="form4Example1">Target Amount of OTP</label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">ADD</button>
                    </form>
                    <hr class="my-4">

                    <a href="{{ route('admin.index') }}">
                        <button class="btn btn-lg mb-2 btn-block btn-primary" style="background-color: #dd4b39;"
                            type="submit"></i> DASHBOARD HOME </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection