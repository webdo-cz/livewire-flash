<?php

namespace WebdoCZ\LivewireFlash;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

class LivewireFlashServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__. '/publish/livewire-flash.php', 'livewire-flash');

        $this->loadViewsFrom(__DIR__ . '/views', 'livewire-flash');

        $this->publishes([
            __DIR__ . '/publish' => config_path()
        ]);

        Livewire::component('flash-messages', \WebdoCZ\LivewireFlash\Livewire\FlashMessages::class);
    }
}
