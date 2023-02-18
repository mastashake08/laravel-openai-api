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
        $n = 1;
        $displayJson = false;
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
        if ($this->confirm('Multiple results?')) {
          $n = (int)$this->ask('Number of results?');
        }

        $displayJson = $this->confirm('Display JSON results?');

        $data = [
          'suffix' => $suffix,
          'prompt' => $prompt,
          'model' => $model,
          'max_tokens' => $max_tokens,
          'n' => $n
        ];

        $ai = new LaravelOpenaiApi();
        $result = $ai->generateResult($data);

        $displayJson ? $this->comment($result);
        $choices = $result->data['choices'];
        foreach($choices as $choice) {
          $this->comment($choice['text']);
        }

        return self::SUCCESS;
    }
}
