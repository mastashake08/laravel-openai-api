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
        $prompt = $this->ask('Enter the prompt');
        if ($this->confirm('Do you wish to add a suffix to the generated result?')) {
            //
            $suffix = $this->ask('What is the suffix?');
        }
        $model = $this->choice(
            'What model do you want to use?',
            ['text-davinci-003', 'text-curie-001', 'text-babbage-001', 'text-ada-001'],
            0
        );
        if ($this->confirm('Do you wish to set the max tokens used(defaults to 16)?')) {
          $max_tokens = (int)$this->ask('Max number of tokens to use?');
        }

        $data = [
          'suffix' => $suffix,
          'prompt' => $prompt,
          'model' => $model,
          'max_tokens' => $max_tokens
        ];

        $ai = new LaravelOpenaiApi();
        $result = $ai->generateResult($data);

        $this->comment($result . '\n');
        $choices = $result['choices'];
        foreach($choices as $choice) {
          $this->comment($choice[0]['text'].'\n');
        }

        return self::SUCCESS;
    }
}
