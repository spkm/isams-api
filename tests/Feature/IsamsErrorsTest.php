<?php

use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Exceptions\MissingPermissionException;
use spkm\IsamsApi\Exceptions\NotFoundException;
use spkm\IsamsApi\Exceptions\ServerErrorException;
use spkm\IsamsApi\Exceptions\UnauthorizedException;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\Agent\GetAgentsRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Concerns\GetConcernsRequest;
use spkm\IsamsApi\Support\Filter;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

/*
| What the package says when iSAMS returns an error, modelled on what iSAMS sends.
*/

it('names the request that failed in every error, with iSAMS\'s message', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make(['message' => 'Failed to read subject - Subject does not exist.'], 404)]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(NotFoundException::class, 'iSAMS responded 404 to GET /api/teaching/subjects/7: Failed to read subject - Subject does not exist.');
});

it('gives the tracking number of a server error, for iSAMS support', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make(['message' => 'An error occurred.', 'trackingNumber' => 'made-up-123'], 500)]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(ServerErrorException::class, 'iSAMS responded 500 to GET /api/teaching/subjects/7: An error occurred. (tracking number made-up-123)');
});

it('explains the bare server error iSAMS sends for a filter it cannot apply', function () {
    FakeIsams::respondWith([GetStudentsRequest::class => MockResponse::make(['message' => 'An error occurred.', 'trackingNumber' => 'made-up-456'], 500)]);

    expect(fn () => FakeIsams::connector()->students()->all(filter: Filter::where('nickname', 'eq', 'Al'))->first())
        ->toThrow(ServerErrorException::class, "iSAMS responded 500 to GET /api/students: An error occurred. (tracking number made-up-456). iSAMS answers this to any \$filter it can't apply: use the model's property names (in PascalCase), and only eq, ne, gt, ge, lt, le and and.");
});

it('says when iSAMS sends an HTML error page instead of JSON, as it does for a path it does not have', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make('<html><head><title>Runtime Error</title></head><body>Server Error</body></html>', 500, ['Content-Type' => 'text/html; charset=utf-8'])]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(ServerErrorException::class, "iSAMS responded 500 to GET /api/teaching/subjects/7 with an HTML error page ('Runtime Error'); iSAMS sends one for a path it doesn't have, among other faults");
});

it('treats iSAMS\'s permission refusals as missing permissions, whether it answers 401 or 403', function (int $status, string $request, string $message, Closure $call, string $expected) {
    FakeIsams::respondWith([$request => MockResponse::make(['message' => $message], $status)]);

    expect(fn () => $call(FakeIsams::connector()))
        ->toThrow(MissingPermissionException::class, $expected);
})->with([
    '401, naming the permission' => [401, GetAgentsRequest::class, 'The user is not authorised for this request - Read permissions are required.', fn (IsamsConnector $isams) => $isams->agent()->all(), 'The iSAMS API client needs Read permission for Agent to GET /api/agents: The user is not authorised for this request - Read permissions are required.'],
    '403, naming the permission and the module' => [403, GetConcernsRequest::class, 'The user is not authorised for this request - read activity permissions are required for WellbeingManager.', fn (IsamsConnector $isams) => $isams->wellbeingManager()->concerns()->all()->first(), 'The iSAMS API client needs Read permission for Wellbeing Manager to GET /api/wellbeing/concerns: The user is not authorised for this request - read activity permissions are required for WellbeingManager.'],
]);

it('still treats a 401 that is not about permissions as rejected credentials', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make(['message' => 'Authorization has been denied for this request.'], 401)]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(UnauthorizedException::class, 'iSAMS responded 401 to GET /api/teaching/subjects/7: Authorization has been denied for this request.');
});

it('says a permission is missing when iSAMS refuses without a message', function () {
    FakeIsams::respondWith([GetConcernsRequest::class => MockResponse::make(['message' => null], 403)]);

    expect(fn () => FakeIsams::connector()->wellbeingManager()->concerns()->all()->first())
        ->toThrow(MissingPermissionException::class, 'The iSAMS API client lacks permission for Wellbeing Manager to GET /api/wellbeing/concerns');
});

it('treats iSAMS timing out as a server error', function () {
    FakeIsams::respondWith([GetSubjectRequest::class => MockResponse::make(['message' => 'The request timed out.', 'trackingNumber' => 'made-up-789'], 408)]);

    expect(fn () => FakeIsams::connector()->teaching()->subjects()->get(7))
        ->toThrow(ServerErrorException::class, 'iSAMS responded 408 to GET /api/teaching/subjects/7: The request timed out. (tracking number made-up-789)');
});

it('retries a GET that iSAMS times out on, when retries are configured', function () {
    config(['isams-api.retries.times' => 2]);
    $responses = [MockResponse::make(['message' => 'The request timed out.'], 408), MockResponse::make(['id' => 7, 'name' => 'Mathematics'])];
    FakeIsams::respondWith([GetSubjectRequest::class => function () use (&$responses) {
        return array_shift($responses);
    }]);

    expect(FakeIsams::connector()->teaching()->subjects()->get(7)->name)->toBe('Mathematics');
});

it('explains a refused token request as rejected credentials, with OAuth\'s reason', function (string $error, array $scopes, string $expected) {
    FakeIsams::respondWith([GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => $error], 400)]);

    expect(fn () => new IsamsConnector('made-up-client', 'made-up-secret', FakeIsams::BASE_URL, $scopes))
        ->toThrow(UnauthorizedException::class, $expected);
})->with([
    'a wrong client id or secret' => ['invalid_client', ['restapi'], 'iSAMS refused the token request: invalid_client, the client id or secret is wrong'],
    'a scope the client is not allowed' => ['invalid_scope', ['iSAMS.CloudPortals.Api'], 'iSAMS refused the token request: invalid_scope, the client isn\'t allowed the scope it asked for (iSAMS.CloudPortals.Api)'],
]);

it('keeps the Batch API key, which iSAMS takes as the client id, out of a refused token request\'s message', function () {
    FakeIsams::respondWith([GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => 'invalid_client'], 400)]);

    expect(fn () => new IsamsBatchConnector('MADE-UP-BATCH-KEY', 'made-up-secret', FakeIsams::BASE_URL))
        ->toThrow(fn (UnauthorizedException $exception) => expect($exception->getMessage())->not->toContain('MADE-UP-BATCH-KEY'));
});

it('keeps a separate token for each set of scopes, so a Cloud Portals connection never borrows a REST token', function () {
    $isams = FakeIsams::respondWith();

    new IsamsConnector('client-id', 'client-secret', FakeIsams::BASE_URL, ['restapi']);
    new IsamsConnector('client-id', 'client-secret', FakeIsams::BASE_URL, ['iSAMS.CloudPortals.Api']);
    new IsamsConnector('client-id', 'client-secret', FakeIsams::BASE_URL, ['restapi']);

    $scopes = collect($isams->getRecordedResponses())->map(fn ($response) => $response->getPendingRequest()->body()->get('scope'))->all();

    expect($scopes)->toBe(['restapi', 'iSAMS.CloudPortals.Api']);
});
