<?php

use Illuminate\Support\Facades\Log;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;
use spkm\IsamsApi\Traits\ApiErrorHandling;

beforeEach(function () {
    config([
        'isams-api.client_id' => 'configured-client',
        'isams-api.client_secret' => 'configured-secret',
        'isams-api.base_url' => 'https://isams.example.test',
    ]);
});

it('returns iSAMS errors from send() as responses instead of throwing', function () {
    FakeIsams::respondWith([GetCustomFieldsBySchoolidAndCustomfieldidRequest::class => MockResponse::make(['message' => 'Student not found'], 404)]);

    $response = Isams::send(new GetCustomFieldsBySchoolidAndCustomfieldidRequest('100001', 56));

    expect($response->status())->toBe(404)
        ->and($response->json('message'))->toBe('Student not found');
});

it('passes a custom field\'s value through unchanged in the response body', function () {
    FakeIsams::respondWith([GetCustomFieldsBySchoolidAndCustomfieldidRequest::class => MockResponse::make(['customFields' => [['id' => 56, 'value' => 'Vegetarian']]])]);

    $response = Isams::send(new GetCustomFieldsBySchoolidAndCustomfieldidRequest('100001', 56));

    expect($response->json()['customFields'][0]['value'])->toBe('Vegetarian');
});

it('reports a successful custom field update with status 200', function () {
    FakeIsams::respondWith([UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest::class => MockResponse::make([], 200)]);

    $response = Isams::send(new UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest('100001', 56, 'Vegetarian'));

    expect($response->status())->toBe(200);
});

it('lets a caller\'s own class recognise and log an iSAMS error with the ApiErrorHandling trait', function () {
    Log::spy();
    $caller = new class
    {
        use ApiErrorHandling;

        public function handle(array $json): bool
        {
            if ($this->responseIsAnError($json)) {
                $this->logApiError($json, ['school_id' => '100001']);

                return false;
            }

            return true;
        }
    };

    expect($caller->handle(['message' => 'Student not found']))->toBeFalse()
        ->and($caller->handle(['customFields' => []]))->toBeTrue();
    Log::shouldHaveReceived('error')->once()->with('Student not found', ['school_id' => '100001']);
});
