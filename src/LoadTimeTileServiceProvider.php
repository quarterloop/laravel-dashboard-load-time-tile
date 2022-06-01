<?php

namespace Quarterloop\LoadTimeTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\LoadTimeTile\Commands\FetchLoadTimeCommand;

class LoadTimeTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchLoadTimeCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-load-time-tile'),
        ], 'dashboard-load-time-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-load-time-tile');

        Livewire::component('load-time-tile', LoadTimeTileComponent::class);
    }
}
