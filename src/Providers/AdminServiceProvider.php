<?php

namespace Sorethea\Admin\Providers;

use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;
use Sorethea\Admin\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class AdminServiceProvider extends PluginServiceProvider
{
    protected array $resources =[
        UserResource::class,
    ];
    public function configurePackage(Package $package): void
    {
        $package->name('admin');
    }

    public function register()
    {
        //$this->app->register(FilamentServiceProvider::class);
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
