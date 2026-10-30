<?php

use Saloon\Data\MultipartValue;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\MedicalCentre\Condition;
use spkm\IsamsApi\Data\MedicalCentre\DocumentForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\ArchiveStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\PatchStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\CreateStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDocuments\DownloadStudentDocumentRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Visit\GetMedicalVisitReasonsRequest;
use spkm\IsamsApi\Support\JsonPatch;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('reads a student\'s conditions, archived ones included, as models keyed by their unique identifier', function () {
    $isams = FakeIsams::respondWith([GetStudentConditionsRequest::class => MockResponse::make(['conditions' => [
        ['key' => '0b8f6d1e-3a51-4c43-9d0e-6f1c2b7a9e10', 'type' => 'Hay fever', 'archived' => true],
    ]])]);

    $conditions = FakeIsams::connector()->medicalCentre()->studentConditions()->all('100001', includeArchive: true)->dto();

    expect($conditions->first())->toBeInstanceOf(Condition::class)
        ->and($conditions->first()->key)->toBe('0b8f6d1e-3a51-4c43-9d0e-6f1c2b7a9e10')
        ->and(FakeIsams::queriesReceived($isams, GetStudentConditionsRequest::class)[0])->toBe(['includeArchive' => 'true']);
});

it('archives a student\'s condition with a command that has no body', function () {
    $isams = FakeIsams::respondWith([ArchiveStudentConditionRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/medical/students/100001/conditions/0b8f6d1e-3a51-4c43-9d0e-6f1c2b7a9e10'])]);

    $created = FakeIsams::connector()->medicalCentre()->studentConditions()->archive('100001', '0b8f6d1e-3a51-4c43-9d0e-6f1c2b7a9e10')->dto();

    $sent = FakeIsams::received($isams, ArchiveStudentConditionRequest::class)->createPsrRequest();
    expect($created->id)->toBe('0b8f6d1e-3a51-4c43-9d0e-6f1c2b7a9e10')
        ->and((string) $sent->getUri())->toEndWith('/api/medical/students/100001/conditions/0b8f6d1e-3a51-4c43-9d0e-6f1c2b7a9e10/commands/archive')
        ->and((string) $sent->getBody())->toBe('');
});

it('uploads a medical document as a file part plus the document\'s details as a JSON part', function () {
    $sent = FakeIsams::send(new CreateStudentDocumentRequest('100001', new MultipartValue('binary', 'made-up PDF bytes', 'care-plan.pdf'), new DocumentForCreate(categoryId: 3, name: 'Care plan')))
        ->getPendingRequest()->createPsrRequest();
    $body = (string) $sent->getBody();

    expect($sent->getHeaderLine('Content-Type'))->toStartWith('multipart/form-data')
        ->and($body)->toContain('name="binary"; filename="care-plan.pdf"')
        ->and($body)->toContain('name="data"')
        ->and($body)->toContain('{"categoryId":3,"name":"Care plan"}');
});

it('downloads a medical document as a file, although the spec describes JSON', function () {
    FakeIsams::respondWith([DownloadStudentDocumentRequest::class => MockResponse::make('made-up PDF bytes', 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="care-plan.pdf"'])]);

    $response = FakeIsams::connector()->send(new DownloadStudentDocumentRequest('100001', '5d2c7f4a-1e2b-4c3d-8e9f-0a1b2c3d4e5f'));

    expect($response->dto())->toEqual(new File('made-up PDF bytes', 'application/pdf', 'care-plan.pdf'))
        ->and($response->getPendingRequest()->headers()->get('Accept'))->toBe('*/*');
});

it('changes a student\'s doctor with a JSON Patch document', function () {
    $sent = FakeIsams::send(new PatchStudentDoctorRequest('100001', JsonPatch::make()->replace('/doctorId', 9)))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and(json_decode((string) $sent->getBody(), true))->toBe([['op' => 'replace', 'path' => '/doctorId', 'value' => 9]]);
});

it('serves medical reference lists from the cache once caching is on, but not a student\'s visits', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetMedicalVisitReasonsRequest::class => MockResponse::make([]),
        GetStudentVisitsRequest::class => MockResponse::make(['visits' => []]),
    ]);
    $medicalCentre = FakeIsams::connector()->medicalCentre();

    foreach ([1, 2] as $time) {
        $medicalCentre->visit()->getReasons();
        $medicalCentre->studentVisits()->all('100001');
    }

    expect(FakeIsams::queriesReceived($isams, GetMedicalVisitReasonsRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetStudentVisitsRequest::class))->toHaveCount(2);
});
