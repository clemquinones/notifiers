<?php

namespace Clem\Notifiers;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/clem/notifiers'),
        ], 'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Flash::class, FlashNotifier::class);
        
        $this->app->singleton('flash', function () {
            return $this->app->make(FlashNotifier::class);
        });
    }
}
