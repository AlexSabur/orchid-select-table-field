<?php

namespace AlexSabur\OrchidSelectTableField\Support\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Support\Facades\Dashboard;

class SelectTableServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->booted(function () {
            Dashboard::addPublicDirectory(
                'select-table',
                __DIR__ .  '/../../../public'
            );

            View::composer('platform::app', function () {
                Dashboard::registerResource('scripts', orchid_mix('/js/select-table.js', 'select-table'));
            });

            if ($this->app->runningInConsole()) {
                $this->commands([
                    ToolCommand::class,
                ]);
            }

            $this->loadViewsFrom(
                __DIR__ . '/../../../resources/views',
                'orchid-select-table-field'
            );

            $this->loadRoutesFrom(__DIR__ . '/../../../routes/systems.php');
        });
    }
}
