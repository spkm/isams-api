<?php

use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Resources\HasResources;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

beforeEach(function () {
    config([
        'isams-api.client_id' => 'configured-client',
        'isams-api.client_secret' => 'configured-secret',
        'isams-api.base_url' => 'https://configured.example.test',
    ]);
});

it('builds the isams service once, from the isams-api config, asking for a token the first time it is used', function () {
    $isams = FakeIsams::respondWith();

    expect(app('isams'))->toBe(app('isams'));
    $isams->assertNothingSent();

    Isams::getCachedAccessToken();
    Isams::getCachedAccessToken();

    $isams->assertSentCount(1);
    $tokenRequest = FakeIsams::received($isams, GetClientCredentialsTokenRequest::class);
    expect($tokenRequest->getUrl())->toBe('https://configured.example.test/auth/connect/token')
        ->and($tokenRequest->body()->get('client_id'))->toBe('configured-client')
        ->and($tokenRequest->body()->get('client_secret'))->toBe('configured-secret');
});

it('sends requests to the configured iSAMS through the Isams facade', function () {
    FakeIsams::respondWith([GetStudentRequest::class => MockResponse::make(['id' => 1])]);

    $response = Isams::send(new GetStudentRequest('100001'));

    expect($response->json())->toBe(['id' => 1])
        ->and($response->getPendingRequest()->getUrl())->toBe('https://configured.example.test/api/students/100001');
});

it('pages through the configured iSAMS through the Isams facade', function () {
    FakeIsams::respondWith([GetStudentsRequest::class => MockResponse::make(['students' => [['id' => 1]], 'totalPages' => 1])]);

    expect(Isams::paginate(new GetStudentsRequest)->collect()->all())->toBe([['id' => 1]]);
});

it('refuses a method the connector does not have', function () {
    FakeIsams::respondWith();

    expect(fn () => Isams::doesNotExist())->toThrow(BadMethodCallException::class, 'Method doesNotExist does not exist.');
});

it('cannot use the default connection until its client id, secret and base URL are configured', function () {
    config(['isams-api.client_id' => null, 'isams-api.client_secret' => null, 'isams-api.base_url' => null]);

    // TODO: Characterised as-is, decide whether this is intended. A missing setting surfaces as a TypeError from the IsamsConnector constructor rather than a message naming the setting. (src/IsamsService.php, __call())
    expect(fn () => Isams::get('/api/school/terms'))->toThrow(TypeError::class);
})->group('as-is');

it('hints every area and connection method on the facade, so IDEs autocomplete Isams::', function () {
    $hints = (string) (new ReflectionClass(Isams::class))->getDocComment();
    $areas = array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods());
    $methods = [...$areas, 'connection', 'batch', 'isAvailable', 'send', 'paginate', 'get', 'post', 'put', 'patch', 'delete', 'paginateEndpoint'];

    foreach ($methods as $method) {
        expect($hints)->toMatch('/@method static \\S+ '.$method.'\(/');
    }
});
