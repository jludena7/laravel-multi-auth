@extends('site.template.layout')

@section('title', 'Reset Password')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                </div>
                                @include('site.template.partials.errors')
                                @include('site.template.partials.success')
                                <form method="post" action="{{ route('site.account.auth.reset-password.store') }}">
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
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
