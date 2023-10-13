<?php

namespace Ravols\ElasticInsight\Http\Controllers\Api;

use Illuminate\Routing\Controller;

class AllIndicesController extends Controller
{
    public function index()
    {
        $indices = elasticSearchModuleRavols()->elasticSearchService()->getListOfIndices('colored');

        return response()->json([
            'data' => $indices,
        ]);
    }
}
