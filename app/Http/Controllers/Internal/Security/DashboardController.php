<?php

namespace App\Http\Controllers\Internal\Security;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ClassApplication;

class DashboardController extends Controller
{
    /**
     * @return ClassApplication|View|Factory|Application
     */
    public function main(): ClassApplication|View|Factory|Application
    {
        return view('internal.security.dashboard.main');
    }
}
