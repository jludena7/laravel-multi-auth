<?php

namespace App\Http\Controllers\Site\Content;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ClassApplication;

class PageController extends Controller
{
    /**
     * @return ClassApplication|Application|Factory|View
     */
    public function home(): ClassApplication|Application|Factory|View
    {
        return view('site.content.page.home');
    }
}
