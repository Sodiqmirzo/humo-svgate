<?php

namespace HumoSvgate\HumoSvgateLaravel;

use HumoSvgate\HumoSvgateLaravel\Commands\HumoSvgateLaravelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HumoSvgateLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('humo-svgate-laravel')
            ->hasConfigFile()
            ->hasCommand(HumoSvgateLaravelCommand::class);

        $this->app->singleton(HumoSvgateLaravel::class, function () {
            return new HumoSvgateLaravel();
        });
    }
}
