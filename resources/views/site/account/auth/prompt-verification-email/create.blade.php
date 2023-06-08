@extends('site.template.layout')

@section('title', 'Inbox')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <div class="text-center">
                        @include('internal.template.partials.errors')
                        @include('internal.template.partials.success')
                        <br>
                        Activate your account so that all your account options are enabled.
                        <br>
                        A link was sent to your email to confirm your account
                        <br>
                        <form method="POST" action="{{ route('site.account.auth.send-verification-email.store') }}">
                            @csrf
                            <div>
                                <button type="submit" class="btn btn-primary btn-user">{{ __('app.btn_resend_verification_email') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

