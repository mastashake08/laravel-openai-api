<?php

it('can test', function () {
  var_dump(config('openai.api_key'));
  exit();
    expect(env('OPENAI_USE_SANCTUM'))->toBeTrue();
});
