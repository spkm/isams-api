<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\Batch\Groups\ExternalExamsGroup;
use spkm\IsamsApi\Batch\Groups\PupilRegistersGroup;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/*
| Batch API records as iSAMS sends them where its node lists say otherwise.
*/

/**
 * A batch connector whose Batch API answers every request with the given records for the method's root node.
 *
 * @param  array<string, mixed>|list<array<string, mixed>>  $records
 */
function batchAnswering(string $method, array $records): IsamsBatchConnector
{
    [$module, $root] = BatchMap::METHODS[$method];
    FakeIsams::respondWith([BatchRequest::class => MockResponse::make(['iSAMS' => [$module => [$root => [BatchMap::ROOTS[$module][$root]['entity'] => $records]]]])]);

    return new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL);
}

it('reads batch records as iSAMS sends them, not as its node lists say', function (string $method, array $records, Closure $call, Closure $expect) {
    $expect($call(batchAnswering($method, $records))->first());
})->with([
    'exam results name the exam cycle Cycle' => ['ExternalExams_GetExamResults', [['@Id' => '1', 'Cycle' => '3']], fn ($batch) => $batch->externalExams()->examResults(), fn ($result) => expect($result->cycle)->toBe(3)],
    'exam arrangements spell separate invigilation iSAMS\'s way' => ['ExternalExams_GetExamArrangements', [['@Id' => '1', 'SeperateInvigilation' => '1']], fn ($batch) => $batch->externalExams()->examArrangements(), fn ($arrangement) => expect($arrangement->seperateInvigilation)->toBeTrue()],
    'exam entries have an editor' => ['ExternalExams_GetExamEntries', [['@Id' => '1', 'Editor' => 'Made-up editor']], fn ($batch) => $batch->externalExams()->examEntries(), fn ($entry) => expect($entry->editor)->toBe('Made-up editor')],
    'grouped modules hold a list of groups' => ['ControlPanel_GetGroupedModules', ['Group' => [['@Id' => '1', 'Modules' => ['Module' => [['@Id' => '5', 'Name' => 'Made-up module']]]], ['@Id' => '2']]], fn ($batch) => $batch->controlPanel()->groupedModules(), fn ($groups) => expect($groups->group)->toHaveCount(2)->and($groups->group->first()->modules->first()->name)->toBe('Made-up module')],
    'module permissions send the module id twice, once empty' => ['ControlPanel_GetModulePermissions', [['@Id' => '1', 'ModuleId' => [null, '5'], 'Author' => 'Made-up author']], fn ($batch) => $batch->controlPanel()->modulePermissions(), fn ($permission) => expect($permission->moduleId)->toBe(5)->and($permission->author)->toBe('Made-up author')],
    'SEN need dates come as day/month/year' => ['SENManager_GetTypes', [['@Id' => '1', 'NeedStartDate' => '25/12/2026']], fn ($batch) => $batch->senManager()->types(), fn ($type) => expect($type->needStartDate)->toBeInstanceOf(CarbonImmutable::class)->and($type->needStartDate->format('Y-m-d'))->toBe('2026-12-25')],
    'external data list ordinals are numbers' => ['Tracking_GetExternalDataList', [['@Id' => '1', 'Ordinal' => '2']], fn ($batch) => $batch->tracking()->externalDataList(), fn ($data) => expect($data->ordinal)->toBe(2)],
    'custom group membership names pupils PupilID and groups CustomGroupId' => ['Pupil_GetCustomPupilGroupMembership', [['@Id' => '1', '@PupilID' => '2', 'CustomGroupId' => '3']], fn ($batch) => $batch->pupil()->customPupilGroupMembership(), fn ($membership) => expect($membership->pupilID)->toBe(2)->and($membership->customGroupId)->toBe(3)],
    'custom groups name their author AuthorID' => ['Pupil_GetCustomPupilGroups', [['@Id' => '1', '@AuthorID' => '4']], fn ($batch) => $batch->pupil()->customPupilGroups(), fn ($group) => expect($group->authorID)->toBe(4)],
    'registration periods spell their rule id in full' => ['Registration_GetRegistrationPeriods', [['@Id' => '1', 'RegistrationRuleId' => '6']], fn ($batch) => $batch->registration()->periods(startDate: CarbonImmutable::parse('2026-09-01'), endDate: CarbonImmutable::parse('2026-09-30')), fn ($period) => expect($period->registrationRuleId)->toBe(6)],
    'reward and conduct field values say when they were last edited' => ['RewardsAndConduct_GetFields', [['@Id' => '1', 'Values' => ['Value' => [['@Id' => '2', 'LastEdited' => '2026-09-01T10:00:00']]]]], fn ($batch) => $batch->rewardsAndConduct()->fields(), fn ($field) => expect($field->values->first()->lastEdited)->toBeInstanceOf(CarbonImmutable::class)],
    'reward types have a description' => ['RewardsAndConduct_GetRewardsTypes', [['@Id' => '1', 'Description' => 'Made-up description']], fn ($batch) => $batch->rewardsAndConduct()->rewardsTypes(), fn ($type) => expect($type->description)->toBe('Made-up description')],
    'departments list their divisions' => ['Teaching_GetDepartmentsAndSubjects', [['@Id' => '1', 'Divisions' => ['Division' => [['@Id' => '7'], ['@Id' => '8']]]]], fn ($batch) => $batch->teaching()->departmentsAndSubjects(), fn ($department) => expect($department->divisions)->toHaveCount(2)],
    'pupil timetables hold a list of pupils' => ['Timetable_GetPupilTimetables', ['Pupil' => [['@Id' => '1'], ['@Id' => '2']]], fn ($batch) => $batch->timetable()->pupils(), fn ($timetables) => expect($timetables->pupil)->toHaveCount(2)],
    'staff custom fields have an order' => ['HumanResources_GetCurrentStaffWithCustomFields', [['@Id' => '1', 'CustomFields' => ['CustomField' => [['@Id' => '9', 'Order' => '2']]]]], fn ($batch) => $batch->humanResources()->currentStaffWithCustomFields(), fn ($staff) => expect($staff->customFields->first()->order)->toBe(2)],
]);

it('returns a batch call\'s records as a lazy collection, building each model as the loop reaches it', function () {
    $students = batchAnswering('Pupil_GetCurrentPupils', [['@Id' => '1'], ['@Id' => '2']])->pupil()->currentPupils();

    expect($students)->toBeInstanceOf(LazyCollection::class)
        ->and($students->all())->toHaveCount(2);
});

it('refuses, before asking iSAMS, a call whose filter iSAMS requires but was given no values', function () {
    $isams = FakeIsams::respondWith();

    expect(fn () => new IsamsBatchConnector('BATCH-KEY', 'batch-secret', FakeIsams::BASE_URL)->schoolReports()->reports()->all())
        ->toThrow(InvalidArgumentException::class, 'SchoolReports_GetReports needs at least one of its filters: reportCycleIdsToInclude, ncYear, reportType or reportStatus.');

    $isams->assertNotSent(BatchRequest::class);
});

it('requires the filter iSAMS insists on for the SEN register', function () {
    expect((new ReflectionMethod(PupilRegistersGroup::class, 'senRegister'))->getParameters()[0]->isOptional())->toBeFalse();
});

it('offers no exam results filter, since iSAMS ignores it', function () {
    expect((new ReflectionMethod(ExternalExamsGroup::class, 'examResults'))->getParameters())->toBe([]);
});
