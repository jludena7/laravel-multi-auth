<?php

namespace App\Services\Site;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Exception;

class PasswordService
{
    /**
     * @param Request $request
     * @return string
     */
    public function sendResetLink(Request $request): string
    {
        try {
            return Password::broker('psw_site_users')->sendResetLink(
                $request->only('email')
            );
        } catch (Exception $e) {
            report($e);

            return 'passwords.exception';
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    public function resetPassword(Request $request): string
    {
        try {
            return Password::broker('psw_site_users')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($request->input('password')),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );
        } catch (Exception $e) {
            report($e);

            return 'passwords.exception';
        }
    }
}
