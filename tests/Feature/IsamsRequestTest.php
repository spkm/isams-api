<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\IsamsApiException;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleRequest;
use spkm\IsamsApi\Tests\Fixtures\ExampleStudent;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

function sendExample(ExampleRequest $request, MockResponse $response): mixed
{
    FakeIsams::respondWith([ExampleRequest::class => $response]);

    return FakeIsams::connector()->send($request)->dto();
}

it('turns a single object into its model', function () {
    $student = sendExample(new ExampleRequest(IsamsRequest::ONE, ExampleStudent::class), MockResponse::make(['id' => 1, 'forename' => 'Alex']));

    expect($student)->toEqual(new ExampleStudent(id: 1, forename: 'Alex'));
});

it('turns the list under the result key into a collection of models', function () {
    $students = sendExample(new ExampleRequest(IsamsRequest::LIST, ExampleStudent::class, 'students'), MockResponse::make(['students' => [['id' => 1], ['id' => 2]], 'totalPages' => 1]));

    expect($students->all())->toEqual([new ExampleStudent(id: 1), new ExampleStudent(id: 2)]);
});

it('turns a bare list into a collection of models', function () {
    $students = sendExample(new ExampleRequest(IsamsRequest::LIST, ExampleStudent::class), MockResponse::make([['id' => 1]]));

    expect($students->all())->toEqual([new ExampleStudent(id: 1)]);
});

it('keeps list items as arrays when they have no model', function () {
    $ids = sendExample(new ExampleRequest(IsamsRequest::LIST, resultKey: 'ids'), MockResponse::make(['ids' => [3, 4]]));

    expect($ids->all())->toBe([3, 4]);
});

it('reports a created record\'s location and id', function () {
    $created = sendExample(new ExampleRequest(IsamsRequest::CREATED), MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/students/100002']));

    expect($created)->toEqual(new Created('https://isams.example.test/api/students/100002', '100002'));
});

it('returns a downloaded file with its contents, type and name', function () {
    $file = sendExample(new ExampleRequest(IsamsRequest::FILE), MockResponse::make('PNG-BYTES', 200, ['Content-Type' => 'image/png', 'Content-Disposition' => 'attachment; filename="photo.png"']));

    expect($file)->toEqual(new File('PNG-BYTES', 'image/png', 'photo.png'));
});

it('returns an untyped response as an array', function () {
    $raw = sendExample(new ExampleRequest(IsamsRequest::RAW), MockResponse::make(['anything' => true]));

    expect($raw)->toBe(['anything' => true]);
});

it('returns nothing for a response without a body', function () {
    expect(sendExample(new ExampleRequest(IsamsRequest::NONE), MockResponse::make(status: 200)))->toBeNull();
});

it('throws an IsamsApiException carrying iSAMS\'s message and tracking number when asked for the model of an error', function () {
    $error = MockResponse::make(['message' => 'An error occurred.', 'trackingNumber' => 'abc-123'], 500);

    expect(fn () => sendExample(new ExampleRequest(IsamsRequest::ONE, ExampleStudent::class), $error))
        ->toThrow(function (IsamsApiException $exception) {
            expect($exception->getMessage())->toBe('iSAMS responded 500: An error occurred.')
                ->and($exception->getStatus())->toBe(500)
                ->and($exception->isamsMessage())->toBe('An error occurred.')
                ->and($exception->trackingNumber())->toBe('abc-123');
        });
});

it('still returns the error response from send() without throwing', function () {
    FakeIsams::respondWith([ExampleRequest::class => MockResponse::make(['message' => 'Not found'], 404)]);

    expect(FakeIsams::connector()->send(new ExampleRequest(IsamsRequest::ONE, ExampleStudent::class))->status())->toBe(404);
});

it('sends a list in the query as repeated keys, the way iSAMS reads them', function () {
    $isams = FakeIsams::respondWith([ExampleRequest::class => MockResponse::make([])]);

    FakeIsams::connector()->send(new ExampleRequest(queryParameters: ['schoolIds' => ['100001', '100002'], 'page' => 1]));

    expect(FakeIsams::received($isams, ExampleRequest::class)->createPsrRequest()->getUri()->getQuery())->toBe('schoolIds=100001&schoolIds=100002&page=1');
});
