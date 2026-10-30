<?php

use Carbon\CarbonImmutable;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Batch\BatchApiException;
use spkm\IsamsApi\Batch\BatchFilters;
use spkm\IsamsApi\Batch\BatchPhotosRequest;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Data\Batch\CalendarManager\Events\Event;
use spkm\IsamsApi\Data\Batch\CalendarManager\Events\Type;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

function batchConnector(string $apiKey = 'BATCH-KEY'): IsamsBatchConnector
{
    return new IsamsBatchConnector($apiKey, 'batch-secret', FakeIsams::BASE_URL);
}

/**
 * A made-up Batch API JSON response for the calendar's events, in the shape iSAMS turns its XML into JSON.
 *
 * @param  array<string, mixed>|list<array<string, mixed>>  $events
 * @return array<string, mixed>
 */
function batchEvents(array $events): array
{
    return ['iSAMS' => ['CalendarManager' => ['Events' => ['Event' => $events]]]];
}

it('fetches a token for the batch key itself, with the Batch API scope, and sends it with the key', function () {
    $isams = FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);

    batchConnector()->send(new BatchRequest);

    $token = FakeIsams::received($isams, GetClientCredentialsTokenRequest::class);
    $sent = FakeIsams::received($isams, BatchRequest::class);
    expect($token->body()->all())->toMatchArray(['client_id' => 'BATCH-KEY', 'client_secret' => 'batch-secret', 'scope' => 'apiv1'])
        ->and($token->query()->all())->not->toHaveKey('apiKey')
        ->and($sent->headers()->get('Authorization'))->toBe('Bearer fake-token')
        ->and($sent->query()->all())->toBe(['apiKey' => 'BATCH-KEY']);
});

it('keeps a separate token for each batch key', function () {
    $isams = FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);

    batchConnector('FIRST-KEY');
    batchConnector('SECOND-KEY');
    batchConnector('FIRST-KEY');

    expect(collect($isams->getRecordedResponses())->filter(fn ($response) => $response->getRequest() instanceof GetClientCredentialsTokenRequest))->toHaveCount(2);
});

it('asks for every method allocated to the key with a GET to the JSON feed', function () {
    $sent = FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);

    batchConnector()->send(new BatchRequest);

    $request = FakeIsams::received($sent, BatchRequest::class)->createPsrRequest();
    expect($request->getMethod())->toBe('GET')
        ->and($request->getUri()->getPath())->toBe('/api/batch/1.0/json.ashx')
        ->and((string) $request->getBody())->toBe('');
});

it('posts filters as XML to run only some methods, with dates, lists and switches written the way iSAMS reads them', function () {
    $isams = FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);
    $filters = BatchFilters::make()
        ->methods('Calendar_GetEvents', 'SchoolReports_GetReports')
        ->filter('Calendar', 'Events', ['StartDate' => CarbonImmutable::parse('2026-09-01'), 'EndDate' => '2026-12-18'])
        ->filter('StudentManager', 'Contacts', ['ContactTypes' => ['Mother', 'Father'], 'ContactOnly' => true, 'Note' => 'A & B']);

    batchConnector()->send(new BatchRequest($filters));

    $request = FakeIsams::received($isams, BatchRequest::class)->createPsrRequest();
    $xml = simplexml_load_string((string) $request->getBody());
    expect($request->getMethod())->toBe('POST')
        ->and($request->getHeaderLine('Content-Type'))->toBe('application/xml')
        ->and($xml->getName())->toBe('Filters')
        ->and(array_map('strval', $xml->xpath('/Filters/MethodsToRun/Method')))->toBe(['Calendar_GetEvents', 'SchoolReports_GetReports'])
        ->and((string) $xml->Calendar->Events['StartDate'])->toBe('2026-09-01')
        ->and((string) $xml->Calendar->Events['EndDate'])->toBe('2026-12-18')
        ->and((string) $xml->StudentManager->Contacts['ContactTypes'])->toBe('Mother,Father')
        ->and((string) $xml->StudentManager->Contacts['ContactOnly'])->toBe('true')
        ->and((string) $xml->StudentManager->Contacts['Note'])->toBe('A & B');
});

