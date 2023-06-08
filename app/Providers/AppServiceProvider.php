<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            $routeName = match (request()->route()->getPrefix()) {
                '/internal' => 'internal.security.auth.reset-password.create',
                default => 'site.account.auth.reset-password.create',
            };

            return url(route(
                $routeName,
                [
                    'token' => $token,
                    'email' => $notifiable->getEmailForPasswordReset(),
                ], false
            ));
        });

        VerifyEmail::createUrlUsing(function ($notifiable) {
            $routeName = match (request()->route()->getPrefix()) {
                '/internal' => 'internal.security.auth.message-verification-email',
                default => 'site.account.auth.message-verification-email',
            };

            return URL::temporarySignedRoute(
                $routeName,
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });
    }
}
