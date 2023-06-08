@extends('internal.template.security')

@section('title', __('app.title_reset_password'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('app.title_reset_password') }}</h1>
                                </div>
                                @include('internal.template.partials.errors')
                                @include('internal.template.partials.success')
                                <form class="user" method="post" action="{{ route('internal.security.auth.reset-password.store') }}">
                                    @csrf
                                    <input name="token" type="hidden" value="{{ $request->route('token') }}">
                                    <input name="email" type="hidden" value="{{ $request->input('email') }}">
                                    <div class="form-group">
                                        <input name="password" type="password" placeholder="Password" required autocomplete="off" class="form-control form-control-user @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input name="password_confirmation" type="password" placeholder="Confirm Password" required autocomplete="off" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('app.btn_reset_password') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
