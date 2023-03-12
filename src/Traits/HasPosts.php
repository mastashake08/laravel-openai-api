<?php

namespace Mastashake\LaravelOpenaiApi\Traits;

use Mastashake\LaravelOpenaiApi\Models\Prompt;

trait HasPosts
{
  public function prompts()
  {
    return $this->morphMany(Prompt::class, 'user');
  }
}
