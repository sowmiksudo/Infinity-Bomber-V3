@extends('public.layouts.app')

@section('title')
Login
@endsection

@section('content')

<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
</style>


<section class="vh-300 gradient-custom h-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="text-white" style="border-radius: 1rem;">
                <!-- Section: Design Block -->
                <section class="">
                    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
                        <div class="container">
                            <div class="row gx-lg-5 align-items-center">
                                <div class="col-lg-6 mb-5 mb-lg-0">
                                    <h1 class="my-5 display-3 fw-bold ls-tight">
                                        {{ $project_name }} <br />
                                        <span class="text-dark">the best bomber service ever!</span>
                                    </h1>
                                    <p style="color: hsl(217, 10%, 90.8%)">
                                        Enter victim's number and go to sleep in peace.
                                    </p>
                                </div>

                                <div class="col-lg-6 mb-5 mb-lg-0">
                                    <div class="card bg-dark">
                                        <div class="card-body px-md-5">
                                            <div class="card-body text-center">
                                                <form action="{{ route('user.register.store') }}" method="post">
                                                    <div class="">
                                                        @csrf
                                                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                                        <p class="text-white-50 mb-5"></p>
                                                        @if ($errors->any())
                                                        <div class="alert alert-danger alert-dismissible fade show">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                        <div class="form-outline form-white mb-4">
                                                            <input type="text" id="name" name="name"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="name">Name</label>
                                                        </div>
                                                        <div class="form-outline form-white mb-4">
                                                            <input type="email" id="typeEmailX" name="email"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="typeEmailX">Email</label>
                                                        </div>

                                                        <div class="form-outline form-white mb-4">
                                                            <input type="number" id="phone" name="phone"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="phone">Phone</label>
                                                        </div>

                                                        <div class="form-outline form-white mb-4">
                                                            <input type="password" id="typePasswordX" name="password"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label"
                                                                for="typePasswordX">Password</label>
                                                        </div>

                                                        {{--
                                                        <p class="small mb-3 pb-lg-2"><a class="text-white-50"
                                                                href="#!">Forgot password?</a></p> --}}

                                                        <button class="btn btn-outline-light btn-lg px-5"
                                                            type="submit">Register</button>

                                                    </div>

                                                </form>
                                                <div class="mt-2">
                                                    <p class="mb-0">Already have an account? <a
                                                            href="{{ route('user.login.index') }}"
                                                            class="text-white-50 fw-bold">Login</a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Jumbotron -->
                </section>
                <!-- Section: Design Block -->



            </div>
        </div>
    </div>
    </div>
</section>
@endsection