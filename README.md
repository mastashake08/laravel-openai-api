# Add an OpenAI API and Artisan commands easily into your projects.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mastashake08/laravel-openai-api.svg?style=flat-square)](https://packagist.org/packages/mastashake08/laravel-openai-api)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mastashake08/laravel-openai-api/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mastashake08/laravel-openai-api/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mastashake08/laravel-openai-api/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mastashake08/laravel-openai-api/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mastashake08/laravel-openai-api.svg?style=flat-square)](https://packagist.org/packages/mastashake08/laravel-openai-api)



## Installation

You can install the package via composer:

```bash
composer require mastashake08/laravel-openai-api
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="openai-api-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="openai-api-config"
```

This is the contents of the published config file:

```return [

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
    'api_url' = env('OPENAI_API_URL')

];
```

## Usage

### Via Code
```php
$laravelOpenaiApi = new Mastashake\LaravelOpenaiApi();
echo $laravelOpenaiApi->generateResult($type, $data);
```
### Via Artisan
```php
php artisan laravel-openai-api:generate-result
```
### Via API
You set the OPENAI_API_URL in the .env file if a value is not set then it defaults to /api/generate-result
```
/api/generate-result POST {openai_data}
```
The data object requires a ```type``` property that is either set to text or image. Depending on which type then provide the JSON referenced in the [OpenAI API Reference](https://platform.openai.com/docs/api-reference/images/create)

#### Text Example
```
{
  "type": "text",
  "prompt": "Rust is",
  "n": 1,
  "model": "text-davinci-003",
  "max_tokens": 16
}
```

#### Image Example
```
{
  "type": "image",
  "prompt": "A cute baby sea otter",
  "n": 1,
  "size": "1024x1024"
}
```
## Testing

```bash
composer test
```

## Consider Sponsoring
Help me maintain this project, please consider looking at the [FUNDING](./.github/FUNDING.yml) file for more info.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jyrone Parker](https://github.com/mastashake08)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
{
    "name": "mastashake08/laravel-openai-api",
    "description": "Add an OpenAI API easily into your projects.",
    "version": "1.6.0",
    "description": "Add an OpenAI API and Artisan command easily into your projects. Generate images, or text. Can be integrated with Laravel Sanctum for token based access.",
    "version": "1.6.2",
    "keywords": [
        "mastashake08",
        "laravel",
        "laravel-openai-api",
        "chatGPT",
        "OpenAI"
        "OpenAI",
        "Laravel Sanctum"
    ],
    "homepage": "https://github.com/mastashake08/laravel-openai-api",
    "license": "MIT",
    "minimum-stability": "dev",
    "prefer-stable": true
}
