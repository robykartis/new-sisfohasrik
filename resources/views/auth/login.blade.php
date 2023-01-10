@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')
    <div class="hero-static d-flex align-items-center">
        <div class="w-100">
            <!-- Sign In Section -->
            <div class="bg-body-extra-light">
                <div class="content content-full">
                    <div class="row g-0 justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
                            <!-- Header -->
                            <div class="text-center">
                                <p class="mb-2">
                                    <i class="fa fa-2x fa-circle-notch text-primary"></i>
                                </p>
                                <h1 class="h4 mb-1">
                                    Sign In
                                </h1>
                                <p class="fw-medium text-muted mb-3">
                                    A perfect match for your project
                                </p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->

                            <form class="js-validation-signin" action="{{ route('proses_login') }}" method="POST">
                                @csrf
                                <div class="py-3">
                                    <div class="mb-4">
                                        <input type="email"
                                            class="form-control form-control-lg form-control-alt  @error('email') is-invalid @enderror""
                                            id="signup-email" name="email" placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="password"
                                            class="form-control form-control-lg form-control-alt  @error('password') is-invalid @enderror"
                                            id="login-password" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-md-flex align-items-md-center justify-content-md-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="login-remember" name="login-remember">
                                                <label class="form-check-label" for="login-remember">Remember
                                                    Me</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-xxl-5">
                                        <button type="submit" class="btn w-100 btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Sign In Section -->

            <!-- Footer -->
            <div class="fs-sm text-center text-muted py-3">
                <strong>OneUI 5.5</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
            <!-- END Footer -->
        </div>
    </div>
@endsection
