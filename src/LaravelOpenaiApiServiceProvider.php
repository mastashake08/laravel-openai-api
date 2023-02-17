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
            ->hasViews()
            ->hasRoute('api')
            ->publishesServiceProvider('OpenAI\Laravel\ServiceProvider')
            ->hasMigration('create_laravel-openai-api_table')
            ->hasCommand(LaravelOpenaiApiCommand::class);
    }
}
