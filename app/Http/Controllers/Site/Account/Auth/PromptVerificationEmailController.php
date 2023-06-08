<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromptVerificationEmailController extends Controller
{
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(route(RouteServiceProvider::ROUTE_SITE_INBOX))
            : view('site.account.auth.prompt-verification-email.create');
    }
}
