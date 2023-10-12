<?php

use Ravols\ElasticInsight\Modules\Elastic\ElasticSearchModule;

function elasticSearchModuleRavols(): ElasticSearchModule
{
    dd(2);

    return app()['elasticInsightElasticSearchModule'];
}
