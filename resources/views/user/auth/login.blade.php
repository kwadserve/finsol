@extends('user.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                    src="{{ asset('assets/img/icons/spot-illustrations/bg-shape.png')}}" alt="" width="250"><img
                    class="bg-auth-circle-shape-2" src="{{ asset('assets/img/icons/spot-illustrations/shape-1.png')}}"
                    alt="" width="150">
                <div class="card overflow-hidden z-1">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100">
                            <div class="col-md-5 text-center bg-card-gradient">
                                <div class="position-relative p-4 pt-md-5 pb-md-7" data-bs-theme="light">
                                    <div class="bg-holder bg-auth-card-shape"
                                        style="background-image:url({{ asset('assets/img/icons/spot-illustrations/half-circle.png')}});">
                                    </div>
                                    <!--/.bg-holder-->
                                    <div class="z-1 position-relative"><a
                                            class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder"
                                            href="#">Finsol</a>
                                        <p class="opacity-75 text-white">Save money and Save time with India’s largest
                                            tax and financial
                                            services software platform Sampurna Suvidha Kendra</p>
                                    </div>
                                </div>
                                <div class="mt-3 mb-4 mt-md-4 mb-md-5" data-bs-theme="light">
                                    <p class="text-white">Don't have an account?<br><a
                                            class="text-decoration-underline link-light" href="#">Get
                                            started!</a></p>
                                    <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">Read our <a
                                            class="text-decoration-underline text-white" href="#!">terms</a> and <a
                                            class="text-decoration-underline text-white" href="#!">conditions </a></p>
                                </div>
                            </div>
                            <div class="col-md-7 d-flex flex-center">
                                <div class="p-4 p-md-5 flex-grow-1">
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h3>Login</h3>
                                        </div>
                                    </div>
                                    <!-- <form class="needs-validation" novalidate=""> -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3"><label class="form-label" for="card-email">Email
                                                address/Aadhar Number</label><input
                                                class="form-control @error('email') is-invalid @enderror"
                                                pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
                                                required="required" data-wizard-validate-email="true" id="card-email"
                                                type="email" value="{{ old('email') }}" name="email"
                                                autocomplete="email" autofocus />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="invalid-feedback">Please Provide Email address or Aadhar Number
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between"><label class="form-label"
                                                    for="card-password">Password</label></div><input
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="card-password" required="" name="password" type="password" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="invalid-feedback">Please enter a valid Password</div>
                                        </div>
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <div class="form-check mb-0"><input class="form-check-input"
                                                        type="checkbox" id="card-checkbox" checked="checked"
                                                        name="remember" {{ old('remember') ? 'checked' : '' }} /><label
                                                        class="form-check-label mb-0" for="card-checkbox">Remember
                                                        me</label></div>
                                            </div>
                                            <div class="col-auto">
                                                @if (Route::has('password.request'))
                                                <a class="fs--1" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password?') }}
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3"
                                                type="submit" name="submit">Log in</button></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection