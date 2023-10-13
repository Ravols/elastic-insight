<?php

namespace Ravols\ElasticInsight\Http\Controllers\Indices;

use Illuminate\Routing\Controller;

class AllIndicesController extends Controller
{
    public function index()
    {
        $indices = elasticSearchModuleRavols()->elasticSearchService()->getListOfIndices('colored');

        return view('elastic-insight::indices.all-indices')->with(['indices' => $indices]);
    }
}
