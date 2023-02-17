<?php

namespace Mastashake\LaravelOpenaiApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mastashake\LaravelOpenaiApi\Commands\LaravelOpenaiApiCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
class LaravelOpenaiApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-openai-api')
            ->hasConfigFile(['openai'])
            ->hasRoute('api')
            ->publishesServiceProvider('Mastashake\LaravelOpenaiApi\LaravelOpenaiApiServiceProvider')
            ->hasMigration('create_laravel-openai-api_table')
            ->hasCommand(LaravelOpenaiApiCommand::class)
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->askToStarRepoOnGitHub('mastashake08/laravel-openai-api');
                  }
                );
    }
}
