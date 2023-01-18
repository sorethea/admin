<?php

namespace Sorethea\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public string $name = 'admin';
    public function register()
    {
        $this->app->register(FilamentServiceProvider::class);
    }

    public function boot()
    {
        $this->registerConfig();
    }

    public function registerConfig(){
        $this->publishes([
            __DIR__.'/../Config/config.php'=>config_path($this->name.'.php')
        ],'config');
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php',$this->name);
    }
}
