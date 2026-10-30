<?php

use Carbon\CarbonImmutable;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Discipline\DetentionSession;
use spkm\IsamsApi\Data\Registration\UpdateRegistrationStatusCommand;
use spkm\IsamsApi\Requests\Discipline\DetentionSessions\GetDetentionSessionsRequest;
use spkm\IsamsApi\Requests\Exclusions\GetExclusionCancellationReasonsRequest;
use spkm\IsamsApi\Requests\Registration\NatureOfAbsence\CreateRegistrationNatureOfAbsenceRequest;
use spkm\IsamsApi\Requests\Registration\StatusStudents\UpdateStudentRegistrationStatusRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\ModuleTypes\GetModuleTypesRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\PatchStudentFieldsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\GetStudentRegistersRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('updates a student\'s register fields as a JSON object keyed by field name', function () {
    $isams = FakeIsams::respondWith([PatchStudentFieldsRequest::class => MockResponse::make()]);

    FakeIsams::connector()->studentRegisters()->fields()->patchMany(5, '100001', ['dietaryNeeds' => 'None', 'consentGiven' => true]);

    $sent = FakeIsams::received($isams, PatchStudentFieldsRequest::class)->createPsrRequest();
    expect($sent->getMethod())->toBe('PATCH')
        ->and((string) $sent->getBody())->toBe('{"dietaryNeeds":"None","consentGiven":true}');
});

it('records the nature of an absence as a bare JSON string', function () {
    $isams = FakeIsams::respondWith([CreateRegistrationNatureOfAbsenceRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/registration/natureofabsence/88'])]);

    $created = FakeIsams::connector()->registration()->natureOfAbsence()->create(88, 'Medical appointment')->dto();

    $sent = FakeIsams::received($isams, CreateRegistrationNatureOfAbsenceRequest::class)->createPsrRequest();
    expect($created->id)->toBe('88')
        ->and($sent->getHeaderLine('Content-Type'))->toBe('application/json')
        ->and((string) $sent->getBody())->toBe('"Medical appointment"');
});

it('marks a student present in a registration period with a status command', function () {
    $sent = FakeIsams::send(new UpdateStudentRegistrationStatusRequest(12, '100001', new UpdateRegistrationStatusCommand(isLate: true, isPresent: true, numberOfMinutesLate: 5)))
        ->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PUT')
        ->and((string) $sent->getUri())->toEndWith('/api/registration/register/12/students/100001')
        ->and(json_decode((string) $sent->getBody(), true))->toBe(['isLate' => true, 'isPresent' => true, 'numberOfMinutesLate' => 5]);
});

it('pages through detention sessions as models', function () {
    $isams = FakeIsams::respondWith([GetDetentionSessionsRequest::class => MockResponse::make([
        'detentionSessions' => [['id' => 3, 'name' => 'Friday detention', 'startDate' => '2026-11-06T16:00:00']],
        'page' => 1,
        'totalPages' => 1,
    ])]);

    $sessions = FakeIsams::connector()->paginate(new GetDetentionSessionsRequest)->dtos()->all();

    expect($sessions[0])->toBeInstanceOf(DetentionSession::class)
        ->and($sessions[0]->startDate)->toEqual(CarbonImmutable::parse('2026-11-06 16:00:00'))
        ->and(FakeIsams::queriesReceived($isams, GetDetentionSessionsRequest::class)[0])->toMatchArray(['page' => 1, 'pageSize' => 100]);
});

it('serves conduct and register reference lists from the cache once caching is on, but not a student\'s rewards', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetModuleTypesRequest::class => MockResponse::make(['moduleTypes' => []]),
        GetStudentRegistersRequest::class => MockResponse::make(['registers' => []]),
        GetExclusionCancellationReasonsRequest::class => MockResponse::make([]),
        GetRewardsRequest::class => MockResponse::make(['rewards' => []]),
    ]);
    $connector = FakeIsams::connector();

    foreach ([1, 2] as $time) {
        $connector->rewardsAndConduct()->moduleTypes()->all();
        $connector->studentRegisters()->all();
        $connector->exclusions()->getCancellationReasons();
        $connector->rewardsAndConduct()->rewards()->all('100001');
    }

    expect(FakeIsams::queriesReceived($isams, GetModuleTypesRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetStudentRegistersRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetExclusionCancellationReasonsRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetRewardsRequest::class))->toHaveCount(2);
});
