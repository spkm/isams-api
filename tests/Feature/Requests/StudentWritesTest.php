<?php

use Saloon\Data\MultipartValue;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\Students\Alumni;
use spkm\IsamsApi\Data\Students\CustomFieldForPatch;
use spkm\IsamsApi\Data\Students\StudentDocumentForCreate;
use spkm\IsamsApi\Data\Students\StudentVisa;
use spkm\IsamsApi\Requests\Students\Alumni\GetAlumniRequest;
use spkm\IsamsApi\Requests\Students\Contacts\GetStudentContactsRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\PatchStudentCustomFieldsRequest;
use spkm\IsamsApi\Requests\Students\Document\CreateStudentDocumentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\MoveStudentToAlumniRequest;
use spkm\IsamsApi\Requests\Students\PassportDocuments\DownloadStudentPassportDocumentRequest;
use spkm\IsamsApi\Requests\Students\PatchStudentRequest;
use spkm\IsamsApi\Requests\Students\Photos\CreateStudentPhotoRequest;
use spkm\IsamsApi\Requests\Students\Visas\GetStudentVisasRequest;
use spkm\IsamsApi\Support\JsonPatch;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('uploads a student document as a file part plus a JSON data part', function () {
    $document = new MultipartValue('binary', 'made-up PDF bytes', 'report.pdf');

    $sent = FakeIsams::send(new CreateStudentDocumentRequest('100001', $document, new StudentDocumentForCreate(name: 'Report', categoryId: 2)))
        ->getPendingRequest()->createPsrRequest();
    $body = (string) $sent->getBody();

    expect($sent->getHeaderLine('Content-Type'))->toStartWith('multipart/form-data')
        ->and($body)->toContain('name="binary"; filename="report.pdf"')
        ->and($body)->toContain('made-up PDF bytes')
        ->and($body)->toContain('name="data"')
        ->and($body)->toContain('{"name":"Report","categoryId":2}');
});

it('uploads a student photo and reports where iSAMS stored it', function () {
    FakeIsams::respondWith([CreateStudentPhotoRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/students/100001/photos/9'])]);

    $created = FakeIsams::connector()->send(new CreateStudentPhotoRequest('100001', new MultipartValue('photo', 'made-up PNG bytes', 'photo.png')))->dto();

    expect($created)->toEqual(new Created('https://isams.example.test/api/students/100001/photos/9', '9'));
});

it('patches a student with a JSON Patch document sent as a bare list', function () {
    $sent = FakeIsams::send(new PatchStudentRequest('100001', JsonPatch::make()->replace('/preferredName', 'Alex')))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and(json_decode((string) $sent->getBody(), true))->toBe([['op' => 'replace', 'path' => '/preferredName', 'value' => 'Alex']]);
});

it('updates several of a student\'s custom fields at once', function () {
    $sent = FakeIsams::send(new PatchStudentCustomFieldsRequest('100001', [new CustomFieldForPatch(id: 53, value: 'Yes'), ['id' => 89, 'value' => 'No']]))
        ->getPendingRequest()->createPsrRequest();

    expect(json_decode((string) $sent->getBody(), true))->toBe([['id' => 53, 'value' => 'Yes'], ['id' => 89, 'value' => 'No']]);
});

it('downloads a passport document as a file', function () {
    FakeIsams::respondWith([DownloadStudentPassportDocumentRequest::class => MockResponse::make('made-up PDF bytes', 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="passport.pdf"'])]);

    $file = FakeIsams::connector()->send(new DownloadStudentPassportDocumentRequest('100001', 4, 12))->dto();

    expect($file)->toEqual(new File('made-up PDF bytes', 'application/pdf', 'passport.pdf'));
});

it('reads a student\'s visas as models, although the spec leaves their response undocumented', function () {
    FakeIsams::respondWith([GetStudentVisasRequest::class => MockResponse::make(['visas' => [['id' => 3, 'visaNumber' => 'V-123']]])]);

    $visas = FakeIsams::connector()->send(new GetStudentVisasRequest('100001'))->dto();

    expect($visas->first())->toBeInstanceOf(StudentVisa::class)
        ->and($visas->first()->id)->toBe(3);
});

it('pages through alumni as models', function () {
    $isams = FakeIsams::respondWith([GetAlumniRequest::class => MockResponse::make(['alumni' => [['schoolId' => 'A1', 'surname' => 'Example']], 'page' => 1, 'totalPages' => 1])]);

    $alumni = FakeIsams::connector()->paginate(new GetAlumniRequest(filter: "Surname eq 'Example'"))->dtos()->all();

    expect($alumni[0])->toBeInstanceOf(Alumni::class)
        ->and($alumni[0]->surname)->toBe('Example')
        ->and(FakeIsams::queriesReceived($isams, GetAlumniRequest::class)[0])->toMatchArray(['page' => 1, 'pageSize' => 100, '$filter' => "Surname eq 'Example'"]);
});

it('moves a student to the alumni with a command', function () {
    FakeIsams::respondWith([MoveStudentToAlumniRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/alumni/100001'])]);

    $created = FakeIsams::connector()->send(new MoveStudentToAlumniRequest('100001'))->dto();

    expect($created->id)->toBe('100001');
});

it('reaches generated and hand-written student requests through resources', function () {
    $isams = FakeIsams::respondWith([
        PatchStudentCustomFieldsRequest::class => MockResponse::make(),
        GetStudentContactsRequest::class => MockResponse::make(['contacts' => []]),
        GetStudentRequest::class => MockResponse::make(['schoolId' => '100001']),
    ]);
    $students = FakeIsams::connector()->students();

    $students->customFields()->patchMany('100001', [['id' => 53, 'value' => 'Yes']]);
    $students->contacts()->forStudent('100001');
    $students->get('100001');

    $isams->assertSent(PatchStudentCustomFieldsRequest::class);
    $isams->assertSent(GetStudentContactsRequest::class);
    $isams->assertSent(GetStudentRequest::class);
});
