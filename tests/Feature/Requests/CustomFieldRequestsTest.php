<?php

use Saloon\Enums\Method;
use Saloon\Http\Request;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('gets a student\'s custom fields from their iSAMS endpoint', function (Request $request, string $url) {
    $sent = FakeIsams::send($request)->getPendingRequest();

    expect($sent->getMethod())->toBe(Method::GET)
        ->and($sent->getUrl())->toBe($url)
        ->and($sent->query()->all())->toBe([]);
})->with([
    'all of them' => [new GetCustomFieldsBySchoolidRequest('100001'), 'https://isams.example.test/api/students/100001/customFields'],
    'one of them' => [new GetCustomFieldsBySchoolidAndCustomfieldidRequest('100001', 56), 'https://isams.example.test/api/students/100001/customFields/56'],
]);

it('filters a student\'s custom fields with the filter it was given', function () {
    $sent = FakeIsams::send(new GetCustomFieldsBySchoolidRequest('100001', filter: "name eq 'Dietary'"))->getPendingRequest();

    expect($sent->query()->all())->toBe(['$filter' => "name eq 'Dietary'"]);
});

it('updates one of a student\'s custom fields by patching its value as a form', function () {
    $sent = FakeIsams::send(new UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest('100001', 56, 'Vegetarian'))
        ->getPendingRequest()
        ->createPsrRequest();

    expect($sent->getMethod())->toBe('PATCH')
        ->and((string) $sent->getUri())->toBe('https://isams.example.test/api/students/100001/customFields/56')
        ->and($sent->getHeaderLine('Content-Type'))->toBe('application/x-www-form-urlencoded')
        ->and((string) $sent->getBody())->toBe('value=Vegetarian');
});
