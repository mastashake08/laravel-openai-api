<?php

namespace Mastashake\LaravelOpenaiApi\Commands;

use Illuminate\Console\Command;

class LaravelOpenaiApiCommand extends Command
{
    public $signature = 'laravel-openai-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
