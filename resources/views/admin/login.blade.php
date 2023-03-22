<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN | {{ $project_name }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>

</head>

<body>


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h3 class="text-center m-5">LOGIN</h3>
                    @if (Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <span class="fw-bold">{{ Session::get('fail') }}</span>
                    </div>
                    @endif
                    <form method="POST" action="">
                        <!-- Email input -->
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-outline mb-4">
                            <input type="text" id="form1Example13" class="form-control form-control-lg"
                                name="username" />
                            <label class="form-label" for="form1Example13">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form1Example23" class="form-control form-control-lg"
                                name="password" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="https://www.facebook.com/Mojiibrsm">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>

                        <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="https://www.facebook.com/Mojiib.Rsm" target="_blank"
                            role="button">
                            <i class="fab fa-facebook-f me-2"></i>CONTACT ME
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </section>




    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js">
    </script>
</body>

</html>