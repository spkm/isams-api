<?php

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Support\Filter;
use spkm\IsamsApi\Support\JsonPatch;

it('builds a JSON Patch document as a bare list of operations', function () {
    $patch = JsonPatch::make()
        ->replace('/forename', 'Alex')
        ->add('/languages/-', 'French')
        ->remove('/middleNames')
        ->move('/preferredName', '/forename')
        ->copy('/surname', '/previousName')
        ->test('/schoolId', '100001');

    expect($patch->toArray())->toBe([
        ['op' => 'replace', 'path' => '/forename', 'value' => 'Alex'],
        ['op' => 'add', 'path' => '/languages/-', 'value' => 'French'],
        ['op' => 'remove', 'path' => '/middleNames'],
        ['op' => 'move', 'from' => '/preferredName', 'path' => '/forename'],
        ['op' => 'copy', 'from' => '/surname', 'path' => '/previousName'],
        ['op' => 'test', 'path' => '/schoolId', 'value' => '100001'],
    ])->and(json_encode($patch))->toBe(json_encode($patch->toArray()));
});

it('builds an OData filter the way iSAMS expects each kind of value', function () {
    $filter = Filter::where('title', 'eq', 'Mr')
        ->and('tutorEmployeeId', 'eq', 38)
        ->and('isTeachingStaff', 'eq', false)
        ->and('dateOfBirth', 'eq', null)
        ->and('enrolmentDate', 'ge', CarbonImmutable::parse('2019-09-01'));

    expect((string) $filter)->toBe("Title eq 'Mr' and TutorEmployeeId eq 38 and IsTeachingStaff eq false and DateOfBirth eq null and EnrolmentDate ge datetime'2019-09-01'");
});

it('escapes apostrophes in filter text', function () {
    expect((string) Filter::where('Surname', 'eq', "O'Brien"))->toBe("Surname eq 'O''Brien'");
});

it('keeps the time in a filter date when it has one', function () {
    expect((string) Filter::where('LastUpdated', 'gt', CarbonImmutable::parse('2026-10-30 09:15:00')))->toBe("LastUpdated gt datetime'2026-10-30T09:15:00'");
});

it('refuses a filter operator iSAMS does not support', function () {
    Filter::where('Surname', 'like', 'Smith');
})->throws(InvalidArgumentException::class, 'iSAMS filters only support eq, ne, gt, ge, lt and le');
