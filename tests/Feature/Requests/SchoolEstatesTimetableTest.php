<?php

use Carbon\CarbonImmutable;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\School\Enums\HouseType;
use spkm\IsamsApi\Data\School\House;
use spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate;
use spkm\IsamsApi\Data\Timetable\TimetableWeek;
use spkm\IsamsApi\Requests\Estates\Rooms\GetRoomsRequest;
use spkm\IsamsApi\Requests\School\Configuration\GetSchoolDetailsRequest;
use spkm\IsamsApi\Requests\School\Departments\GetDepartmentsRequest;
use spkm\IsamsApi\Requests\School\Houses\GetHousesRequest;
use spkm\IsamsApi\Requests\School\Terms\GetTermsRequest;
use spkm\IsamsApi\Requests\Timetable\Import\CompleteTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\CreateTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\GetActiveTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Structures\GetTimetableStructuresRequest;
use spkm\IsamsApi\Requests\Timetable\StudentTimetables\GetStudentTimetableRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('reads the houses of one type as models', function () {
    $isams = FakeIsams::respondWith([GetHousesRequest::class => MockResponse::make(['houses' => [['id' => 4, 'name' => 'Example House', 'type' => 'Boarding']]])]);

    $houses = FakeIsams::connector()->school()->houses()->all('Boarding')->dto();

    expect($houses->first())->toBeInstanceOf(House::class)
        ->and($houses->first()->typeEnum())->toBe(HouseType::Boarding)
        ->and(FakeIsams::queriesReceived($isams, GetHousesRequest::class)[0])->toBe(['houseType' => 'Boarding']);
});

it('asks for teaching or non-teaching departments in the path', function () {
    $sent = FakeIsams::send(new GetDepartmentsRequest('NonTeaching'), ['departments' => []])->getPendingRequest();

    expect($sent->getUrl())->toEndWith('/api/school/departments/NonTeaching');
});

it('keeps every detail of a department, which the spec leaves untyped', function () {
    $departments = FakeIsams::send(new GetDepartmentsRequest('Teaching'), ['departments' => [['id' => 2, 'code' => 'MA', 'name' => 'Mathematics']]])->dto();

    expect($departments->all())->toBe([['id' => 2, 'code' => 'MA', 'name' => 'Mathematics']]);
});

it('sends the timetable structure\'s dates in the format iSAMS reads and returns its weeks with their days', function () {
    $isams = FakeIsams::respondWith([GetTimetableStructuresRequest::class => MockResponse::make(['timetableWeeks' => [['id' => 1, 'name' => 'Week A', 'timetableDays' => [['id' => 2, 'name' => 'Monday']]]]])]);

    $weeks = FakeIsams::connector()->send(new GetTimetableStructuresRequest(
        calendarEndDate: CarbonImmutable::parse('2026-12-11'),
        calendarStartDate: CarbonImmutable::parse('2026-09-03'),
        divisionCode: 'SEN',
    ))->dto();

    expect($weeks->first())->toBeInstanceOf(TimetableWeek::class)
        ->and($weeks->first()->timetableDays->first()->name)->toBe('Monday')
        ->and(FakeIsams::queriesReceived($isams, GetTimetableStructuresRequest::class)[0])->toBe([
            'calendarEndDate' => '2026-12-11T00:00:00',
            'calendarStartDate' => '2026-09-03T00:00:00',
            'divisionCode' => 'SEN',
        ]);
});

it('serves the school\'s reference lists from the cache once caching is on, but not timetables', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetTermsRequest::class => MockResponse::make(['terms' => []]),
        GetStudentTimetableRequest::class => MockResponse::make([]),
    ]);
    $connector = FakeIsams::connector();

    $connector->school()->terms()->all();
    $connector->school()->terms()->all();
    $connector->timetable()->studentTimetables()->get('100001');
    $connector->timetable()->studentTimetables()->get('100001');

    expect(FakeIsams::queriesReceived($isams, GetTermsRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetStudentTimetableRequest::class))->toHaveCount(2);
});

it('starts a timetable import with its lessons as JSON and reports where iSAMS stored it', function () {
    $isams = FakeIsams::respondWith([CreateTimetableImportRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/timetables/import/active'])]);
    $import = TimetableImportRequestForCreate::from(['importAction' => 'New', 'name' => 'Autumn timetable', 'lessons' => [['periodId' => 3, 'setCode' => '10A/Ma1']]]);

    $created = FakeIsams::connector()->timetable()->import()->create($import)->dto();

    expect($created)->toEqual(new Created('https://isams.example.test/api/timetables/import/active', 'active'))
        ->and(json_decode((string) FakeIsams::received($isams, CreateTimetableImportRequest::class)->createPsrRequest()->getBody(), true))
        ->toBe(['importAction' => 'New', 'lessons' => [['periodId' => 3, 'setCode' => '10A/Ma1']], 'name' => 'Autumn timetable']);
});

it('completes the active timetable import with a command that has no body', function () {
    $sent = FakeIsams::send(new CompleteTimetableImportRequest)->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('POST')
        ->and((string) $sent->getUri())->toEndWith('/api/timetables/import/active/commands/complete')
        ->and((string) $sent->getBody())->toBe('');
});

it('reaches the school, estates and timetable requests through resources', function () {
    $isams = FakeIsams::respondWith([
        GetSchoolDetailsRequest::class => MockResponse::make(['name' => 'Example School']),
        GetRoomsRequest::class => MockResponse::make(['rooms' => []]),
        GetActiveTimetableImportRequest::class => MockResponse::make([]),
    ]);
    $connector = FakeIsams::connector();

    $connector->school()->configuration()->getSchoolDetails();
    $connector->estates()->rooms()->all();
    $connector->timetable()->import()->getActive();

    $isams->assertSent(GetSchoolDetailsRequest::class);
    $isams->assertSent(GetRoomsRequest::class);
    $isams->assertSent(GetActiveTimetableImportRequest::class);
});
