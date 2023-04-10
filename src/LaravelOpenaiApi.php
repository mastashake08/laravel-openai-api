<?php

namespace Mastashake\LaravelOpenaiApi;

use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Chat\CreateResponse;
use Mastashake\LaravelOpenaiApi\Models\Prompt;

class LaravelOpenaiApi
{
  function generateChat(array $data): Prompt {
    $result = OpenAI::chat()->create($data);
    return $this->savePrompt($result, $data);
  }

  function generateResult(string $type, array $data): Prompt {
    switch ($type) {
      case 'text':
      return $this->generateText($data);
      case 'image':
      return $this->generateImage($data);
      case 'chat':
      return $this->generateChat($data);
    }
  }

  function generateText(array $data): Prompt {
    $result = OpenAI::completions()->create($data);
    return $this->savePrompt($result, $data);
  }

  function generateImage($data): Prompt {
    $result = OpenAI::images()->create($data);
    return $this->savePrompt($result, $data);
  }

  private function savePrompt($result, $data): Prompt {
    $prompt = new Prompt([
      'prompt_text' => array_key_exists('prompt', $data) ? $data['prompt'] : $data['messages'],
      'data' => $result
    ]);
    return $prompt;
  }

}
