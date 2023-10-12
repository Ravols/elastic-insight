<?php

namespace Ravols\ElasticInsight\Http\Controllers\Indices;

use Illuminate\Routing\Controller;

class AllIndicesController extends Controller
{
    public function index()
    {
        return view('elastic-insight::indices.all-indices');
    }
}