it('reads a method\'s records as models, unwrapping attributes, text values and legacy markers', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(batchEvents([
        ['@Id' => '2978', '@CategoryId' => '2', 'Category' => ['@Legacy' => 'True', '#text' => '2'], 'Subcategory' => ['@Legacy' => 'True'], 'StartDate' => '2026-12-17T00:00:00', 'Description' => 'Made-up evening', 'Hidden' => '0'],
        ['@Id' => '2979', 'Description' => 'Made-up morning', 'Hidden' => '1'],
    ]))]);

    $events = batchConnector()->send(new BatchRequest)->dto()->method('Calendar_GetEvents');

    expect($events)->toHaveCount(2)
        ->and($events[0])->toBeInstanceOf(Event::class)
        ->and($events[0]->id)->toBe(2978)
        ->and($events[0]->categoryId)->toBe(2)
        ->and($events[0]->category)->toBe(2)
        ->and($events[0]->subcategory)->toBeNull()
        ->and($events[0]->startDate)->toEqual(CarbonImmutable::parse('2026-12-17'))
        ->and($events[0]->hidden)->toBeFalse()
        ->and($events[1]->hidden)->toBeTrue();
});

it('reads a single record, which iSAMS sends without a list, as a list of one', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(batchEvents(['@Id' => '2978', 'Description' => 'Made-up evening']))]);

    $events = batchConnector()->send(new BatchRequest)->dto()->models('CalendarManager', 'Events');

    expect($events)->toHaveCount(1)
        ->and($events[0]->description)->toBe('Made-up evening');
});

it('reads nested lists as collections of models, whether iSAMS sends one item or several', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(batchEvents([
        ['@Id' => '1', 'Types' => ['Type' => [['@Id' => '7390', '@TypeId' => '3'], ['@Id' => '7391', '@TypeId' => '2']]]],
        ['@Id' => '2', 'Types' => ['Type' => ['@Id' => '7392', '@TypeId' => '1']]],
        ['@Id' => '3', 'Types' => ''],
    ]))]);

    $events = batchConnector()->send(new BatchRequest)->dto()->models('CalendarManager', 'Events');

    expect($events[0]->types->map->typeId->all())->toBe([3, 2])
        ->and($events[1]->types->first())->toBeInstanceOf(Type::class)
        ->and($events[1]->types->first()->id)->toBe(7392)
        ->and($events[2]->types)->toBeEmpty();
});

it('gives the records of any root as plain arrays, for methods the package has no model for', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => ['FutureManager' => ['Things' => ['Thing' => ['@Id' => '5', 'Name' => 'Made-up']]]]])]);

    $things = batchConnector()->send(new BatchRequest)->dto()->get('FutureManager', 'Things');

    expect($things->all())->toBe([['id' => '5', 'name' => 'Made-up']]);
});

it('returns nothing for a method the response does not include', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);

    expect(batchConnector()->send(new BatchRequest)->dto()->method('Calendar_GetEvents'))->toBeEmpty();
});

it('reports how long ago iSAMS cached the response, when it served it from its cache', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []], 200, ['Age' => '120'])]);

    expect(batchConnector()->send(new BatchRequest)->dto()->cachedSecondsAgo())->toBe(120);
});

it('throws a BatchApiException naming iSAMS\'s error when asked for the result of a failed request', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(
        '<?xml version="1.0" encoding="utf-16"?><Message><MessageId>MethodsNotAllocatedToKeyException</MessageId><MessageName>MethodsNotAllocatedToKeyException</MessageName><Title>Methods Not Allocated To Key</Title><Description>Made-up description</Description></Message>',
        403,
        ['Content-Type' => 'application/xml'],
    )]);

    $response = batchConnector()->send(new BatchRequest);

    expect($response->status())->toBe(403);

    try {
        $response->dto();
        $this->fail('Expected a BatchApiException.');
    } catch (BatchApiException $exception) {
        expect($exception->name())->toBe('MethodsNotAllocatedToKeyException')
            ->and($exception->title())->toBe('Methods Not Allocated To Key')
            ->and($exception->description())->toBe('Made-up description')
            ->and($exception->getMessage())->toBe('iSAMS Batch API responded 403: MethodsNotAllocatedToKeyException: Methods Not Allocated To Key');
    }
});

