<?php

namespace Ravols\ElasticInsight\Http\Controllers\Indices;

use Illuminate\Routing\Controller;

class AllIndicesController extends Controller
{
    public function index()
    {
        // dd(elasticSearchModuleRavols()->elasticSearchService());
        // dd(app()->elasticInsightElasticSearchModule->elasticSearchService()->test());

        return view('elastic-insight::indices.all-indices');
    }
}
