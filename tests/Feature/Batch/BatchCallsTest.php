<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\Batch\BatchApiException;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Batch\BatchPhotos;
use spkm\IsamsApi\Batch\BatchPhotosRequest;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/**
 * Fakes the Batch API answering each request with one made-up record for the method it ran, and keeps the filter XML
 * each request sent.
 *
 * @param  list<string>  $sent
 */
function fakeBatchMethods(array &$sent): void
{
    FakeIsams::respondWith([BatchRequest::class => function (PendingRequest $request) use (&$sent) {
        $xml = (string) $request->body();
        $sent[] = $xml;
        preg_match('#<Method>(\w+)</Method>#', $xml, $method);
        [$module, $root] = BatchMap::METHODS[$method[1]] ?? ['None', 'None'];

        return MockResponse::make(['iSAMS' => [$module => [$root => [BatchMap::ROOTS[$module][$root]['entity'] ?? 'None' => [['@Id' => '1']]]]]]);
    }]);
}

it('runs only the method asked for and returns its records as models', function () {
    $sent = [];
    fakeBatchMethods($sent);

    $pupils = new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL)->pupil()->currentPupils();

    expect($pupils)->toBeInstanceOf(LazyCollection::class)
        ->and($pupils->first())->toBeInstanceOf(Pupil::class)
        ->and($sent)->toBe(['<?xml version="1.0" encoding="utf-8"?><Filters><MethodsToRun><Method>Pupil_GetCurrentPupils</Method></MethodsToRun></Filters>']);
});

it('sends a call\'s filters under the names iSAMS documents for them', function (Closure $call, string $filter) {
    $sent = [];
    fakeBatchMethods($sent);

    $call(new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL));

    expect($sent[0])->toContain($filter);
})->with([
    'dates' => [fn (IsamsBatchConnector $batch) => $batch->calendar()->events(startDate: CarbonImmutable::parse('2026-11-01'), endDate: CarbonImmutable::parse('2026-11-30')), '<Calendar><Events StartDate="2026-11-01" EndDate="2026-11-30"/></Calendar>'],
    'a list, under a module named differently from the method' => [fn (IsamsBatchConnector $batch) => $batch->pupil()->passports(systemStatusesToInclude: [0, 1]), '<StudentManager><Passports SystemStatusesToInclude="0,1"/></StudentManager>'],
    'a module and an element named differently from the method' => [fn (IsamsBatchConnector $batch) => $batch->cover()->lessonSuspensions(startDate: CarbonImmutable::parse('2026-11-01'), endDate: CarbonImmutable::parse('2026-11-30')), '<CoverManager><AllLessonSuspensions StartDate="2026-11-01" EndDate="2026-11-30"/></CoverManager>'],
    'only the filters given' => [fn (IsamsBatchConnector $batch) => $batch->contactAdvanced()->contacts(contactTypes: ['Mother'], studentHome: false), '<StudentManager><Contacts ContactTypes="Mother" StudentHome="false"/></StudentManager>'],
]);

it('sends no filter for an optional one that was not given', function () {
    $sent = [];
    fakeBatchMethods($sent);

    new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL)->externalExams()->examResults();

    expect($sent[0])->not->toContain('ExamsManager');
});

it('throws a BatchApiException when iSAMS refuses a call', function () {
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make('<?xml version="1.0" encoding="utf-16"?><Message><MessageId>MethodsNotAllocatedToKeyException</MessageId></Message>', 403, ['Content-Type' => 'application/xml'])]);

    expect(fn () => new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL)->pupil()->currentPupils())
        ->toThrow(fn (BatchApiException $exception) => expect($exception->isPermissionError())->toBeTrue());
});

it('downloads the current students\' and staff\'s photos in one call each', function (string $call, string $feed) {
    $isams = FakeIsams::respondWith([BatchPhotosRequest::class => MockResponse::make('made-up zip')]);

    $photos = new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL)->{$call}();

    expect($photos)->toBeInstanceOf(BatchPhotos::class)
        ->and($photos->zip)->toBe('made-up zip')
        ->and(FakeIsams::received($isams, BatchPhotosRequest::class)->getUrl())->toContain($feed);
})->with([
    'students' => ['studentPhotos', '/photos.ashx'],
    'staff' => ['staffPhotos', '/staffphotos.ashx'],
]);

it('has no REST resources on a batch connector, whose token only works for the Batch API', function () {
    expect(method_exists(IsamsBatchConnector::class, 'students'))->toBeFalse()
        ->and(method_exists(IsamsBatchConnector::class, 'paginate'))->toBeFalse();
});
