<?php

return [

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Key and Organization
    |--------------------------------------------------------------------------
    |
    | Here you may specify your OpenAI API Key and organization. This will be
    | used to authenticate with the OpenAI API - you can find your API key
    | and organization on your OpenAI dashboard, at https://openai.com.
    */

    'api_key' => env('OPENAI_API_KEY'),
    'organization' => env('OPENAI_ORGANIZATION'),
    'api_url' => env('OPENAI_API_URL') !== null ? env('OPENAI_API_URL') : '/api/generate-result',
    'use_sanctum' => env('OPENAI_USE_SANCTUM') !== null ? env('OPENAI_USE_SANCTUM') : false

];
