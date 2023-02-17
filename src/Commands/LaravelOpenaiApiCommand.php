<?php

namespace Mastashake\LaravelOpenaiApi\Commands;

use Illuminate\Console\Command;

class LaravelOpenaiApiCommand extends Command
{
    public $signature = 'laravel-openai-api:generate-result';

    public $description = 'Generate Result';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
