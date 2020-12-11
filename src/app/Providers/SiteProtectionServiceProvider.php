<?php

namespace VCComponent\Laravel\Site\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use VCComponent\Laravel\Site\Http\Middlewares\SiteProtectionMiddleWare;

class SiteProtectionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pushMiddlewareToGroup('web', SiteProtectionMiddleWare::class);
        $this->loadRoutesFrom(__DIR__ . '/../../routes/route.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', "protection_page");
        $this->publishes([
            __DIR__ . '/../../resources/sass/_protection.scss' => base_path('/resources/sass/protection/_protection.scss'),
            __DIR__ . '/../../config/site-protection.php'      => config_path('site-protection.php'),
        ]);
    }
}
