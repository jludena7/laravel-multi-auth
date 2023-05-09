@extends('site.template.layout')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">User Login</h1>
                                </div>
                                @include('site.template.partials.errors')
                                @include('site.template.partials.success')
                                <form method="post" action="{{ route('site.account.auth.login.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" placeholder="Email Address" required autocomplete="off" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" placeholder="Password" required autocomplete="off" class="form-control form-control-user @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('site.account.auth.forgot-password.create') }}">Forgot Password?</a>
                                    <hr>
                                    <a class="small" href="{{ route('site.account.auth.register-user.create') }}">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
