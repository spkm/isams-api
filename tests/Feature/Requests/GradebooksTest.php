<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\ColumnMarkForPatch;
use spkm\IsamsApi\Data\Gradebooks\MarkCollectionForPatch;
use spkm\IsamsApi\Data\Gradebooks\Student;
use spkm\IsamsApi\Data\Gradebooks\StudentForPatch;
use spkm\IsamsApi\Requests\Estates\Buildings\GetBuildingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnMarks\PatchGradebookColumnMarkRequest;
use spkm\IsamsApi\Requests\Gradebooks\GradesetConfiguration\GetGradesetConfigurationsRequest;
use spkm\IsamsApi\Requests\Gradebooks\Marks\GetGradebookMarksRequest;
use spkm\IsamsApi\Requests\Gradebooks\Marks\UpdateGradebookMarksRequest;
use spkm\IsamsApi\Requests\Gradebooks\StaffAllocations\CreateGradebookStaffAllocationsRequest;
use spkm\IsamsApi\Support\JsonPatch;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;
use spkm\IsamsApi\Tests\Helpers\Spec;

it('marks every gradebook request as Beta, and no request iSAMS has released', function () {
    $gradebooks = collect(Spec::manifest()['operations'])->where('source', 'generated')->pluck('class')->filter(fn (string $class) => str_contains($class, '\\Requests\\Gradebooks\\'));

    expect($gradebooks)->toHaveCount(73)
        ->and($gradebooks->every(fn (string $class) => (new ReflectionClass($class))->getAttributes(Beta::class) !== []))->toBeTrue()
        ->and((new ReflectionClass(GetBuildingsRequest::class))->getAttributes(Beta::class))->toBe([]);
});

it('updates several students\' marks at once with a plain JSON body', function () {
    $marks = new MarkCollectionForPatch(students: collect([
        new StudentForPatch(schoolId: '100001', columnMarks: collect([new ColumnMarkForPatch(columnId: 4, value: 'A'), new ColumnMarkForPatch(columnId: 5, isAbsent: true)])),
    ]));

    $sent = FakeIsams::send(new UpdateGradebookMarksRequest(12, $marks))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and(json_decode((string) $sent->getBody(), true))->toBe(['students' => [['schoolId' => '100001', 'columnMarks' => [['columnId' => 4, 'value' => 'A'], ['columnId' => 5, 'isAbsent' => true]]]]]);
});

it('changes one student\'s mark in one column with a JSON Patch document', function () {
    $sent = FakeIsams::send(new PatchGradebookColumnMarkRequest(12, 4, '100001', JsonPatch::make()->replace('/value', 'B')))->getPendingRequest()->createPsrRequest();

    expect((string) $sent->getUri())->toEndWith('/api/gradebooks/12/columns/4/students/100001/marks')
        ->and(json_decode((string) $sent->getBody(), true))->toBe([['op' => 'replace', 'path' => '/value', 'value' => 'B']]);
});

it('pages through a gradebook\'s marks, a student at a time', function () {
    $isams = FakeIsams::respondWith([GetGradebookMarksRequest::class => MockResponse::make(['students' => [['schoolId' => '100001']], 'page' => 1, 'totalPages' => 1])]);

    $students = FakeIsams::connector()->paginate(new GetGradebookMarksRequest(12))->dtos()->all();

    expect($students[0])->toBeInstanceOf(Student::class)
        ->and(FakeIsams::queriesReceived($isams, GetGradebookMarksRequest::class)[0])->toMatchArray(['page' => 1, 'pageSize' => 100]);
});

it('allocates staff to a gradebook by a criterion named in the path', function () {
    $sent = FakeIsams::send(new CreateGradebookStaffAllocationsRequest(12, 'Department', [['allocationId' => 3]]))->getPendingRequest()->createPsrRequest();

    expect((string) $sent->getUri())->toEndWith('/api/gradebooks/12/staff/allocations/Department')
        ->and(json_decode((string) $sent->getBody(), true))->toBe([['allocationId' => 3]]);
});

it('serves gradebook configuration from the cache once caching is on', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([GetGradesetConfigurationsRequest::class => MockResponse::make(['gradesets' => []])]);
    $connector = FakeIsams::connector();

    $connector->send(new GetGradesetConfigurationsRequest);
    $connector->send(new GetGradesetConfigurationsRequest);

    expect(FakeIsams::queriesReceived($isams, GetGradesetConfigurationsRequest::class))->toHaveCount(1);
});
