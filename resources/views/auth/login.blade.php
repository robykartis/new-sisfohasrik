@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')
    <div class="card shadow-lg">
        <div class="card-body p-4">
            <h1 class="fs-4 text-center fw-bold mb-4">Login</h1>
            <h1 class="fs-6 mb-3">Silahkan Masukan Email dan Password Anda</h1>
            <form action="{{ route('proses_login') }}" method="POST" aria-label="abdul" data-id="abdul" class="needs-validation"
                novalidate="" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label class="mb-2 text-muted" for="email">User Name</label>
                    <div class="input-group input-group-join mb-3">
                        <input id="email" type="text" placeholder="Enter Email"
                            class="form-control  @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}" required autofocus>

                        <span class="input-group-text rounded-end">&nbsp<i class="fa fa-user"></i>&nbsp</span>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="mb-3">
                    <div class="mb-2 w-100">
                        <label class="text-muted" for="password">Password</label>

                    </div>
                    <div class="input-group input-group-join mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Your password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i
                                class="fa fa-eye"></i>&nbsp</span>
                        <div class="invalid-feedback">
                            Password required
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">

                    <button type="submit" class="btn btn-primary ms-auto">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
