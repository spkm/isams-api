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
            ->hasConfigFile('isams-api')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile();
            });

        $this->app->singleton('isams', function ($app) {
            return new IsamsService;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/isams-api.php' => config_path('isams-api.php'),
        ], 'isams-api');
    }

    public function provides()
    {
        return ['isams'];
    }
}
