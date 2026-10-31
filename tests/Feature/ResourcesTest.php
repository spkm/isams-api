<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Data\Students\Student;
use spkm\IsamsApi\Data\Teaching\Subject;
use spkm\IsamsApi\Exceptions\InvalidRequestException;
use spkm\IsamsApi\Exceptions\MissingPermissionException;
use spkm\IsamsApi\Exceptions\NotFoundException;
use spkm\IsamsApi\Exceptions\ServerErrorException;
use spkm\IsamsApi\Exceptions\UnauthorizedException;
use spkm\IsamsApi\IsamsApiException;
use spkm\IsamsApi\Requests\AdhocRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionsRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentStudentPhotoRequest;
use spkm\IsamsApi\Requests\Teaching\Sets\RemoveStudentFromTeachingSetRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\CreateSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectsRequest;
use spkm\IsamsApi\Resources\StudentsResource;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('returns a list as a collection of models', function () {
    FakeIsams::respondWith([GetSubjectsRequest::class => MockResponse::make(['subjects' => [['id' => 1, 'name' => 'Mathematics'], ['id' => 2, 'name' => 'Physics']]])]);

    $subjects = FakeIsams::connector()->teaching()->subjects()->all();

    expect($subjects)->toBeInstanceOf(Collection::class)
        ->and($subjects->map(fn (Subject $subject) => $subject->name)->all())->toBe(['Mathematics', 'Physics']);
});

it('returns one item as its model', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make(['id' => 7, 'name' => 'Mathematics'])]);

    $subject = FakeIsams::connector()->teaching()->subjects()->get(7);

    expect($subject)->toBeInstanceOf(Subject::class)
        ->and($subject->name)->toBe('Mathematics');
});

it('returns a paged list as a lazy collection of models that asks for each page only when the loop reaches it', function () {
    $pagesSent = 0;
    $isams = FakeIsams::respondWith([GetStudentsRequest::class => function () use (&$pagesSent) {
        $pagesSent++;

        return MockResponse::make(['students' => [['schoolId' => "10000$pagesSent"]], 'totalPages' => 2]);
    }]);

    $students = FakeIsams::connector()->students()->all();
    $pagesFetchedAtEachStudent = [];

    foreach ($students as $student) {
        expect($student)->toBeInstanceOf(Student::class);
        $pagesFetchedAtEachStudent[] = count(FakeIsams::queriesReceived($isams, GetStudentsRequest::class));
    }

    expect($students)->toBeInstanceOf(LazyCollection::class)
        ->and($pagesFetchedAtEachStudent)->toBe([1, 2]);
});

it('leaves page and page size out of a paged list\'s parameters, since it pages for you', function () {
    $parameters = array_map(fn (ReflectionParameter $parameter) => $parameter->getName(), (new ReflectionMethod(StudentsResource::class, 'all'))->getParameters());

    expect($parameters)->toBe(['expand', 'filter']);
});

