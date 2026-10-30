![Banner](https://banners.beyondco.de/iSAMS%20API.png?theme=dark&packageManager=composer+require&packageName=spkm%2Fisams-api&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Tests](https://github.com/spkm/isams-api/actions/workflows/tests.yml/badge.svg)](https://github.com/spkm/isams-api/actions/workflows/tests.yml)
[![Latest version](https://img.shields.io/packagist/v/spkm/isams-api)](https://packagist.org/packages/spkm/isams-api)
[![PHP version](https://img.shields.io/packagist/php-v/spkm/isams-api)](https://packagist.org/packages/spkm/isams-api)

A Laravel package for the [iSAMS](https://www.isams.com) REST API and Batch API, built with
[Saloon](https://docs.saloon.dev). It has a request and typed models for every endpoint in iSAMS's
[API reference](https://developerdemo.isams.cloud/Main/swagger/ui/index), grouped by area: `admissions()`, `agent()`,
`billing()`, `bulletin()`, `cloudPortals()`, `curriculum()`, `discipline()`, `estates()`, `exclusions()`,
`gradebooks()`, `humanResources()`, `medicalCentre()`, `news()`, `otherSchools()`, `registration()`,
`rewardsAndConduct()`, `school()`, `storage()`, `studentRegisters()`, `students()`, `systemConfiguration()`,
`teaching()`, `timetable()` and `wellbeingManager()`. iSAMS's payment-provider webhooks are left out.

## Requirements

- PHP 8.3 or higher
- Laravel 12.39 or higher, or Laravel 13
- iSAMS REST API credentials (a client id and client secret) for your school

Apps on Laravel 11, or on Laravel 12 below 12.39, need to update to Laravel 12.39 or later before updating to version 2.

## Upgrading from version 1

Code written for version 1 keeps working, apart from the Laravel minimum above and the config file's publish tag
(below). Some changes are worth making:

- The early requests whose names don't follow the package's naming are deprecated in favour of generated ones, which
  return models:

  | Deprecated | Use instead |
  |---|---|
  | `Students\GetStudentSystemStatusesRequest` | `Students\SystemStatuses\GetStudentSystemStatusesRequest` |
  | `Students\Photos\GetCurrentPhotoBySchoolidRequest` | `Students\Photos\GetCurrentStudentPhotoRequest` |
  | `Students\Photos\GetPhotosBySchoolidPhotoidRequest` | `Students\Photos\GetStudentPhotoRequest` |
  | `Students\Contacts\GetContactsRequest` | `Students\Contacts\GetAllStudentContactsRequest` |
  | `Students\Contacts\GetContactsBySchoolidRequest` | `Students\Contacts\GetStudentContactsRequest` |
  | `Students\CustomFields\GetCustomFieldsBySchoolidRequest` | `Students\CustomFields\GetStudentCustomFieldsRequest` |
  | `Students\CustomFields\GetCustomFieldsBySchoolidAndCustomfieldidRequest` | `Students\CustomFields\GetStudentCustomFieldRequest` |
  | `Students\CustomFields\UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest` | `Students\CustomFields\PatchStudentCustomFieldRequest` (sends JSON, as iSAMS documents; the old request sends a form) |
  | `Teaching\GetSubjectsRequest` | `Teaching\Subjects\GetSubjectsRequest` |
  | `Teaching\GetSubjectByIdRequest` | `Teaching\Subjects\GetSubjectRequest` |
  | `Teaching\GetSubjectTeachingDepartmentsBySubjectidRequest` | `Teaching\SubjectTeachingDepartments\GetSubjectTeachingDepartmentsRequest` |
  | `Teaching\GetTeachingSetsRequest` | `Teaching\Sets\GetTeachingSetsRequest` |
  | `Teaching\GetStudentsInSetBySetidRequest` | `Teaching\Sets\GetTeachingSetStudentsRequest` |
  | `Teaching\GetCurriculumSubjectCodesRequest` | `Teaching\CurriculumSubjectCodes\GetCurriculumSubjectCodesRequest` |
  | `BatchApi\GetEndpointRequest`, `BatchApi\FilterEndpointRequest` | `Isams::batch()` with `Batch\BatchRequest` (see [Batch API](#batch-api)) |

- From 2 November 2026 iSAMS rejects Batch API requests that send only the key; the deprecated batch requests do
  that, `Isams::batch()` does not.
- The config file is published with `php artisan isams-api:install`, or `vendor:publish --tag=isams-api-config`.

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

Every request is also reachable through resources that follow iSAMS's areas, which your IDE can autocomplete. A
resource's methods are named for what they do: `all()` for a list, `get()` for one item, `create()`, `update()`,
`patch()` and `delete()`, `patchMany()` and the like for several at once, and actions of their own such as
`archive()` or `moveToAlumni()`:

```php
Isams::teaching()->subjects()->all();
Isams::teaching()->subjects()->get(7);
Isams::teaching()->sets()->addStudent(setId: 34, schoolId: '100001');
Isams::medicalCentre()->studentConditions()->archive(schoolId: '100001', conditionId: $key);
Isams::systemConfiguration()->list()->contactTypes()->all();
```

Path parameters always come in the order the URL has them.

Where iSAMS has changed an endpoint in a newer API version (so far, HR employee contracts), the plain request and
resource use the newest version; the older one sits in a `V1` namespace and resource for anything the newer version
dropped:

```php
Isams::humanResources()->employeeContracts()->all(employeeId: 40);       // iSAMS API version 2.0
Isams::humanResources()->employeeContracts()->v1()->all(employeeId: 40); // version 1.0
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

### Endpoints iSAMS adds later

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
Isams::connection('prep')->teaching()->subjects()->all();
```

The top-level `client_id`, `client_secret` and `base_url` remain the default connection.

### Batch API

iSAMS's Batch API returns large read-only exports, one set of methods per Batch API key. Each key has its own
client secret; the package fetches a token for the key and sends the key with every request. Add your keys to
`config/isams-api.php`, at the top level for the default school or under a named connection:

```php
'batch_keys' => [
    'timetable' => [
        'api_key' => env('ISAMS_BATCH_TIMETABLE_KEY'),
        'client_secret' => env('ISAMS_BATCH_TIMETABLE_SECRET'),
    ],
],
```

Run every method allocated to the key, or only some, with filters for the methods that need them:

```php
use spkm\IsamsApi\Batch\BatchFilters;
use spkm\IsamsApi\Batch\BatchRequest;

$batch = Isams::batch('timetable')->send(new BatchRequest)->dto();

$events = Isams::batch('calendar')->send(new BatchRequest(
    BatchFilters::make()
        ->methods('Calendar_GetEvents')
        ->filter('Calendar', 'Events', ['StartDate' => now(), 'EndDate' => now()->addMonth()])
))->dto()->method('Calendar_GetEvents');
```

`method()` returns a collection of models (`Data\Batch\{Module}\{RootNode}\{Node}`); `models($module, $rootNode)`
does the same by node name, and `get($module, $rootNode)` returns plain arrays for anything the package has no model
for. The filter's module and method names are the ones iSAMS documents for filters, which can differ from the
response's (for example `StudentManager` filters `PupilManager` methods). `cachedSecondsAgo()` says whether iSAMS
served the response from its cache. A failed request's `dto()` throws a `BatchApiException` with iSAMS's error name,
title and description.

Photos come as a zip, read by the student's or staff member's id:

```php
use spkm\IsamsApi\Batch\BatchPhotosRequest;

foreach (Isams::batch('photos')->send(BatchPhotosRequest::students())->dto()->photos() as $id => $png) {
    //
}
```

The older `GetEndpointRequest` and `FilterEndpointRequest` still work but are deprecated: from 2 November 2026 iSAMS
only accepts Batch API requests that authenticate with the key's own client secret.

### Cloud Portals

The Cloud Portals endpoints (`Isams::cloudPortals()`, `Requests\CloudPortals\…`) are the ones iSAMS's parent and
student portals use. iSAMS's spec lists them under the usual `restapi` scope, while its portal documentation names a
separate `iSAMS.CloudPortals.Api` scope; if your credentials need that scope, give them a connection of their own:

```php
'connections' => [
    'portals' => [
        'client_id' => env('ISAMS_PORTALS_CLIENT_ID'),
        'client_secret' => env('ISAMS_PORTALS_CLIENT_SECRET'),
        'base_url' => env('ISAMS_BASE_URL'),
        'scopes' => ['iSAMS.CloudPortals.Api'],
    ],
],
```

```php
Isams::connection('portals')->cloudPortals()->school()->bookmark()->all();
```

Many of them act for a signed-in portal user and are untyped in iSAMS's spec, so they return arrays; treat them as
unverified until you have tried them against your own iSAMS.

### When iSAMS is slow or offline

All of these are off unless you configure them (see `config/isams-api.php`):

- **Timeouts:** `ISAMS_CONNECT_TIMEOUT` and `ISAMS_REQUEST_TIMEOUT` (seconds; 10 and 30 by default). Lower them for
  web requests so pages don't hang.
- **Circuit breaker:** `ISAMS_CIRCUIT_BREAKER=true`. After repeated failures, requests fail instantly with an
  `IsamsUnavailable` exception for a cooldown period instead of waiting for timeouts. `Isams::isAvailable()` tells you,
  without contacting iSAMS, whether requests are currently paused.
- **Retries:** `ISAMS_RETRIES=3` retries GET requests that fail with a server error, rate limit or connection error.
  Writes are never retried, and nor are the few GETs that make iSAMS do something, such as running wellbeing workflows.
- **Re-authentication:** `ISAMS_REAUTHENTICATE=true` fetches a new token and repeats the request once when iSAMS rejects
  a cached token.
- **Caching:** `ISAMS_CACHE=true` caches slow-changing reference lists (terms, houses, year groups, forms, divisions,
  departments, buildings, rooms and the timetable structure) in your Laravel cache, for an hour by default.

## Testing

```bash
composer test
composer analyse
composer format:check
```

The tests never contact a real iSAMS: every response is faked.

### Checking the package against your iSAMS sandbox

iSAMS's documentation isn't always what its API does. The separate `Sandbox` test suite calls your own iSAMS sandbox,
reads every list it can without arguments (and every root node a Batch API key returns), and prints the field names
that differ from the package's models. It never prints values, and nothing it reads is saved.

```dotenv
ISAMS_SANDBOX_BASE_URL=https://your-sandbox.example
ISAMS_SANDBOX_CLIENT_ID=your-client-id
ISAMS_SANDBOX_CLIENT_SECRET=your-client-secret
# optional
ISAMS_SANDBOX_SCOPES="restapi"
ISAMS_SANDBOX_BATCH_KEY=your-batch-api-key
ISAMS_SANDBOX_BATCH_SECRET=your-batch-api-secret
```

```bash
vendor/bin/pest --testsuite=Sandbox
```

The checks only read: anything else is refused unless `ISAMS_SANDBOX_ALLOW_WRITES=true`, and the few GETs that make
iSAMS do something (such as running wellbeing workflows) are never sent. Only allow writes on a sandbox whose data you
may change.

## Contributing

Most requests and models are generated from iSAMS's API spec, pinned in `generator/spec`. Don't edit files in
`generated/`: change `generator/overrides.php` (or the generator) and run `composer generate`.
`composer generate:check` fails if the generated code is out of date. The Batch API models are generated from
`generator/batch/nodes.php`, the node lists from iSAMS's Batch API documentation.

## Security

If you discover any security related issues, please email hello@spkmitchell.co.uk instead of using the issue tracker.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## Licence

The MIT Licence (MIT).
