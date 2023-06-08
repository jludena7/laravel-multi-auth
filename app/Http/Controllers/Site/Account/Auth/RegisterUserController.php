<?php

namespace App\Http\Controllers\Site\Account\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Account\RegisterUserRequest;
use App\Models\Site\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ClassApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterUserController extends Controller
{
    /**
     * @param Request $request
     * @return ClassApplication|Application|Factory|View
     */
    public function create(Request $request): ClassApplication|Application|Factory|View
    {
        return view(
            'site.account.auth.register-user.create',
            ['request' => $request]
        );
    }

    /**
     * @param RegisterUserRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'uuid' => Str::uuid()->toString(),
            'status' => 0,
        ];

        $user = new User();
        $user->fill($params);
        $user->save();

        event(new Registered($user));

        Auth::guard('site')->login($user);

        return redirect()
            ->route(RouteServiceProvider::ROUTE_SITE_INBOX);
    }
}
