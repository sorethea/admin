<?php

namespace Sorethea\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(FilamentServiceProvider::class);
    }

    public function boot()
    {
        $this->registerConfig();
    }

    protected function registerConfig(){
        $this->publishes([
            __DIR__.'/../Config/config.php'=>config_path('admin.php')
        ],'admin-config');
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php','admin');
    }
}
