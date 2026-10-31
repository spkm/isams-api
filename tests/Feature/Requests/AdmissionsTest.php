<?php

use Saloon\Data\MultipartValue;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Admissions\Applicant;
use spkm\IsamsApi\Data\Admissions\ApplicantDocumentForCreate;
use spkm\IsamsApi\Data\Admissions\CustomFieldForPatch;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Admissions\CustomFields\PatchApplicantCustomFieldsRequest;
use spkm\IsamsApi\Requests\Admissions\Document\CreateApplicantDocumentRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\GetEnquiryTypesRequest;
use spkm\IsamsApi\Requests\Admissions\GetApplicantsRequest;
use spkm\IsamsApi\Requests\Admissions\MoveApplicantToCurrentRequest;
use spkm\IsamsApi\Requests\Admissions\VisaDocuments\DownloadApplicantVisaDocumentRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('uploads an applicant document as a file part plus its details as a JSON part', function () {
    $sent = FakeIsams::send(new CreateApplicantDocumentRequest('A1001', new MultipartValue('binary', 'made-up PDF bytes', 'report.pdf'), new ApplicantDocumentForCreate(name: 'School report', categoryId: 4)))
        ->getPendingRequest()->createPsrRequest();
    $body = (string) $sent->getBody();

    expect($sent->getHeaderLine('Content-Type'))->toStartWith('multipart/form-data')
        ->and($body)->toContain('name="binary"; filename="report.pdf"')
        ->and($body)->toContain('name="data"')
        ->and($body)->toContain('{"name":"School report","categoryId":4}');
});

it('updates one of an applicant\'s custom fields with a plain JSON body', function () {
    $sent = FakeIsams::send(new PatchApplicantCustomFieldRequest('A1001', 53, new CustomFieldForPatch(value: 'Yes')))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and($sent->getHeaderLine('Content-Type'))->toBe('application/json')
        ->and((string) $sent->getBody())->toBe('{"value":"Yes"}');
});

it('updates several of an applicant\'s custom fields at once', function () {
    $sent = FakeIsams::send(new PatchApplicantCustomFieldsRequest('A1001', [new CustomFieldForPatch(id: 53, value: 'Yes'), ['id' => 89, 'value' => 'No']]))
        ->getPendingRequest()->createPsrRequest();

    expect(json_decode((string) $sent->getBody(), true))->toBe([['id' => 53, 'value' => 'Yes'], ['id' => 89, 'value' => 'No']]);
});

it('pages through applicants matching a filter as models', function () {
    $isams = FakeIsams::respondWith([GetApplicantsRequest::class => MockResponse::make(['applicants' => [['schoolId' => 'A1001']], 'page' => 1, 'totalPages' => 1])]);

    $applicants = FakeIsams::connector()->paginate(new GetApplicantsRequest(filter: "Surname eq 'Example'"))->dtos()->all();

    expect($applicants[0])->toBeInstanceOf(Applicant::class)
        ->and(FakeIsams::queriesReceived($isams, GetApplicantsRequest::class)[0])->toMatchArray(['page' => 1, 'pageSize' => 100, '$filter' => "Surname eq 'Example'"]);
});

it('moves an applicant to the current students with a command', function () {
    $isams = FakeIsams::respondWith([MoveApplicantToCurrentRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/students/A1001'])]);

    $created = FakeIsams::connector()->admissions()->moveToCurrent('A1001');

    expect($created->id)->toBe('A1001')
        ->and((string) FakeIsams::received($isams, MoveApplicantToCurrentRequest::class)->createPsrRequest()->getBody())->toBe('');
});

it('downloads an applicant\'s visa document as a file, although the spec describes JSON', function () {
    FakeIsams::respondWith([DownloadApplicantVisaDocumentRequest::class => MockResponse::make('made-up PDF bytes', 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="visa.pdf"'])]);

    $file = FakeIsams::connector()->send(new DownloadApplicantVisaDocumentRequest('A1001', 2, 3))->dto();

    expect($file)->toEqual(new File('made-up PDF bytes', 'application/pdf', 'visa.pdf'));
});

it('serves admissions reference lists from the cache once caching is on, but not applicants', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetEnquiryTypesRequest::class => MockResponse::make(['enquiryTypes' => []]),
        GetApplicantsRequest::class => MockResponse::make(['applicants' => [], 'totalPages' => 0]),
    ]);
    $admissions = FakeIsams::connector()->admissions();

    foreach ([1, 2] as $time) {
        $admissions->enquiryTypes()->all();
        $admissions->all()->all();
    }

    expect(FakeIsams::queriesReceived($isams, GetEnquiryTypesRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetApplicantsRequest::class))->toHaveCount(2);
});
