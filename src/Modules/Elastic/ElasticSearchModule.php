<?php

namespace Ravols\ElasticInsight\Modules\Elastic;

use Ravols\ElasticInsight\Modules\Elastic\Services\ElasticSearchService;

class ElasticSearchModule
{
    private ElasticSearchService $elasticSearchService;

    public function elasticSearchService(): ElasticSearchService
    {
        $this->elasticSearchService = $this->elasticSearchService ?? new ElasticSearchService();

        return $this->elasticSearchService;
    }
}
