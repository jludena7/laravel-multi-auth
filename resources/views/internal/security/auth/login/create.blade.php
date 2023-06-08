@extends('internal.template.security')

@section('title', __('app.title_internal_login'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('app.title_internal_login') }}</h1>
                                </div>
                                @include('internal.template.partials.errors')
                                @include('internal.template.partials.success')
                                <form class="user" method="post" action="{{ route('internal.security.auth.login.store') }}">
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
                                    <a class="small" href="{{ route('internal.security.auth.forgot-password.create') }}">{{ __('app.btn_forgot_password') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
