<?php

use Illuminate\Support\Facades\Route;
use Ravols\ElasticInsight\Http\Controllers\DashboardController;
use Ravols\ElasticInsight\Http\Controllers\Indices\AllAliasesController;
use Ravols\ElasticInsight\Http\Controllers\Indices\AllIndicesController;
use Ravols\ElasticInsight\Http\Controllers\Indices\IndexController;
use Ravols\ElasticInsight\Http\Controllers\Queries\QueryController;

Route::get('elastic-insight', [DashboardController::class, 'index']);
Route::group(['prefix' => 'elastic-insight', 'as' => 'elastic-insight.'], function (): void {
    Route::group(['prefix' => 'indices', 'as' => 'indices.'], function (): void {
        Route::get('all-indices', [AllIndicesController::class, 'index'])->name('index');
        Route::get('index', [IndexController::class, 'index'])->name('index.view');
    });
    Route::group(['prefix' => 'aliases', 'as' => 'aliases.'], function (): void {
        Route::get('all-aliases', [AllAliasesController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'queries', 'as' => 'queries.'], function (): void {
        Route::get('/', [QueryController::class, 'index'])->name('index');
    });
    Route::get('elastic-insight', [DashboardController::class, 'index']);
});
