<?php

namespace Smart48\FlysystemDoSpaces;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Smart48\FlysystemDoSpaces\Commands\FlysystemDoSpacesCommand;

class FlysystemDoSpacesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('flysystem-do-spaces')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_flysystem-do-spaces_table')
            ->hasCommand(FlysystemDoSpacesCommand::class);
    }
}
