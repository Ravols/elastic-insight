<?php

use Ravols\ElasticInsight\Modules\Elastic\ElasticSearchModule;

if (! function_exists('elasticSearchModuleRavols')) {
    function elasticSearchModuleRavols(): ElasticSearchModule
    {
        return app()['elasticInsightElasticSearchModule'];
    }
}
