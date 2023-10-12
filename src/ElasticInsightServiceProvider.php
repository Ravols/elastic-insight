<?php

namespace Ravols\ElasticInsight;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ravols\ElasticInsight\Commands\ElasticInsightCommand;

class ElasticInsightServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('elastic-insight')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_elastic-insight_table')
            ->hasCommand(ElasticInsightCommand::class);
    }
}
