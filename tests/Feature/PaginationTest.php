<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectsRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/**
 * iSAMS answering every page of students with the next student, and reporting three pages in all.
 */
function threePagesOfStudents(): array
{
    $studentsSent = 0;

    return [GetStudentsRequest::class => function () use (&$studentsSent) {
        $studentsSent++;

        return MockResponse::make(['students' => [['id' => $studentsSent]], 'totalPages' => 3]);
    }];
}

it('asks iSAMS for pages 1, 2 and 3 when it reports three pages', function () {
    $isams = FakeIsams::respondWith(threePagesOfStudents());

    FakeIsams::connector()->paginate(new GetStudentsRequest)->collect()->all();

    expect(array_column(FakeIsams::queriesReceived($isams, GetStudentsRequest::class), 'page'))->toBe([1, 2, 3]);
});

it('asks for 100 records a page', function () {
    $isams = FakeIsams::respondWith(threePagesOfStudents());

    FakeIsams::connector()->paginate(new GetStudentsRequest)->collect()->all();

    expect(FakeIsams::queriesReceived($isams, GetStudentsRequest::class))->each->toHaveKey('pageSize', 100);
});

it('stops once it has asked for as many pages as iSAMS reports', function () {
    $isams = FakeIsams::respondWith(threePagesOfStudents());

    FakeIsams::connector()->paginate(new GetStudentsRequest)->collect()->all();

    expect(FakeIsams::queriesReceived($isams, GetStudentsRequest::class))->toHaveCount(3);
});

it('collects the items under the request\'s result key from every page', function () {
    FakeIsams::respondWith(threePagesOfStudents());

    $students = FakeIsams::connector()->paginate(new GetStudentsRequest)->collect()->all();

    expect($students)->toBe([['id' => 1], ['id' => 2], ['id' => 3]]);
});

it('returns no items after one request when iSAMS reports no pages', function () {
    $isams = FakeIsams::respondWith([GetStudentsRequest::class => MockResponse::make(['students' => [], 'totalCount' => 0, 'totalPages' => 0])]);

    $students = FakeIsams::connector()->paginate(new GetStudentsRequest)->collect()->all();

    expect($students)->toBe([])
        ->and(FakeIsams::queriesReceived($isams, GetStudentsRequest::class))->toHaveCount(1);
});

it('uses each value of the whole response as an item when the result key is missing from it', function () {
    FakeIsams::respondWith([GetStudentsRequest::class => MockResponse::make(['pupils' => [['id' => 1]], 'totalPages' => 1])]);

    $items = FakeIsams::connector()->paginate(new GetStudentsRequest)->collect()->all();

    expect($items)->toBe([[['id' => 1]], 1]);
});

it('keeps the request\'s expand and filter on every page, but uses its own page size', function () {
    $isams = FakeIsams::respondWith(threePagesOfStudents());

    FakeIsams::connector()->paginate(new GetStudentsRequest(pageSize: 10, expand: 'customFields', filter: "surname eq 'Smith'"))->collect()->all();

    expect(FakeIsams::queriesReceived($isams, GetStudentsRequest::class))->each->toMatchArray([
        'pageSize' => 100,
        'expand' => 'customFields',
        '$filter' => "surname eq 'Smith'",
    ]);
});

it('refuses to paginate a request that is not paginatable, such as the teaching subjects', function () {
    FakeIsams::respondWith();

    // TODO: Characterised as-is, decide whether this is intended. The teaching subjects, sets, departments, set list and curriculum subject codes requests have a result key like the paginated requests, but don't implement Paginatable. Are those iSAMS endpoints paged? (src/Requests/Teaching/GetSubjectsRequest.php, GetSubjectsRequest)
    expect(fn () => FakeIsams::connector()->paginate(new GetSubjectsRequest))
        ->toThrow(InvalidArgumentException::class, 'The request must implement the `Saloon\PaginationPlugin\Contracts\Paginatable` interface');
})->group('as-is');
