<?php

namespace Sorethea\Admin\Providers;


use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\PluginServiceProvider;
use Sorethea\Admin\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('admin');
    }
    public function boot():void
    {
        Filament::serving(function (){
            if(config('admin.navigation.enabled'))
                Filament::registerNavigationGroups([
                    NavigationGroup::make()
                        ->label(config('admin.navigation.name'))
                ]);
        });
    }

    protected function getResources(): array
    {
        return [
            UserResource::class,
        ];
    }
}
