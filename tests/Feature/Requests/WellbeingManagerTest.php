<?php

use Saloon\Data\MultipartValue;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\WellbeingManager\Concern;
use spkm\IsamsApi\Data\WellbeingManager\ConcernDocumentForCreate;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityGroupsForPatch;
use spkm\IsamsApi\Data\WellbeingManager\DismissIndicatorsCollectionForUpdate;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\CreateConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernDocuments\DownloadConcernDocumentRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Concerns\GetConcernsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernTypes\GetConcernTypesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities\SetConcernVisibilityGroupsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DeleteIndicatorsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Indicators\DismissIndicatorsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\StudentConcerns\GetStudentConcernRequest;
use spkm\IsamsApi\Requests\WellbeingManager\VisibilityGroups\GetDefaultVisibilityGroupRequest;
use spkm\IsamsApi\Support\Filter;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('takes a concern out of every visibility group by sending an empty list', function () {
    $isams = FakeIsams::respondWith([SetConcernVisibilityGroupsRequest::class => MockResponse::make()]);

    FakeIsams::connector()->wellbeingManager()->concernVisibilities()
        ->setConcernVisibilityGroups('100001', 7, new ConcernVisibilityGroupsForPatch(concernVisibilityGroupIds: []));

    $sent = FakeIsams::received($isams, SetConcernVisibilityGroupsRequest::class)->createPsrRequest();
    expect($sent->getMethod())->toBe('PATCH')
        ->and((string) $sent->getBody())->toBe('{"concernVisibilityGroupIds":[]}');
});

it('dismisses several indicators with one reason', function () {
    $sent = FakeIsams::send(new DismissIndicatorsRequest(new DismissIndicatorsCollectionForUpdate(indicatorIds: [4, 5], reasonForDismissalId: 2)))
        ->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and(json_decode((string) $sent->getBody(), true))->toBe(['indicatorIds' => [4, 5], 'reasonForDismissalId' => 2]);
});

it('deletes several indicators by posting their ids as a bare list', function () {
    $sent = FakeIsams::send(new DeleteIndicatorsRequest([4, 5]))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('POST')
        ->and((string) $sent->getUri())->toEndWith('/api/wellbeing/indicators/delete')
        ->and((string) $sent->getBody())->toBe('[4,5]');
});

it('reads the default visibility group\'s id, which iSAMS sends as a bare number', function () {
    $id = FakeIsams::send(new GetDefaultVisibilityGroupRequest, '3')->dto();

    expect($id)->toBe(3);
});

it('pages through every concern matching a filter as models', function () {
    $isams = FakeIsams::respondWith([GetConcernsRequest::class => MockResponse::make(['concerns' => [['id' => 21, 'details' => 'Made-up concern']], 'page' => 1, 'totalPages' => 1])]);

    $concerns = FakeIsams::connector()->paginate(new GetConcernsRequest(filter: Filter::where('concernStatusId', 'eq', 1)))->dtos()->all();

    expect($concerns[0])->toBeInstanceOf(Concern::class)
        ->and($concerns[0]->details)->toBe('Made-up concern')
        ->and(FakeIsams::queriesReceived($isams, GetConcernsRequest::class)[0])->toMatchArray(['page' => 1, 'pageSize' => 100, '$filter' => 'ConcernStatusId eq 1']);
});

it('uploads a concern document as a file part plus its details as a JSON part', function () {
    $sent = FakeIsams::send(new CreateConcernDocumentRequest('100001', 21, new MultipartValue('document', 'made-up PDF bytes', 'notes.pdf'), new ConcernDocumentForCreate(fileName: 'notes.pdf', name: 'Meeting notes')))
        ->getPendingRequest()->createPsrRequest();
    $body = (string) $sent->getBody();

    expect($body)->toContain('name="document"; filename="notes.pdf"')
        ->and($body)->toContain('name="data"')
        ->and($body)->toContain('{"fileName":"notes.pdf","name":"Meeting notes"}');
});

it('downloads a concern document as a file', function () {
    FakeIsams::respondWith([DownloadConcernDocumentRequest::class => MockResponse::make('made-up PDF bytes', 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="notes.pdf"'])]);

    $file = FakeIsams::connector()->send(new DownloadConcernDocumentRequest('100001', 21, 3))->dto();

    expect($file)->toEqual(new File('made-up PDF bytes', 'application/pdf', 'notes.pdf'));
});

it('serves wellbeing reference lists from the cache once caching is on, but never a student\'s concern', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetConcernTypesRequest::class => MockResponse::make(['concernTypes' => []]),
        GetStudentConcernRequest::class => MockResponse::make(['id' => 21]),
    ]);
    $wellbeing = FakeIsams::connector()->wellbeingManager();

    foreach ([1, 2] as $time) {
        $wellbeing->concernTypes()->getConcernTypes();
        $wellbeing->studentConcerns()->getStudentConcern('100001', 21);
    }

    expect(FakeIsams::queriesReceived($isams, GetConcernTypesRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetStudentConcernRequest::class))->toHaveCount(2);
});
