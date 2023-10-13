<?php

namespace Ravols\ElasticInsight;

use Ravols\ElasticInsight\Commands\ElasticInsightCommand;
use Ravols\ElasticInsight\Modules\Elastic\ElasticSearchModule;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ElasticInsightServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        if (! defined('ELASTIC_INSIGHT_PATH')) {
            define('ELASTIC_INSIGHT_PATH', realpath(__DIR__.'/../'));
        }

        $package
            ->name('elastic-insight')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_elastic-insight_table')
            ->hasCommand(ElasticInsightCommand::class)
            ->hasRoutes(['web','api']);

        $this->publishes([
            ELASTIC_INSIGHT_PATH.'/public' => public_path('vendor/elastic-insight'),
        ], ['elastic-insight-assets']);

        $this->app->singleton(
            'elasticInsightElasticSearchModule',
            ElasticSearchModule::class
        );

    }
}
