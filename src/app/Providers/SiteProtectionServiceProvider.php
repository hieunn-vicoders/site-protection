<?php

namespace VCComponent\Laravel\Site\Providers;

use Illuminate\Support\ServiceProvider;

class SiteProtectionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/route.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', "protection_page");
        $this->publishes([
            __DIR__ . '/../../resources/sass/_protection.scss' => base_path('/resources/sass/protection/_protection.scss'),
        ]);
    }
}
