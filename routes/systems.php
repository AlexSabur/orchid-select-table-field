<?php

use Illuminate\Support\Facades\Route;
use Orchid\Support\Facades\Dashboard;

Route::domain((string) config('platform.domain'))
    ->prefix(Dashboard::prefix('/systems/select-table'))
    ->as('platform.systems.select-table.')
    ->middleware(config('platform.middleware.private'))
    ->group(function () {
        // Route::post('/image-by-file', [ImageController::class, ''])
        //     ->name('image-by-file');
    });
