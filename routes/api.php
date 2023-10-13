<?php

use Illuminate\Support\Facades\Route;
use Ravols\ElasticInsight\Http\Controllers\Api\AllIndicesController;

Route::group(['middleware' => 'api', 'prefix' => 'elastic-insight/api'], function (): void {
    Route::get('indices', [AllIndicesController::class, 'index']);
});
