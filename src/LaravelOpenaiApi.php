<?php

namespace Mastashake\LaravelOpenaiApi;

use OpenAI\Laravel\Facades\OpenAI;
use Mastashake\LaravelOpenaiApi\Models\Prompt;

class LaravelOpenaiApi
{
  function generateResult(string $type, array $data): Prompt {
    switch ($type) {
      case 'text':
      return $this->generateText($data);
      case 'image':
      return $this->generateImage($data);
    }
  }

  function generateText($data) {
    $result = OpenAI::completions()->create($data);
    return $this->savePrompt($result, $data);
  }

  function generateImage($data) {
    $result = OpenAI::images()->create($data);
    return $this->savePrompt($result, $data);
  }

  private function savePrompt($result, $data): Prompt {
    $prompt = new Prompt([
      'prompt_text' => $data['prompt'],
      'data' => $result
    ]);
    return $prompt;
  }
}
