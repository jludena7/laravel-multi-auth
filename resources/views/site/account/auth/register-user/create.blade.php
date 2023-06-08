@extends('site.template.layout')

@section('title', __('app.title_register_user'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('app.title_register_user') }}</h1>
                                </div>
                                @include('site.template.partials.errors')
                                @include('site.template.partials.success')
                                <form method="post" action="{{ route('site.account.auth.register-user.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                        <div class="col-sm-9">
                                            <input id="name" name="name" type="text" required autocomplete="off" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? null ) }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                        <div class="col-sm-9">
                                            <input id="email" name="email" type="email" required autocomplete="off" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? null) }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label col-form-label-sm">Password</label>
                                        <div class="col-sm-9">
                                            <input id="password" name="password" type="password" required autocomplete="off" class="form-control form-control-sm @error('password') is-invalid @enderror">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-3 col-form-label col-form-label-sm">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="off" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('app.btn_create') }}</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('site.account.auth.login.create') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
