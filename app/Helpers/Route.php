<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Route
{
    /**
     * @param Request $request
     * @return string
     */
    public static function loginUrl(Request $request): string
    {
        return match ($request->route()->getPrefix()) {
            '/internal' => route('internal.security.auth.login.create'),
            default => route('site.account.auth.login.create'),
        };
    }
}
