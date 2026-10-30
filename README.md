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

### Resources

Every request is also reachable by area, which your IDE can autocomplete:

```php
Isams::teaching()->subjects()->getSubjects();
Isams::teaching()->teachingSets()->addStudentToTeachingSet(setId: 34, schoolId: '100001');
```

### Models

Requests turn iSAMS's JSON into typed, read-only models with `dto()`: one model, a `Collection` of models for
lists, `Created` (the new record's `location` and `id`) for creations, or `File` for downloads.

```php
use spkm\IsamsApi\Data\Teaching\SubjectForCreate;
use spkm\IsamsApi\Requests\Teaching\Subjects\CreateSubjectRequest;

$created = Isams::send(new CreateSubjectRequest(new SubjectForCreate(code: 'MA', name: 'Mathematics')))->dto();
```

`dto()` throws an `IsamsApiException` (with iSAMS's `isamsMessage()` and `trackingNumber()`) when iSAMS returned an
error, so check `$response->failed()` first if you'd rather handle errors yourself. Models are lenient: fields iSAMS
leaves out are `null`, and fields the package doesn't know about are ignored. Fields with a fixed set of values also
have an enum helper, such as `$student->genderEnum()`.

### Paging through results

```php
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;

foreach ($isams->paginate(new GetStudentsRequest)->collect() as $student) {
    // $student is an array, read from the "students" list of each page.
}
```

Use `dtos()` instead of `collect()` to get models, for requests that have one.

### Filtering and updating

```php
use spkm\IsamsApi\Support\Filter;
use spkm\IsamsApi\Support\JsonPatch;

$filter = Filter::where('surname', 'eq', "O'Brien")->and('enrolmentDate', 'ge', now()->subYear());

$patch = JsonPatch::make()->replace('/preferredName', 'Alex');
```

`Filter` produces iSAMS's OData `$filter` syntax (only `eq`, `ne`, `gt`, `ge`, `lt` and `le` are supported) and can be
passed wherever a request takes a `filter`. iSAMS's PATCH endpoints take a `JsonPatch`.

### Endpoints the package doesn't cover yet

Call any iSAMS path relative to your base URL:

```php
$groups = Isams::get('/api/students/customgroups', ['$filter' => "Name eq 'Choir'"])->json();
Isams::post('/api/students/customgroups', ['name' => 'Choir']);

foreach (Isams::paginateEndpoint('/api/students/customgroups', 'customGroups')->collect() as $group) {
    //
}
```

`put()`, `patch()` and `delete()` work the same way. The older `ConfigurableRequest` and `ConfigurablePaginatedRequest`
still work too.

### Several schools

Add named connections to `config/isams-api.php`:

```php
'connections' => [
    'prep' => [
        'client_id' => env('ISAMS_PREP_CLIENT_ID'),
        'client_secret' => env('ISAMS_PREP_CLIENT_SECRET'),
        'base_url' => env('ISAMS_PREP_BASE_URL'),
    ],
],
```

```php
Isams::connection('prep')->teaching()->subjects()->getSubjects();
```

The top-level `client_id`, `client_secret` and `base_url` remain the default connection.

### When iSAMS is slow or offline

All of these are off unless you configure them (see `config/isams-api.php`):

- **Timeouts:** `ISAMS_CONNECT_TIMEOUT` and `ISAMS_REQUEST_TIMEOUT` (seconds; 10 and 30 by default). Lower them for
  web requests so pages don't hang.
- **Circuit breaker:** `ISAMS_CIRCUIT_BREAKER=true`. After repeated failures, requests fail instantly with an
  `IsamsUnavailable` exception for a cooldown period instead of waiting for timeouts. `Isams::isAvailable()` tells you,
  without contacting iSAMS, whether requests are currently paused.
- **Retries:** `ISAMS_RETRIES=3` retries GET requests that fail with a server error, rate limit or connection error.
  Writes are never retried.
- **Re-authentication:** `ISAMS_REAUTHENTICATE=true` fetches a new token and repeats the request once when iSAMS rejects
  a cached token.
- **Caching:** `ISAMS_CACHE=true` caches slow-changing reference lists in your Laravel cache.

## Testing

```bash
composer test
composer analyse
composer format:check
```

The tests never contact a real iSAMS: every response is faked.

## Contributing

Most requests and models are generated from iSAMS's API spec, pinned in `generator/spec`. Don't edit files in
`generated/`: change `generator/overrides.php` (or the generator) and run `composer generate`.
`composer generate:check` fails if the generated code is out of date.

## Security

If you discover any security related issues, please email hello@spkmitchell.co.uk instead of using the issue tracker.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## Licence

The MIT Licence (MIT).