it('returns where iSAMS put a record it created', function () {
    FakeIsams::respondWith([CreateSubjectRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/teaching/subjects/12'])]);

    $created = FakeIsams::connector()->teaching()->subjects()->create(['code' => 'MA', 'name' => 'Mathematics']);

    expect($created)->toBeInstanceOf(Created::class)
        ->and($created->id)->toBe('12');
});

it('returns a download as a file', function () {
    FakeIsams::respondWith([GetCurrentStudentPhotoRequest::class => MockResponse::make('made-up image bytes', headers: ['Content-Type' => 'image/png'])]);

    $photo = FakeIsams::connector()->students()->photos()->getCurrent('100001');

    expect($photo)->toBeInstanceOf(File::class)
        ->and($photo->contents)->toBe('made-up image bytes');
});

it('returns true from a write iSAMS answers without a body, as Eloquent\'s update() and delete() do', function () {
    $isams = FakeIsams::respondWith([RemoveStudentFromTeachingSetRequest::class => MockResponse::make(status: 200)]);

    $result = FakeIsams::connector()->teaching()->sets()->removeStudent(34, '100001');

    expect($result)->toBeTrue();
    $isams->assertSent(RemoveStudentFromTeachingSetRequest::class);
});

it('throws the exception for iSAMS\'s error status, each one an IsamsApiException', function (int $status, string $exception) {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make(['message' => 'Made-up error'], $status)]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(function (IsamsApiException $thrown) use ($exception, $status) {
            expect($thrown::class)->toBe($exception)
                ->and($thrown->getStatus())->toBe($status)
                ->and($thrown->isamsMessage())->toBe('Made-up error');
        });
})->with([
    'not found' => [404, NotFoundException::class],
    'a bad request' => [400, InvalidRequestException::class],
    'a conflict' => [409, InvalidRequestException::class],
    'an unprocessable request' => [422, InvalidRequestException::class],
    'rejected credentials' => [401, UnauthorizedException::class],
    'a missing permission' => [403, MissingPermissionException::class],
    'a server error' => [500, ServerErrorException::class],
    'an unavailable server' => [503, ServerErrorException::class],
    'a record that exists but is not associated' => [301, IsamsApiException::class],
    'too many requests' => [429, IsamsApiException::class],
]);

it('says which permission the API client needs, and for which area, when iSAMS refuses for permissions', function () {
    FakeIsams::respondWith([GetStudentConditionsRequest::class => MockResponse::make(['message' => 'Modify permissions are required'], 403)]);

    expect(fn () => FakeIsams::connector()->medicalCentre()->studentConditions()->all('100001'))
        ->toThrow(function (MissingPermissionException $exception) {
            expect($exception->requiredPermission())->toBe('Modify')
                ->and($exception->area())->toBe('Medical Centre')
                ->and($exception->getMessage())->toBe('The iSAMS API client needs Modify permission for Medical Centre to GET /api/medical/students/100001/conditions: Modify permissions are required');
        });
});

it('still reports a missing permission when iSAMS words the refusal differently', function () {
    FakeIsams::respondWith([GetStudentConditionsRequest::class => MockResponse::make(['message' => 'Access denied'], 403)]);

    expect(fn () => FakeIsams::connector()->medicalCentre()->studentConditions()->all('100001'))
        ->toThrow(function (MissingPermissionException $exception) {
            expect($exception->requiredPermission())->toBeNull()
                ->and($exception->area())->toBe('Medical Centre')
                ->and($exception->getMessage())->toBe('The iSAMS API client lacks permission for Medical Centre to GET /api/medical/students/100001/conditions: Access denied');
        });
});

it('throws iSAMS\'s error when a page of a paged list fails', function () {
    FakeIsams::respondWith([GetStudentsRequest::class => MockResponse::make(['message' => 'Read permissions are required'], 403)]);

    expect(fn () => FakeIsams::connector()->students()->all()->all())
        ->toThrow(MissingPermissionException::class, 'The iSAMS API client needs Read permission for Students to GET /api/students: Read permissions are required');
});

it('names no area when iSAMS refuses an endpoint named by its path', function () {
    FakeIsams::respondWith([AdhocRequest::class => MockResponse::make(['message' => 'Read permissions are required'], 403)]);

    $exception = IsamsApiException::fromResponse(FakeIsams::connector()->get('/api/students/customgroups'));

    expect($exception)->toBeInstanceOf(MissingPermissionException::class)
        ->and($exception->area())->toBeNull()
        ->and($exception->getMessage())->toBe('The iSAMS API client needs Read permission to GET /api/students/customgroups: Read permissions are required');
});

it('throws a server error with no iSAMS message when iSAMS sends an error page instead of JSON', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make('<html><body>Down for maintenance</body></html>', 503, ['Content-Type' => 'text/html'])]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(function (ServerErrorException $exception) {
            expect($exception->isamsMessage())->toBeNull()
                ->and($exception->trackingNumber())->toBeNull()
                ->and($exception->getMessage())->toBe('iSAMS responded 503 to GET /api/teaching/subjects/7 with an HTML error page');
        });
});

it('throws a server error when iSAMS answers a success with a page that is not JSON', function (string $requestClass, Closure $call, string $path) {
    FakeIsams::respondWith([$requestClass => MockResponse::make('<html><head><title>Maintenance</title></head><body>Back soon</body></html>', 200, ['Content-Type' => 'text/html'])]);

    expect(fn () => $call(FakeIsams::connector()))
        ->toThrow(ServerErrorException::class, "iSAMS responded 200 to GET $path with an HTML page instead of JSON ('Maintenance')");
})->with([
    'one record' => [GetSubjectRequest::class, fn ($isams) => $isams->teaching()->subjects()->get(7), '/api/teaching/subjects/7'],
    'one record through dto()' => [GetSubjectRequest::class, fn ($isams) => $isams->send(new GetSubjectRequest(7))->dto(), '/api/teaching/subjects/7'],
    'a list' => [GetSubjectsRequest::class, fn ($isams) => $isams->teaching()->subjects()->all(), '/api/teaching/subjects'],
    'a page of a paged list' => [GetStudentsRequest::class, fn ($isams) => $isams->students()->all()->all(), '/api/students'],
    'a page through the paginator' => [GetStudentsRequest::class, fn ($isams) => $isams->paginate(new GetStudentsRequest)->collect()->all(), '/api/students'],
]);

it('says when a success has a body that is neither JSON nor HTML', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make('OK', 200, ['Content-Type' => 'text/plain'])]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(ServerErrorException::class, 'iSAMS responded 200 to GET /api/teaching/subjects/7 with a body that is not JSON');
});
