<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Tests\Fixtures\ExampleAddress;
use spkm\IsamsApi\Tests\Fixtures\ExampleRequiredName;
use spkm\IsamsApi\Tests\Fixtures\ExampleStudent;

it('builds a model from iSAMS JSON, casting each value to its property type', function () {
    $student = ExampleStudent::from([
        'id' => '12',
        'forename' => 'Alex',
        'boarder' => 'true',
        'fee' => '1500.50',
        'dob' => '2012-03-04T00:00:00',
        'home' => ['town' => 'Exampleton', 'postcode' => 'EX1 1AA'],
        'addresses' => [['town' => 'Sampleford'], ['town' => 'Testbury']],
        'languages' => ['English', 'French'],
        'extra' => ['anything' => 1],
    ]);

    expect($student->id)->toBe(12)
        ->and($student->forename)->toBe('Alex')
        ->and($student->boarder)->toBeTrue()
        ->and($student->fee)->toBe(1500.5)
        ->and($student->dob)->toEqual(CarbonImmutable::parse('2012-03-04'))
        ->and($student->home)->toEqual(new ExampleAddress('Exampleton', 'EX1 1AA'))
        ->and($student->addresses)->toBeInstanceOf(Collection::class)
        ->and($student->addresses->all())->toEqual([new ExampleAddress('Sampleford'), new ExampleAddress('Testbury')])
        ->and($student->languages)->toBe(['English', 'French'])
        ->and($student->extra)->toBe(['anything' => 1]);
});

it('leaves missing values empty and ignores keys it does not know', function () {
    $student = ExampleStudent::from(['forename' => 'Alex', 'notInTheModel' => 'ignored']);

    expect($student->id)->toBeNull()
        ->and($student->home)->toBeNull()
        ->and($student->addresses)->toBeInstanceOf(Collection::class)->toBeEmpty()
        ->and($student->languages)->toBe([]);
});

it('treats the .NET empty date and null lists from iSAMS as empty', function () {
    $student = ExampleStudent::from(['dob' => '0001-01-01T00:00:00', 'addresses' => null, 'languages' => null]);

    expect($student->dob)->toBeNull()
        ->and($student->addresses)->toBeEmpty()
        ->and($student->languages)->toBe([]);
});

it('turns a model back into iSAMS JSON, leaving out empty values', function () {
    $student = new ExampleStudent(
        id: 12,
        forename: 'Alex',
        dob: CarbonImmutable::parse('2012-03-04 09:30:00'),
        home: new ExampleAddress('Exampleton'),
        addresses: collect([new ExampleAddress('Sampleford')]),
    );

    expect($student->toArray())->toBe([
        'id' => 12,
        'forename' => 'Alex',
        'dob' => '2012-03-04T09:30:00',
        'home' => ['town' => 'Exampleton'],
        'addresses' => [['town' => 'Sampleford']],
    ])->and(json_encode($student))->toBe(json_encode($student->toArray()));
});

it('builds a collection of models from a list', function () {
    $addresses = ExampleAddress::collect([['town' => 'Sampleford'], ['town' => 'Testbury']]);

    expect($addresses)->toBeInstanceOf(Collection::class)
        ->and($addresses->all())->toEqual([new ExampleAddress('Sampleford'), new ExampleAddress('Testbury')]);
});

it('leaves a date empty when iSAMS sends something that is not a date', function () {
    expect(ExampleStudent::from(['dob' => 'not set'])->dob)->toBeNull();
});

it('names the missing field when a model is built without a required value', function () {
    ExampleRequiredName::from([]);
})->throws(InvalidArgumentException::class, 'ExampleRequiredName needs a value for "name".');
