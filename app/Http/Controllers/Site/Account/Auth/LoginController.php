<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Account\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ClassApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @return ClassApplication|View|Factory|Application
     */
    public function create(): ClassApplication|View|Factory|Application
    {
        return view('site.account.auth.login.create');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()
            ->intended(route('site.account.inbox.main'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('site')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('site.account.auth.login.create');
    }
}
