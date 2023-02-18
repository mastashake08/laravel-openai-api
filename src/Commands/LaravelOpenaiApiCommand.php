<?php

namespace Mastashake\LaravelOpenaiApi\Commands;

use Illuminate\Console\Command;
use Mastashake\LaravelOpenaiApi\LaravelOpenaiApi;
class LaravelOpenaiApiCommand extends Command
{
    public $signature = 'laravel-openai-api:generate-result';

    public $description = 'Generate Result';

    public function handle(): int
    {
        $suffix = null;
        $prompt = $this->ask('Enter the prompt: ');
        if ($this->confirm('Do you wish to continue?')) {
            //
            $suffix = $this->ask('What is the suffix?');
        }
        $model = $this->choice(
            'What model do you want to use?',
            ['text-davinci-003', 'text-curie-001', 'text-babbage-001', 'text-ada-001'],
            0
        );
        $max_tokens = $this->ask('Max number of tokens to use (defaults to 16)?');

        $data = [
          'suffix' => $suffix,
          'prompt' => $prompt,
          'model' => $model,
          'max_tokens' => $max_tokens
        ];

        $ai = new LaravelOpenaiApi();
        $result = $ai->generateResult($data);

        $this->comment($result);
        $this->comment('All done');

        return self::SUCCESS;
    }
}
