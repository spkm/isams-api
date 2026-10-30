<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Admissions\CustomField;
use spkm\IsamsApi\Data\Gradebooks\GradebookOverview;
use spkm\IsamsApi\Data\MedicalCentre\MedicalVaccinationType;
use spkm\IsamsApi\Data\RewardsAndConduct\Category;
use spkm\IsamsApi\Data\RewardsAndConduct\Reward;
use spkm\IsamsApi\Data\SystemConfiguration\SmsBatch;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\Admissions\CustomFields\GetApplicantCustomFieldRequest;
use spkm\IsamsApi\Requests\Gradebooks\GetGradebooksRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\GetStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Vaccination\GetMedicalVaccinationTypesRequest;
use spkm\IsamsApi\Requests\Registration\ReasonForChange\GetRegistrationReasonForChangesRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Categories\GetCategoryRequest;
use spkm\IsamsApi\Requests\RewardsAndConduct\Rewards\GetRewardRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Configuration\GetWellbeingConfigurationRequest;
use spkm\IsamsApi\Resources\Registration\ReasonForChangeResource;
use spkm\IsamsApi\Support\Filter;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/*
| Responses as iSAMS sends them where its API spec says otherwise. All data is made up.
*/

it('reads a response shaped as iSAMS sends it, not as its spec says', function (string $request, array $body, Closure $call, Closure $expect) {
    FakeIsams::respondWith([$request => MockResponse::make($body)]);

    $expect($call(FakeIsams::connector()));
})->with([
    'SMS batches, in a paged list under smsBatches' => [
        GetSmsBatchMessagesRequest::class,
        ['smsBatches' => [['id' => 1]], 'page' => 1, 'pageSize' => 100, 'count' => 1, 'totalCount' => 1, 'totalPages' => 1],
        fn (IsamsConnector $isams) => $isams->systemConfiguration()->sms()->getBatchMessages(),
        fn (mixed $batches) => expect($batches)->toBeInstanceOf(LazyCollection::class)->and($batches->all())->toHaveCount(1)->each->toBeInstanceOf(SmsBatch::class),
    ],
    'vaccination types, under vaccinationTypes' => [
        GetMedicalVaccinationTypesRequest::class,
        ['vaccinationTypes' => [['id' => 3, 'name' => 'Made-up vaccine']]],
        fn (IsamsConnector $isams) => $isams->medicalCentre()->vaccination()->getTypes(),
        fn (mixed $types) => expect($types)->toBeInstanceOf(Collection::class)->and($types->first())->toBeInstanceOf(MedicalVaccinationType::class)->and($types->first()->name)->toBe('Made-up vaccine'),
    ],
    'gradebooks, as a bare list' => [
        GetGradebooksRequest::class,
        [['id' => 5, 'name' => 'Made-up gradebook']],
        fn (IsamsConnector $isams) => $isams->gradebooks()->all(),
        fn (mixed $gradebooks) => expect($gradebooks->first())->toBeInstanceOf(GradebookOverview::class)->and($gradebooks->first()->name)->toBe('Made-up gradebook'),
    ],
    'one reward category, as one object' => [
        GetCategoryRequest::class,
        ['id' => 7, 'name' => 'Made-up category'],
        fn (IsamsConnector $isams) => $isams->rewardsAndConduct()->categories()->get(1, 7),
        fn (mixed $category) => expect($category)->toBeInstanceOf(Category::class)->and($category->name)->toBe('Made-up category'),
    ],
    'one reward, as one object' => [
        GetRewardRequest::class,
        ['id' => 9, 'description' => 'Made-up reward'],
        fn (IsamsConnector $isams) => $isams->rewardsAndConduct()->rewards()->get('100001', 9),
        fn (mixed $reward) => expect($reward)->toBeInstanceOf(Reward::class)->and($reward->description)->toBe('Made-up reward'),
    ],
    'one applicant custom field, inside a customFields list' => [
        GetApplicantCustomFieldRequest::class,
        ['customFields' => [['id' => 11, 'name' => 'Made-up field', 'value' => 'Yes']]],
        fn (IsamsConnector $isams) => $isams->admissions()->customFields()->get('A1001', 11),
        fn (mixed $fields) => expect($fields)->toBeInstanceOf(Collection::class)->and($fields->first())->toBeInstanceOf(CustomField::class)->and($fields->first()->value)->toBe('Yes'),
    ],
]);

it('returns null for a single record iSAMS answers with null, such as a student with no doctor', function (string $request, Closure $call) {
    FakeIsams::respondWith([$request => MockResponse::make('null')]);

    expect($call(FakeIsams::connector()))->toBeNull();
})->with([
    'a student\'s doctor' => [GetStudentDoctorRequest::class, fn (IsamsConnector $isams) => $isams->medicalCentre()->studentDoctor()->get('100001')],
    'the Wellbeing Manager configuration' => [GetWellbeingConfigurationRequest::class, fn (IsamsConnector $isams) => $isams->wellbeingManager()->configuration()->get()],
]);

it('requires the change start date iSAMS insists on when listing reasons for change', function () {
    $isams = FakeIsams::respondWith([GetRegistrationReasonForChangesRequest::class => MockResponse::make(['attendanceCodeReasonForChanges' => [], 'totalPages' => 1])]);

    FakeIsams::connector()->registration()->reasonForChange()->all(changeDateStart: '2026-09-01')->all();

    expect((new ReflectionMethod(ReasonForChangeResource::class, 'all'))->getParameters()[0])
        ->getName()->toBe('changeDateStart')
        ->isOptional()->toBeFalse()
        ->and(FakeIsams::queriesReceived($isams, GetRegistrationReasonForChangesRequest::class)[0])->toHaveKey('changeDateStart', '2026-09-01');
});

it('sends a Filter to iSAMS as its OData text, through the students request and resource alike', function () {
    $isams = FakeIsams::respondWith([GetStudentsRequest::class => MockResponse::make(['students' => [], 'totalPages' => 1])]);

    FakeIsams::connector()->send(new GetStudentsRequest(filter: Filter::where('surname', 'eq', 'Smith')));
    FakeIsams::connector()->students()->all(filter: Filter::where('surname', 'eq', 'Jones'))->all();

    expect(array_column(FakeIsams::queriesReceived($isams, GetStudentsRequest::class), '$filter'))->toBe(["Surname eq 'Smith'", "Surname eq 'Jones'"]);
});
