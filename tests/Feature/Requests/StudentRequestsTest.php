<?php

use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use spkm\IsamsApi\Data\Students\Student;
use spkm\IsamsApi\IsamsApiException;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Students\GetStudentSystemStatusesRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentPhotoBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetPhotosBySchoolidPhotoidRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('gets each student resource from its iSAMS endpoint', function (Request $request, string $url) {
    $sent = FakeIsams::send($request)->getPendingRequest();

    expect($sent->getMethod())->toBe(Method::GET)
        ->and($sent->getUrl())->toBe($url)
        ->and($sent->query()->all())->toBe([]);
})->with([
    'every student' => [fn () => new GetStudentsRequest, 'https://isams.example.test/api/students'],
    'one student' => [fn () => new GetStudentRequest('100001'), 'https://isams.example.test/api/students/100001'],
    'student system statuses' => [fn () => new GetStudentSystemStatusesRequest, 'https://isams.example.test/api/students/systemstatuses'],
    'a student\'s current photo' => [fn () => new GetCurrentPhotoBySchoolidRequest('100001'), 'https://isams.example.test/api/students/100001/photos/current'],
    'one of a student\'s photos' => [fn () => new GetPhotosBySchoolidPhotoidRequest('100001', 7), 'https://isams.example.test/api/students/100001/photos/7'],
]);

it('asks for every student with only the page, page size, expansions and filter it was given', function () {
    $sent = FakeIsams::send(new GetStudentsRequest(page: 2, expand: 'customFields', filter: "surname eq 'Smith'"))->getPendingRequest();

    expect($sent->query()->all())->toBe(['page' => 2, 'expand' => 'customFields', '$filter' => "surname eq 'Smith'"]);
});

it('asks for one student with the expansions it was given', function () {
    $sent = FakeIsams::send(new GetStudentRequest('100001', expand: 'customFields'))->getPendingRequest();

    expect($sent->query()->all())->toBe(['expand' => 'customFields']);
});

it('turns a page of students into Student models', function () {
    $students = FakeIsams::send(new GetStudentsRequest, ['students' => [['schoolId' => '100001', 'forename' => 'Alex'], ['schoolId' => '100002', 'forename' => 'Sam']], 'totalPages' => 1])->dto();

    expect($students)->toBeInstanceOf(Collection::class)
        ->and($students->map(fn (Student $student) => $student->forename)->all())->toBe(['Alex', 'Sam']);
});

it('turns one student into a Student model', function () {
    $student = FakeIsams::send(new GetStudentRequest('100001'), ['schoolId' => '100001', 'forename' => 'Alex', 'yearGroup' => 9])->dto();

    expect($student)->toBeInstanceOf(Student::class)
        ->and($student->schoolId)->toBe('100001')
        ->and($student->yearGroup)->toBe(9);
});

it('pages through every student as Student models', function () {
    FakeIsams::respondWith([GetStudentsRequest::class => fn () => MockResponse::make(['students' => [['forename' => 'Alex']], 'totalPages' => 2])]);

    $students = FakeIsams::connector()->paginate(new GetStudentsRequest)->dtos()->all();

    expect($students)->toHaveCount(2)->each->toBeInstanceOf(Student::class);
});

it('throws iSAMS\'s error instead of returning a model when a student is not found', function () {
    FakeIsams::respondWith([GetStudentRequest::class => MockResponse::make(['message' => 'Student not found'], 404)]);

    expect(fn () => FakeIsams::connector()->send(new GetStudentRequest('999999'))->dto())->toThrow(IsamsApiException::class);
});
