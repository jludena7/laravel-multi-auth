<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Services\Site\PasswordService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ClassApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    private PasswordService $passwordService;

    /**
     * @param PasswordService $passwordService
     */
    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    /**
     * @return ClassApplication|Application|Factory|View
     */
    public function create(): View|Factory|ClassApplication|Application
    {
        return view('site.account.auth.forgot-password.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required']);

        $status = $this->passwordService->sendResetLink($request);

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('success', __($status));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
