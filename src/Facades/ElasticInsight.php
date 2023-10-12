<?php

namespace Ravols\ElasticInsight\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ravols\ElasticInsight\ElasticInsight
 */
class ElasticInsight extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ravols\ElasticInsight\ElasticInsight::class;
    }
}
