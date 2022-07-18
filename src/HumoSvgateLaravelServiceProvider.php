<?php

namespace HumoSvgate\HumoSvgateLaravel;

use HumoSvgate\HumoSvgateLaravel\Commands\HumoSvgateLaravelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HumoSvgateLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('humo-svgate-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_humo-svgate-laravel_table')
            ->hasCommand(HumoSvgateLaravelCommand::class);
    }
}
