<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Account\ResetPasswordRequest;
use App\Services\Site\PasswordService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ClassApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
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
     * @param Request $request
     * @return ClassApplication|Application|Factory|View
     */
    public function create(Request $request): ClassApplication|Application|Factory|View
    {
        return view(
            'site.account.auth.reset-password.create',
            ['request' => $request]
        );
    }

    /**
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function store(ResetPasswordRequest $request): RedirectResponse
    {
        $status = $this->passwordService->resetPassword($request);

        if ($status == Password::PASSWORD_RESET) {
            return redirect()
                ->route('site.account.auth.login.create')
                ->with('success', __($status));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(__($status));
    }
}
