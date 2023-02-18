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
        $data = [];
        $suffix = null;
        $n = 1;
        $temperature = 1;
        $displayJson = false;
        $max_tokens = 16;
        $type = $this->choice(
            'What are you generating?',
            ['text', 'image'],
            0
        );
        $prompt = $this->ask('Enter the prompt');
        $data['prompt'] = $prompt;

        if($type == 'text') {
          $model = $this->choice(
              'What model do you want to use?',
              ['text-davinci-003', 'text-curie-001', 'text-babbage-001', 'text-ada-001'],
              0
          );
          $data['model'] = $model;
          if ($this->confirm('Do you wish to add a suffix to the generated result?')) {
              //
              $suffix = $this->ask('What is the suffix?');
          }
          $data['suffix'] = $suffix;

          if ($this->confirm('Do you wish to set the max tokens used(defaults to 16)?')) {
            $max_tokens = (int)$this->ask('Max number of tokens to use?');
          }
          $data['max_tokens'] = $max_tokens;

          if ($this->confirm('Change temperature')) {
            $temperature = (float)$this->ask('What is the temperature(0-2)?');
            $data['temperature'] = $temperature;
          }
        }

        if ($this->confirm('Multiple results?')) {
          $n = (int)$this->ask('Number of results?');
          $data['n'] = $n;
        }

        $displayJson = $this->confirm('Display JSON results?');

        $ai = new LaravelOpenaiApi();
        $result = $ai->generateResult($type,$data);

        if ($displayJson) {
          $this->comment($result);
        }
        if($type == 'text') {
          $choices = $result->data['choices'];
          foreach($choices as $choice) {
            $this->comment($choice['text']);
          }
        } else {
          $images = $result->data;
          foreach($images as $image) {
            $this->comment($image['url']);
          }
        }


        return self::SUCCESS;
    }
}
