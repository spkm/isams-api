<?php

namespace spkm\IsamsApi;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IsamsApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('isams-api')
            ->hasConfigFile()
            ->hasInstallCommand(function(InstallCommand $command){
               $command
               ->publishConfigFile();
            });
    }
}
