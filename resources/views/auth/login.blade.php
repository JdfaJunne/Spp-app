<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | {{ __('Login') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/Mujaka.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<style>


</style>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-2">
                            <a href="{{ route('login') }}" class="auth-logo">
                                <img src="{{ asset('assets') }}/images/mujaka-full.png" height="30"
                                    class="logo-dark mx-auto w-50 h-50" alt="">
                                <img src="{{ asset('assets') }}/images/mujaka-full.png" height="30"
                                    class="logo-light mx-auto w-50 h-50" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="pt-4">
                        <form method="POST" action="{{ route('login') }}" class="form-horizontal mt-3">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus placeholder="{{ __('Masukan Nisn / Username Anda') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="input-group col-12">
                                    <input class="form-control  @error('password') is-invalid @enderror" type="password"
                                        name="password" value="{{ old('password') }}" required autocomplete="password"
                                        autofocus id="password" placeholder="{{ __('Masukan Password Anda') }}">
                                        <span class="input-group-text ">
                                            <i style="cursor: pointer" class="bi bi-eye-slash" id="togglePassword"></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror



                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group mb-4 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-danger w-100 text-white waves-effect waves-light">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/seek.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>

    <script src="{{ asset('assets') }}/js/app.js"></script>

</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2023 21:04:51 GMT -->

</html>
