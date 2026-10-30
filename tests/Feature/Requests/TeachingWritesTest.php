<?php

use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Teaching\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Teaching\SubjectForCreate;
use spkm\IsamsApi\Data\Teaching\SubjectForUpdate;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\CreateCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\DeleteCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\CurriculumSubjectCodes\UpdateCurriculumSubjectCodeRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectsRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\CreateSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\UpdateSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\AddSubjectTeachingDepartmentRequest;
use spkm\IsamsApi\Requests\Teaching\SubjectTeachingDepartments\RemoveSubjectTeachingDepartmentRequest;
use spkm\IsamsApi\Requests\Teaching\TeachingSets\AddStudentToTeachingSetRequest;
use spkm\IsamsApi\Requests\Teaching\TeachingSets\RemoveStudentFromTeachingSetRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('sends each teaching write to its iSAMS endpoint with its JSON body', function (Request $request, string $method, string $uri, ?array $body) {
    $sent = FakeIsams::send($request)->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe($method)
        ->and((string) $sent->getUri())->toBe($uri)
        ->and(json_decode((string) $sent->getBody(), true))->toBe($body);
})->with([
    'create a subject' => [new CreateSubjectRequest(new SubjectForCreate(code: 'MA', name: 'Mathematics', active: true)), 'POST', 'https://isams.example.test/api/teaching/subjects', ['active' => true, 'code' => 'MA', 'name' => 'Mathematics']],
    'update a subject' => [new UpdateSubjectRequest(12, new SubjectForUpdate(name: 'Further Mathematics')), 'PUT', 'https://isams.example.test/api/teaching/subjects/12', ['name' => 'Further Mathematics']],
    'create a curriculum subject code' => [new CreateCurriculumSubjectCodeRequest(new GlobalListItemForCreate(name: 'MAT')), 'POST', 'https://isams.example.test/api/teaching/curriculumsubjectcodes', ['name' => 'MAT']],
    'update a curriculum subject code' => [new UpdateCurriculumSubjectCodeRequest(5, ['name' => 'MATH']), 'PUT', 'https://isams.example.test/api/teaching/curriculumsubjectcodes/5', ['name' => 'MATH']],
    'delete a curriculum subject code' => [new DeleteCurriculumSubjectCodeRequest(5), 'DELETE', 'https://isams.example.test/api/teaching/curriculumsubjectcodes/5', null],
    'add a department to a subject' => [new AddSubjectTeachingDepartmentRequest(12, 3), 'POST', 'https://isams.example.test/api/teaching/subjects/12/departments/3', null],
    'remove a department from a subject' => [new RemoveSubjectTeachingDepartmentRequest(12, 3), 'DELETE', 'https://isams.example.test/api/teaching/subjects/12/departments/3', null],
    'add a student to a set' => [new AddStudentToTeachingSetRequest(34, '100001'), 'POST', 'https://isams.example.test/api/teaching/sets/34/setList/100001', null],
    'remove a student from a set' => [new RemoveStudentFromTeachingSetRequest(34, '100001'), 'DELETE', 'https://isams.example.test/api/teaching/sets/34/setList/100001', null],
]);

it('reports the location and id of a subject it creates', function () {
    FakeIsams::respondWith([CreateSubjectRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/teaching/subjects/77'])]);

    $created = FakeIsams::connector()->send(new CreateSubjectRequest(new SubjectForCreate(name: 'Latin')))->dto();

    expect($created)->toEqual(new Created('https://isams.example.test/api/teaching/subjects/77', '77'));
});

it('reaches generated and hand-written teaching requests through resources', function () {
    $isams = FakeIsams::respondWith([
        CreateSubjectRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/teaching/subjects/77']),
        GetSubjectsRequest::class => MockResponse::make(['subjects' => []]),
    ]);
    $connector = FakeIsams::connector();

    $connector->teaching()->subjects()->createSubject(new SubjectForCreate(name: 'Latin'));
    $connector->teaching()->subjects()->getSubjects();

    $isams->assertSent(CreateSubjectRequest::class);
    $isams->assertSent(GetSubjectsRequest::class);
});

it('reaches resources through the Isams facade', function () {
    config(['isams-api.client_id' => 'client-id', 'isams-api.client_secret' => 'client-secret', 'isams-api.base_url' => FakeIsams::BASE_URL]);
    $isams = FakeIsams::respondWith([AddStudentToTeachingSetRequest::class => MockResponse::make(status: 201)]);

    Isams::teaching()->teachingSets()->addStudentToTeachingSet(34, '100001');

    $isams->assertSent(AddStudentToTeachingSetRequest::class);
});
