<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class MessageVerificationEmailController extends Controller
{
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route(RouteServiceProvider::ROUTE_SITE_INBOX) . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            $request->user()->forceFill(['status' => 1])->save();
            event(new Verified($request->user()));
        }

        return redirect()->intended(route(RouteServiceProvider::ROUTE_SITE_INBOX) . '?verified=1');
    }
}
