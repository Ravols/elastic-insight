<?php

namespace Ravols\ElasticInsight\Http\Controllers\Indices;

use Illuminate\Routing\Controller;

class AllAliasesController extends Controller
{
    public function index()
    {
        return view('elastic-insight::indices.all-aliases');
    }
}
