<?php

namespace Ravols\ElasticInsight\Http\Controllers\Api;

use Illuminate\Routing\Controller;

class AllIndicesController extends Controller
{
    public function index()
    {
        // $indices = elasticSearchModuleRavols()->elasticSearchService()->getListOfIndices("colored");
        $client = elasticSearchModuleRavols()->elasticSearchService()->getClient();
        // $response = $client->cat()->indices();

        $params = [
            'index' => 'colored_products_eshop_2_2023_10_11_10_51_56',
            'id' => '51158',
        ];

        // Get doc at /my_index/_doc/my_id
        $response = $client->get($params);

        // $response = $client->get();

        dd($response);

        return response()->json([
            'data' => $indices,
        ]);
    }
}
