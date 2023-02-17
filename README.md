# Add an OpenAI API easily into your projects.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mastashake08/laravel-openai-api.svg?style=flat-square)](https://packagist.org/packages/mastashake08/laravel-openai-api)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mastashake08/laravel-openai-api/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mastashake08/laravel-openai-api/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mastashake08/laravel-openai-api/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mastashake08/laravel-openai-api/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mastashake08/laravel-openai-api.svg?style=flat-square)](https://packagist.org/packages/mastashake08/laravel-openai-api)


## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-openai-api.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-openai-api)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

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

];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="openai-api-views"
```

## Usage

### Via Code
```php
$laravelOpenaiApi = new Mastashake\LaravelOpenaiApi();
echo $laravelOpenaiApi->generateResult($data);
```
### Via API
```
/api/generate-result POST {openai_data}
```


## Testing

```bash
composer test
```

## Consider Sponsoring
Help me maintain this project, please consider looking at the [FUNDING](./github/FUNDING.yml) file for more info.

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