it('throws a BatchApiException with just the status when iSAMS sends no error message', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make('Bad gateway', 502)]);

    expect(fn () => batchConnector()->send(new BatchRequest)->dto())
        ->toThrow(BatchApiException::class, 'iSAMS Batch API responded 502');
});

it('downloads the current students\' photos and reads each one by the student\'s id', function () {
    $zip = tempnam(sys_get_temp_dir(), 'photos');
    $archive = new ZipArchive;
    $archive->open($zip, ZipArchive::OVERWRITE);
    $archive->addFromString('12.png', 'made-up PNG 12');
    $archive->addFromString('15.png', 'made-up PNG 15');
    $archive->close();
    $isams = FakeIsams::respondWith([BatchPhotosRequest::class => MockResponse::make((string) file_get_contents($zip), 200, ['Content-Type' => 'application/zip'])]);
    unlink($zip);

    $photos = batchConnector()->send(BatchPhotosRequest::students())->dto();

    expect(iterator_to_array($photos->photos()))->toBe(['12' => 'made-up PNG 12', '15' => 'made-up PNG 15'])
        ->and(FakeIsams::received($isams, BatchPhotosRequest::class)->getUrl())->toEndWith('/api/batch/1.0/photos.ashx');
});

it('downloads the current staff\'s photos from their own feed', function () {
    $isams = FakeIsams::respondWith([BatchPhotosRequest::class => MockResponse::make('', 200, ['Content-Type' => 'application/zip'])]);

    batchConnector()->send(BatchPhotosRequest::staff());

    expect(FakeIsams::received($isams, BatchPhotosRequest::class)->getUrl())->toEndWith('/api/batch/1.0/staffphotos.ashx');
});

it('builds a batch connector for a configured key, for the default school or a named one', function () {
    config([
        'isams-api.base_url' => FakeIsams::BASE_URL,
        'isams-api.batch_keys.timetable' => ['api_key' => 'DEFAULT-KEY', 'client_secret' => 'secret'],
        'isams-api.connections.prep' => ['client_id' => 'prep-id', 'client_secret' => 'prep-secret', 'base_url' => 'https://prep.example.test', 'batch_keys' => ['timetable' => ['api_key' => 'PREP-KEY', 'client_secret' => 'secret']]],
    ]);
    $isams = FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);

    Isams::batch('timetable')->send(new BatchRequest);
    Isams::batch('timetable', 'prep')->send(new BatchRequest);

    $sent = collect($isams->getRecordedResponses())->filter(fn ($response) => $response->getRequest() instanceof BatchRequest)->map(fn ($response) => $response->getPendingRequest()->getUrl().'?'.http_build_query($response->getPendingRequest()->query()->all()))->values()->all();
    expect($sent)->toBe([
        FakeIsams::BASE_URL.'/api/batch/1.0/json.ashx?apiKey=DEFAULT-KEY',
        'https://prep.example.test/api/batch/1.0/json.ashx?apiKey=PREP-KEY',
    ]);
});

it('uses the default batch key when none is named', function () {
    config([
        'isams-api.base_url' => FakeIsams::BASE_URL,
        'isams-api.batch_keys.default' => ['api_key' => 'DEFAULT-KEY', 'client_secret' => 'secret'],
    ]);
    $isams = FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => []])]);

    Isams::batch()->send(new BatchRequest);

    expect(FakeIsams::received($isams, BatchRequest::class)->query()->all())->toBe(['apiKey' => 'DEFAULT-KEY']);
});

it('explains which setting is missing when a batch key is not configured', function () {
    expect(fn () => Isams::batch('nonexistent'))->toThrow(InvalidArgumentException::class, 'No iSAMS batch key named "nonexistent" is configured in isams-api.batch_keys.');
});

it('returns no records for a root node iSAMS sends empty', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => ['CalendarManager' => ['Events' => ['Event' => '']]]])]);

    expect(batchConnector()->send(new BatchRequest)->dto()->models('CalendarManager', 'Events'))->toBeEmpty();
});
