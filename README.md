![Banner](https://banners.beyondco.de/iSAMS%20API.png?theme=dark&packageManager=composer+require&packageName=spkm%2Fisams-api&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Tests](https://github.com/spkm/isams-api/actions/workflows/tests.yml/badge.svg)](https://github.com/spkm/isams-api/actions/workflows/tests.yml)
[![Latest version](https://img.shields.io/packagist/v/spkm/isams-api)](https://packagist.org/packages/spkm/isams-api)

A Laravel package for the [iSAMS](https://www.isams.com) REST API, built with [Saloon](https://docs.saloon.dev).
See iSAMS's [API reference](https://developerdemo.isams.cloud/Main/swagger/ui/index) for the available endpoints.

## Requirements

- PHP 8.3 or higher
- Laravel 12.39 or higher, or Laravel 13
- iSAMS REST API credentials (a client id and client secret) for your school

Apps on Laravel 11, or on Laravel 12 below 12.39, need to update to Laravel 12.39 or later before updating to version 2.

## Installation

```bash
composer require spkm/isams-api
```

Publish the config file if you want to change it:

```bash
php artisan isams-api:install
```

Then set your credentials in `.env`:

```dotenv
ISAMS_REST_CLIENT_ID=your-client-id
ISAMS_REST_CLIENT_SECRET=your-client-secret
ISAMS_BASE_URL=https://isams.your-school.example
```

`IASMS_BASE_URL`, the misspelt name used by earlier versions, is still read if `ISAMS_BASE_URL` is not set.

## Usage

Send a request through the `Isams` facade, which uses the configured credentials:

```php
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;

$response = Isams::send(new GetStudentRequest('100001'));

$student = $response->json();
```

`send()` never throws when iSAMS returns an error: check `$response->failed()` or `$response->status()`, and read
iSAMS's explanation from `$response->json('message')`.

Or build a connector yourself:

```php
use spkm\IsamsApi\IsamsConnector;

$isams = new IsamsConnector($clientId, $clientSecret, $baseUrl);
```

The connector fetches an access token from iSAMS and caches it, encrypted, until shortly before it expires.

### Paging through results

```php
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;

foreach ($isams->paginate(new GetStudentsRequest)->collect() as $student) {
    // $student is an array, read from the "students" list of each page.
}
```

### Models

Some requests turn the response into objects, for example a student's contacts:

```php
use spkm\IsamsApi\Requests\Students\Contacts\GetContactsBySchoolidRequest;

$contacts = Isams::send(new GetContactsBySchoolidRequest('100001'))->dto(); // Collection of StudentContact
```

### Endpoints the package doesn't cover yet

Send a request to any iSAMS path relative to your base URL:

```php
use spkm\IsamsApi\Requests\ConfigurableRequest;
use spkm\IsamsApi\Requests\ConfigurablePaginatedRequest;

$response = Isams::send(new ConfigurableRequest('/api/school/terms'));

$terms = $isams->paginate(new ConfigurablePaginatedRequest('/api/school/terms', resultKey: 'terms'))->collect();
```

## Testing

```bash
composer test
composer analyse
composer format:check
```

The tests never contact a real iSAMS: every response is faked.

## Security

If you discover any security related issues, please email hello@spkmitchell.co.uk instead of using the issue tracker.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## Licence

The MIT Licence (MIT).
