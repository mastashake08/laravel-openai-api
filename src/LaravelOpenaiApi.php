<?php

namespace Mastashake\LaravelOpenaiApi;

use OpenAI\Laravel\Facades\OpenAI;
use Mastashake\LaravelOpenaiApi\Models\Prompt;

class LaravelOpenaiApi
{
  function generateResult($data) {
    $data = json_encode($data);
    $result = OpenAI::completions()->create($data);
    $prompt = new Prompt([
      'prompt_text' => $data['prompt_text'],
      'data' => $data['data']
    ]);
    return $prompt;
  }
}
