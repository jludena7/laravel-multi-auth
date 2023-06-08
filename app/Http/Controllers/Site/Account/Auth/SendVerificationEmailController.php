<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SendVerificationEmailController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route(RouteServiceProvider::ROUTE_SITE_INBOX));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', __('auth.sent_verification_link'));
    }
}
