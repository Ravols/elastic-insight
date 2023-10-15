<?php

namespace Ravols\ElasticInsight\Http\Controllers\Indices;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $response = elasticSearchModuleRavols()->elasticSearchService()->getElasticResponse('colored_products_eshop_2_2023_10_07', '_search');
        $responseFields = [];

        if(isset($response['hits']->hits[0]->_source)) {
            foreach($response['hits']->hits[0]->_source as $key => $source) {
                $responseFields[] = $key;
            }
        }

        return view('elastic-insight::indices.index')->with(['response' => $response, 'responseFields' => $responseFields]);
    }
}
