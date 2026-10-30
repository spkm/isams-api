<?php

use spkm\IsamsApi\Requests\BatchApi\FilterEndpointRequest;
use spkm\IsamsApi\Requests\BatchApi\GetEndpointRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('gets a batch from the batch endpoint for its content type, with the batch key in the URL', function (string $contentType, string $uri) {
    $sent = FakeIsams::send(new GetEndpointRequest('batch-key', $contentType))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('GET')
        ->and((string) $sent->getUri())->toBe($uri);
})->with([
    'JSON' => ['application/json', 'https://isams.example.test/api/batch/1.0/json.ashx?apiKey=batch-key'],
    'XML' => ['application/xml', 'https://isams.example.test/api/batch/1.0/xml.ashx?apiKey=batch-key'],
]);

it('posts the XML filters it was given to the batch endpoint for its content type', function (string $contentType, string $uri) {
    $filters = '<Filters><MethodsToRun><Method name="HRManager:CurrentStaff" /></MethodsToRun></Filters>';

    $sent = FakeIsams::send(new FilterEndpointRequest('batch-key', $contentType, $filters))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('POST')
        ->and((string) $sent->getUri())->toBe($uri)
        ->and((string) $sent->getBody())->toBe($filters);
})->with([
    'JSON' => ['application/json', 'https://isams.example.test/api/batch/1.0/json.ashx?apiKey=batch-key'],
    'XML' => ['application/xml', 'https://isams.example.test/api/batch/1.0/xml.ashx?apiKey=batch-key'],
]);

it('labels the XML filters it posts as application/xml', function () {
    $sent = FakeIsams::send(new FilterEndpointRequest('batch-key', 'application/xml', '<Filters />'))->getPendingRequest()->createPsrRequest();

    expect($sent->getHeaderLine('Content-Type'))->toBe('application/xml');
});

it('sends batch requests with the bearer token too', function () {
    $sent = FakeIsams::send(new GetEndpointRequest('batch-key'))->getPendingRequest();

    expect($sent->headers()->get('Authorization'))->toBe('Bearer fake-token');
});

it('cannot send a batch request for a content type other than JSON or XML', function () {
    FakeIsams::respondWith();

    // TODO: Characterised as-is, decide whether this is intended. Any other content type fails with PHP's UnhandledMatchError when the request is sent, not when it is built. (src/Requests/BatchApi/GetEndpointRequest.php, resolveEndpoint())
    expect(fn () => FakeIsams::connector()->send(new GetEndpointRequest('batch-key', 'text/csv')))->toThrow(UnhandledMatchError::class);
})->group('as-is');
