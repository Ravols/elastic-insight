<?php

namespace Ravols\ElasticInsight\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('elastic-insight::index');
    }
}
