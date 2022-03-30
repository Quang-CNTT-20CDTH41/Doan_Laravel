@extends('layouts.app')

@section('content')
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

    </style>
    <section class="">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="bg-info border border rounded-3 text-white text-center p-2">Đăng nhập</h3>
                        @error('status')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email address</label>
                            <input type="email" id="form1Example13"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="form1Example23"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Sign
                            in</button>
                        <a href="{{ route('redirect') }}" type="submit" class="btn btn-primary"><i
                                class="fa-brands fa-google"></i> Google</a>
                        <a href="{{ route('register') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>
                            Register</a>
                        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa-solid fa-backward-step"></i>
                            Back</a>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">Lê Văn Quang</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
