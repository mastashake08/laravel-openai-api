<?php

namespace Mastashake\LaravelOpenaiApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mastashake\LaravelOpenaiApi\LaravelOpenaiApi
 */
class LaravelOpenaiApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mastashake\LaravelOpenaiApi\LaravelOpenaiApi::class;
    }
}
