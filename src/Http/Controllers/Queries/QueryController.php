<?php

namespace Ravols\ElasticInsight\Http\Controllers\Queries;

use App\Http\Controllers\Controller;

class QueryController extends Controller
{
    public function index()
    {
        return view('elastic-insight::query.index')->with(['index' => request()->index]);
    }
}
